<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ImageFormRequest;

class ImagesController extends Controller
{
    public function empImgUpdate(ImageFormRequest $req)
    {
        $name =$req['image_name']; 
        
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
        }

        DB::table('users')
        ->where('id', Auth::user()->parent_id )
        ->update([
      
        'photoUrl' => $name,
      
    ]);
    $status = 'Vos Informations ont été mises à jour avec succès';
   
    $Allcountries = \App\Country::all();
    
   return back()
   ->with('all', $Allcountries)
   ->with('status', $status);
    }
}
