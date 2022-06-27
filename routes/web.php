<?php
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

use App\Http\Controllers\Admin\AssignFreelancerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FreeLancerController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FormListingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubsPaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

//  Route::get('/', function () {

//     //number of user connected or viewed
//     // Tracker::firstOrCreate(
//     //     [
//     //         'ip'   => $_SERVER['REMOTE_ADDR']
//     //     ],
//     //     [
//     //         'ip'   => $_SERVER['REMOTE_ADDR'],
//     //         'current_date' => date('Y-m-d')
//     //     ]
//     // )->save();

//     return view('welcome');
// })->name('welcome');

Route::get('/.well-known/pki-validation', function () {

    $file . public_path() . "/F5D4181A4A92F96F9EE68BAEB521BDC2.txt";
    $headers = ['Content-Type' => 'application/txt'];
    response()->download($file, 'F5D4181A4A92F96F9EE68BAEB521BDC2.txt', $headers);
})->name('pki-validation');

Route::get('/', [
    'as' => 'root',
    'uses' => 'HomeController@index',
]);
Route::get('admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');
Route::get('about-us', [HomeController::class, 'about'])->name('aboutus');
Route::get('blog', [HomeController::class, 'blog'])->name('blog');
Route::get('videos', [HomeController::class, 'videos'])->name('videos');
Route::get('saved-items', [HomeController::class, 'savedItems'])->name('saved.items');
Route::get('service', [HomeController::class, 'services'])->name('services');
Route::post('servicesq', [HomeController::class, 'serviceplans'])->name('serviceplans');
Route::get('freelancer', [HomeController::class, 'freelancer'])->name('freelancer');
Route::get('contact-us', [HomeController::class, 'contactus'])->name('contactus');
Route::post('contact-us', [HomeController::class, 'contactus_save'])->name('contactus_save');
Route::get('privacy-policy', [HomeController::class, 'privacy_policy'])->name('privacy.policy');
Route::get('terms-condition', [HomeController::class, 'terms_condition'])->name('terms.condition');

Route::get('/static/{slug}', [
    'as' => 'staticPage',
    'uses' => 'HomeController@staticPage',
]);

Route::get('/blog/{slug}', [
    'as' => 'dynamicArticle',
    'uses' => 'HomeController@dynamicArticle',
]);
Route::get('/video/{slug}', [
    'as' => 'dynamicArticleVideo',
    'uses' => 'HomeController@dynamicArticleVideo',
]);
Route::get('/articles-search', [
    'as' => 'articles.search',
    'uses' => 'HomeController@searchArticle',
]);
Route::post('/ajax-save-items', [
    'as' => 'ajax.save.items',
    'uses' => 'HomeController@ajaxSaveItems',
]);
Route::post('/ajax.remove.items', [
    'as' => 'ajax.remove.items',
    'uses' => 'HomeController@ajaxRemoveItems',
]);
Route::post('/change-theme', function(){
    \Cache::put(\Request::ip()."_theme", request()->theme);
})->name('theme-change');

// Like Or Dislike
Route::post('save-likedislike',[HomeController::class, 'save_likedislike'])->name('save_likedislike');

Route::get('/category/{slug}', [HomeController::class, 'dynamicCategory'])->name('dynamicCategory');

Route::get('/service/{slug}', [HomeController::class, 'dynamicService'])->name('dynamicService');
Route::post('comments', [CommentController::class, 'store'])->name('comments.store');


/* TR routes --begin */
Route::group(['middleware' => 'auth'], function () {
    // admin routes
    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('/tr/admin/dashboard', [App\Http\Controllers\TR\Admin\DashboardController::class, 'index'])->middleware('role:admin')->name('tr/admin/dashboard');

        Route::get('/tr/admin/user/new', [App\Http\Controllers\TR\Admin\UserController::class, 'add'])->middleware('role:admin')->name('tr/admin/user/new');
        Route::get('/tr/admin/user/all', [App\Http\Controllers\TR\Admin\UserController::class, 'index'])->middleware('role:admin')->name('tr/admin/user/all');
        Route::get('/tr/admin/user/edit/{id}', [App\Http\Controllers\TR\Admin\UserController::class, 'edit'])->middleware('role:admin')->name('tr/admin/user/edit');
        Route::post('/tr/admin/user/save', [App\Http\Controllers\TR\Admin\UserController::class, 'save'])->middleware('role:admin')->name('tr/admin/user/save');
        Route::post('/tr/admin/user/details', [App\Http\Controllers\TR\Admin\UserController::class, 'get_user_details'])->middleware('role:admin')->name('tr/admin/user/details');

        Route::get('/tr/admin/freelancer/all', [App\Http\Controllers\TR\Admin\UserController::class, 'all_freelancers'])->middleware('role:admin')->name('tr/admin/freelancer/all');
        Route::get('/tr/admin/freelancer/edit/{id}', [App\Http\Controllers\TR\Admin\UserController::class, 'edit'])->middleware('role:admin')->name('tr/admin/freelancer/edit');
        Route::post('/tr/admin/freelancer/save', [App\Http\Controllers\TR\Admin\UserController::class, 'save_freelancer'])->middleware('role:admin')->name('tr/admin/freelancer/save');

        Route::get('/tr/admin/job/all', [App\Http\Controllers\TR\Admin\JobController::class, 'index'])->middleware('role:admin')->name('tr/admin/job/all');
        Route::get('/tr/admin/job/view/{id}', [App\Http\Controllers\TR\Admin\JobController::class, 'edit'])->middleware('role:admin')->name('tr/admin/job/view');
        Route::post('/tr/admin/job/save', [App\Http\Controllers\TR\Admin\JobController::class, 'save'])->middleware('role:admin')->name('tr/admin/job/save');
        Route::post('/tr/admin/job/update', [App\Http\Controllers\TR\Admin\JobController::class, 'update_job'])->middleware('role:admin')->name('tr/admin/job/update');
        Route::get('/tr/admin/job/comment-all', [App\Http\Controllers\TR\Admin\JobController::class, 'index'])->middleware('role:admin')->name('tr/admin/job/comment-all');
        Route::post('/tr/admin/job/comment-save', [App\Http\Controllers\TR\Admin\JobController::class, 'save_comment'])->middleware('role:admin')->name('tr/admin/job/comment-save');

        Route::get('/tr/admin/job/file/{filename}', [App\Http\Controllers\TR\Admin\JobController::class, 'get_file_url'])->middleware('role:admin')->where('filename', '[A-Za-z0-9\-\_\.]+')->name('tr/admin/job/file');

        Route::get('/tr/admin/service-plan/new', [App\Http\Controllers\TR\Admin\ServicePlanController::class, 'add'])->middleware('role:admin')->name('tr/admin/service-plan/new');
        Route::get('/tr/admin/service-plan/all', [App\Http\Controllers\TR\Admin\ServicePlanController::class, 'index'])->middleware('role:admin')->name('tr/admin/service-plan/all');
        Route::get('/tr/admin/service-plan/edit/{id}', [App\Http\Controllers\TR\Admin\ServicePlanController::class, 'edit'])->middleware('role:admin')->name('tr/admin/service-plan/edit');
        Route::post('/tr/admin/service-plan/save', [App\Http\Controllers\TR\Admin\ServicePlanController::class, 'save'])->middleware('role:admin')->name('tr/admin/service-plan/save');

        Route::get('/tr/admin/gst/all', [App\Http\Controllers\TR\Admin\GSTController::class, 'index'])->middleware('role:admin')->name('tr/admin/gst/all');
        Route::get('/tr/admin/gst/edit/{id}', [App\Http\Controllers\TR\Admin\GSTController::class, 'edit'])->middleware('role:admin')->name('tr/admin/gst/edit');
        Route::post('/tr/admin/gst/save', [App\Http\Controllers\TR\Admin\GSTController::class, 'save_gst'])->middleware('role:admin')->name('tr/admin/gst/save');

        Route::get('/tr/admin/comments', [App\Http\Controllers\TR\Admin\CommentController::class, 'index'])->middleware('role:admin')->name('tr.comments.index');
        Route::get('/tr/admin/dashboard/postviews', [App\Http\Controllers\TR\Admin\DashboardController::class, 'post_views'])->middleware('role:admin')->name('tr.dashboard.post_views');

        Route::resource('/tr/admin/page', 'TR\Admin\PageController');
        Route::resource('/tr/admin/service', 'TR\Admin\ServiceController');
        Route::resource('/tr/admin/article', 'TR\Admin\ArticleController'); // TR/Admin/ArticleController
        Route::resource('/tr/admin/video', 'TR\Admin\VideoController'); // TR/Admin/VideoController

        Route::resource('/tr/admin/category', 'TR\Admin\CategoryController');
        Route::resource('/tr/admin/testimonial', 'TR\Admin\TestimonialController');

        Route::resource('/tr/admin/role', 'TR\Admin\RoleController');
        Route::resource('/tr/admin/permission', 'TR\Admin\PermissionController');

    });

    // freelancer routes
    Route::group(['middleware' => 'role:freelancer'], function () {
        Route::get('/tr/freelancer/dashboard', [App\Http\Controllers\TR\Freelancer\DashboardController::class, 'index'])->middleware('role:freelancer')->name('tr/freelancer/dashboard');
        Route::get('/tr/freelancer/job/all', [App\Http\Controllers\TR\Freelancer\JobController::class, 'index'])->middleware('role:freelancer')->name('tr/freelancer/job/all');
        Route::get('/tr/freelancer/job/view/{id}', [App\Http\Controllers\TR\Freelancer\JobController::class, 'edit'])->middleware('role:freelancer')->name('tr/freelancer/job/view');
        Route::post('/tr/freelancer/job/update', [App\Http\Controllers\TR\Freelancer\JobController::class, 'update_job'])->middleware('role:freelancer')->name('tr/freelancer/job/update');
        Route::post('/tr/freelancer/job/comment-save', [App\Http\Controllers\TR\Freelancer\JobController::class, 'save_comment'])->middleware('role:freelancer')->name('tr/freelancer/job/comment-save');

        Route::get('/tr/freelancer/job/file/{filename}', [App\Http\Controllers\TR\Freelancer\JobController::class, 'get_file_url'])->middleware('role:freelancer')->where('filename', '[A-Za-z0-9\-\_\.]+')->name('tr/freelancer/job/file');

        //Route::get('/tr/admin/freelancer/all', [App\Http\Controllers\TR\Admin\UserController::class, 'all_freelancers'])->middleware('role:admin')->name('tr/admin/freelancer/all');
        //Route::get('/tr/admin/user/edit', [App\Http\Controllers\TR\Admin\UserController::class, 'index'])->middleware('role:admin')->name('tr/admin/user/edit');

        //Route::resource('/tr/admin/page', 'TR\Admin\PageController');
        // Route::resource('/tr/admin/service', 'TR\Admin\ServiceController');
        // Route::resource('/tr/admin/article', 'TR\Admin\ArticleController'); // TR/Admin/ArticleController

        //Route::resource('/tr/admin/category', 'TR\Admin\CategoryController');
        //Route::resource('/tr/admin/testimonial', 'TR\Admin\TestimonialController');

        //Route::resource('/tr/admin/role', 'TR\Admin\RoleController');
        //Route::resource('/tr/admin/permission', 'TR\Admin\PermissionController');

    });

});

Route::group(['middleware' => 'auth'], function () {
    // client/user routes
    Route::group(['middleware' => 'role:user'], function () {
        Route::get('/tr/user/dashboard', [App\Http\Controllers\TR\Client\DashboardController::class, 'index'])->middleware('role:user')->name('tr/user/dashboard');
        Route::get('/tr/user/profile', [App\Http\Controllers\TR\Client\DashboardController::class, 'myProfile'])->middleware('role:user')->name('tr/user/profile');
        Route::post('/tr/user/profile/update', [App\Http\Controllers\TR\Client\DashboardController::class, 'updateProfile'])->middleware('role:user')->name('tr/user/profile/update');
        Route::get('/tr/user/un-authorized', [App\Http\Controllers\TR\Client\DashboardController::class, 'unauthorized_access'])->name('tr/user/un-authorized');

        Route::get('/tr/user/itr', [App\Http\Controllers\TR\Client\ITRController::class, 'index'])->middleware('role:user')->name('tr/user/itr');
        Route::get('/tr/user/itr-source/new', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_source'])->middleware('role:user')->name('tr/user/itr-source/new');
        Route::get('/tr/user/itr-source/{id}', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_source'])->middleware('role:user')->name('tr/user/itr-source');
        Route::post('/tr/user/itr-source/save', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_source_save'])->middleware('role:user')->name('tr/user/itr-source/save');

        Route::get('/tr/user/itr-personal-details/{id}', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_personal_details'])->middleware('role:user')->name('tr/user/itr-personal-details');
        Route::post('/tr/user/itr-personal-details/save', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_personal_details_save'])->middleware('role:user')->name('tr/user/itr-personal-details/save');

        Route::get('/tr/user/itr-employment/{id}', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_employment'])->middleware('role:user')->name('tr/user/itr-employment');
        Route::post('/tr/user/itr-employment/save', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_employment_save'])->middleware('role:user')->name('tr/user/itr-employment/save');
        Route::get('/tr/user/itr-business-income/{id}', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_business_income'])->middleware('role:user')->name('tr/user/itr-business-income');
        Route::post('/tr/user/itr-business-income-save', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_business_income_save'])->middleware('role:user')->name('tr/user/itr-business-income/save');

        Route::get('/tr/user/itr-other-income/{id}', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_other_income'])->middleware('role:user')->name('tr/user/itr-other-income');
        Route::post('/tr/user/itr-other-income-save', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_other_income_save'])->middleware('role:user')->name('tr/user/itr-other-income/save');

        Route::get('/tr/user/itr-deductions/{id}', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_deductions'])->middleware('role:user')->name('tr/user/itr-deductions');
        Route::post('/tr/user/itr-deductions/save', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_deductions_save'])->middleware('role:user')->name('tr/user/itr-deductions/save');

        Route::get('/tr/user/itr-bank-details/{id}', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_bank_details'])->middleware('role:user')->name('tr/user/itr-bank-details');
        Route::post('/tr/user/itr-bank-details/save', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_bank_details_save'])->middleware('role:user')->name('tr/user/itr-bank-details/save');

        //Route::get('/tr/user/itr-other-income', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_other_income'])->middleware('role:user')->name('tr/user/itr-other-income');
        Route::get('/tr/user/itr-prepaid-tax/{id}', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_prepaid_tax'])->middleware('role:user')->name('tr/user/itr-prepaid-tax');
        Route::post('/tr/user/itr-prepaid-tax/save', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_prepaid_tax_save'])->middleware('role:user')->name('tr/user/itr-prepaid-tax/save');

        Route::get('/tr/user/itr-itr-details', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_return_type_details'])->middleware('role:user')->name('tr/user/itr-itr-details');
        Route::get('/tr/user/itr-itr-calculate', [App\Http\Controllers\TR\Client\ITRController::class, 'itr_calculation'])->middleware('role:user')->name('tr/user/itr-itr-calculate');
        Route::post('/tr/user/get-template-part', [App\Http\Controllers\TR\Client\ITRController::class, 'load_template_part'])->middleware('role:user')->name('tr/user/get-template-part');
        Route::post('/tr/user/get-cities', [App\Http\Controllers\TR\Client\ITRController::class, 'get_cities'])->middleware('role:user')->name('tr/user/get-cities');

        Route::get('/tr/user/itr-source/form-16/{filename}', [App\Http\Controllers\TR\Client\ITRController::class, 'get_file_url'])->middleware('role:user')->where('filename', '[A-Za-z0-9\-\_\.]+')->name('/tr/user/itr-source/form-16');

        Route::get('/tr/user/gst-registration', [App\Http\Controllers\TR\Client\ITRController::class, 'load_template_part'])->middleware('role:user')->name('tr/user/gst-registration');
        Route::get('/tr/user/gst-return-file', [App\Http\Controllers\TR\Client\GSTController::class, 'index'])->middleware('role:user')->name('tr/user/gst-return-file');
        Route::get('/tr/user/gst-return-file/add', [App\Http\Controllers\TR\Client\GSTController::class, 'add_GST_info'])->middleware('role:user')->name('tr/user/gst-return-file/add');
        Route::get('/tr/user/gst-return-file/edit/{id}', [App\Http\Controllers\TR\Client\GSTController::class, 'edit_GST_info'])->middleware('role:user')->name('tr/user/gst-return-file/edit');
        Route::post('/tr/user/gst-return-file/save', [App\Http\Controllers\TR\Client\GSTController::class, 'save_GST_info'])->middleware('role:user')->name('tr/user/gst-return-file/save');
        Route::get('/tr/user/gst-return-file/view', [App\Http\Controllers\TR\Client\GSTController::class, 'view_GST_info'])->middleware('role:user')->name('tr/user/gst-return-file/view');
        Route::get('/tr/user/gst-return-file/add-bills/{id}', [App\Http\Controllers\TR\Client\GSTController::class, 'add_bills'])->middleware('role:user')->name('tr/user/gst-return-file/add-bills');
        Route::post('/tr/user/gst-return-file/save-bills', [App\Http\Controllers\TR\Client\GSTController::class, 'save_bills'])->middleware('role:user')->name('tr/user/gst-return-file/save-bills');
        Route::get('/tr/user/gst-return-file/view-returns/{id}', [App\Http\Controllers\TR\Client\GSTController::class, 'view_GST_return'])->middleware('role:user')->name('tr/user/gst-return-file/view-returns');

        Route::get('/tr/user/gst-return-file/payment', [App\Http\Controllers\TR\Client\GSTController::class, 'payment'])->middleware('role:user')->name('tr/user/gst-return-file/payment');
        Route::get('/tr/user/gst-return-file/test-payment', [App\Http\Controllers\TR\Client\GSTController::class, 'test_payment'])->middleware('role:user')->name('tr/user/gst-return-file/test-payment');
        Route::post('/tr/user/gst-return-file/back-to-seller', [App\Http\Controllers\TR\Client\GSTController::class, 'back_to_seller'])->middleware('role:user')->name('tr/user/gst-return-file/back-to-seller');
        //Route::get('/tr/user/gst-return-file/back-to-seller', [App\Http\Controllers\TR\Client\GSTController::class, 'back_to_seller'])->middleware('role:user')->name('tr/user/gst-return-file/back-to-seller');
        //Route::post('/tr/user/gst-return-file/cancel-payment', [App\Http\Controllers\TR\Client\GSTController::class, 'back_to_seller'])->middleware('role:user')->name('tr/user/gst-return-file/cancel-payment');

        //Route::get('/tr/user/itr', [App\Http\Controllers\TR\Admin\UserController::class, 'all_freelancers'])->middleware('role:user')->name('tr/user/itr');
        //Route::get('/tr/user/gst', [App\Http\Controllers\TR\Admin\UserController::class, 'index'])->middleware('role:user')->name('tr/user/gst');

    });
});

/* TR routes --end */

Route::group(['prefix' => 'admin', 'middleware' => ['role:super-admin|admin']], function () {

    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::resource('permissions', 'Admin\PermissionsController');
    });

    Route::resource('roles', 'Admin\RolesController');
    Route::resource('users', 'Admin\UsersController');
    Route::get('freelancers', 'Admin\UsersController@freelancers')->name('user.freelancers');
    Route::resource('pages', 'Admin\PagesController');
    Route::resource('articles', 'Admin\ArticlesController');
    //Route::resource('testimonial', 'Admin\TestimonialController');
    Route::resource('ourteam', 'Admin\OurTeam');
    Route::get('login-activities', [
        'as' => 'login-activities',
        'uses' => 'Admin\UsersController@indexLoginLogs',
    ]);

    //for ticket view in
    Route::get('tickets', 'Admin\TicketsController@index')->name('tickets.index');
    Route::post('close_ticket/{ticket_id}', 'Admin\TicketsController@close');
    Route::get('tickets/{ticket_id}', 'Admin\TicketsController@show')->name('tickets.show');
    Route::post('comment', 'Admin\CommentsController@postComment')->name('tickets.reply.comment');

    //routes for freelancer
    Route::get('freelancer-list', [FreeLancerController::class, 'index'])->name('freelancer.index');
    Route::get('freelancer-show/{id}', [FreeLancerController::class, 'show'])->name('freelancer.show');
    Route::get('freelancer/{id}', [FreeLancerController::class, 'freelancer_view'])->name('freelancer.view');
    Route::post('freelancer-assign', [FreeLancerController::class, 'assign'])->name('freelancer.assign');

});

Route::group(['middleware' => ['role:user']], function () {
});

Route::group(['prefix' => 'auth', 'middleware' => ['auth']], function () {
    Route::resource('profile', 'Users\ProfileController');
    Route::resource('subscriptions', 'Admin\SubscriptionController');
    // Route::get('subscriptionDetails', [SubsPaymentController::class, 'subscriptionDetails'])->name('subscriptionDetails');

});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@myAccount')->name('home');

    Route::resource('plans', 'Admin\Plans\PlanController');
    Route::resource('features', 'Admin\Plans\FeatureController');
    Route::resource('categories', 'Admin\CategoriesController');
    Route::resource('services', 'Admin\ServiceController');
    Route::resource('newsletter', 'Admin\NewsletterController');
});

Route::group(['prefix' => 'tickets', 'middleware' => 'auth'], function () {
    //for ticket
    //for ticket

    Route::get('new-ticket', 'Admin\TicketsController@create')->name('tickets.create');
    Route::post('new-ticket', 'Admin\TicketsController@store')->name('tickets.store');
    Route::get('my-tickets', 'Admin\TicketsController@userTickets')->name('tickets.userTickets');
});

Auth::routes();

Route::get('category-tree-view', [CategoryController::class, 'manageCategory'])->name('category-tree-view');
Route::post('add-category', [CategoryController::class, 'addCategory'])->name('add.category');

//subscription
Route::get('subscription', [SubsPaymentController::class, 'subscription'])->name('subscription');

//forms
Route::get('gst-application-form', [FormController::class, 'gstform'])->name('gstform');
Route::post('gst-application-form', [FormController::class, 'gstsubmit'])->name('gstsubmit');
Route::get('msme-form', [FormController::class, 'memeForm'])->name('memeform');
Route::post('msme-form', [FormController::class, 'msmeform_submit'])->name('msmeform.save');
Route::get('income-tax-return', [FormController::class, 'income_tax_return'])->name('income.tax.return')->middleware('auth');
Route::post('income-tax-return', [FormController::class, 'income_tax_return_submit'])->name('income.tax.return.submit')->middleware('auth');
Route::get('insta-efiling', [FormController::class, 'insta_efiling'])->name('insta.efiling')->middleware('auth');
Route::post('insta-efiling', [FormController::class, 'insta_efiling_submit'])->name('insta.efiling.submit')->middleware('auth');

Route::post('paymentGate', [SubsPaymentController::class, 'paymentGate'])->name('paymentGate');
Route::get('afterpayment', [SubsPaymentController::class, 'afterpayment'])->name('afterpayment');

//for indipaycheck not in use------------
Route::get('checkGateway', [SubsPaymentController::class, 'checkGateway'])->name('checkGateway');

//chekout and payment--------
// Route::post('indipay/response', [HomeController::class, 'response'])->name('response');
//Route::get('ccavanuerequest', [HomeController::class, 'ccavanuerequest'])->name('ccavanuerequest');
Route::get('payment', [SubsPaymentController::class, 'payment'])->name('payment')->middleware('auth');
Route::post('ccavRequestHandler', [SubsPaymentController::class, 'ccavRequestHandler'])->name('ccavRequestHandler');
Route::post('indipay/response', [SubsPaymentController::class, 'paymentResponse'])->name('paymentResponse');
Route::post('service-form-query', [SubsPaymentController::class, 'serviceFormQuery'])->name('serviceFormQuery');

//freelancer Registration
Route::post('check-ifsc', [RegisterController::class, 'check_ifsc'])->name('check_ifsc');
Route::get('register-freelancer', [RegisterController::class, 'freelancer_register'])->name('freelancer.register');
Route::post('register-freelancer', [RegisterController::class, 'freelancer_register_save'])->name('freelancer.register.save');

//freelancer tasks functionality
Route::get('freelancer-tasks', [FreeLancerController::class, 'tasks'])->name('freelancer.tasks');
Route::get('freelancer-tasks/{id}', [FreeLancerController::class, 'show_task'])->name('freelancer.show.task');

Route::get('payu-money-process', [
    'as' => 'payu-money-process',
    'uses' => 'PayuMoneyController@PayuMoneyProcess',
]);

Route::get('payu-money-response', [
    'as' => 'payu-money-response',
    'uses' => 'PayuMoneyController@PayuMoneyResponse',
]);

Route::get('payu-money-cancel', [
    'as' => 'payu-money-cancel',
    'uses' => 'PayuMoneyController@PayuMoneyCancel',
]);

Route::get('payu-money-failed', [
    'as' => 'payu-money-failed',
    'uses' => 'PayuMoneyController@PayuMoneyFailed',
]);

// dashboard subscription for user
Route::get('subscriptionDetails', [SubsPaymentController::class, 'subscriptionDetails'])->name('subscriptionDetails');
Route::get('subscription-details-show/{id}', [SubsPaymentController::class, 'subscription_details_show'])->name('subscription.details.show');
Route::get('subscription-details-download/{id}', [SubsPaymentController::class, 'subscription_details_download'])->name('subscription.details.download');
Route::post('subsdelete', [SubsPaymentController::class, 'subsdelete'])->name('subsdelete');
Route::get('subscription-incometaxreturn-form1616a/{id}', [SubsPaymentController::class, 'incometaxreturn_form1616a'])->name('incometaxreturn.form1616a');
Route::get('subscription-incometaxreturn-other-document/{id}', [SubsPaymentController::class, 'incometaxreturn_other_document'])->name('incometaxreturn.other.document');
Route::get('subscription-insta-document/{id}', [SubsPaymentController::class, 'insta_document_download'])->name('insta.document.download');

//

//home page form
Route::get('insta-tax-return-list', [FormListingController::class, 'insta_tax_return_list'])->name('insta.tax.return.list');
Route::get('insta-tax-return-show/{id}', [FormListingController::class, 'insta_tax_return_show'])->name('insta.tax.return.show');
Route::get('insta-tax-return-show2/{id}', [FormListingController::class, 'insta_tax_return_show2'])->name('insta.tax.return.show2');
Route::get('insta-tax-return-download/{id}', [FormListingController::class, 'insta_tax_return_download'])->name('insta.tax.return.download');
//assignto freelancer
Route::get('insta-assign-to-freelancer/{planId}', [AssignFreelancerController::class, 'index'])->name('assign.to.freelancer.index');
Route::get('insta-assign-to-freelancer-done/{id}', [AssignFreelancerController::class, 'assign'])->name('assign.to.freelancer.assign');

//income tax return
Route::get('income-tax-return-list', [FormListingController::class, 'income_tax_return_list'])->name('income.tax.return.list');
Route::get('income-tax-return-show/{id}', [FormListingController::class, 'income_tax_return_show'])->name('income.tax.return.show');
Route::get('income-tax-return-show2/{id}', [FormListingController::class, 'income_tax_return_show2'])->name('income.tax.return.show2');
Route::get('income-tax-return-form16/{id}', [FormListingController::class, 'income_tax_return_form16'])->name('income.tax.return.form16');
Route::get('income-tax-return-document/{id}', [FormListingController::class, 'income_tax_return_document'])->name('income.tax.return.document');
//assignto freelancer incometax
Route::get('incometax-assign-to-freelancer/{planId}', [AssignFreelancerController::class, 'incometax_index'])->name('incometax.assign.to.freelancer.index');
Route::get('incometax-assign-to-freelancer-done/{id}', [AssignFreelancerController::class, 'incometax_assign'])->name('incometax.assign.to.freelancer.assign');

//freelancer see the projects
Route::get('freelancer-project', [FreeLancerController::class, 'index'])->name('freelancer.project');
Route::get('freelancer-project-show/{id}', [FreeLancerController::class, 'show'])->name('freelancer.project.show');
Route::get('freelancer-project-show2/{id}', [FreeLancerController::class, 'show2'])->name('freelancer.project.show2');
Route::post('freelancer-work-upload', [FreeLancerController::class, 'work_upload'])->name('freelancer.work.upload');
Route::post('freelancer-status-update', [FreeLancerController::class, 'status_update'])->name('freelancer.status.update');

//routes for incometaxreturn proeject
Route::get('freelancer-incometaxreturn', [FreeLancerController::class, 'index_incometaxreturn'])->name('freelancer.project.incometaxreturn');
Route::get('freelancer-project-show-incometaxreturn/{id}', [FreeLancerController::class, 'show_incometaxreturn'])->name('freelancer.project.show.incometaxreturn');
Route::get('freelancer-project-show2-incometaxreturn/{id}', [FreeLancerController::class, 'show2_incometaxreturn'])->name('freelancer.project.show2.incometaxreturn');

Route::get('freelancer-project-download-incometaxreturn/{id}', [FreeLancerController::class, 'download_incometaxreturn'])->name('freelancer.project.download.incometaxreturn');
Route::get('freelancer-project-download2-incometaxreturn/{id}', [FreeLancerController::class, 'download2_incometaxreturn'])->name('freelancer.project.download2.incometaxreturn');

Route::post('freelancer-form1616a-upload-incometaxreturn', [FreeLancerController::class, 'form1616a_upload_incometaxreturn'])->name('freelancer.form1616a.upload.incometaxreturn');
Route::post('freelancer-otherdocument-upload-incometaxreturn', [FreeLancerController::class, 'otherdocument_upload_incometaxreturn'])->name('freelancer.otherdocument.upload.incometaxreturn');
Route::post('freelancer-incometaxreturn-status-update', [FreeLancerController::class, 'incometaxreturn_status_update'])->name('incometaxreturn.freelancer.status.update');

Route::get('/send-test-mail', function () {
    $data = ['name' => 'prateek'];
    Mail::send('emails.test', ['ngo' => $data], function ($message) use ($data) {
        $message->sender('taxring@getnada.com', 'Donatify');
        $message->subject('Donatify');
        $message->to("ksharma.sharma27@gmail.com");
    });
    return "yes";

})->name('send.test.mail');