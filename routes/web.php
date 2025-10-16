<?php

use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\UserForgetPasswordController;
use App\Http\Controllers\Auth\UserVerifyPasswordController;

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Group for user-specific web routes
Route::prefix('user')->name('user.')->group(function () {
    // User Login: http://127.0.0.1:8000/user/login
    Route::get('/login', [UserLoginController::class, 'showUserLoginForm'])->name('login');
    Route::get('/register', [UserRegisterController::class, 'showUserLoginForm'])->name('register');
    Route::get('/password', [UserForgetPasswordController::class, 'showUserLoginForm'])->name('password');
    Route::get('/verify', [UserVerifyPasswordController::class, 'showUserLoginForm'])->name('verify');
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    // Protected User Routes (Require 'auth' middleware)
    Route::middleware('auth')->group(function () {
        // User Dashboard: http://127.0.0.1:8000/user/dashboard
        // Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    });
});

Route::group(['middleware' => ['auth', 'check.permission']], function() {
// Route::group(['middleware' => ['auth']], function() {


    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::controller(ProfileController::class)->group(function () {

        Route::get('profile', 'index')->name('profile');
        Route::post('update', 'update')->name('profileupdate');
        Route::post('changepassword', 'changepassword')->name('changepassword');



    });


	Route::controller(PlayerController::class)->group(function () {
		Route::get('players', 'index')->name('players');
		Route::get('create_players', 'create_player')->name('createplayer');
        Route::post('store_player', 'store_player')->name('storeuser');

        Route::get('view_player/{id}', 'view_player')->name('viewplayer');
        Route::get('edit_player/{id}', 'edit_player')->name('editplayer');
        Route::post('update_player/{id}', 'update_player')->name('updateplayer');

        Route::post('activate_player/{id}', 'player_activate')->name('player-activate');
        Route::post('deactivate_player/{id}', 'player_deactivate')->name('player-deactivate');
        Route::post('delete_player/{id}', 'delete_player')->name('deleteplayer');
        Route::post('ban_player', 'ban_player')->name('banplayer');


	});

	Route::controller(MasterController::class)->group(function () {
		Route::get('combattypes', 'combattypes')->name('combattypes');
		Route::post('storecombat', 'storecombat')->name('storecombat');
		Route::get('editcombat/{id}', 'editcombat')->name('editcombat');
		Route::put('storeeditcombat/{id}', 'storeeditcombat')->name('storeeditcombat');

		Route::get('playersvs', 'playersvs')->name('playersvs');
		Route::post('storeplayer', 'storeplayer')->name('storeplayer');
		Route::get('editplayervs/{id}', 'editplayervs')->name('editplayervs');
		Route::put('storeplayeredit/{id}', 'storeplayeredit')->name('storeplayeredit');

		Route::get('tournaments', 'tournaments')->name('tournaments');
		Route::post('storetournament', 'storetournament')->name('storetournament');
		Route::get('edittournament/{id}', 'edittournament')->name('edittournament');
		Route::put('storetournamentedit/{id}', 'storetournamentedit')->name('storetournamentedit');
		Route::get('usdt_accounts', 'usdt_accounts')->name('usdtAccounts');
        Route::post('storeusdt', 'store_usdt')->name('storeusdt');
		Route::get('edit_usdt/{id}', 'edit_usdt')->name('editusdt');
		Route::put('storeeditusdt/{id}', 'update_usdt')->name('storeeditusdt');

        Route::post('delete_usdt/{id}', 'delete_usdt')->name('deleteusdt');

        // Refer and Earn
		Route::get('refer_and_earn', 'refer_and_earn')->name('referAndEarn');
		Route::post('create_program', 'create_program')->name('createProgram');
        Route::post('edit_program', 'edit_program')->name('editprogram');
        Route::post('update_program', 'update_program')->name('updateProgram');
        Route::post('delete_program/{id}', 'delete_program')->name('deleteProgram');

        // CommissionLevel
		Route::post('create_commission_level', 'createCommissionLevel')->name('createCommissionlevel');
        Route::post('delete_level/{id}', 'delete_level')->name('deletelevel');
        Route::post('edit_level', 'edit_level')->name('editevel');
        Route::post('update_level', 'update_level')->name('updateLevel');



        // Time slot

		Route::get('time_slots', 'time_slots')->name('TimeSlots');
		Route::post('create_timeslot', 'create_timeslot')->name('storeTimeslot');
		Route::get('edit_timeslot/{id}', 'edit_timeslot')->name('editTimeslot');
		Route::put('storeeditslot/{id}', 'storeeditslot')->name('storeeditslot');








	});
       Route::controller(FinanceController::class)->group(function () {
        Route::get('payment_methods', 'payment_methods')->name('paymentmethods');
        Route::post('create_payment', 'storepayment')->name('storepayment');
        Route::get('edit_payment/{id}', 'edit_payment')->name('editpayment');
        Route::put('storeeditpayment/{id}', 'storeeditpayment')->name('storeeditpayment');
        Route::get('withdrawal_requests', 'withdrawal_requests')->name('withdrawalRequests');
        Route::get('view_request/{id}', 'view_request')->name('viewrequest');
        Route::get('transactions', 'transactions')->name('transactions');
        Route::get('viewtransaction/{id}', 'view_transaction')->name('viewtransaction');
        Route::get('approveTransaction/{id}', 'approveTransaction')->name('approveTransaction');
        Route::get('rejectTransaction/{id}', 'rejectTransaction')->name('rejectTransaction');
        Route::get('transactions/{id}/', 'playertransactions')->name('playertransactions');

        Route::get('pending_transactions', 'pending_transactions')->name('pendingtransactions');
        Route::get('pending_all_transactions', 'pending_all_transactions')->name('pendingalltransactions');







    });
    Route::controller(ContentController::class)->group(function () {

        // Currency list
        Route::get('currencies', 'currencies')->name('currencies');
        Route::post('create_currency', 'create')->name('storecurrency');
        Route::get('edit_currency/{id}', 'edit')->name('editcurrency');
        Route::put('update_currency/{id}', 'update')->name('storeeditcurrency');
        Route::post('delete_currency/{id}', 'delete')->name('deletecurrency');

        // News and Tutorials
        Route::get('news_and_tutorials', 'news_and_tutorials')->name('newsAndTutorials');
        Route::post('create_news', 'create_news')->name('createNews');
        Route::post('edit_news', 'edit_news')->name('editnews');
        Route::post('update_news', 'update_news')->name('updateNews');
        Route::post('delete_news/{id}', 'delete_news')->name('deleteNews');

        // Events and Promotion
         Route::get('events_and_promotion', 'events_and_promotion')->name('eventsAndPromotion');
        Route::post('create_promotion', 'create_promotion')->name('createPromotion');
        Route::post('edit_promotion', 'edit_promotion')->name('editPromotion');
        Route::post('update_promotion', 'update_promotion')->name('updatePromotion');
        Route::post('delete_promotion/{id}', 'delete_promotion')->name('deletePromotion');

    });
    Route::controller(StaffController::class)->group(function () {
        // Roles
        Route::get('roles', 'roles')->name('userroles');
        Route::post('create_roles', 'create_role')->name('createrole');
        Route::post('edit_role', 'edit_role')->name('editrole');
        Route::post('update_role', 'update_role')->name('updaterole');
        Route::post('delete_role/{id}', 'delete_role')->name('deleterole');

        // Permissions
        Route::get('permissions', 'role_permissions')->name('permissions');
        Route::post('create_permission', 'create_permission')->name('createPermission');
        Route::post('edit_permission', 'edit_permission')->name('editPermission');
        Route::post('update_permission', 'update_permission')->name('updatepermission');
        Route::post('delete_permission/{id}', 'delete_permission')->name('deletePermission');

        // AdminUsers

        Route::get('staff_list', 'staff_list')->name('staffList');
        Route::get('admin_users', 'admin_users')->name('adminUsers');
        Route::post('create_staff', 'create_staff')->name('createStaff');
        Route::get('edit_staff/{id}', 'edit_staff')->name('editStaff');
        Route::put('update_staff/{id}', 'update_staff')->name('updateStaff');

        Route::post('role_permissions', 'add_role_permissions')->name('role_permissions');
        Route::get('role_permissions', 'get_permissions')->name('getPermissions');











    });


});
