<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Post;
use App\Ref;
use App\Ref_cand;
use App\Candidature;
use App\Resume;
use App\Gest_ent;  
use App\User; 
use Illuminate\Support\Facades\Mail;
use PragmaRX\Countries\Package\Countries;
use PragmaRX\Countries\Package\Services\Config;
use App\Mail\CandidatureMail; 
use Illuminate\Support\Facades\Storage;
use App\File;
use App\Http\Requests\ImageFormRequest;

class employer extends Controller
{
    public function employers()
    {
        $Allcountries = \App\Country::all();
        $Allemployers = \App\User::where('type', '=', 20)->orderBy('created_at', 'DESC')->paginate(5);
        
        return \View::make('employer')
        ->with('employers', $Allemployers)
        ->with('all', $Allcountries);
    }

    public function jobtheque()
    {
        $Allcountries = \App\Country::all();
        $cv=[];
        if( Auth::user()){
            $cv = \App\File::where('user_id', '=', Auth::user()->id)->first();
        }

        $AllJobs = \App\Post::where('status', '=', 1)
        ->with('refs')
        ->with('user')
        ->with('candidatures')
        ->orderBy('posts.created_at', 'DESC')->paginate(4);

       //dd($AllJobs);
        return \View::make('job-theque')
        ->with('jobs', $AllJobs)
        ->with('all', $Allcountries)
        ->with('cv', $cv);
    }

    public function redirect()
    {
        $Allcountries = \App\Country::all();
        
        $type = \Route::current()->parameter('type');

        if(Auth::user()->type == 10){
            return view('candidat.candidat-dashboard')
            ->with('all', $Allcountries);
        }else{
            return view('employer.employer-dashboard')
            ->with('all', $Allcountries);
        }
    }

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

    public function update(Request $req)
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
            'name' => $req['name'],
            'email' => $req['email'],
            'site' =>  $req['site'],
            'secteur' =>  $req['secteur'],
            'description' =>  $req['description'],
            'facebook' =>  $req['facebook'],
            'twitter' =>  $req['twitter'],
            'google' =>  $req['google'],
            'linkedin' =>  $req['linkedin'],
            'photoUrl' => $name,
            'taille' =>  $req['taille'],
            'adresse' =>  $req['adresse'],
            'ville' =>  $req['ville'],
            'pays' =>  $req['pays'],
            'tel' =>  $req['tel'],
        ]);
        $status = 'Vos Informations ont été mises à jour avec succès';
       
        $Allcountries = \App\Country::all();
        
       return back()
       ->with('all', $Allcountries)
       ->with('status', $status);
    }

    public function cand_update(Request $req)
    {
        $name =Auth::user()->photoUrl; 
        
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
        }
      
       
        DB::table('resumes')
        ->where('email', Auth::user()->email )
        ->update([
            'email' => $req['email'],
            'tel' =>  $req['tel'],
        ]);

        DB::table('users')
            ->where('id', Auth::user()->id )
            ->update([
            'name' => $req['name'],
            'email' => $req['email'],
            'site' =>  $req['site'],
            'secteur' =>  $req['secteur'],
            'description' =>  $req['description'],
            'photoUrl' => $name,
            'adresse' =>  $req['adresse'],
            'ville' =>  $req['ville'],
            'pays' =>  $req['pays'],
            'tel' =>  $req['tel'],
        ]);

        DB::table('resumes')
        ->where('id_cand', Auth::user()->id )
        ->update([
            'nom' => $req['name'],
            'email' => $req['email'],
            'tel' =>  $req['tel'],
            'photoUrl' => $name,
            'residence' =>  $req['pays'],
        ]);
        $status = 'Votre Profil a été mis à jour avec succès';

       
        $Allcountries = \App\Country::all();
        
        return redirect('candidate-profil')
        ->with('all', $Allcountries)
        ->with('status', $status);
        
        //return view('employer.employer-edit');
    }

    public function reset(Request $req)
    {
        DB::table('users')
        ->where('email', $req['email'] )
        ->update([
        'password' => Hash::make($req['password']),
    ]);
  
    $Allcountries = \App\Country::all();
    
    return redirect('/')
    ->with('all', $Allcountries);

    }
    public function reset_(Request $req)
    {
        DB::table('users')
        ->where('id', Auth::user()->id )
        ->update([
        'password' => Hash::make($req['password']),
    ]);

   
    $Allcountries = \App\Country::all();
    
   if(Auth::user()->type == 20){
    return redirect('employer-edit')
    ->with('all', $Allcountries);
   }elseif(Auth::user()->type == 10){
    return redirect('candidate-profil')
    ->with('all', $Allcountries);
   }
    
    }


    public function post(Request $data){

        $id = time().strval(Auth::user()->parent_id);

        Post::create([
          'id' => $id,
          'titre' => $data['titre'],
          'secteur' => $data['secteur'],
          'type_contrat' => $data['type_contrat'],
          'remuneration' => $data['salaire'],
          'mobilite' => $data['mobilite'],
          'localisation' => $data['localisation'],
          'date_exp' => $data['date_exp'],
          'domaine_etude' => $data['domaine_etude'],
          'diplome' => $data['diplome'],
          'niveau_etude' => $data['niveau_etude'],
          'annee_exp' => $data['annee_exp'],
          'certif' => $data['certif'],
          'nationalite' => $data['nationalite'],
          'description' => $data['description'],
          'responsabilities' => $data['responsabilities'],
          'status' => 0,
          'id_ent' =>Auth::user()->parent_id
        ]);

        if($data['comp_1'] != ''){
            Ref::create([
                'post_id' => $id,
                'skill' => $data['skill_1'],
                'comp' => $data['comp_1'],
                'level' => $data['level_1'],
            ]);
        }

        if($data['comp_2'] != ''){
            Ref::create([
                'post_id' => $id,
                'skill' => $data['skill_2'],
                'comp' => $data['comp_2'],
                'level' => $data['level_2'],
            ]);
        }

        if($data['comp_3'] != ''){
            Ref::create([
                'post_id' => $id,
                'skill' => $data['skill_3'],
                'comp' => $data['comp_3'],
                'level' => $data['level_3'],
            ]);
        }

        if($data['comp_4'] != ''){
            Ref::create([
                'post_id' => $id,
                'skill' => $data['skill_4'],
                'comp' => $data['comp_4'],
                'level' => $data['level_4'],
            ]);
        }

        if($data['comp_5'] != ''){
            Ref::create([
                'post_id' => $id,
                'skill' => $data['skill_5'],
                'comp' => $data['comp_5'],
                'level' => $data['level_5'],
            ]);
        }

        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
        $AllemployersJobs = \App\Post::where('id_ent', '=', Auth::user()->parent_id )
        ->orderBy('created_at', 'DESC')
        ->with('candidatures')
        ->paginate(5);

        $status = 'Votre Offre a été publié avec succès';
        
        $Allcountries = \App\Country::all();
        
        return \View::make('employer.employer-manage-job')
        ->with('all', $Allcountries)
        ->with('status', $status)
        ->with('ent', $ent)
        ->with('user', $user)
        ->with('jobs', $AllemployersJobs);;
    }

    public function jobsum() {
        $post_id = \Route::current()->parameter('id');
        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
        $posts =  \App\Post::all()->where('id', '=', $post_id)->first();
        $refs =  \App\Ref::all()->where('post_id', '=', $post_id);

        $Allcountries = \App\Country::all();
        
        return \View::make('employer.job-summary')
        ->with('all', $Allcountries)
        ->with('ent', $ent)
        ->with('user', $user)
        ->with('post',$posts)
        ->with('refs', $refs);
    }

    public function jobActive() {
        $post_id = \Route::current()->parameter('id');

        DB::table('posts')
        ->where('id', $post_id )
        ->update([
        'status' => 1,
    ]);

    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
    $posts =  \App\Post::all()->where('id', '=', $post_id)->first();
    $refs =  \App\Ref::all()->where('post_id', '=', $post_id);

    $status = 'Votre Offre a été activée avec succès';

   
    $Allcountries = \App\Country::all();
       
     return \View::make('employer.job-summary')
     ->with('all', $Allcountries)
     ->with('status', $status)
     ->with('post',$posts)
     ->with('refs', $refs)
     ->with('ent', $ent)
     ->with('user', $user);
  //  return back();
    }


    public function jobDeSactive(){
    $post_id = \Route::current()->parameter('id');

        DB::table('posts')
        ->where('id', $post_id )
        ->update([
        'status' => 0,
    ]);

    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
    $posts =  \App\Post::all()->where('id', '=', $post_id)->first();
    $refs =  \App\Ref::all()->where('post_id', '=', $post_id);

    $status = 'Votre Offre a été desactivée avec succès';
   
    $Allcountries = \App\Country::all();
    
     return \View::make('employer.job-summary')
     ->with('all', $Allcountries)
     ->with('status', $status)
    ->with('post',$posts)
    ->with('refs', $refs)
    ->with('ent', $ent)
    ->with('user', $user);
   // return back();

    }

    public function jobEdit(){
        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
 

        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
        $post_id = \Route::current()->parameter('id');
        $posts =  \App\Post::all()->where('id', '=', $post_id)->first();
        $refs =  \App\Ref::all()->where('post_id', '=', $post_id);
        $Allcountries = \App\Country::all();

        $status = 'Votre Offre a été modifiée avec succès';
        
        return \View::make('employer.employer-job-update')
        ->with('status', $status)
        ->with('user', $user)
        ->with('ent', $ent)
        ->with('post',$posts)
        ->with('refs', $refs)
        ->with('all', $Allcountries);
    }

    public function jobUpdate(Request $data){
    $post_id = \Route::current()->parameter('id');

    DB::table('posts')
        ->where('id', $post_id )
        ->update([
            'titre' => $data['titre'],
            'secteur' => $data['secteur'],
            'type_contrat' => $data['type_contrat'],
            'remuneration' => $data['salaire'],
            'mobilite' => $data['mobilite'],
            'localisation' => $data['localisation'],
            'date_exp' => $data['date_exp'],
            'domaine_etude' => $data['domaine_etude'],
            'diplome' => $data['diplome'],
            'niveau_etude' => $data['niveau_etude'],
            'annee_exp' => $data['annee_exp'],
            'certif' => $data['certif'],
            'nationalite' => $data['nationalite'],
            'description' => $data['description'],
            'responsabilities' => $data['responsabilities'],
    ]);

   
    $posts =  \App\Post::all()->where('id', '=', $post_id)->first();
    $refs =  \App\Ref::all()->where('post_id', '=', $post_id);

    $status = 'Vos Informations ont été enregistrées avec succès';
     \View::make('employer.job-summary')
    ->with('post',$posts)
    ->with('refs', $refs);

   
    $Allcountries = \App\Country::all();
    
    return back()
    ->with('all', $Allcountries)
    ->with('status', $status)
    ->with('post',$posts)
    ->with('refs', $refs);
    }

    public function deletePost(){
        $post_id = \Route::current()->parameter('id');
        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $article = \App\Post::find($post_id)->delete();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();

        $AllemployersJobs = \App\Post::where('id_ent', '=', Auth::user()->id )->orderBy('created_at', 'DESC')->paginate(5);
       
        $status = 'Votre Offre a été supprimée avec succès';

       
        $Allcountries = \App\Country::all();
        
        return redirect('employer-manage-job')
        ->with('all', $Allcountries)
        ->with('status', $status)
        ->with('user', $user)
        ->with('ent', $ent)
        ->with('jobs', $AllemployersJobs);
    }
    public function managejob(){
        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
        $AllemployersJobs = \App\Post::where('id_ent', '=', Auth::user()->parent_id )
        ->orderBy('created_at', 'DESC')
        ->with('candidatures')
        ->paginate(5);
    
       
        $Allcountries = \App\Country::all();
        
        return view('employer.employer-manage-job')
        ->with('all', $Allcountries)
        ->with('ent', $ent)
        ->with('user', $user)
        ->with('jobs', $AllemployersJobs);
    }

    public function empDetail(){
        $id = \Route::current()->parameter('id');
        $emp = \App\User::where('id', '=', $id)->first();
    
      
        $Allcountries = \App\Country::all();
        
        return view('employer-detail')
        ->with('all', $Allcountries)
        ->with('emp', $emp);
    }


    public function update_resume(Request $data){
        DB::table('resumes')
        ->where('email', Auth::user()->email )
        ->update([
            'nom' => $data['nom'],
            'dernier_poste' => $data['dernier_poste'],
            'responsabilite' => $data['responsabilite'],
            'remuneration' => $data['remuneration'],
            'motivation' => $data['motivation'],
            'disponibilite' => $data['disponibilite'],
            'domaine_etude' => $data['domaine_etude'],
            'mobilite' => $data['mobilite'],
            'niveau_etude' => $data['niveau_etude'],
            'annee_exp' => $data['annee_exp'],
            'genre' => $data['genre'],
            'nationalite' => $data['nationalite'],
            'residence' => $data['residence'],
            'date_naiss' => $data['date_naiss'],

        ]);
        $status = 'Vos Informations ont été mises à jour avec succès';

       
        $Allcountries = \App\Country::all();
        
        return redirect('candidate-resume')
        ->with('all', $Allcountries)
        ->with('status', $status);
    }

    public function upload_file(Request $request)
    {
        $request->validate([
            'fileToUpload' => 'required|file|max:1024',
        ]);

        if($request->hasFile('fileToUpload')){
            $res= \App\File::where('user_id','=', Auth::user()->id)->delete();
            $uploadedFile = $request->file('fileToUpload');
            $filename = time().$uploadedFile->getClientOriginalName();
        }
     

    $uploadedFile->move(public_path() . '/files/', $filename);

      $upload = new File;
      $upload->	title = $filename;
      $upload->	type = $request['type'];

      $upload->user()->associate(auth()->user());

      $upload->save();

      $status = 'Votre fichier a été enregistré avec succès';
    
      $Allcountries = \App\Country::all();
      
    return back()
    ->with('all', $Allcountries)
    ->with('status', $status);
    }

    public function upload_letter(Request $request)
    {
        $request->validate([
            'fileToUpload' => 'required|file|max:1024',
        ]);

        if($request->hasFile('fileToUpload')){
            $res= \App\File::where('user_id', Auth::user()->id)->delete();

            $uploadedFile = $request->file('fileToUpload');
            $filename = time().$uploadedFile->getClientOriginalName();
        }
   

   $uploadedFile->move(public_path() . '/files/', $filename);

      $upload = new File;
      $upload->	title = $filename;
      $upload->	type = $request['type'];

      $upload->user()->associate(auth()->user());

      $upload->save();
      $Allcountries = \App\Country::all();
     
    return back()
    ->with('all', $Allcountries);
    }


    public function apply(Request $data){

        $id = time().strval(Auth::user()->id);

        $cv = '';

       if($data->hasFile('file')){
        $res= \App\File::where('user_id','=', Auth::user()->id)->delete();
            $uploadedFile = $data->file('file');
            $filename = time().$uploadedFile->getClientOriginalName();
            $cv = $filename;

            $uploadedFile->move(public_path() . '/files/', $filename);

            $upload = new File;
            $upload->	title = $filename;
            $upload->	type = 'CV';
      
            $upload->user()->associate(auth()->user());
      
            $upload->save();
        }else{
            $cv = $data['file_defaut'];
            
        } 

       

        Candidature::create([
            'id_post' => $data['id_post'],
            'id_cand' => Auth::user()->id,
            'id_ent' => $data['id_ent'],
            'cv' => $cv,
            'status' => 1,
        ]);

        if($data['comp_1'] != ''){
            Ref_cand::create([
                'id_post' => $data['id_post'],
                'id_cand' => Auth::user()->id,
                'skill' => $data['skill_1'],
                'comp' => $data['comp_1'],
                'level' => $data['level_1'],
            ]);
        }

        if($data['comp_2'] != ''){
            Ref_cand::create([
                'id_post' => $data['id_post'],
                'id_cand' => Auth::user()->id,
                'skill' => $data['skill_2'],
                'comp' => $data['comp_2'],
                'level' => $data['level_2'],
            ]);
        }

        if($data['comp_3'] != ''){
            Ref_cand::create([
                'id_post' => $data['id_post'],
                'id_cand' => Auth::user()->id,
                'skill' => $data['skill_3'],
                'comp' => $data['comp_3'],
                'level' => $data['level_3'],
            ]);
        }

        if($data['comp_4'] != ''){
            Ref_cand::create([
                'id_post' => $data['id_post'],
                'id_cand' => Auth::user()->id,
                'skill' => $data['skill_4'],
                'comp' => $data['comp_4'],
                'level' => $data['level_4'],
            ]);
        }

        if($data['comp_5'] != ''){
            Ref_cand::create([
                'id_post' =>  $data['id_post'],
                'id_cand' => Auth::user()->id,
                'skill' => $data['skill_5'],
                'comp' => $data['comp_5'],
                'level' => $data['level_5'],
            ]);
        }
        $id_post = $data['id_post'];
        $post = Post::findOrFail($id_post);
        $resume = Resume::where('id_cand',  Auth::user()->id)->first();
         //Mail::to($resume->email)->send(new CandidatureMail($resume, $post));

        $status = 'Votre candidature a été enregistrée avec succès';
        $Allcountries = \App\Country::all();
        
        return back()
        ->with('all', $Allcountries)
        ->with('status', $status);
    }
    
    public function jobDetail()
    {
        $id = \Route::current()->parameter('id');
        $job = \App\Post::where('id', '=', $id)
        ->with('refs')
        ->with('user')
        ->with('candidatures')
        ->get();

        $cc = 0;

        if(Auth::user()){
            $cc = \App\Candidature::where('id_post', '=', $id)
            ->where('id_cand', '=', Auth::user()->id)
            ->count();
        }
        

        $cv=[];
        if( Auth::user()){
            $cv = \App\File::where('user_id', '=', Auth::user()->id)->first();
        }
        $Allcountries = \App\Country::all();

        $status = '';
        return \View::make('job-details')
        ->with('job', $job)
        ->with('cv', $cv)
        ->with('cc', $cc)
        ->with('all', $Allcountries);
    }

    public function unknown_apply(Request $data){
            $id = time();
        Resume::create([
            'nom' => $data['nom'],
            'email' => $data['email'],
            'tel' => $data['tel'],
            'dernier_poste' => $data['dernier_poste'],
            'responsabilite' => $data['responsabilite'],
            'remuneration' => $data['remuneration'],
            'motivation' => $data['motivation'],
            'disponibilite' => $data['disponibilite'],
            'domaine_etude' => $data['domaine_etude'],
            'mobilite' => $data['mobilite'],
            'niveau_etude' => $data['niveau_etude'],
            'annee_exp' => $data['annee_exp'],
            'genre' => $data['genre'],
            'nationalite' => $data['nationalite'],
            'residence' => $data['residence'],
            'date_naiss' => $data['date_naiss'],
            'id_cand' => $id,
            'type_ab' => 'random',
        ]);

        if($data->hasFile('file')){
                $uploadedFile = $data->file('file');
                $filename = time().$uploadedFile->getClientOriginalName();
                $cv = $filename;
    
                $uploadedFile->move(public_path() . '/files/', $filename);
    
                $upload = new File;
                $upload->	title = $filename;
                $upload->	type = 'CV';
                $upload->   user_id = $id;
                $upload->save();

                Candidature::create([
                    'id_post' => $data['id_post'],
                    'id_cand' => $id,
                    'id_ent' => $data['id_ent'],
                    'cv' => $cv,
                    'status' => 1,
                ]);
        }

        if($data['comp_1'] != ''){
            Ref_cand::create([
                'id_post' => $data['id_post'],
                'id_cand' => $id,
                'skill' => $data['skill_1'],
                'comp' => $data['comp_1'],
                'level' => $data['level_1'],
            ]);
        }

        if($data['comp_2'] != ''){
            Ref_cand::create([
                'id_post' => $data['id_post'],
                'id_cand' => $id,
                'skill' => $data['skill_2'],
                'comp' => $data['comp_2'],
                'level' => $data['level_2'],
            ]);
        }

        if($data['comp_3'] != ''){
            Ref_cand::create([
                'id_post' => $data['id_post'],
                'id_cand' => $id,
                'skill' => $data['skill_3'],
                'comp' => $data['comp_3'],
                'level' => $data['level_3'],
            ]);
        }

        if($data['comp_4'] != ''){
            Ref_cand::create([
                'id_post' => $data['id_post'],
                'id_cand' => $id,
                'skill' => $data['skill_4'],
                'comp' => $data['comp_4'],
                'level' => $data['level_4'],
            ]);
        }

        if($data['comp_5'] != ''){
            Ref_cand::create([
                'id_post' =>  $data['id_post'],
                'id_cand' => $id,
                'skill' => $data['skill_5'],
                'comp' => $data['comp_5'],
                'level' => $data['level_5'],
            ]);
        }

        $id_post = $data['id_post'];
        $post = Post::findOrFail($id_post);
        $resume = Resume::where('id_cand',  $id)->first();
        //Mail::to($resume->email)->send(new CandidatureMail($resume, $post));

        $status = 'Votre candidature a été enregistré avec succès';


        $Allcountries = \App\Country::all();
        
        return back()
        ->with('all', $Allcountries)
        ->with('status', $status);
    }

    public function manage_candidate(){

        $id = \Route::current()->parameter('id');
        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
        $cand = DB::table('posts')
                ->select('posts.domaine_etude as postdom', 'resumes.domaine_etude as resumdom',
                'posts.titre', 'resumes.id_cand as ref_cand', 'resumes.niveau_etude as resniv',
                'posts.niveau_etude as postniv', 'posts.annee_exp as postann',
                'resumes.annee_exp as resann', 'posts.localisation as zone', 'resumes.residence as pays_res',
                'candidatures.id_post as id_post')
                ->join('candidatures' , 'candidatures.id_post' , '=' , 'posts.id')
                ->join('resumes' , 'resumes.id_cand' , '=' , 'candidatures.id_cand')
                ->where('posts.id', '=', $id)->get();

              

                $Allcountries = \App\Country::all();
               
       return \View::make('employer.employer-manage-candidate')
       ->with('all', $Allcountries)
       ->with('user', $user)
       ->with('ent', $ent)
       ->with('cand',$cand);
    }

    public function shortlistedjobDetail(){
        $id_cand = \Route::current()->parameter('id_cand');
        $id_post = \Route::current()->parameter('id_post');
        $hasCv = \App\File::all()->where('user_id', $id_cand)->count();
       $resume = \App\Resume::all()->where('id_cand', '=', $id_cand)->first();
       $refs = \App\Ref_cand::all()->where('id_post', '=', $id_post)
        ->where('id_cand', '=', $id_cand);

        $status = \App\Candidature::all()->where('id_post', '=', $id_post)
        ->where('id_cand', '=', $id_cand)->first();


        $Allcountries = \App\Country::all();
        
       return \View::make('employer.shortlisted')
       ->with('all', $Allcountries)
       ->with('res',$resume)
       ->with('refs', $refs)
       ->with('id_cand', $id_cand)
       ->with('id_post', $id_post)
       ->with('status', $status)
       ->with('hasCv', $hasCv);
       
    }

    public function search(Request $request){
        $Allcountries = \App\Country::all();
        $jobs = \App\Post::where('status', '=', 1)
        ->where('titre', 'like', '%'.$request['text'].'%')
        ->where('localisation', 'like', '%'.$request['localisation'].'%')
        ->where('secteur', 'like', '%'.$request['secteur'].'%')->get();
  
     return \View::make('welcome')
     ->with('all', $Allcountries)
       // return back()
       ->with('jobs', $jobs);
    }

    public function entsearch(Request $request){
        $Allcountries = \App\Country::all();
        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();

        $ents = \App\User::where('type', '=', 20 )
        ->where('name', 'like', '%'.$request['text'].'%')
        ->where('pays', 'like', '%'.$request['localisation'].'%')
        ->where('secteur', 'like', '%'.$request['secteur'].'%')->paginate(5);
       // $ents = \App\User::where('type', '=', 20 )->paginate(5);

       return view('employer.entreprises')
     ->with('user', $user)
     ->with('ent', $ent)
     ->with('ents', $ents)
     ->with('all', $Allcountries);
    }

    public function candsearch(Request $request){
        $Allcountries = \App\Country::all();
        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();

        $cand = \App\User::where('type', '=', 10 )
        ->where('name', 'like', '%'.$request['text'].'%')
        ->where('pays', 'like', '%'.$request['localisation'].'%')
        ->where('secteur', 'like', '%'.$request['secteur'].'%')->paginate(5);
       // $ents = \App\User::where('type', '=', 20 )->paginate(5);

       return view('employer.candidats')
     ->with('user', $user)
     ->with('ent', $ent)
     ->with('cand', $cand)
     ->with('all', $Allcountries);
    }



    public function reject(){
        $id_cand = \Route::current()->parameter('id_cand');
        $id_post = \Route::current()->parameter('id_post');

        DB::table('candidatures')
        ->where('id_cand',  $id_cand )
        ->where('id_post',  $id_post )
        ->update([
        'status' => 0,
        ]);
 
        $Allcountries = \App\Country::all();
        
         return back()
         ->with('all', $Allcountries);   
    }

    public function accept(){
        $id_cand = \Route::current()->parameter('id_cand');
        $id_post = \Route::current()->parameter('id_post');

        DB::table('candidatures')
        ->where('id_cand',  $id_cand )
        ->where('id_post',  $id_post )
        ->update([
        'status' => 2,
        ]);

        $status = 'Vos Modifications ont été enregistrées avec succès';
        $Allcountries = \App\Country::all();
       
         return back()
         ->with('all', $Allcountries)
         ->with('status', $status);   
    }

    public function cvThequeDetail(){

        $id_cand = \Route::current()->parameter('id_cand');
        $resume = \App\Resume::all()->where('id_cand', $id_cand)->first();
        $hasCv = \App\File::all()->where('user_id', $id_cand)->count();
        $Allcountries = \App\Country::all();
        
        return \View::make('employer.cv-detail')
        ->with('all', $Allcountries)
        -> with('hasCv', $hasCv)
        -> with('res', $resume);   
    }

    public function download()
    {
        $id = \Route::current()->parameter('id');

        $cv = \App\File::all()->where('user_id', $id)->first();

        $Allcountries = \App\Country::all();
       
        if($cv->title){
            $file_name =$cv->title;

            $file_path = public_path('files/'.$file_name);
          //  $res = response()->download($file_path);
            return  response()->download($file_path)
            ->with('all', $Allcountries);
           // return back()->with($res);
        }
       else{
           return $res ='Ce candidat na pas de CV'
           ->with('all', $Allcountries);
       }
 
    }

    protected function create_gest(Request $data)
    {
        $mdp = Hash::make($data['password']);
        
        
       $user =  User::create([
            'parent_id' => Auth::user()->parent_id,
            'name' => $data['nom'],
            'email' => $data['email'],
            'site' =>  $data['site'],
            'secteur' =>  $data['secteur'],
            'description' =>  $data['description'],
            'taille' =>  $data['taille'],
            'adresse' =>  $data['adresse'],
            'ville' =>  $data['ville'],
            'pays' =>  $data['pays'],
            'tel' =>  $data['tel'],
            'checked2' =>  $data['checked2'],
            'type' => 21,
            'password' => $mdp,
        ]);

            $id_user = $user->id;

        Gest_ent::create([
            'nom' => $data['nom'],
            'email' => $data['email'],
            'tel' =>  $data['tel'],
            'fonction' => $data['fonction'],
            'id_ent' =>  Auth::user()->parent_id,
            'id_user' => $id_user,
            'type_gest' =>  $data['type_gest'],
        ]);

        $status = 'Votre Gestionnaire a été créé avec succès';
        $Allcountries = \App\Country::all();
       
       return back()
       ->with('status', $status)
       ->with('all', $Allcountries);
    }

    public function edit_gest(Request $data) {
        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $users = \App\Gest_ent::where('id_ent', '=', Auth::user()->parent_id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();

        DB::table('gest_ents')
        ->where('id_user', $data['id_user'] )
        ->update([
            'nom' => $data['name'],
            'email' => $data['email'],
            'tel' =>  $data['tel'],
            'fonction' => $data['fonction'],
            'type_gest' => $data['role'],
        ]);

        $status = 'Votre Gestionnaire a été modifié avec succès';
        $Allcountries = \App\Country::all();
        
        return back()
        ->with('all', $Allcountries)
        ->with('status', $status);
    }

    public function deleteGest(){
        $id = \Route::current()->parameter('id');
        $del1= \App\Gest_ent::where('id_user','=', $id)->delete();
        $del2 = \App\User::find($id)->delete();

        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $users = \App\Gest_ent::where('id_ent', '=', Auth::user()->parent_id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();

        $status = 'Votre Gestionnaire a été supprimé avec succès';
        $Allcountries = \App\Country::all();
        
        return \View::make('employer.manage-gest')
        ->with('status', $status)
        ->with('user', $user)
        ->with('users', $users)
        ->with('ent', $ent)
        ->with('all', $Allcountries);

    }

    public function deleteEntreprise(){
        $id = \Route::current()->parameter('id');
        $del1= \App\Gest_ent::where('id_ent','=', $id)->delete();
        $del2 = \App\User::where('parent_id','=', $id)->delete();
        $del3= \App\Post::where('id_ent','=', $id)->delete();

        $Allcountries = \App\Country::all();
        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
    
        $ents = \App\User::where('type', '=', 20 )->paginate(5);

        $status = 'L Entreprise a été supprimée avec succès';
     //   return \View::make('employer.entreprises')
     return redirect('entreprises')
        ->with('status', $status)
        ->with('user', $user)
        ->with('ent', $ent)
        ->with('ents', $ents)
        ->with('all', $Allcountries);
    }

    public function deleteCandidat(){
        $id = \Route::current()->parameter('id');

        $del1 = \App\User::where('parent_id','=', $id)->delete();
        $del2= \App\Candidature::where('id_cand','=', $id)->delete();
        $del3= \App\File::where('user_id','=', $id)->delete();
        $del4= \App\Ref_cand::where('id_cand','=', $id)->delete();
        
        $Allcountries = \App\Country::all();
        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
        $cand = \App\User::where('type', '=', 10 )->paginate(5);

        $status = 'Le Candidat a été supprimé avec succès';
    
        return redirect('candidats')
        ->with('status', $status)
        ->with('ent', $ent)
        ->with('user', $user)
        ->with('cand', $cand)
        ->with('all', $Allcountries);
    }
    public function create_ent(Request $data){
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'site' =>  $data['site'],
            'secteur' =>  $data['secteur'],
            'description' =>  $data['description'],
            'taille' =>  $data['taille'],
            'adresse' =>  $data['adresse'],
            'ville' =>  $data['ville'],
            'pays' =>  $data['pays'],
            'tel' =>  $data['tel'],
            'checked2' =>  $data['checked2'],
            'type' =>   20,
            'password' => Hash::make($data['password']),
        ]);

        DB::table('users')
        ->where('id', $user->id )
        ->update([
        'parent_id' => $user->id,
        ]);

        $status = 'Votre Entreprise a été créée avec succès';
      
        $Allcountries = \App\Country::all();
       
        return back()
        ->with('all', $Allcountries)
        ->with('status', $status);


    }
}
