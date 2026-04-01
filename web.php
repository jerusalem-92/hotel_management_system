<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return redirect()->route('rooms.index');
});

Route::get('/rooms', [BookingController::class, 'index'])->name('rooms.index');
Route::get('/book/{room}', [BookingController::class, 'create'])->name('bookings.create');
Route::post('/book/{room}', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/booking/{booking}/confirmation', [BookingController::class, 'confirmation'])->name('bookings.confirmation');

use App\Http\Controllers\Admin\RoomController as AdminRoomController;

Route::resource('admin/rooms', AdminRoomController::class)->except(['show', 'destroy'])->names([
    'index' => 'admin.rooms.index',
    'create' => 'admin.rooms.create',
    'store' => 'admin.rooms.store',
    'edit' => 'admin.rooms.edit',
    'update' => 'admin.rooms.update',
]);
