<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Home');
});

Route::get('/users', function () {

    $usersList = User::query()
                        ->when(Request::input('search'), function($query, $search){
                            $query->where('name', 'like', "%{$search}%");
                        })
                        ->orderBy('name')
                        ->paginate(15)
                        ->withQueryString()
                        ->through(fn($user) => [
                                'id' => $user->id,
                                'name' => $user->name,
                            ]);

    return Inertia::render('Users', [
        'time' => now()->toTimeString(),
        'users' => $usersList,
        'filters' => Request::only(['search']),
    ]);
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});

Route::post('/logout', function () {
    dd(request('logout'));
});
