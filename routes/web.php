<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\TicketController;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

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
    return Redirect('home');
    // return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
});

Route::post('/register/user', [UserController::class, 'register'] )->name('register');
Route::post('/login/user', [UserController::class, 'login'])->name('login_user');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', [UserController::class, 'homepage'] )->name('home');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/search/flight', [FlightController::class, 'searchFlight'])->name('flight_search');
    Route::get('/my/tickets', [TicketController::class, 'myTickets'])->name('my_tickets');
    Route::get('/about/us', [AboutUsController::class, 'message'])->name('about_us');
    Route::get('/expenses', [ExpenseController::class, 'expenses'])->name('my_expenses');
    Route::get('/expenses/pdf', [ExpenseController::class, 'expensesPDF'])->name('expense_pdf');

    Route::get('/ticket/pdf', [TicketController::class, 'ticketToPdf'])->name('ticket_pdf');

    

});


Route::controller(PaymentController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
    });

    Route::get('/test', function () {
        // return Redirect('home');
        return view('index');
    });