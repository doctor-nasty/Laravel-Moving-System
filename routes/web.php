<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('pages.index');
// });

Route::get('/', 'App\Http\Controllers\PagesController@index')->name('index')->middleware('auth');
// Route::post('interstateForm', 'FormsController@interstateForm');

Route::get('autocomplete', [App\Http\Controllers\AutoCompleteController::class, 'autocomplete'])->name('autocomplete');
Route::get('autocompletemovingto', [App\Http\Controllers\AutoCompleteController::class, 'autocompletemovingto'])->name('autocompletemovingto');
Route::post('api/fetch-models', 'App\Http\Controllers\FormsController@fetchModel')->name('fetchModel');
Route::get('api/fetch-years', 'App\Http\Controllers\FormsController@fetchYear')->name('fetchYear');
Route::post('api/fetch-zip', 'App\Http\Controllers\FormsController@fetchZip')->name('fetchZip');
Route::post('api/fetch-countries', 'App\Http\Controllers\FormsController@fetchCountry')->name('fetchCountry');
Route::post('api/fetch-states', 'App\Http\Controllers\FormsController@fetchState')->name('fetchState');
Route::post('api/fetch-allowedstates', 'App\Http\Controllers\FormsController@fetchallowedState')->name('fetchallowedState');


Route::get('interstateForm', 'App\Http\Controllers\Forms\InterstateController@createStepOne')->name('interstateForm.create.step.one')->middleware('auth');
Route::post('interstateForm', 'App\Http\Controllers\Forms\InterstateController@postCreateStepOne')->name('interstateForm.create.step.one.post');

Route::get('interstateForm/step-two', 'App\Http\Controllers\Forms\InterstateController@createStepTwo')->name('interstateForm.create.step.two')->middleware('auth');
Route::post('interstateForm/step-two', 'App\Http\Controllers\Forms\InterstateController@postCreateStepTwo')->name('interstateForm.create.step.two.post');

Route::get('interstateForm/step-three', 'App\Http\Controllers\Forms\InterstateController@createStepThree')->name('interstateForm.create.step.three')->middleware('auth');
Route::post('interstateForm/step-three', 'App\Http\Controllers\Forms\InterstateController@postCreateStepThree')->name('interstateForm.create.step.three.post');

Route::get('interstateForm/verify', 'App\Http\Controllers\Forms\InterstateController@Verify')->name('interstateForm.verify')->middleware('auth');
Route::post('interstateForm/verify', 'App\Http\Controllers\Forms\InterstateController@postVerify')->name('interstateForm.verify.post');





Route::get('internationalForm', 'App\Http\Controllers\Forms\InternationalController@createStepOne')->name('internationalForm.create.step.one')->middleware('auth');
Route::post('internationalForm', 'App\Http\Controllers\Forms\InternationalController@postCreateStepOne')->name('internationalForm.create.step.one.post');

Route::get('internationalForm/step-two', 'App\Http\Controllers\Forms\InternationalController@createStepTwo')->name('internationalForm.create.step.two')->middleware('auth');
Route::post('internationalForm/step-two', 'App\Http\Controllers\Forms\InternationalController@postCreateStepTwo')->name('internationalForm.create.step.two.post');

Route::get('internationalForm/step-three', 'App\Http\Controllers\Forms\InternationalController@createStepThree')->name('internationalForm.create.step.three')->middleware('auth');
Route::post('internationalForm/step-three', 'App\Http\Controllers\Forms\InternationalController@postCreateStepThree')->name('internationalForm.create.step.three.post');

Route::get('internationalForm/verify', 'App\Http\Controllers\Forms\InternationalController@Verify')->name('internationalForm.verify')->middleware('auth');
Route::post('internationalForm/verify', 'App\Http\Controllers\Forms\InternationalController@postVerify')->name('internationalForm.verify.post');






Route::get('carForm', 'App\Http\Controllers\Forms\CarshippingController@createStepOne')->name('carForm.create.step.one')->middleware('auth');
Route::post('carForm', 'App\Http\Controllers\Forms\CarshippingController@postCreateStepOne')->name('carForm.create.step.one.post');

Route::get('carForm/step-two', 'App\Http\Controllers\Forms\CarshippingController@createStepTwo')->name('carForm.create.step.two')->middleware('auth');
Route::post('carForm/step-two', 'App\Http\Controllers\Forms\CarshippingController@postCreateStepTwo')->name('carForm.create.step.two.post');

Route::get('carForm/step-three', 'App\Http\Controllers\Forms\CarshippingController@createStepThree')->name('carForm.create.step.three')->middleware('auth');
Route::post('carForm/step-three', 'App\Http\Controllers\Forms\CarshippingController@postCreateStepThree')->name('carForm.create.step.three.post');


Route::get('carForm/verify', 'App\Http\Controllers\Forms\CarshippingController@Verify')->name('carForm.verify')->middleware('auth');
Route::post('carForm/verify', 'App\Http\Controllers\Forms\CarshippingController@postVerify')->name('carForm.verify.post');






Route::get('storageForm', 'App\Http\Controllers\Forms\StorageController@createStepOne')->name('storageForm.create.step.one')->middleware('auth');
Route::post('storageForm', 'App\Http\Controllers\Forms\StorageController@postCreateStepOne')->name('storageForm.create.step.one.post');

Route::get('storageForm/step-two', 'App\Http\Controllers\Forms\StorageController@createStepTwo')->name('storageForm.create.step.two')->middleware('auth');
Route::post('storageForm/step-two', 'App\Http\Controllers\Forms\StorageController@postCreateStepTwo')->name('storageForm.create.step.two.post');

Route::get('storageForm/step-three', 'App\Http\Controllers\Forms\StorageController@createStepThree')->name('storageForm.create.step.three')->middleware('auth');
Route::post('storageForm/step-three', 'App\Http\Controllers\Forms\StorageController@postCreateStepThree')->name('storageForm.create.step.three.post');

Route::get('storageForm/verify', 'App\Http\Controllers\Forms\StorageController@Verify')->name('storageForm.verify')->middleware('auth');
Route::post('storageForm/verify', 'App\Http\Controllers\Forms\StorageController@postVerify')->name('storageForm.verify.post');



// Route::get('/contact', function () {
//     return view('pages.contact');
// });

Route::get('/about', function () {
    return view('pages.about');
})->middleware('auth');


Route::get('interstateForm/submit', 'App\Http\Controllers\Forms\InterstateController@submit')->name('interstatesubmit');


// Route::get('/zip', 'App\Http\Controllers\ZipCodeController@index')->name('home');
// Route::post('/zip/edit', 'App\Http\Controllers\ZipCodeController@edit');
// Route::post('/zip/destroy', 'App\Http\Controllers\ZipCodeController@destroy');


// Auth::routes();

Route::get('/admin', function () {
    return redirect()->route('login');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile Routes
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\AdminController::class, 'getProfile'])->name('detail');
    Route::post('/update', [App\Http\Controllers\AdminController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [App\Http\Controllers\AdminController::class, 'changePassword'])->name('change-password');
});

// Roles
Route::resource('roles', App\Http\Controllers\RolesController::class);

// Permissions
Route::resource('permissions', App\Http\Controllers\PermissionsController::class);

// Users
Route::middleware('auth')->prefix('users')->name('users.')->group(function(){
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\UserController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [App\Http\Controllers\UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [App\Http\Controllers\UserController::class, 'updateStatus'])->name('status');



    Route::get('/import-users', [App\Http\Controllers\UserController::class, 'importUsers'])->name('import');
    Route::post('/upload-users', [App\Http\Controllers\UserController::class, 'uploadUsers'])->name('upload');

    Route::get('export/', [App\Http\Controllers\UserController::class, 'export'])->name('export');

// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::middleware('auth')->prefix('company')->name('company.')->group(function(){
    Route::get('/', [App\Http\Controllers\CompanyController::class, 'index'])->name('index');
    Route::get('/assignment/{company}/interstate', [App\Http\Controllers\CompanyController::class, 'assignmentinterstate'])->name('assignmentinterstate');
    Route::get('/assignment/{company}/international', [App\Http\Controllers\CompanyController::class, 'assignmentinternational'])->name('assignmentinternational');
    Route::get('/assignment/{company}/carshipping', [App\Http\Controllers\CompanyController::class, 'assignmentcarshipping'])->name('assignmentcarshipping');
    Route::get('/assignment/{company}/storage', [App\Http\Controllers\CompanyController::class, 'assignmentstorage'])->name('assignmentstorage');

    Route::get('/assignment/{company}/{state}/interstate', [App\Http\Controllers\CompanyController::class, 'assignmentstoragestatesinterstate'])->name('assignmentstoragestatesinterstate');
    Route::get('/assignment/{company}/{state}/international', [App\Http\Controllers\CompanyController::class, 'assignmentsstateinternational'])->name('assignmentsstateinternational');
    Route::get('/assignment/{company}/{state}/carshipping', [App\Http\Controllers\CompanyController::class, 'assignmentsstatecarshipping'])->name('assignmentsstatecarshipping');
    Route::get('/assignment/{company}/{state}/storage', [App\Http\Controllers\CompanyController::class, 'assignmentstoragestates'])->name('assignmentstoragestates');

    Route::post('/assignment/interstate/mindays', [App\Http\Controllers\CompanyController::class, 'postmindaysinterstate'])->name('mindaysinterstate');
    Route::post('/assignment/interstate/mvsz', [App\Http\Controllers\CompanyController::class, 'postmvszinterstate'])->name('mvszinterstate');
    Route::delete('/assignment/interstate/mvszrem', [App\Http\Controllers\CompanyController::class, 'postmvszinterstaterem'])->name('mvszinterstaterem');
    Route::post('/assignment/interstate/tost', [App\Http\Controllers\CompanyController::class, 'posttostinterstate'])->name('tostinterstate');
    Route::delete('/assignment/interstate/tostrem', [App\Http\Controllers\CompanyController::class, 'posttostinterstaterem'])->name('tostinterstaterem');
    Route::post('/assignment/interstate/cntys', [App\Http\Controllers\CompanyController::class, 'postcntyinterstate'])->name('cntyinterstate');
    Route::delete('/assignment/interstate/cntysrem', [App\Http\Controllers\CompanyController::class, 'postcntyinterstaterem'])->name('cntyinterstaterem');

    Route::post('/assignment/car/mindays', [App\Http\Controllers\CompanyController::class, 'postmindaysinterstate'])->name('mindayscar');
    Route::post('/assignment/car/tost', [App\Http\Controllers\CompanyController::class, 'posttostinterstate'])->name('tostcar');
    Route::delete('/assignment/car/tostrem', [App\Http\Controllers\CompanyController::class, 'posttostinterstaterem'])->name('tostcarrem');
    Route::post('/assignment/car/cntys', [App\Http\Controllers\CompanyController::class, 'postcntyinterstate'])->name('cntycar');
    Route::delete('/assignment/car/cntysrem', [App\Http\Controllers\CompanyController::class, 'postcntyinterstaterem'])->name('cntycarrem');

    Route::post('/assignment/international/mindays', [App\Http\Controllers\CompanyController::class, 'postmindaysinterstate'])->name('mindaysinternat');
    Route::post('/assignment/international/tost', [App\Http\Controllers\CompanyController::class, 'posttostinterstate'])->name('tostinternat');
    Route::delete('/assignment/international/tostrem', [App\Http\Controllers\CompanyController::class, 'posttostinterstaterem'])->name('tostinternatrem');
    Route::post('/assignment/international/cntys', [App\Http\Controllers\CompanyController::class, 'postcntyinterstate'])->name('cntyinternat');
    Route::delete('/assignment/international/cntysrem', [App\Http\Controllers\CompanyController::class, 'postcntyinterstaterem'])->name('cntyinternatrem');
    Route::post('/assignment/international/mvsz', [App\Http\Controllers\CompanyController::class, 'postmvszinterstate'])->name('mvszinternat');
    Route::delete('/assignment/international/mvszrem', [App\Http\Controllers\CompanyController::class, 'postmvszinterstaterem'])->name('mvszinternatrem');
    Route::post('/assignment/international/tocntry', [App\Http\Controllers\CompanyController::class, 'posttocntry'])->name('tocntry');
    Route::delete('/assignment/international/tocntryrem', [App\Http\Controllers\CompanyController::class, 'posttocntryrem'])->name('tocntryrem');

    Route::post('/assignment/storage/cntys', [App\Http\Controllers\CompanyController::class, 'postcntyinterstate'])->name('cntystrg');
    Route::delete('/assignment/storage/cntysrem', [App\Http\Controllers\CompanyController::class, 'postcntyinterstaterem'])->name('cntystrgrem');
    Route::post('/assignment/storage/strg', [App\Http\Controllers\CompanyController::class, 'poststrg'])->name('strg');
    Route::delete('/assignment/storage/strgrem', [App\Http\Controllers\CompanyController::class, 'poststrgrem'])->name('strgrem');

    Route::get('/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('create');
    Route::post('/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('store');
    Route::get('/edit/{company}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('edit');
    Route::put('/update/{company}', [App\Http\Controllers\CompanyController::class, 'update'])->name('update');
    Route::delete('/delete/{company}', [App\Http\Controllers\CompanyController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{id}/{status}', [App\Http\Controllers\CompanyController::class, 'updateStatus'])->name('status');



    Route::get('export/', [App\Http\Controllers\CompanyController::class, 'export'])->name('export');

// Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
