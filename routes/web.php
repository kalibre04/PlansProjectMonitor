<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprehensionController;
use App\Http\Controllers\CasesFiledController;
use App\Http\Controllers\LumberDonationController;
use App\Http\Controllers\MonitoringStationController;
use App\Http\Controllers\ChainsawRegController;
use App\Http\Controllers\PatentProcessingAndIssuanceController;
use App\Http\Controllers\SAPAController;
use App\Http\Controllers\FLAController;
use App\Http\Controllers\FLAGTController;
use App\Http\Controllers\CuttingPermitController;
use App\Http\Controllers\WildlifeTransportPermitController;
use App\Http\Controllers\WildlifeRegistrationController;
use App\Http\Controllers\OtherPermitsController;
use App\Http\Controllers\ClaimsAndConflictController;
use App\Http\Controllers\LawinPatrollersController;
use App\Http\Controllers\LawinTeamController;
use App\Http\Controllers\PatrolTeamsController;
use App\Models\PatentProcessingIssuance;

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


    $cc = PatentProcessingIssuance::where('status', '=', 'Completed')->get();
    $cp = PatentProcessingIssuance::where('status', '=', 'Pending')->get();
    
    
    return view('home', compact('cc', 'cp'));
});


Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    $cc = PatentProcessingIssuance::where('status', '=', 'Approved')->get();
    $cp = PatentProcessingIssuance::where('status', '=', 'Pending')->get();
    

    return view('home', compact('cc', 'cp'));
})->name('home');


Route::resource('casesfiled', CasesFiledController::class);
Route::resource('apprehension', ApprehensionController::class);
Route::resource('lumberdonation', LumberDonationController::class);
Route::resource('monitoringstation', MonitoringStationController::class);
Route::resource('chainsawinventory', ChainsawRegController::class);
Route::resource('patentissuance', PatentProcessingAndIssuanceController::class);
Route::POST('patentissuance.upphoto', [PatentProcessingAndIssuanceController::class, 'upload_photo']);
Route::resource('sapa', SAPAController::class);
Route::POST('sapa.upphoto', [SAPAController::class, 'upload_photo']);
Route::resource('fla', FLAController::class);
Route::POST('fla.upphoto', [FLAController::class, 'upload_photo']);
Route::resource('flagt', FLAGTController::class);
Route::POST('flagt.upphoto', [FLAGTController::class, 'upload_photo']);
Route::resource('cuttingpermit', CuttingPermitController::class);
Route::POST('cuttingpermit.upphoto', [CuttingPermitController::class, 'upload_photo']);
Route::resource('wildlifetransportpermit', WildlifeTransportPermitController::class);
Route::POST('wildlifetransportpermit.upphoto', [WildlifeTransportPermitController::class, 'upload_photo']);
Route::resource('wildliferegistration', WildlifeRegistrationController::class);
Route::POST('wildliferegistration.upphoto', [WildlifeRegistrationController::class, 'upload_photo']);
Route::resource('otherpermits', OtherPermitsController::class);
Route::POST('otherpermits.upphoto', [OtherPermitsController::class, 'upload_photo']);
Route::resource('claimsandconflict', ClaimsAndConflictController::class);
Route::resource('lawinpatrollers', LawinPatrollersController::class);
Route::resource('patrolteams', PatrolTeamsController::class);
Route::resource('lawinteams', LawinTeamController::class);