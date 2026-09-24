<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\PagesController as AdminPagesController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminTechnicianController;
use App\Http\Controllers\Admin\AdminDeviceController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\SubscriptionPlanController;
use App\Http\Controllers\Admin\AdminSiteController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\ClientSiteController;


Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/services', [PagesController::class, 'services'])->name('services');
Route::get('/services-detail/{slug}', [PagesController::class, 'serviceDetail'])->name('service.detail');
Route::get('/blog', [PagesController::class, 'blog'])->name('blog');
Route::get('/blog/{slug?}', [PagesController::class, 'blogDetail'])->name('blog.detail');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/subscription', [PagesController::class, 'subscription'])->name('subscription');
Route::get('/login', [PagesController::class, 'login'])->name('login');
Route::get('/signup', [PagesController::class, 'signup'])->name('signup');
Route::get('/faqs', [PagesController::class, 'faqs'])->name('faqs');
Route::get('/terms-conditions', [PagesController::class, 'termsConditions'])->name('terms.conditions');
Route::get('/privacy-policy', [PagesController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/warranty', [PagesController::class, 'warranty'])->name('warranty');
Route::get('/cookies-policy', [PagesController::class, 'cookiesPolicy'])->name('cookies.policy');
Route::get('/damage-policy', [PagesController::class, 'damagePolicy'])->name('damage.policy');
Route::get('/support-policy', [PagesController::class, 'supportPage'])->name('support.page');

// Auth action routes
Route::post('/register', [AuthController::class, 'register'])->name('register.perform');
Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
Route::get('/otp', [AuthController::class, 'showOtpForm'])->name('otp.form');
Route::post('/otp-verify', [AuthController::class, 'verifyOtp'])->name('otp.verify');
Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('otp.resend');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout.perform');

// Password reset
Route::get('/forgot-password', [PasswordResetController::class, 'showForgot'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');
// Phone-based forgot-password (OTP flow)
Route::post('/forgot-password-phone', [PasswordResetController::class, 'sendResetLinkByPhone'])->name('password.phone');
Route::get('/reset-password-phone', [PasswordResetController::class, 'showResetFormByPhone'])->name('password.reset.phone.form');
Route::post('/reset-password-phone', [PasswordResetController::class, 'resetByPhone'])->name('password.reset.phone');
Route::get('/reset-password', [PasswordResetController::class, 'showResetForm'])->name('password.reset.form');
Route::post('/reset-password', [PasswordResetController::class, 'reset'])->name('password.reset');
Route::get('/password-reset-otp', [PasswordResetController::class, 'passwordResetOtp'])->name('pass.reset.otp');
Route::post('/pass-reset-otp-verify', [PasswordResetController::class, 'passwordResetOtpVerify'])->name('pass.reset.otp.verify');


Route::get('/stripe', [StripeController::class, 'index'])->name('stripe.index');
Route::post('/stripe/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
Route::get('/stripe/success', [StripeController::class, 'success'])->name('stripe.success');
Route::get('/stripe/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');

// google login 

Route::get('auth/google', [GoogleController::class, 'redirect'])->name('login.google');
Route::get('auth/google/callback', [GoogleController::class, 'callback']);


// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
	Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
	Route::get('/', [AdminAuthController::class, 'showLoginForm'])->name('login');
	Route::post('/login', [AdminAuthController::class, 'login'])->name('login.perform');
	Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout.perform');
	Route::put('/update-profile', [AdminAuthController::class, 'updateProfile'])->name('updateProfile');
    Route::put('/update-password', [AdminAuthController::class, 'updatePassword'])->name('updatePassword');
	// Protected admin routes

	Route::middleware('auth:admin')->group(function () {
		Route::get('/', [AdminAuthController::class, 'dashboard'])->name('dashboard');
      

		// Admin pages
		// Keep legacy admin page route (optional)
		Route::get('/clients', [AdminPagesController::class, 'clients'])->name('clients');

		// Resourceful routes for client management (Controller CRUD)
		// Resource names will be prefixed with the group's name('admin.')
		Route::resource('clients', AdminClientController::class);
		Route::resource('services', AdminServiceController::class);
		Route::resource('technicians', AdminTechnicianController::class);
		Route::resource('sites', AdminSiteController::class);
		Route::get('/get-sites/{user}', [AdminDeviceController::class, 'getSitesByUser'])->name('getSitesByUser');
		Route::resource('devices', AdminDeviceController::class);
		Route::resource('subscription_plans', SubscriptionPlanController::class);
		Route::resource('blog', AdminBlogController::class);

		// Route::resource('services', AdminServiceController::class);
		// Route::get('/technicians', [AdminPagesController::class, 'technicians'])->name('technicians');
		// Route::get('/sites', [AdminPagesController::class, 'sites'])->name('sites');
		// Route::get('/devices', [AdminPagesController::class, 'devices'])->name('devices');
		Route::get('/subscription/index', [AdminPagesController::class, 'subscriptionPurchase'])->name('subscription.index');
		Route::get('/reports', [AdminPagesController::class, 'reports'])->name('reports');
		Route::get('/notifications', [AdminPagesController::class, 'notifications'])->name('notifications');
		Route::get('/billing', [AdminPagesController::class, 'billing'])->name('billing');
		Route::get('/users', [AdminPagesController::class, 'users'])->name('users');
		Route::get('/support', [AdminPagesController::class, 'support'])->name('support');
		Route::get('/settings', [AdminPagesController::class, 'settings'])->name('settings');
		Route::get('/profile', [AdminPagesController::class, 'profile'])->name('profile');
		Route::post('/profile', [AdminPagesController::class, 'updateProfile'])->name('profile.update');
		Route::get('/change-password', [AdminPagesController::class, 'changePasswordForm'])->name('password.change.form');
		Route::post('/change-password', [AdminPagesController::class, 'changePassword'])->name('password.change');

	});
});

// Client dashboard (protected)
Route::middleware('auth')->group(function () {
	Route::get('/dashboard', [ClientController::class, 'dashboard'])->name('client.dashboard');
	Route::get('/profile', [ClientController::class, 'profile'])->name('client.profile');
	Route::post('/profile', [ClientController::class, 'updateProfile'])->name('client.profile.update');
	Route::get('/change-password', [ClientController::class, 'changePasswordForm'])->name('client.password.change.form');
	Route::post('/change-password', [ClientController::class, 'changePassword'])->name('client.password.update');
	Route::post('/logout', [ClientController::class, 'logout'])->name('client.logout');
	Route::get('/sites', [ClientController::class, 'sites'])->name('client.sites');
	Route::get('/sites/{id}', [ClientController::class, 'siteDetail'])->name('client.sites.detail');
	Route::get('/devices', [ClientController::class, 'devices'])->name('client.devices');
	Route::get('/devices/{id}', [ClientController::class, 'deviceDetail'])->name('client.devices.detail');


	 Route::get('/meters', [ClientController::class, 'meters'])->name('client.meter');
	 Route::get('/view-logs', [ClientController::class, 'viewLogs'])->name('client.view.logs');
	 Route::get('/view-devices', [ClientController::class, 'viewDevices'])->name('client.view.devices');
	 Route::get('/view-spaces', [ClientController::class, 'viewSpaces'])->name('client.view.spaces');
	 Route::get('/space-detail', [ClientController::class, 'spaceDetail'])->name('client.space.detail');
	 Route::get('/device-detail', [ClientController::class, 'devDetail'])->name('client.dev.detail');


	Route::get('/subscriptions', [ClientController::class, 'subscriptions'])->name('client.subscription');
	Route::get('/invoices', [ClientController::class, 'invoices'])->name('client.invoices');
	Route::get('/invoices/{id}', [ClientController::class, 'invoiceDetail'])->name('client.invoices.detail');
	Route::get('/support', [ClientController::class, 'support'])->name('client.support');
	Route::post('/support', [ClientController::class, 'submitSupport'])->name('client.support.submit');


	Route::resource('client/sites', ClientSiteController::class)->names('client.sites');

});