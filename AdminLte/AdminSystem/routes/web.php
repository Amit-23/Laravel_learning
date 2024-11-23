<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Route to login page
Route::get('/', function () {
    return view('auth.login');
});




// Group routes that require 'auth' and 'verified' middleware
Route::middleware(['auth', 'verified'])->group(function () {

    
    // User-specific task and dashboard routes
    Route::get('/userhome', [AuthenticatedSessionController::class, 'tasksdata'])->name('userhome');
    Route::get('/userdashboard', function () {
        $user = Auth::user();
        $createdTasks = $user->createdTasks;
        $assignedTasks = $user->assignedTasks;
        $allTasks = $createdTasks->merge($assignedTasks);
        return view('user.userdashboard', ['allTasks' => $allTasks]);
    })->name('userdashboard');

    
    // User task management routes
    Route::post('/task/create', [UserTaskController::class, 'createtask'])->name('tasks.createtask');
    Route::get('/tasks/completed', [UserTaskController::class, 'showCompletedTasks'])->name('tasks.completed');
    Route::get('/tasks/inprogress', [UserTaskController::class, 'showInprogressTasks'])->name('tasks.inprogress');
    Route::get('/tasks/overdue', [UserTaskController::class, 'showOverdueTasks'])->name('tasks.overdue');

    











    // Admin-specific task routes
    Route::get('/admintasks', [AuthenticatedSessionController::class, 'admintasks'])->name('admintasks');


    Route::get('/adminhomepage', [AuthenticatedSessionController::class, 'admindata'])->name('adminhomepage');

    
    Route::get('registereduserslist', [AuthenticatedSessionController::class, 'listUsers'])->name('registeredUsersList');
    Route::get('adminshow/{id}', [UserTaskController::class, 'adminshowuser'])->name('admin.show');

    Route::delete('admindestroy/{id}', [UserTaskController::class, 'admindestroytask'])->name('admin.destroytask');

    Route::delete('admindestroyuser/{id}', [UserTaskController::class, 'admindestroyuser'])->name('admin.destroyuser');

    Route::get('admintaskshow/{id}', [UserTaskController::class, 'admintaskshow'])->name('admintask.show');
    Route::post('admincreatetask', [AuthenticatedSessionController::class, 'adminCreateTask'])->name('admin.admincreatetask');

    Route::get('admin_task_edit.edit/{id}', [AuthenticatedSessionController::class, 'adminTaskEdit'])->name('admin_task_edit.edit');
      Route::post('/tasks/{task}/reassign',[UserTaskController::class, 'reassignadmintask'])->name('tasks.reassign');

    Route::put('/admin/updateTask/{id}', [AuthenticatedSessionController::class, 'adminUpdateTask'])->name('admin.adminUpdateTask');




    
    // Profile management routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Resource route for UserTaskController
Route::resource('/user', UserTaskController::class);

require __DIR__.'/auth.php';
