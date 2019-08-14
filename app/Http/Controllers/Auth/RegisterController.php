<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Resume;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
Use Redirect;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'secteur' => ['required', 'string', 'max:255'],
            'pays' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'max:255'],
            'checked2' => ['required', 'string', 'max:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
          //  'g-recaptcha-response' => 'required|captcha',
           
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        

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
            'type' =>   $data['type'],
            'password' => Hash::make($data['password']),
        ]);


        if($data['type'] == 10){
            Resume::create([
                'nom' => $data['name'],
                'email' => $data['email'],
                'tel' =>  $data['tel'],
                'id_cand' => $user->id
            ]);
        }

        DB::table('users')
        ->where('id', $user->id )
        ->update([
        'parent_id' => $user->id,
        ]);

        $title = 'Bienvenue sur Youmann';
        $content = 'Bienvenue sur Youmann';
       
      
        Mail::to($user->email)->send(new WelcomeMail($user));
        
        return $user;
    }

}
