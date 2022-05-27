<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return Inertia::render('Home');
    });

    Route::get('/users', function () {

        $usersList = User::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('name')
            ->paginate(15)
            ->withQueryString()
            ->through(fn ($user) => [
                'id' => $user->id,
                'name' => $user->name,
                'can' => [
                    'edit' => Auth::user()->can('edit', $user)
                ],
            ]);

        return Inertia::render('Users/Index', [
            'time' => now()->toTimeString(),
            'users' => $usersList,
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ],
        ]);
    });

    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->can('create','App\Models\User'); // new Laravel version
    // })->middleware('can:create,App\Models\User'); // old Laravel version

    Route::post('/users', function () {
        // validate the request
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        // persist the data
        User::create($attributes);

        // redirect
        return redirect('/users');
    });

    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });
});
