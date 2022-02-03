<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminEvaluationController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\BEDEvaluationController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\EvalueeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NTPController;
use App\Http\Controllers\NTPEvaluationController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\SupervEvaluationController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\EmployeeEvaluationController;
/*
|-------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/dash', function () {
    return view('defaultdashboard');
})->name('dash');

Route::get('/test', function () {
    $pword = "test";
    $hashed = Hash::make($pword);
    echo $hashed;

    echo "<br>";
    echo "session: ".session('key');

})->name("test");

Route::get('/dash', function () {
    return view('defaultdashboard');
})->name('dash');


Route::get('/', function () {
    if(Auth::check()){
        // return redirect()->route('admindashboard');
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admindashboard');
    }
    if(session('account')){
        return redirect()->route('teacher-landing');
    }
    return view('layouts.front');
})->name('front');


// logins
Route::post('postLogin/HR', [LoginController::class, 'authenticatehr'])->name('authenticatehr');
Route::post('postLogin/teacher', [LoginController::class, 'authTeacher'])->name('authTeacher');
//logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'customAuthAdmin'], function() {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admindashboard');

    // ================= evaluation 
    Route::get('/evaluation/select', function () {
        return view('admin.pick-evaluation');
    })->name('select-evaluation');

    //==================Evaluation Tool ===================
    Route::get('/tools/select', [ToolController::class, 'getTools'])->name('pick-tool');
    Route::get('/tools/{id}', [ToolController::class, 'getItems'])->name('showTool');
    Route::post('/storeItem', [ToolController::class, 'storeItem'])->name("storeItem");
    Route::post('/updateItem/{id}', [ToolController::class, 'updateItem'])->name("updateItem");
    Route::get('/deleteItem/{id}', [ToolController::class,'deleteItem'])->name("deleteItem");

    //=================Resource Controllers===============//

    
    Route::resource('admins', AdminController::class);
    Route::resource('supervisors', SupervisorController::class);
    Route::resource('evaluees', EvalueeController::class);
    Route::resource('BEDevaluees', BedController::class);
    Route::resource('NTPevaluees', NTPController::class);
    Route::resource('teacherTools', ToolItemController::class);
    Route::resource('evaluations', EvaluationController::class);
    Route::post('/fetchEvaluations',[EvaluationController::class, 'fetch'])->name('fetchTeacher');
    Route::resource('adminevaluations', AdminEvaluationController::class);
    Route::resource('supervevaluations', SupervEvaluationController::class);
    Route::resource('ntpevaluations', NTPEvaluationController::class);

    Route::get('/evaluee/new', function(){
        $passwordData = DB::table("defaultpass")->first();
        $password = $passwordData->password;
        $newEvaluee = DB::table('evaluees')->orderBy('id', 'desc')->first();
        return view('views-evaluee.newly')->with(["newEvaluee"=>$newEvaluee, "password"=>$password]);
    })->name("newEvaluee");

    Route::get('openClose/{id}/{status}/{origin}', [EvaluationController::class, 'openClose'])->name('openClose');
    Route::get('accessNot/{id}/{access}/{origin}', [EvaluationController::class, 'accessNot'])->name('accessNot');
    Route::get('archival/{id}/', [EvaluationController::class, 'archival'])->name('archival');
    Route::get('evaluation/print/{id}/', [EvaluationController::class, 'print'])->name('print');
    Route::post('evaluee/{id}/summarize/', [EvalueeController::class, 'summarize'])->name('summarize');
    Route::get('evaluee/{id}/print-summary', [EvalueeController::class, 'printSummary'])->name('printSummary');

    Route::get('adminOpenClose/{id}/{status}/{origin}', [AdminEvaluationController::class, 'openClose'])->name('adminOpenClose');
    Route::get('supervOpenClose/{id}/{status}/{origin}', [SupervEvaluationController::class, 'openClose'])->name('supervOpenClose');
});


//============== teacher's page =======//

Route::group(['middleware' => ['customAuthTeacher']], function () {
    Route::get("teacher/landingpage", function(){
        return view('views-teacher.landingpage');
    })->name('teacher-landing');

});



//================students' page===============//
Route::get('/student/access-key/', function(){
    return view('views-student.access-key');
})->name('access-key');

Route::get('employee/dashboard', [EmployeeEvaluationController::class, 'index'])->name('access-dashboard');
Route::get('employee/{key}', [EmployeeEvaluationController::class, 'access'])->name('employee-access-key');

Route::post('student/page/', [RatingsController::class, 'access'])->name('access-page');

//Route::group(['middleware' => ['customAuthStudent']], function () {
    //subject for middleware

    Route::post('student/page/submit', [RatingsController::class, 'submit'])->name('submit-scores');
    Route::post('student/page/submit-total', [RatingsController::class, 'submitTotal'])->name('submit-totalscores');
    
    Route::get('student/key/not-found', function(){
        return view('views-student.not-found');
    })->name('keyNotFound');
    Route::get('student/success', function(){
        return view('views-student.success');
    })->name('success-eval');

    

//});

