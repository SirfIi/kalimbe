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
use App\Question;
use App\Pays;
use App\Nationalite;
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
use Intervention\Image\Facades\Image;

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
         //  ->where('date_exp','>', date('Y-m-d H:i:s'))
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
            $imagePath = public_path().'/images/'.$name;
            $image = Image::make($imagePath)->resize(300, 250)->save();
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
            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ]);

            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
            $imagePath = public_path().'/images/'.$name;
            $image = Image::make($imagePath)->resize(300, 250)->save();
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

            request()->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $file = $req->file('image');
            $name = $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
            $imagePath = public_path().'/images/'.$name;
            $image = Image::make($imagePath)->resize(300, 250)->save();
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
        //   'secteur' => $data['secteur'],
            'type_contrat' => $data['type_contrat'],
            'remuneration' => $data['salaire'],
            'mobilite' => $data['mobilite'],
        //   'localisation' => $data['localisation'],
            'date_publication' => date("Y-m-d H:i:s"),
            'date_exp' => $data['date_exp'],
        //   'domaine_etude' => $data['domaine_etude'],
        //   'diplome' => $data['diplome'],
        //   'niveau_etude' => $data['niveau_etude'],
        //   'annee_exp' => $data['annee_exp'],
        //   'certif' => $data['certif'],
        //   'nationalite' => $data['nationalite'],
            'description' => $data['description'],
            'responsabilities' => $data['responsabilities'],
            'status' => 0,
            'id_ent' =>Auth::user()->parent_id
        ]);

       
        $skill = $data->type_quest;
        $comp = $data->question;
        $level = $data->level;

        $secteur = $data->secteur;
        $elim_secteur = 0;
        if($data->has('elim_secteur')) $elim_secteur = 1;

        for($count = 0; $count < count( $secteur); $count++){
            $info = array();
            $info = array(
                'titre' => 'Secteur',
                'libele' => $secteur[$count],
                'id_post' => $id,
                'id_ent' => Auth::user()->parent_id,
                'valeur' => 100/count( $secteur),
                'coef' => $data->val_secteur,
                'Eliminatoire' =>  $elim_secteur
            );

            $secteur_data[] = $info; 
            Question::insert($info);
        };


        $localisation = $data->localisation;
        for($count = 0; $count < count( $localisation); $count++){
            $info = array();
            $info = array(
                'titre' => 'Lieu du travail',
                'libele' => $localisation[$count],
                'id_post' => $id,
                'id_ent' => Auth::user()->parent_id,
                'valeur' => 100/count( $localisation),
                'coef' => 1,
            );

            $localisation_data[] = $info; 
            Question::insert($info);
        };

        // $type_contrat = $data->type_contrat;
        // for($count = 0; $count < count( $type_contrat); $count++){
        //     $info = array();
        //     $info = array(
        //         'titre' => 'Type de contrat',
        //         'libele' => $type_contrat[$count],
        //         'id_post' => $id,
        //         'id_ent' => Auth::user()->parent_id,
        //         'valeur' => 100/count( $type_contrat),
        //         'coef' => $data->val_contract,
        //     );

        //     $type_contrat_data[] = $info; 
        //     Question::insert($info);
        // };    
        $elim_dom_etudes = 0;
        if($data->has('elim_dom_etudes')) $elim_dom_etudes = 1;

        $domaine_etude = $data->domaine_etude;
        for($count = 0; $count < count( $domaine_etude); $count++){
            $info = array();
            $info = array(
                'titre' => 'Domaine etude',
                'libele' => $domaine_etude[$count],
                'id_post' => $id,
                'id_ent' => Auth::user()->parent_id,
                'valeur' => 100/count( $domaine_etude),
                'coef' => $data->val_dom_etudes,
                'Eliminatoire' =>  $elim_dom_etudes
            );

            $domaine_etude_data[] = $info; 
            Question::insert($info);
        }; 

        $elim_niv_etudes = 0;
        if($data->has('elim_niv_etudes')) $elim_niv_etudes = 1;
        $niveau_etude = $data->niveau_etude;
        for($count = 0; $count < count( $niveau_etude); $count++){
            $info = array();
            $info = array(
                'titre' => 'Niveau etude',
                'libele' => $niveau_etude[$count],
                'id_post' => $id,
                'id_ent' => Auth::user()->parent_id,
                'valeur' => 100/count( $niveau_etude),
                'coef' => $data->val_niv_etudes,
                'Eliminatoire' =>  $elim_niv_etudes
            );

            $niveau_etude_data[] = $info; 
            Question::insert($info);
        };

        $elim_annees_exp = 0;
        if($data->has('elim_annees_exp')) $elim_annees_exp = 1;
        $annee_exp = $data->annee_exp;
        for($count = 0; $count < count( $annee_exp); $count++){
            $info = array();
            $info = array(
                'titre' => 'Annees experience',
                'libele' => $annee_exp[$count],
                'id_post' => $id,
                'id_ent' => Auth::user()->parent_id,
                'valeur' => 100/count( $annee_exp),
                'coef' => $data->val_annees_exp,
                'Eliminatoire' =>  $elim_annees_exp
            );
            Question::insert($info);
        };


        $elim_nationalite = 0;
        if($data->has('elim_nationalite')) $elim_nationalite = 1;
        $nationalite = $data->nationalite;
        for($count = 0; $count < count( $nationalite); $count++){
            $info = array();
            $info = array(
                'titre' => 'Nationalité',
                'libele' => $nationalite[$count],
                'id_post' => $id,
                'id_ent' => Auth::user()->parent_id,
                'valeur' => 100/count( $nationalite),
                'coef' => $data->val_nationalite,
                'Eliminatoire' =>  $elim_nationalite
            );
            Question::insert($info);
        };

        $elim_dispo = 0;
        if($data->has('elim_dispo')) $elim_dispo = 1;
        $info = array();
        $info = array(
            'titre' => 'disponibilite',
            'libele' => $data->disponibilite,
            'id_post' => $id,
            'id_ent' => Auth::user()->parent_id,
            'valeur' => 100,
            'coef' => $data->val_dispo,
            'Eliminatoire' =>  $elim_dispo
        );
        Question::insert($info);

     
        // $mobilite = $data->mobilite;
        // $info = array();
        // $info = array(
        //     'titre' => 'Mobilité',
        //     'libele' => $mobilite,
        //     'id_post' => $id,
        //     'id_ent' => Auth::user()->parent_id,
        //     'valeur' => 100,
        //     'coef' => $data->val_mobilite,
        //     'Eliminatoire' =>  $elim_niv_etudes
        // ); 
        // Question::insert($info);

        for($count = 0; $count < count( $skill); $count++){
            $info = array();
            $info = array(
                'post_id' => $id,
                'skill' => $skill[$count],
                'comp' => $comp[$count],
                'level' => $level[$count]
            );

            $insert_data[] = $info; 
            Ref::insert($info);
        }


        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
        $AllemployersJobs = \App\Post::where('id_ent', '=', Auth::user()->parent_id )
        ->orderBy('created_at', 'DESC')
     //   ->with('candidatures')
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
        $questions =  \App\Question::all()->where('id_post', '=', $post_id);

        $Allcountries = \App\Country::all();
        
        return \View::make('employer.job-summary')
        ->with('all', $Allcountries)
        ->with('ent', $ent)
        ->with('user', $user)
        ->with('post',$posts)
        ->with('refs', $refs)
        ->with('questions', $questions);
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

    $questions =  \App\Question::all()->where('id_post', '=', $post_id);
    $Allcountries = \App\Country::all();
       
     return \View::make('employer.job-summary')
     ->with('all', $Allcountries)
     ->with('status', $status)
     ->with('post',$posts)
     ->with('refs', $refs)
     ->with('ent', $ent)
     ->with('questions', $questions)
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

    $status = 'Votre Offre a été desactivée avec succès.';
   
    $Allcountries = \App\Country::all();
    $questions =  \App\Question::all()->where('id_post', '=', $post_id);
     return \View::make('employer.job-summary')
     ->with('all', $Allcountries)
     ->with('status', $status)
    ->with('post',$posts)
    ->with('refs', $refs)
    ->with('ent', $ent)
    ->with('questions', $questions)
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
        ->with('post', $posts)
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

    if($data['comp_1'] != ''){
        DB::table('refs')
        ->updateOrInsert(
            ['ref_id' => $data['id_1']],
            ['skill' => $data['skill_1'],
            'comp' => $data['comp_1'],
            'level' => $data['level_1']
            ]);
        }

    if($data['comp_2'] != ''){
        DB::table('refs')
        ->updateOrInsert(
            ['ref_id' => $data['id_2']],
            ['skill' => $data['skill_2'],
            'comp' => $data['comp_2'],
            'level' => $data['level_2'],
            ]);
        }

    if($data['comp_3'] != ''){
        DB::table('refs')
        ->updateOrInsert(
            ['ref_id' => $data['id_3']],
            ['skill' => $data['skill_3'],
            'comp' => $data['comp_3'],
            'level' => $data['level_3'],
            ]);
        }

    if($data['comp_4'] != ''){
        DB::table('refs')
        ->updateOrInsert(
            ['ref_id' => $data['id_4']],
            ['skill' => $data['skill_4'],
            'comp' => $data['comp_4'],
            'level' => $data['level_4'],
            ]);
        }

    if($data['comp_5'] != ''){
        DB::table('refs')
        ->updateOrInsert(
            ['ref_id' => $data['id_5']],
            ['skill' => $data['skill_5'],
            'comp' => $data['comp_5'],
            'level' => $data['level_5'],
        ]);
    }

   
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

    public function delete_ref(Request $data){
        $id = \Route::current()->parameter('id');
        \App\Ref::where('ref_id', $id)->delete();
      //  \App\Ref::find($id)->delete();
            return back();
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
        $posts = \App\Post::where('id_ent', '=', $id )->get();
      
        $Allcountries = \App\Country::all();
        
        return view('employer-detail')
        ->with('all', $Allcountries)
        ->with('posts', $posts)
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

        $id = Auth::user()->id;
        $cv = '';

    //    if($data->hasFile('file_cv')){
    //     $uploadedFile = $data->file('file_cv');
    //          $res= \App\File::where('user_id','=', Auth::user()->id)
    //          ->where('type','CV')
    //          ->delete();
             
           
    //         $filename = time().$uploadedFile->getClientOriginalName();
    //         $cv = $filename;

    //         $uploadedFile->move(public_path().'/files/', $filename);

    //         $upload = new File;
    //         $upload->title = $filename;
    //         $upload->type = 'CV';
    //         $upload->user_id = $id;
    //         $upload->user()->associate(auth()->user());
      
    //         $upload->save();
        
    //     }else{
    //         $cv = $data['file_defaut_cv'];
    //     } 

        // if($data->hasFile('file_ltr')){
       
        //     $res= \App\File::where('user_id','=', Auth::user()->id)
        //     ->where('type','LM')
        //     ->delete();
        //     $uploadedFile = $data->file('file_ltr');
        //     $filename = time().$uploadedFile->getClientOriginalName();
        //     $cv = $filename;
 
        //      $uploadedFile->move(public_path().'/files/', $filename);
 
        //      $upload = new File;
        //      $upload->title = $filename;
        //      $upload->type = 'LM';
        //      $upload->user_id = $id;
        //      $upload->user()->associate(auth()->user());
       
        //      $upload->save();
         
        //  }
        //  if($data->hasFile('file_doc')){
        //     $res= \App\File::where('user_id','=', Auth::user()->id)
        //     ->where('type','DOC')
        //     ->delete();
        //     $uploadedFile = $data->file('file_doc');
        //     $filename = time().$uploadedFile->getClientOriginalName();
        //     $cv = $filename;
 
        //      $uploadedFile->move(public_path().'/files/', $filename);
 
        //      $upload = new File;
        //      $upload->title = $filename;
        //      $upload->type = 'DOC';
        //      $upload->user_id = $id;
        //      $upload->user()->associate(auth()->user());
       
        //      $upload->save();
         
        //  }

       $eliminatoire = 0;
        $secteur = Question::where('id_post',  $data['id_post'])->where('titre', 'Secteur')->get();
        $secteur_coef =  $secteur[0]->coef;
        $secteur_apply = $data->domaine_etude;
        $sect_note = 0;
        $secteurs = '';
        
        for($i = 0; $i < count($secteur_apply); $i++){
            for($j = 0; $j < count( $secteur); $j++){
                if( $secteur[$j]->libele === $secteur_apply[$i]){
                    $sect_note++;
                    $secteurs .= $secteur_apply[$i].'^';
                }
            }
        };
        $sect_note = ($sect_note/count( $secteur))*100;

        if($secteur[0]->Eliminatoire == 1 && $sect_note<100) $eliminatoire = 1;
       // echo $sect_note;

        $niveau_etude = Question::where('id_post',  $data['id_post'])->where('titre', 'Niveau etude')->get();
        $niv_coef =  $niveau_etude[0]->coef;
        $niv_apply = $data->niveau_etude;
        $niv_note = 0;
        
        for($i = 0; $i < count($niveau_etude); $i++){
            if( $niveau_etude[$i]->libele === $niv_apply){
                $niv_note = 100;
                break;
            }
        };

        if($niveau_etude[0]->Eliminatoire == 1 && $niv_note < 100) $eliminatoire = 1;
        //echo $niv_note;

        $annees_exp = Question::where('id_post',  $data['id_post'])->where('titre', 'Annees experience')->get();
        $exp_coef =  $annees_exp[0]->coef;
        $exp_apply = $data->annee_exp;
        $exp_note = 0;
        
        for($i = 0; $i < count($annees_exp); $i++){
            if( $annees_exp[$i]->libele === $exp_apply){
                $exp_note = 100;
                break;
            }
        };
        if($annees_exp[0]->Eliminatoire == 1 && $exp_note < 100) $eliminatoire = 1;
      //  echo $exp_note;

        $nationalite = Question::where('id_post',  $data['id_post'])->where('titre', 'Nationalité')->get();
        $nat_coef =  $nationalite[0]->coef;
        $nat_apply = $data->nationalite;
        $nat_note = 0;
        
        for($i = 0; $i < count($nationalite); $i++){
            if( $nationalite[$i]->libele === $nat_apply || $nationalite[$i]->libele === "Toute Nationalité" ){
                $nat_note = 100;
                break;
            }
        };
        if($nationalite[0]->Eliminatoire == 1 && $nat_note < 100) $eliminatoire = 1;
      //  echo $nat_note;

        $residence = Question::where('id_post',  $data['id_post'])->where('titre', 'Lieu du travail')->get();
        $resid_coef =  $residence[0]->coef;
        $resid_apply = $data->residence;
        $resid_note = 0;
       
        for($i = 0; $i < count($residence); $i++){
            if( $residence[$i]->libele === $resid_apply){
                $resid_note = 100;
                break;
            }
        };
        if($residence[0]->Eliminatoire == 1 && $resid_note < 100) $eliminatoire = 1;
      //  echo $resid_note;

        $mobilite = Question::where('id_post',  $data['id_post'])->where('titre', 'Mobilité')->get();
        $mob_coef =  $mobilite[0]->coef;
        $mob_apply = $data->mobilite;
        $mob_note = 0;

        for($i = 0; $i < count($mobilite); $i++){
            if( $mobilite[$i]->libele === $mob_apply){
                $mob_note = 100;
                break;
            }
        };
        if($mobilite[0]->Eliminatoire == 1 && $mob_note < 100) $eliminatoire = 1;
        //echo $mob_note;

        $dispo = Question::where('id_post',  $data['id_post'])->where('titre', 'disponibilite')->get();
        $dispo_coef =  $dispo[0]->coef;
        $dispo_apply = $data->disponibilite;
        $dispo_note = 0;

        if( $dispo[0]->libele === $dispo_apply){
            $dispo_note = 100;
        }
        if($dispo[0]->Eliminatoire == 1 && $dispo_note < 100) $eliminatoire = 1;
      //  echo $dispo_note;

        $coef_total = $dispo_coef + $mob_coef +  $resid_coef + $nat_coef + $exp_coef + $niv_coef + $secteur_coef;
        $note_finale = (($dispo_note * $dispo_coef )+($mob_note * $mob_coef)+($resid_note * $resid_coef)+( $nat_note * $nat_coef)+($exp_note * $exp_coef)+($niv_note * $niv_coef)+($sect_note * $secteur_coef))/$coef_total;
       

        Candidature::create([
            'id_post' => $data['id_post'],
            'id_cand' => Auth::user()->id,
            'id_ent' => $data['id_ent'],
            'secteur' => $secteurs,
        //    'domaine_etude' =>,
            'niveau_etude' => $niv_apply,
            'annee_exp' => $exp_apply,
            'nationalite' => $nat_apply,
            'residence' => $resid_apply,
            'dernier_poste' => $data->dernier_poste,
            'rspon_dernier_poste' => $data->responsabilite,
            'motivation' => $data->motivation,
            'disponibilte' => $dispo_apply,
            'mobilite' => $mob_apply,
            'pretention_sal' => $data->remuneration,
            'note_secteur' => $sect_note,
            'note_niveau' => $niv_note,
            'note_exp' =>  $exp_note,
            'note_nationalite' => $nat_note,
            'note_residence' => $resid_note,
            'note_dispo' => $dispo_note,
            'note_mob' => $mob_note,
            'note' => $note_finale,
            'eliminatoire' => $eliminatoire,
            'cv' => $cv,
            'status' => 1,
        ]);


    //    echo $data->customRange2[0];
        $customRange2 = $data->customRange2;
        $ref_id = $data->ref_id;
        $comp = $data->comp;

        // if($data->has('customRange2')){

        //     for($i = 0; $i < count($customRange2); $i++){
        //     Ref_cand::create([
        //         'id_post' => $data['id_post'],
        //         'id_cand' => Auth::user()->id,
        //         'skill' => $ref_id[$i],
        //         'comp' => $comp[$i],
        //         'level' => $customRange2[$i],
        //     ]);

        //     }
        //    // echo $data->customRange2[0];

          
        // }

        // if($data['comp_2'] != ''){
        //     Ref_cand::create([
        //         'id_post' => $data['id_post'],
        //         'id_cand' => Auth::user()->id,
        //         'skill' => $data['skill_2'],
        //         'comp' => $data['comp_2'],
        //         'level' => $data['level_2'],
        //     ]);
        // }

        // if($data['comp_3'] != ''){
        //     Ref_cand::create([
        //         'id_post' => $data['id_post'],
        //         'id_cand' => Auth::user()->id,
        //         'skill' => $data['skill_3'],
        //         'comp' => $data['comp_3'],
        //         'level' => $data['level_3'],
        //     ]);
        // }

        // if($data['comp_4'] != ''){
        //     Ref_cand::create([
        //         'id_post' => $data['id_post'],
        //         'id_cand' => Auth::user()->id,
        //         'skill' => $data['skill_4'],
        //         'comp' => $data['comp_4'],
        //         'level' => $data['level_4'],
        //     ]);
        // }

        // if($data['comp_5'] != ''){
        //     Ref_cand::create([
        //         'id_post' =>  $data['id_post'],
        //         'id_cand' => Auth::user()->id,
        //         'skill' => $data['skill_5'],
        //         'comp' => $data['comp_5'],
        //         'level' => $data['level_5'],
        //     ]);
        // }

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
        $ltr=[];
        $doc=[];
        $resume=[];
        if( Auth::user()){
            $cv = \App\File::where('user_id', '=', Auth::user()->id)
            ->where('type', 'CV')
            ->first();

            $ltr = \App\File::where('user_id', '=', Auth::user()->id)
            ->where('type', 'LM')
            ->first();

            $doc = \App\File::where('user_id', '=', Auth::user()->id)
            ->where('type', 'DOC')
            ->first();

            $resume = \App\Resume::where('id_cand', '=', Auth::user()->id)->get();
        }

        $question = \App\Question::where('id_post', '=', $id)->get();
        $Allcountries = \App\Country::all();
        $nationalite = \App\Nationalite::orderBy('valeur', 'asc')->get();
        $pays = \App\Pays::orderBy('valeur', 'asc')->get();

        $status = '';
        return \View::make('job-details')
        ->with('job', $job)
        ->with('cv', $cv)
        ->with('ltr', $ltr)
        ->with('doc', $doc)
        ->with('resume', $resume)
        ->with('cc', $cc)
        ->with('all', $Allcountries)
        ->with('nationalite', $nationalite)
        ->with('question', $question)
        ->with('pays', $pays);
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

        if($data->hasFile('file_cv')){
            $cv ='';
            
              //  $uploadedFile = $file;
                $uploadedFile = $data->file('file_cv');
                $filename = time().$uploadedFile->getClientOriginalName();
                $cv = $filename;
    
                $uploadedFile->move(public_path() . '/files/', $filename);
    
                $upload = new File;
                $upload->title = $filename;
                $upload->type = 'CV';
                $upload->user_id = $id;
                $upload->save();
        }else{
            $cv = $data['file_defaut_cv'];
        }

        if($data->hasFile('file_ltr')){
       
            // $res= \App\File::where('user_id','=', Auth::user()->id)->delete();
            $uploadedFile = $data->file('file_ltr');
            $filename = time().$uploadedFile->getClientOriginalName();
            $cv = $filename;
 
             $uploadedFile->move(public_path().'/files/', $filename);
            //  $upload = new File;
            //  $upload->title = $filename;
            //  $upload->type = 'LM';
            //  $upload->user_id = $id;
            //  $upload->user()->associate(auth()->user());
            //  $upload->save();
            File::create([
                'user_id' => $id,
                'title' => $filename,
                'type' =>'LM'
            ]);
         }

         if($data->hasFile('file_doc')){
            // $res= \App\File::where('user_id','=', Auth::user()->id)->delete();
            $uploadedFile = $data->file('file_doc');
            $filename = time().$uploadedFile->getClientOriginalName();
            $cv = $filename;
 
             $uploadedFile->move(public_path().'/files/', $filename);
            //  $upload = new File;
            //  $upload->title = $filename;
            //  $upload->user_id = $id;
            //  $upload->type = 'DOC';
            //  $upload->user()->associate(auth()->user());
            //  $upload->save();

            File::create([
                'user_id' => $id,
                'title' => $filename,
                'type' =>'DOC'
            ]);
         }

        Candidature::create([
            'id_post' => $data['id_post'],
            'id_cand' => $id,
            'id_ent' => $data['id_ent'],
            'cv' => $cv,
            'status' => 1,
        ]);

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
        $post = \App\Post::where('id', '=', $id )->get();
        $cand = DB::table('posts')
                ->select(
                    'posts.domaine_etude as postdom',
                    'resumes.domaine_etude as resumdom',
                    'resumes.dernier_poste as resumDP',
                    'posts.titre as titre', 
                    'posts.id as postid',
                    'resumes.id_cand as ref_cand',
                    'resumes.niveau_etude as resniv',
                    'posts.niveau_etude as postniv',
                    'posts.annee_exp as postann',
                    'resumes.annee_exp as resann',
                    'posts.localisation as zone',
                    'resumes.residence as pays_res',
                    'candidatures.id_post as id_post',
                    'candidatures.note as note_finale',
                    'candidatures.created_at as date_cand')
                ->join('candidatures' , 'candidatures.id_post' , '=' , 'posts.id')
                ->join('resumes' , 'resumes.id_cand' , '=' , 'candidatures.id_cand')
                ->where('posts.id', '=', $id)->paginate(10);
             // ->where('posts.id', '=', $id)->get();

              

                $Allcountries = \App\Country::all();
               
       return \View::make('employer.employer-manage-candidate')
       ->with('all', $Allcountries)
       ->with('user', $user)
       ->with('ent', $ent)
       ->with('post', $post)
       ->with('cand',$cand);
    }

    public function allcandidates(){

        $id = \Route::current()->parameter('id');
        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
        $cand = DB::table('posts')
                ->select('posts.domaine_etude as postdom', 'resumes.domaine_etude as resumdom', 'resumes.dernier_poste as resumDP',
                'posts.titre', 'posts.id as postid', 'resumes.id_cand as ref_cand', 'resumes.niveau_etude as resniv',
                'posts.niveau_etude as postniv', 'posts.annee_exp as postann',
                'resumes.annee_exp as resann', 'posts.localisation as zone', 'resumes.residence as pays_res',
                'candidatures.id_post as id_post','candidatures.note as note_finale')
                ->join('candidatures' , 'candidatures.id_post' , '=' , 'posts.id')
                ->join('resumes' , 'resumes.id_cand' , '=' , 'candidatures.id_cand')
                ->where('posts.id', '=', $id)->get();

              

                $Allcountries = \App\Country::all();
               
       return \View::make('employer.allCandidates')
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
    //    $refs = \App\Ref_cand::where('id_post', '=', $id_post)
    //     ->where('id_cand', '=', $id_cand)->get();
        $refs = \App\Ref_cand::where('id_post', '=', $id_post)
        ->where('id_cand', '=', $id_cand)->get();

        $status = \App\Candidature::all()->where('id_post', '=', $id_post)
        ->where('id_cand', '=', $id_cand)->first();


        $Allcountries = \App\Country::all();

        $cv = \App\File::where('user_id', '=',  $id_cand)
        ->where('type', 'CV')
        ->first();

        $ltr = \App\File::where('user_id', '=',  $id_cand)
        ->where('type', 'LM')
        ->first();

        $doc = \App\File::where('user_id', '=',  $id_cand)
        ->where('type', 'DOC')
        ->first();
        
       return \View::make('employer.shortlisted')
       ->with('all', $Allcountries)
       ->with('res',$resume)
       ->with('refs', $refs)
       ->with('id_cand', $id_cand)
       ->with('id_post', $id_post)
       ->with('status', $status)
       ->with('hasCv', $hasCv)
       ->with('cv', $cv)
       ->with('ltr', $ltr)
       ->with('doc', $doc);
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

        $cv = \App\File::where('user_id', '=',  $id_cand)
        ->where('type', 'CV')
        ->first();

        $ltr = \App\File::where('user_id', '=',  $id_cand)
        ->where('type', 'LM')
        ->first();

        $doc = \App\File::where('user_id', '=',  $id_cand)
        ->where('type', 'DOC')
        ->first();
        
        return \View::make('employer.cv-detail')
        ->with('cv', $cv)
        ->with('ltr', $ltr)
        ->with('doc', $doc)
        ->with('all', $Allcountries)
        -> with('hasCv', $hasCv)
        -> with('res', $resume);   
    }

    public function download()
    {
        $id = \Route::current()->parameter('id');

        $cv = \App\File::all()->where('id', $id)->first();

        $Allcountries = \App\Country::all();
       
        if($cv->title){
            $file_name =$cv->title;

            $file_path = public_path('files/'.$file_name);
          //  $res = response()->download($file_path);
            return  response()->download($file_path)
          //  ->with('all', $Allcountries)
            ;
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



    public function filtre(Request $data){
        $Allcountries = \App\Country::all();
        $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
        $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
    
        $cand = DB::table('resumes')
        ->select('resumes.id_cand as id', 'resumes.nom as name',  'resumes.photoUrl as photoUrl', 'resumes.domaine_etude as secteur','resumes.residence as ville','resumes.niveau_etude as niveau_etude','resumes.annee_exp as annee_exp', 'candidatures.id as candidature_id')
        ->join('candidatures' , 'candidatures.id_cand' , '=' , 'resumes.id_cand')
        ->where('candidatures.id_ent',"=", Auth::user()->parent_id);

            $cnd = $cand->where('resumes.domaine_etude', $data['d_etude'])
            ->orWhere('resumes.niveau_etude', $data['n_etude'])
            ->orWhere('resumes.annee_exp', $data['exp'])
            ->get();

            $output = '';
            foreach($cnd as $cn){
                $output .= '<tr class="candidates-list">
                <td class="title">
                    <div class="thumb">
                        <img src="/images/'.$cn->photoUrl.'" class="img-fluid" alt="">
                    </div>
                    <div class="body">
                        <h5><a href="cv-theque/detail/'.$cn->id.'">'.$cn->name.' </a></h5>
                        <div class="info">
                        <span class="designation"><i data-feather="check-square"></i>'.$cn->secteur.'</span>
                        <span class="location"><a href="#"><i data-feather="map-pin"></i> '.$cn->ville.' </a></span>
                        </div>
                    </div>
                </td>
                <td class="status">

                </td>
                <td class="action">
                    <a href="cv-theque/detail/'.$cn->id.'" class="download"><i data-feather="eye"></i></a>
                </td>
            </tr>';
            }
        return Response($output);
    }

    public function nationalite_apply(Request $data){
        $residence = $data->residence;
        for($count = 0; $count < count( $residence); $count++){
            $info = array();
            $info = array(
                'valeur' => $residence[$count],
                'pays' => ucfirst($residence[$count]),
            );

            Pays::insert($info);
        }
    }
   
}
