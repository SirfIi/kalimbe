<?php
use PragmaRX\Countries\Package\Countries;
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {

    $Allcountries = \App\Country::all();
    $AllJobs = \App\Post::where('status', '=', 1)->orderBy('created_at', 'DESC')->get();
    $jobCount = \App\Post::where('status', '=', 1)->count();
    $empCount = \App\User::where('type', '=', 20)->count();

    return \View::make('welcome')
    ->with('jobs', $AllJobs)
    ->with('jobCount', $jobCount)
    ->with('empCount', $empCount)
    ->with('all', $Allcountries);
});

Route::get('/employers', array('as'=>'/employers','uses'=>'employer@employers'));
Route::get('/jobtheque', array('as'=>'jobtheque','uses'=>'employer@jobtheque'));

Route::get('employer-edit', function () {
    $Allcountries = \App\Country::all();
    return  \View::make('employer.employer-edit')
    ->with('all', $Allcountries);
});

Route::get('login_', function () {
    $Allcountries = \App\Country::all();
    return  \View::make('login')
    ->with('all', $Allcountries);
});

Route::get('register_', function () {
    $Allcountries = \App\Country::all();
    return  \View::make('register')
    ->with('all', $Allcountries);
});


Route::get('employer', function () {
    $jobCount = 0;
    $appCount =0;
    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
    $jobCount = \App\Post::where('id_ent', '=', Auth::user()->parent_id )->count();
    $jobs = \App\Post::where('id_ent', '=', Auth::user()->parent_id )->get();
    $app = \App\Candidature::where('id_ent', '=', Auth::user()->parent_id )->get();
    $appCount = \App\Candidature::where('id_ent', '=', Auth::user()->parent_id )->count();
    $accepted = \App\Candidature::where('id_ent', '=', Auth::user()->parent_id )
    ->where('status', '=', 2)->count();
    $Allcountries = \App\Country::all();
    return view('employer.employer-dashboard')
    ->with('user', $user)
    ->with('jobCount', $jobCount)
    ->with('appCount', $appCount)
    ->with('ent', $ent)
    ->with('app', $app)
    ->with('jobs', $jobs)
    ->with('ac', $accepted)
    ->with('all', $Allcountries);
});

Route::get('gestionnaire', function () {
    $Allcountries = \App\Country::all();
    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();

    return view('employer.add-gest')
    ->with('user', $user)
    ->with('ent', $ent)
    ->with('all', $Allcountries);
});


Route::get('emp-detail/{id}',array('as'=>'emp-detail','uses'=>'employer@empDetail'));

Route::get('employer-edit', function () {
    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
    $Allcountries = \App\Country::all();

    return view('employer.employer-edit')
    ->with('user', $user)
    ->with('ent', $ent)
    ->with('all', $Allcountries);
});


Route::get('employer-manage-job', function () {
    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
    $AllemployersJobs = \App\Post::where('id_ent', '=', Auth::user()->parent_id )
    ->orderBy('created_at', 'DESC')
    ->with('candidatures')
    ->paginate(5);
    $Allcountries = \App\Country::all();
    return view('employer.employer-manage-job')
    ->with('ent', $ent)
    ->with('user', $user)
    ->with('jobs', $AllemployersJobs)
    ->with('all', $Allcountries);
});

Route::get('employer/manage-job',array('as'=>'employer.manage-job','uses'=>'employer@managejob'));

Route::get('employer-publish', function () {
    $Allcountries = \App\Country::all();
    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();

    return view('employer.employer-publish')
    ->with('user', $user)
    ->with('ent', $ent)
    ->with('all', $Allcountries);
});

Route::get('employer-job-summary', function () {
    $Allcountries = \App\Country::all();
    return view('employer.jobsummary')
    ->with('all', $Allcountries);
});

Route::get('employer/job-summary/{id}',array('as'=>'employer.job-summary','uses'=>'employer@jobsum'));

Route::get('employer/job-active/{id}',array('as'=>'employer.job-active','uses'=>'employer@jobActive'));
Route::get('employer/job-desactive/{id}',array('as'=>'employer.job-desactive','uses'=>'employer@jobDeSactive'));

Route::get('employer/job-edit/{id}',array('as'=>'employer.job-edit','uses'=>'employer@jobEdit'));

Route::post('employer/job-update/{id}',array('as'=>'employer.job-update','uses'=>'employer@jobUpdate'));

Route::get('employer/job-delete/{id}',array('as'=>'employer.job-delete','uses'=>'employer@deletePost'));


Route::get('candidate-dashboard', function () {

    $cand = DB::table('candidatures')
                ->select('candidatures.id as candidature_id',
                'candidatures.status as cand_status',
                'posts.titre as poste_titre', 
                'posts.localisation as localisation',
                'posts.type_contrat as type_contrat',
                'posts.id as id_post', 
                'posts.date_exp as date_exp', 
                'users.id as id_ent',
                'users.name as name_ent',
                'users.photoUrl as photoUrl_ent')
                ->where('candidatures.id_cand', '=', Auth::user()->id)
        
                ->join('posts' , 'posts.id' , '=' , 'candidatures.id_post')
                ->join('users' , 'posts.id_ent' , '=' , 'users.id')
                ->get();

                $nb = $cand->count();
    $Allcountries = \App\Country::all();
    return view('candidat.candidat-dashboard')
    ->with('cand', $cand)
    ->with('nb', $nb)
    ->with('all', $Allcountries);
});

Route::get('candidate-edit-resume', function () {
    $Allcountries = \App\Country::all();
    return view('candidat.candidat-edit-resume')
    ->with('all', $Allcountries);
});

Route::get('candidate-resume', function () {
    $user = \App\User::where('id', '=', Auth::user()->parent_id )->get();
    $Allcountries = \App\Country::all();
    $resume =  \App\Resume::all()->where('email', '=', Auth::user()->email)->first();
    return view('candidat.candidat-resume')
    ->with('user', $user)
    ->with('resume', $resume)
    ->with('all', $Allcountries);
});


Route::get('candidate-profil', function () {
    $Allcountries = \App\Country::all();
    return view('candidat.candidat-profil')
    ->with('all', $Allcountries);
});

Route::get('candidate-applied', function () {
    $Allcountries = \App\Country::all();
    return view('candidat.candidat-applied')
    ->with('all', $Allcountries);
});

Route::get('candidate-cv', function () {
    $Allcountries = \App\Country::all();
    return view('candidat.candidat-cv')
    ->with('all', $Allcountries);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/enregistrer/candidat',array('as'=>'createCandidate','uses'=>'Auth\RegisterController@createCandidate'));


Route::get('/dashboard', array('as'=>'dashboard','uses'=>'employer@redirect'));

Route::post('/entreprise/update', array('as'=>'ent_update','uses'=>'employer@update'));
Route::post('/entreprise/img/update', array('as'=>'ent_img_update','uses'=>'employer@empImgUpdate'));
Route::post('/entreprise/image/update', array('as'=>'ent_image_update','uses'=>'ImagesController@empImgUpdate'));

Route::post('/candidat/update', array('as'=>'cand_update','uses'=>'employer@cand_update'));

Route::post('password/reset',array('as'=>'password.reset','uses'=>'employer@reset'));
Route::post('password/update',array('as'=>'password.update','uses'=>'employer@reset_'));


Route::post('password_reset', function () {
    $Allcountries = \App\Country::all();
    return view('auth.passwords.reset')
    ->with('all', $Allcountries);
});

Route::post('employeur/post',array('as'=>'employeur.post','uses'=>'employer@post'));

Route::post('candidat/resume',array('as'=>'candidat.resume','uses'=>'employer@update_resume'));

Route::post('resume/upload', array('as'=>'file.upload','uses'=>'employer@upload_file'));
Route::post('lettre/upload', array('as'=>'lettre.upload','uses'=>'employer@upload_letter'));

Route::post('candidat/apply',array('as'=>'candidat.apply','uses'=>'employer@apply'));
Route::post('unknown/apply',array('as'=>'unknown.apply','uses'=>'employer@unknown_apply'));
Route::get('jobdetail/{id}',array('as'=>'jobdetail','uses'=>'employer@jobDetail'));

Route::get('employer-manage-candidate', function () {
    $Allcountries = \App\Country::all();
    return view('employer.employer-manage-candidate')
    ->with('all', $Allcountries);
});

Route::get('employer/manage-candidate/{id}',array('as'=>'employer.manage-candidate','uses'=>'employer@manage_candidate'));

Route::get('job-detail/{id_cand}/{id_post}',array('as'=>'shortlisted.detail','uses'=>'employer@shortlistedjobDetail'));

Route::post('job/search',array('as'=>'job.search','uses'=>'employer@search'));

Route::get('application-reject/{id_cand}/{id_post}',array('as'=>'application.reject','uses'=>'employer@reject'));
Route::get('application-accept/{id_cand}/{id_post}',array('as'=>'application.accept','uses'=>'employer@accept'));

Route::get('cv-theque', function () {
    //$cv = \App\Resume::All();
    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();

    $Allcountries = \App\Country::all();
    $cv = DB::table('resumes')->paginate(5);
    return \View::make('employer.cv-theque')
    ->WITH('all', $Allcountries)
    ->with('user', $user)
    ->with('ent', $ent)
    ->with('cv', $cv);

});

Route::get('cv-theque/detail/{id_cand}',array('as'=>'cv-theque.detail','uses'=>'employer@cvThequeDetail'));
Route::get('download/{id}', array('as'=>'download.file','uses'=>'employer@download'));

Route::get('employer/manage/gestionnaire', function () {
    //$cv = \App\Resume::All();
    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $users = \App\Gest_ent::where('id_ent', '=', Auth::user()->parent_id )->get();
    $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();

    // $user = DB::table('gest_ents')->where('id_ent', '=', Auth::user()->parent_id )
    // ->paginate(10);
    
    $Allcountries = \App\Country::all();
    return \View::make('employer.manage-gest')
    ->WITH('all', $Allcountries)
    ->with('user', $user)
    ->with('users', $users)
    ->with('ent', $ent);

});

Route::get('employer/gestionnaire/{id}', function () {
    $id = \Route::current()->parameter('id');
    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $thisUser = \App\Gest_ent::where('id_user', '=', $id )->get();
    $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
  
    $Allcountries = \App\Country::all();
    
    return view('employer.edit-gest')
    ->WITH('all', $Allcountries)
    ->with('thisUser', $thisUser)
    ->with('user', $user)
    ->with('ent', $ent);
});

Route::post('employer/create/gestionnaire',array('as'=>'create_gest','uses'=>'employer@create_gest'));

Route::post('employer/edit/gestionnaire',array('as'=>'edit_gest','uses'=>'employer@edit_gest'));
Route::get('employer/delete/gestionnaire/{id}',array('as'=>'employer.delete-gestionnaire','uses'=>'employer@deleteGest'));
Route::get('entreprise/delete/{id}',array('as'=>'entreprise.delete','uses'=>'employer@deleteEntreprise'));
Route::get('candidat/delete/{id}',array('as'=>'candidat.delete','uses'=>'employer@deleteCandidat'));

Route::get('entreprises', function () {
    $Allcountries = \App\Country::all();
    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();

    $ents = \App\User::where('type', '=', 20 )->paginate(5);

    return view('employer.entreprises')
    ->with('user', $user)
    ->with('ent', $ent)
    ->with('ents', $ents)
    ->with('all', $Allcountries);
});


Route::get('enterprise/search',array('as'=>'ent.search','uses'=>'employer@entsearch'));

Route::get('entreprises/{id}', function () {
    $id = \Route::current()->parameter('id');
    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $posts = \App\Post::where('id_ent', '=', $id )->get();
    $emp = \App\User::where('id', '=', $id )->get();
  
    $Allcountries = \App\Country::all();
   
    return view('employer.entreprises-details')
    ->WITH('all', $Allcountries)
    ->with('posts', $posts)
    ->with('user', $user)
    ->with('emp', $emp);
});

Route::post('admin/create/entreprise',array('as'=>'create_entreprise','uses'=>'employer@create_ent'));
Route::get('send',array('as'=>'send','uses'=>'EmailController@send'));
//Route::post('send', 'EmailController@send');

Route::get('candidats', function () {
    $Allcountries = \App\Country::all();
    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $ent = \App\User::where('id', '=', Auth::user()->parent_id )->get();
    $cand = \App\User::where('type', '=', 10 )->paginate(5);

    return view('employer.candidats')
    ->with('ent', $ent)
    ->with('user', $user)
    ->with('cand', $cand)
    ->with('all', $Allcountries);
});
Route::get('candidats/search',array('as'=>'cand.search','uses'=>'employer@candsearch'));
Route::get('candidats/{id}', function () {
    $id = \Route::current()->parameter('id');
    $user = \App\Gest_ent::where('id_user', '=', Auth::user()->id )->get();
    $candidatures = \App\Candidature::where('id_cand', '=', $id )->get();
    $cand = \App\User::where('id', '=', $id )->get();

    $Allcountries = \App\Country::all();
    
    return view('employer.candidats-details')
    ->with('candidatures', $candidatures)
    ->WITH('all', $Allcountries)
    ->with('user', $user)
    ->with('cand', $cand);
});


Route::get('conditions/candidats', function () {

    $Allcountries = \App\Country::all();
    return \View::make('conditions.candidats')
    ->with('all', $Allcountries);
});

Route::get('conditions/recruteurs', function () {

    $Allcountries = \App\Country::all();
    return \View::make('conditions.recruteurs')
    ->with('all', $Allcountries);
});