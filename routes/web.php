<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->get('/dashboard', [InvitationController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/invitations/create', [InvitationController::class, 'create'])->name('invitations.create');
    Route::post('/invitations', [InvitationController::class, 'store'])->name('invitations.store');

    // Edit an invitation
    Route::get('/invitations/index', [InvitationController::class, 'index'])->name('invitations.index');

    Route::get('/invitations/{invitation}/show', [InvitationController::class, 'show'])->name('invitations.show');
    
    Route::get('/invitations/{invitation}/edit', [InvitationController::class, 'edit'])->name('invitations.edit');
    
    Route::patch('/invitations/{invitation}', [InvitationController::class, 'update'])->name('invitations.update');

    // Delete an invitation
    Route::delete('/invitations/{invitation}', [InvitationController::class, 'destroy'])->name('invitations.destroy');

    // This route is used when the QR code is scanned for validation.
    Route::get('/invitations/validate/{token}', [InvitationController::class, 'validateInvitation'])->name('invitation.validate');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', function () {
        abort(404);
    })->name('profile.edit');

    Route::patch('/profile', function () {
        abort(404);
    })->name('profile.update');

    Route::delete('/profile', function () {
        abort(404);
    })->name('profile.destroy');
});
require __DIR__ . '/auth.php';
