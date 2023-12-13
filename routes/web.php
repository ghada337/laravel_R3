<?php

use App\Http\Controllers\ExampleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::fallback(function () {
//     return redirect('/');
// });

Route::get('food', function () {
    return view('food');
});


Route::prefix('lar')->group(function () {

    Route::get('/', function () {
        return  view('test');
    });

Route::get('/test', function () {
    return 'welcome to my first laravel website ';
});

Route::get('/test1/{id}', function ($id) {
    return 'the id is : ' . $id;
});
// Route::get('/test2/{id?}', function ($id = 0) {
//     return 'the id2 is : ' . $id;
// })->where(['id'=> '[0-9]+']);
Route::get('/test2/{id?}', function ($id = 0) {
    return 'the id2 is : ' . $id;
})->whereNumber('id');

Route::get('/test3/{name?}', function ($name=null) {
    return 'the name is : ' . $name;
})->whereAlpha('name');

Route::get('/test4/{id?}/{name?}', function ($id = 0, $name = null) {
    return 'the age is : ' . $id . '  and the name is : ' . $name;
})->where(['id' => '[0-9]+', 'name' => '[a-zA-Z]+']);

Route::get('/product/{category}', function ($cat) {
    return 'the category is : ' . $cat;
})->whereIn('category', ['laptop', 'pc', 'mobile']);

});


//this is the first task

Route::get('about', function () {
    return  view('about');
});

Route::get('contact_us', function () {
    return  view('contact');
});

Route::prefix('blog')->group(function () {

    Route::get('/', function () {
        return '<h2>this is our blog page in which you can see science, sports, math and medical </h2>';
    });
    Route::get('/science', function () {
        return 'welcome to science blog ';
    });

    Route::get('/sports', function () {
        return 'welcome to sports blog ';
    });

    Route::get('/math', function () {
        return 'welcome to math blog ';
    });

    Route::get('/medical', function () {
        return 'welcome to medical blog ';
    });
    });


    Route::get('/login', function () {
        return view('login ');
    });


    // Route::post('/logged', function () {
    //     return'you are logged in ';
    // })->name('logged');

    /* Updated POST route to use the controller */
Route::post('/logged', [ExampleController::class, 'login'])->name('logged');


    Route::get('/control',[ExampleController::class,'show']);

    Route::get('createCar',[CarController::class,'create'])->name('createCar');
    //store data into car table
    Route::post('storeCar',[CarController::class,'store'])->name('storeCar');

    Route::get('cars',[CarController::class,'index'])->name('cars');

    //day 5 
    Route::get('updateCar/{id}',[CarController::class,'edit'])->name('updateCar');
    Route::put('update/{id}',[CarController::class,'update'])->name('update');
    Route::get('showCar/{id}',[CarController::class,'show'])->name('showCar');
    // end day 5

//@this is for task 4
    Route::get('createPost',[PostController::class,'create'])->name('createPost');
    Route::post('storePost', [PostController::class, 'store'])->name('storePost');
    Route::get('posts', [PostController::class, 'index'])->name('posts');
    
    //@end task 4

