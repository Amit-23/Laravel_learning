<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


Route::resource('/user',UserTaskController::class);

Route::get('/', function () {
    return view('auth.login');
});



Route::post('/task/create',[UserTaskController::class,'createtask'])->middleware(['auth','verified'])->name('tasks.createtask');

// //////////////////////////////////////////////////////////////

Route::get('/userhome', [AuthenticatedSessionController::class,'tasksdata'])->middleware(['auth','verified'])->name('userhome');
/////////////////////////////////////////////////////////////////////

Route::get('/admintasks',[AuthenticatedSessionController::class,'admintasks'])->middleware(['auth','verified'])->name('admintasks');

Route::get('/adminhomepage',[AuthenticatedSessionController::class,'admindata'])->middleware(['auth','verified'])->name('adminhomepage');

Route::get('/tasks/completed',[UserTaskController::class, 'showCompletedTasks'])->name('tasks.completed');

Route::get('/tasks/inprogress',[UserTaskController::class, 'showInprogressTasks'])->name('tasks.inprogress');

Route::get('/tasks/overdue',[UserTaskController::class, 'showOverdueTasks'])->name('tasks.overdue');


Route::get('registereduserslist',[AuthenticatedSessionController::class,'listUsers'])->name('registeredUsersList');

Route::get('adminshow/{id}',[UserTaskController::class,'adminshowuser'])->name('admin.show');

Route::delete('admindestroy/{id}',[UserTaskController::class,'admindestroyuser'])->name('admin.destroy');

Route::get('admintaskshow/{id}',[UserTaskController::class,'admintaskshow'])->name('admintask.show');

Route::post('admincreatetask',[AuthenticatedSessionController::class,'adminCreateTask'])->name('admin.admincreatetask');




Route::get('/userdashboard', function(){

    $user = Auth::user();
    
    // Retrieve all tasks created by or assigned to the user
    $createdTasks = $user->createdTasks;
    $assignedTasks = $user->assignedTasks;
    $allTasks = $createdTasks->merge($assignedTasks);

    //dd($allTasks);


    return view('user.userdashboard',['allTasks' => $allTasks]);
})->middleware(['auth', 'verified'])->name('userdashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';