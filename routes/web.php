<?php

use App\Http\Controllers\downloadabeleConctroller;
use App\Http\Controllers\mailController;
use App\Http\Controllers\messageController;
use App\Http\Controllers\missionController;
use App\Http\Controllers\pagesController;
use App\Http\Controllers\serviesController;
use App\Http\Controllers\sitesController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\userController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//navigtion between pages


//public routes
Route::get('/' , [pagesController::class,'index']);

Route::get('login',[pagesController::class, 'login'])->middleware('AlreadyLogggedIn');

Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');

Route::get('/logout',[UserAuthController::class, 'logout'])->name('logout');

Route::get('/404',[pagesController::class , 'notFound']);

Route::get('/contact/page/us',[pagesController::class , 'contactView']);

Route::post('/admin/messages/add',[messageController::class, 'submitMessage'])->name('admin.add.message');
Route::get('/admin/messages/get/{id}',[messageController::class, 'getSingleMessage']);


//middle groupe for admin pages

Route::middleware([isAdmin::class,isLogged::class])->group(function(){

    Route::get('admin/profile', [pagesController::class, 'AdminProfile'])->middleware('isLogged');
    Route::get('Admin/update',[pagesController::class,'UpdateAdminPage']);
    Route::post('update/data',[userController::class,'updateInfo'])->name('update.data');
    Route::get('Admin/team',[userController::class,'getAlluser']);
    Route::get('admin/team/add',[userController::class, 'addUserPage']);
    Route::post('admin/team/insert',[userController::class, 'insertNewUser'])->name('insert.user');
    Route::get('/admin/team/delete/{id}',[userController::class,'deleteUser']);
    Route::get('/admin/team/edit/{id}',[userController::class, 'updateUserPage']);
    Route::post('/admin/team/update',[userController::class,'editUserInfos'])->name('user.update.infos');
    Route::get('/admin/missions',[pagesController::class, 'missionPage']);
    Route::get('/admin/mission/add',[missionController::class,'addMission'])->name('missions.add');
    Route::post('admin/mission/insert',[missionController::class,'insertMission'])->name('insert.mission');
    Route::get('/admin/mission/delete/{id}',[missionController::class,'deleteMission']);
    Route::get('/admin/mission/update/{missionID}',[missionController::class,'updateMissionPage']);
    Route::post('/admin/mission/edit',[missionController::class,'editMission'])->name('edit.mission');
    Route::get('/admin/services',[serviesController::class,'index']);
    Route::get('/admin/services/add',[serviesController::class,'ServicePage']);
    Route::post('/admin/services/insert',[serviesController::class,'insertServies'])->name('service.insert');
    Route::get('/admin/services/delete/{id}',[serviesController::class,'deleteServices']);
    Route::get('/admin/services/update/{id}',[serviesController::class,'updateServicePage']);
    Route::post('/admin/services/edit',[serviesController::class,'editService'])->name('edit.service');
    Route::get('/admin/mission/ownMission',[missionController::class,'ownMissions']);

    Route::get('admin/mission/done/{missionID}',[missionController::class,'AdminMissionDone']);
    Route::get('admin/mission/notification',[missionController::class,'notifyMissions']);

    Route::get('/admin/sites',[sitesController::class, 'index']);
    Route::get('/admin/sites/view/{siteID}',[sitesController::class, 'viewSite']);
    Route::get('/admin/sites/add',[sitesController::class, 'addSite']);
    Route::get('/admin/sites/update/{siteID}',[sitesController::class, 'updateSitePage']);
    Route::get('/admin/sites/export/pdf/{id}',[sitesController::class, 'ExportPDF']);
    
    
    Route::get('/admin/sector/page',[sitesController::class, 'addSectorNavi']);
    Route::post('/admin/sector/add',[sitesController::class, 'addSectorsPage'])->name('site.add.sector');
    Route::post('/admin/sector/insert',[sitesController::class, 'insertSectors'])->name('sector.add');

    Route::get('/admin/site/delete/{id}',[sitesController::class, 'deleteSite']);

    Route::get('/admin/messages',[pagesController::class, 'messagesPages']);

    Route::get('/admin/message/delete/{id}',[messageController::class, 'deleteMessage']);

    Route::post('/admin/message/reply', [messageController::class , 'replay'])->name('admin.send.replay');

 });

 Route::middleware([isModerator::class,isLogged::class])->group(function(){

    Route::get('moderator/profile', [pagesController::class, 'ModeratorProfile']);
    Route::get('moderator/update', [userController::class, 'updateModeratorPage']);
    Route::post('moderator/edit', [userController::class, 'updateModeratorInfos'])->name('moderator.update');
    Route::get('moderator/mission', [pagesController::class, 'moderatormission']);
    Route::get('moderator/mission/done/{missionID}',[missionController::class,'missionDone']);
    Route::get('moderator/mission/notification',[missionController::class,'notifyMissions']);

});