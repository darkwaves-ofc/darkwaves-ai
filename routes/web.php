<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDavinciController;
use App\Http\Controllers\Admin\DavinciConfigController;
use App\Http\Controllers\Admin\CustomTemplateController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\Admin\FinanceSubscriptionPlanController;
use App\Http\Controllers\Admin\FinancePrepaidPlanController;
use App\Http\Controllers\Admin\ReferralSystemController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\FinanceSettingController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\InstallController;
use App\Http\Controllers\Admin\UpdateController;
use App\Http\Controllers\Admin\Frontend\AppearanceController;
use App\Http\Controllers\Admin\Frontend\FrontendController;
use App\Http\Controllers\Admin\Frontend\BlogController;
use App\Http\Controllers\Admin\Frontend\PageController;
use App\Http\Controllers\Admin\Frontend\FAQController;
use App\Http\Controllers\Admin\Frontend\ReviewController;
use App\Http\Controllers\Admin\Frontend\AdsenseController;
use App\Http\Controllers\Admin\Settings\GlobalController;
use App\Http\Controllers\Admin\Settings\BackupController;
use App\Http\Controllers\Admin\Settings\OAuthController;
use App\Http\Controllers\Admin\Settings\ActivationController;
use App\Http\Controllers\Admin\Settings\SMTPController;
use App\Http\Controllers\Admin\Settings\RegistrationController;
use App\Http\Controllers\Admin\Settings\UpgradeController;
use App\Http\Controllers\Admin\Settings\ClearCacheController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\User\UserPasswordController;
use App\Http\Controllers\User\TemplateController;
use App\Http\Controllers\User\ImageController;
use App\Http\Controllers\User\PurchaseHistoryController;
use App\Http\Controllers\User\WorkbookController;
use App\Http\Controllers\User\DocumentController;
use App\Http\Controllers\User\PlanController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ReferralController;
use App\Http\Controllers\User\UserSupportController;
use App\Http\Controllers\User\UserNotificationController;
use App\Http\Controllers\User\SearchController;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now reate something great!
|
*/

// AUTH ROUTES
Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    require __DIR__.'/auth.php';
});

// FRONTEND ROUTES
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/blog/{slug}', 'blogShow')->name('blogs.show');
    Route::post('/contact', 'contact')->name('contact');
    Route::get('/terms-and-conditions', 'termsAndConditions')->name('terms');
    Route::get('/privacy-policy', 'privacyPolicy')->name('privacy');
});

// INSTALL ROUTES
Route::group(['prefix' => 'install', 'middleware' => 'install'], function() {
    Route::controller(InstallController::class)->group(function () {
        Route::get('/', 'index')->name('install');
        Route::get('/requirements', 'requirements')->name('install.requirements');
        Route::get('/permissions', 'permissions')->name('install.permissions');
        Route::get('/database', 'database')->name('install.database');    
        Route::post('/database', 'storeDatabaseCredentials')->name('install.database.store');
        Route::get('/activation', 'activation')->name('install.activation');    
        Route::post('/activation', 'activateApplication')->name('install.activation.activate');
    });
});

// LOCALE ROUTES
Route::get('/locale/{lang}', [LocaleController::class, 'language'])->name('locale');

// UPDATE ROUTE
Route::get('/update/now', [UpdateController::class, 'updateDatabase']);


// ADMIN ROUTES
Route::group(['prefix' => 'admin', 'middleware' => ['verified', '2fa.verify', 'role:admin', 'PreventBackHistory']], function() {

    // ADMIN DASHBOARD ROUTES
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // ADMIN DAVINCI MANAGEMENT ROUTES
    Route::controller(AdminDavinciController::class)->group(function() {
        Route::get('/davinci/dashboard', 'index')->name('admin.davinci.dashboard'); 
        Route::get('/davinci/templates', 'templates')->name('admin.davinci.templates');
        Route::post('/davinci/templates/template/update', 'descriptionUpdate');  
        Route::post('/davinci/templates/template/activate', 'templateActivate');   
        Route::post('/davinci/templates/template/deactivate', 'templateDeactivate');  
        Route::post('/davinci/templates/template/makepro', 'assignProPackage');  
        Route::post('/davinci/templates/template/removepro', 'removeProPackage');  
        Route::post('/davinci/templates/template/delete', 'deleteTemplate');  
        Route::get('/davinci/templates/activate/all', 'templateActivateAll'); 
        Route::get('/davinci/templates/deactivate/all', 'templateDeactivateAll'); 
    }); 
    
    // ADMIN DAVINCI CONFIGURATION ROUTES
    Route::controller(DavinciConfigController::class)->group(function() {
        Route::get('/davinci/configs', 'index')->name('admin.davinci.configs');
        Route::post('/davinci/configs', 'store')->name('admin.davinci.configs.store');
    }); 

    // ADMIN DAVINCI CUSTOM TEMPLATES ROUTES
    Route::controller(CustomTemplateController::class)->group(function() {
        Route::get('/davinci/custom', 'index')->name('admin.davinci.custom');
        Route::post('/davinci/custom', 'store')->name('admin.davinci.custom.store');
    }); 

    // ADMIN USER MANAGEMENT ROUTES
    Route::controller(AdminUserController::class)->group(function() {
        Route::get('/users/dashboard', 'index')->name('admin.user.dashboard');
        Route::get('/users/activity', 'activity')->name('admin.user.activity');
        Route::get('/users/list', 'listUsers')->name('admin.user.list');        
        Route::post('/users', 'store')->name('admin.user.store');
        Route::get('/users/create', 'create')->name('admin.user.create');        
        Route::get('/users/{user}/show', 'show')->name('admin.user.show');
        Route::get('/users/{user}/edit', 'edit')->name('admin.user.edit');
        Route::get('/users/{user}/credit', 'credit')->name('admin.user.credit');
        Route::post('/users/{user}/increase', 'increase')->name('admin.user.increase');
        Route::put('/users/{user}/update', 'update')->name('admin.user.update');
        Route::put('/users/{user}', 'change')->name('admin.user.change');       
        Route::post('/users/delete', 'delete');
    }); 

    // ADMIN FINANCE - DASHBOARD & TRANSACTIONS & SUBSCRIPTION LIST ROUTES
    Route::controller(FinanceController::class)->group(function() {
        Route::get('/finance/dashboard', 'index')->name('admin.finance.dashboard');
        Route::get('/finance/transactions', 'listTransactions')->name('admin.finance.transactions');
        Route::put('/finance/transaction/{id}/update', 'update')->name('admin.finance.transaction.update');
        Route::get('/finance/transaction/{id}/show', 'show')->name('admin.finance.transaction.show');
        Route::get('/finance/transaction/{id}/edit', 'edit')->name('admin.finance.transaction.edit');
        Route::post('/finance/transaction/delete', 'delete');
        Route::get('/finance/subscriptions', 'listSubscriptions')->name('admin.finance.subscriptions');
    });

    // ADMIN FINANCE - CANCEL USER SUBSCRIPTION
    Route::post('/finance/subscriptions/cancel', [PaymentController::class, 'stopSubscription']);

    // ADMIN FINANCE - SUBSCRIPTION PLAN ROUTES
    Route::controller(FinanceSubscriptionPlanController::class)->group(function() {
        Route::get('/finance/plans', 'index')->name('admin.finance.plans');
        Route::post('/finance/plans', 'store')->name('admin.finance.plan.store');
        Route::get('/finance/plan/create', 'create')->name('admin.finance.plan.create');
        Route::get('/finance/plan/{id}/show', 'show')->name('admin.finance.plan.show');        
        Route::get('/finance/plan/{id}/edit', 'edit')->name('admin.finance.plan.edit');
        Route::put('/finance/plan/{id}', 'update')->name('admin.finance.plan.update');
        Route::post('/finance/plan/delete', 'delete');
    });

    // ADMIN FINANCE - PREPAID PLAN ROUTES
    Route::controller(FinancePrepaidPlanController::class)->group(function() {
        Route::get('/finance/prepaid', 'index')->name('admin.finance.prepaid');
        Route::post('/finance/prepaid', 'store')->name('admin.finance.prepaid.store');
        Route::get('/finance/prepaid/create', 'create')->name('admin.finance.prepaid.create');
        Route::get('/finance/prepaid/{id}/show', 'show')->name('admin.finance.prepaid.show');        
        Route::get('/finance/prepaid/{id}/edit', 'edit')->name('admin.finance.prepaid.edit');
        Route::put('/finance/prepaid/{id}', 'update')->name('admin.finance.prepaid.update');
        Route::post('/finance/prepaid/delete', 'delete');
    });

    // ADMIN FINANCE - REFERRAL ROUTES
    Route::controller(ReferralSystemController::class)->group(function() {
        Route::get('/referral/settings', 'index')->name('admin.referral.settings');
        Route::post('/referral/settings', 'store')->name('admin.referral.settings.store');
        Route::get('/referral/{order_id}/show', 'paymentShow')->name('admin.referral.show');
        Route::get('/referral/payouts', 'payouts')->name('admin.referral.payouts');
        Route::get('/referral/payouts/{id}/show', 'payoutsShow')->name('admin.referral.payouts.show');
        Route::put('/referral/payouts/{id}/store', 'payoutsUpdate')->name('admin.referral.payouts.update');
        Route::get('/referral/payouts/{id}/cancel', 'payoutsCancel')->name('admin.referral.payouts.cancel');
        Route::delete('/referral/payouts/{id}/decline', 'payoutsDecline')->name('admin.referral.payouts.decline');
        Route::get('/referral/top', 'topReferrers')->name('admin.referral.top');
    });

    // ADMIN FINANCE - INVOICE SETTINGS
    Route::controller(InvoiceController::class)->group(function() {
        Route::get('/settings/invoice', 'index')->name('admin.settings.invoice');
        Route::post('/settings/invoice', 'store')->name('admin.settings.invoice.store');
    });

    // ADMIN FINANCE SETTINGS ROUTES
    Route::controller(FinanceSettingController::class)->group(function() {
        Route::get('/finance/settings', 'index')->name('admin.finance.settings');
        Route::post('/finance/settings', 'store')->name('admin.finance.settings.store');
    });

    // ADMIN SUPPORT ROUTES
    Route::controller(SupportController::class)->group(function() {
        Route::get('/support', 'index')->name('admin.support');
        Route::get('/support/{ticket_id}/show', 'show')->name('admin.support.show');        
        Route::post('/support/response', 'response')->name('admin.support.response');
        Route::post('/support/delete', 'delete');
        
    });

    // ADMIN NOTIFICATION ROUTES
    Route::controller(NotificationController::class)->group(function() {
        Route::get('/notifications', 'index')->name('admin.notifications');
        Route::get('/notifications/sytem', 'system')->name('admin.notifications.system');
        Route::get('/notifications/create', 'create')->name('admin.notifications.create');
        Route::post('/notifications', 'store')->name('admin.notifications.store');
        Route::get('/notifications/{id}/show', 'show')->name('admin.notifications.show');
        Route::get('/notifications/system/{id}/show', 'systemShow')->name('admin.notifications.systemShow');
        Route::get('/notifications/mark-all', 'markAllRead')->name('admin.notifications.markAllRead');
        Route::get('/notifications/delete-all', 'deleteAll')->name('admin.notifications.deleteAll');
        Route::post('/notifications/delete', 'delete'); 
    });
    
    // ADMIN GENERAL SETTINGS - GLOBAL SETTINGS
    Route::controller(GlobalController::class)->group(function() {
        Route::get('/settings/global', 'index')->name('admin.settings.global');
        Route::post('/settings/global', 'store')->name('admin.settings.global.store');
    });

    // ADMIN GENERAL SETTINGS - DATABASE BACKUP
    Route::controller(BackupController::class)->group(function() {
        Route::get('/settings/backup', 'index')->name('admin.settings.backup');
        Route::get('/settings/backup/create', 'create')->name('admin.settings.backup.create');
        Route::get('/settings/backup/{file_name}', 'download')->name('admin.settings.backup.download');
        Route::get('/settings/backup/{file_name}/delete', 'destroy')->name('admin.settings.backup.delete');
    });

    // ADMIN GENERAL SETTINGS - SMTP SETTINGS
    Route::controller(SMTPController::class)->group(function() {
        Route::post('/settings/smtp/test', 'test')->name('admin.settings.smtp.test');
        Route::get('/settings/smtp', 'index')->name('admin.settings.smtp');
        Route::post('/settings/smtp', 'store')->name('admin.settings.smtp.store');  
    });      

    // ADMIN GENERAL SETTINGS - REGISTRATION SETTINGS
    Route::controller(RegistrationController::class)->group(function() {
        Route::get('/settings/registration', 'index')->name('admin.settings.registration');
        Route::post('/settings/registration', 'store')->name('admin.settings.registration.store');
    });

    // ADMIN GENERAL SETTINGS - OAUTH SETTINGS
    Route::controller(OAuthController::class)->group(function() {
        Route::get('/settings/oauth', 'index')->name('admin.settings.oauth');
        Route::post('/settings/oauth', 'store')->name('admin.settings.oauth.store');
    });

    // ADMIN GENERAL SETTINGS - ACTIVATION SETTINGS
    Route::controller(ActivationController::class)->group(function() {
        Route::get('/settings/activation', 'index')->name('admin.settings.activation');
        Route::post('/settings/activation', 'store')->name('admin.settings.activation.store');
        Route::get('/settings/activation/remove', 'remove')->name('admin.settings.activation.remove');
        Route::delete('/settings/activation/destroy', 'destroy')->name('admin.settings.activation.destroy');
        Route::get('/settings/activation/manual', 'showManualActivation')->name('admin.settings.activation.manual');
        Route::post('/settings/activation/manual', 'storeManualActivation')->name('admin.settings.activation.manual.store');
    });

    // ADMIN FRONTEND SETTINGS - APPEARANCE SETTINGS
    Route::controller(AppearanceController::class)->group(function() {
        Route::get('/settings/appearance', 'index')->name('admin.settings.appearance');
        Route::post('/settings/appearance', 'store')->name('admin.settings.appearance.store');
    });

    // ADMIN FRONTEND SETTINGS - FRONTEND SETTINGS
    Route::controller(FrontendController::class)->group(function() {
        Route::get('/settings/frontend', 'index')->name('admin.settings.frontend');
        Route::post('/settings/frontend', 'store')->name('admin.settings.frontend.store');
    });

    // ADMIN FRONTEND SETTINGS - BLOG MANAGER
    Route::controller(BlogController::class)->group(function() {
        Route::get('/settings/blog', 'index')->name('admin.settings.blog');
        Route::get('/settings/blog/create', 'create')->name('admin.settings.blog.create');
        Route::post('/settings/blog', 'store')->name('admin.settings.blog.store');   
        Route::put('/settings/blogs/{id}', 'update')->name('admin.settings.blog.update');		
        Route::get('/settings/blogs/{id}/edit', 'edit')->name('admin.settings.blog.edit');        
        Route::post('/settings/blog/delete', 'delete');
    });

    // ADMIN FRONTEND SETTINGS - FAQ MANAGER
    Route::controller(FAQController::class)->group(function() {
        Route::get('/settings/faq', 'index')->name('admin.settings.faq');
        Route::get('/settings/faq/create', 'create')->name('admin.settings.faq.create');        
        Route::post('/settings/faq', 'store')->name('admin.settings.faq.store');   
        Route::put('/settings/faqs/{id}', 'update')->name('admin.settings.faq.update');		
        Route::get('/settings/faqs/{id}/edit', 'edit')->name('admin.settings.faq.edit');        
        Route::post('/settings/faq/delete', 'delete');
    });

    // ADMIN FRONTEND SETTINGS - REVIEW MANAGER
    Route::controller(ReviewController::class)->group(function() {
        Route::get('/settings/review', 'index')->name('admin.settings.review');
        Route::get('/settings/review/create', 'create')->name('admin.settings.review.create');
        Route::post('/settings/review', 'store')->name('admin.settings.review.store');   
        Route::put('/settings/reviews/{id}', 'update')->name('admin.settings.review.update');		
        Route::get('/settings/reviews/{id}/edit', 'edit')->name('admin.settings.review.edit');        
        Route::post('/settings/review/delete', 'delete');
    });

    // ADMIN FRONTEND SETTINGS - GOOGLE ADSENSE
    Route::controller(AdsenseController::class)->group(function() {
        Route::get('/settings/adsense', 'index')->name('admin.settings.adsense');  
        Route::put('/settings/adsense/{id}', 'update')->name('admin.settings.adsense.update');		
        Route::get('/settings/adsense/{id}/edit', 'edit')->name('admin.settings.adsense.edit');        
    });
    
    // ADMIN FRONTEND SETTINGS - PAGE MANAGER (PRIVACY & TERMS) 
    Route::controller(PageController::class)->group(function() {
        Route::get('/settings/terms', 'index')->name('admin.settings.terms');
        Route::post('/settings/terms', 'store')->name('admin.settings.terms.store');
    });

    // ADMIN GENERAL SETTINGS - UPGRADE SOFTWARE
    Route::controller(UpgradeController::class)->group(function() {
        Route::get('/settings/upgrade', 'index')->name('admin.settings.upgrade');
        Route::post('/settings/upgrade', 'upgrade')->name('admin.settings.upgrade.start');
    });

    // ADMIN GENERAL SETTINGS - CLEAR CACHE
    Route::controller(ClearCacheController::class)->group(function() {
        Route::get('/settings/clear', 'index')->name('admin.settings.clear');
        Route::post('/settings/clear/clear', 'cache')->name('admin.settings.clear.cache');
        Route::post('/settings/clear/symlink', 'symlink')->name('admin.settings.clear.symlink');
    });


});
  
    
// REGISTERED USER ROUTES
Route::group(['prefix' => 'user', 'middleware' => ['verified', '2fa.verify', 'role:user|admin|subscriber', 'PreventBackHistory']], function() {

    // USER DASHBOARD ROUTES
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');  
    Route::post('/dashboard/favorite', [UserDashboardController::class, 'favorite']);    
    Route::post('/dashboard/favoritecustom', [UserDashboardController::class, 'favoriteCustom']);    

    Route::controller(PaymentController::class)->group(function() {
        Route::post('/subscription/stop/{id}', 'stopSubscription');
    });
    
    // USER TEMPLATE ROUTES
    Route::controller(TemplateController::class)->group(function () {
        Route::get('/templates', 'index')->name('user.templates');       
        Route::post('/templates/process', 'process');     
        Route::post('/templates/custom-template/process', 'processCustom');     
        Route::post('/templates/save', 'save');     
        Route::post('/templates/favorite', 'favorite');     
        Route::post('/templates/favoritecustom', 'favoriteCustom');     
        Route::post('/templates/custom-template/favorite', 'favoriteCustom');     
        Route::get('/templates/article-generator', 'viewArticleGenerator');
        Route::get('/templates/paragraph-generator', 'viewParagraphGenerator');
        Route::get('/templates/pros-and-cons', 'viewProsAndCons');
        Route::get('/templates/talking-points', 'viewTalkingPoints');
        Route::get('/templates/summarize-text', 'viewSummarizeText');
        Route::get('/templates/product-description', 'viewProductDescription');
        Route::get('/templates/startup-name-generator', 'viewStartupNameGenerator');
        Route::get('/templates/product-name-generator', 'viewProductNameGenerator');
        Route::get('/templates/meta-description', 'viewMetaDescription');
        Route::get('/templates/faqs', 'viewFAQs');
        Route::get('/templates/faq-answers', 'viewFAQAnswers');
        Route::get('/templates/testimonials', 'viewTestimonials');
        Route::get('/templates/blog-titles', 'viewBlogTitles');
        Route::get('/templates/blog-section', 'viewBlogSection');
        Route::get('/templates/blog-ideas', 'viewBlogIdeas');
        Route::get('/templates/blog-intros', 'viewBlogIntros');
        Route::get('/templates/blog-conclusion', 'viewBlogConclusion');
        Route::get('/templates/content-rewriter', 'viewContentRewriter');
        Route::get('/templates/facebook-ads', 'viewFacebookAds');
        Route::get('/templates/video-descriptions', 'viewVideoDescriptions');
        Route::get('/templates/video-titles', 'viewVideoTitles');
        Route::get('/templates/youtube-tags-generator', 'viewYoutubeTagsGenerator');
        Route::get('/templates/instagram-captions', 'viewInstagramCaptions');
        Route::get('/templates/instagram-hashtags', 'viewInstagramHashtagsGenerator');
        Route::get('/templates/social-post-personal', 'viewSocialPostPersonal');
        Route::get('/templates/social-post-business', 'viewSocialPostBusiness');
        Route::get('/templates/facebook-headlines', 'viewFacebookHeadlines');
        Route::get('/templates/google-headlines', 'viewGoogleAdsHeadlines');
        Route::get('/templates/google-ads', 'viewGoogleAdsDescription');
        Route::get('/templates/problem-agitate-solution', 'viewPAS');
        Route::get('/templates/academic-essay', 'viewAcademicEssay');
        Route::get('/templates/email-welcome', 'viewWelcomeEmail');
        Route::get('/templates/email-cold', 'viewColdEmail');
        Route::get('/templates/email-follow-up', 'viewFollowUpEmail');
        Route::get('/templates/creative-stories', 'viewCreativeStories');
        Route::get('/templates/grammar-checker', 'viewGrammarChecker');
        Route::get('/templates/cv-generator', 'viewCVGenerator');
        Route::get('/templates/cover-letter', 'viewCoverLetter');
        Route::get('/templates/2nd-grader', 'viewSummarize2ndGrader');
        Route::get('/templates/video-scripts', 'viewVideoScripts');
        Route::get('/templates/amazon-product', 'viewAmazonProduct');
        Route::get('/templates/custom-template/{code}', 'viewCustomTemplate');
    });

    // USER AI IMAGE ROUTES
    Route::controller(ImageController::class)->group(function () {
        Route::get('/images', 'index')->name('user.images');      
        Route::post('/images/process', 'process');         
        Route::post('/images/view', 'view');         
        Route::post('/images/delete', 'delete');
    });

    // USER DOCUMENT ROUTES
    Route::controller(DocumentController::class)->group(function() { 
        Route::get('/document', 'index')->name('user.documents');
        Route::post('/document', 'store');
        Route::get('/document/images', 'images')->name('user.documents.images');
        Route::post('/document/result/delete', 'delete');   
        Route::get('/document/result/{id}/show', 'show')->name('user.documents.show');
    });

    // USER WORKBOOK ROUTES
    Route::controller(WorkbookController::class)->group(function() { 
        Route::get('/workbook', 'index')->name('user.workbooks');
        Route::post('/workbook', 'store');
        Route::post('/workbook/result/delete', 'delete');
        Route::get('/workbook/change', 'change')->name('user.workbooks.change');        
        Route::get('/workbook/result/{id}/show', 'show')->name('user.workbooks.show');
        Route::put('/workbook', 'update')->name('user.workbooks.update');
        Route::delete('/workbook', 'destroy')->name('user.workbooks.delete');
    });

    // CHANGE USER PASSWORD ROUTES
    Route::controller(UserPasswordController::class)->group(function() {
        Route::get('/profile/security', 'index')->name('user.security');
        Route::post('/profile/security/password/{id}', 'update')->name('user.security.password');
        Route::get('/profile/security/2fa', 'google')->name('user.security.2fa');
        Route::post('/profile/security/2fa/activate', 'activate2FA')->name('user.security.2fa.activate');
        Route::post('/profile/security/2fa/deactivate', 'deactivate2FA')->name('user.security.2fa.deactivate');
    });

    // USER PROFILE ROUTES
    Route::controller(UserController::class)->group(function () {
        Route::get('/profile', 'index')->name('user.profile');
        Route::put('/profile/{user}', 'update')->name('user.profile.update');
        Route::post('/profile/project', 'updateProject')->name('user.profile.project');
        Route::get('/profile/edit', 'edit')->name('user.profile.edit');     
    });      
    
    Route::controller(PaymentController::class)->group(function() {
        Route::post('/subscriptions/cancel', 'stopSubscription');
    });

    // USER PURCHASE HISTORY ROUTES
    Route::controller(PurchaseHistoryController::class)->group(function () {     
        Route::get('/purchases', 'index')->name('user.purchases');        
        Route::get('/purchases/show/{id}', 'show')->name('user.purchases.show');
        Route::get('/purchases/subscriptions', 'subscriptions')->name('user.purchases.subscriptions');   
    });

    // USER PRICING PLAN ROUTES
    Route::controller(PlanController::class)->group(function () {
        Route::get('/pricing/plans', 'index')->name('user.plans');
        Route::get('/pricing/plan/subscription/{id}', 'subscribe')->name('user.plan.subscribe')->middleware('unsubscribed'); 
        Route::get('/pricing/plan/lifetime/{id}', 'checkout')->name('user.prepaid.checkout'); 
    });      

    // USER PAYMENT ROUTES
    Route::controller(PaymentController::class)->group(function() {
        Route::post('/payments/pay/{id}', 'pay')->name('user.payments.pay')->middleware('unsubscribed');
        Route::post('/payments/pay/prepaid/{id}', 'payPrePaid')->name('user.payments.pay.prepaid');
        Route::post('/payments/approved/razorpay', 'approvedRazorpayPrepaid')->name('user.payments.approved.razorpay');
        Route::get('/payments/success/braintree', 'braintreeSuccess')->name('user.payments.approved.braintree'); 
        Route::get('/payments/approved', 'approved')->name('user.payments.approved');               
        Route::get('/payments/cancelled', 'cancelled')->name('user.payments.cancelled');
        Route::post('/payments/subscription/razorpay', 'approvedRazorpaySubscription')->name('user.payments.subscription.razorpay');
        Route::get('/payments/subscription/approved', 'approvedSubscription')->name('user.payments.subscription.approved');        
        Route::get('/payments/subscription/cancelled', 'cancelledSubscription')->name('user.payments.subscription.cancelled')->middleware('unsubscribed');
    });

    // USER REFERRAL ROUTES
    Route::controller(ReferralController::class)->group(function() {
        Route::get('/referral', 'index')->name('user.referral');
        Route::post('/referral/settings', 'store')->name('user.referral.store');
        Route::get('/referral/gateway', 'gateway')->name('user.referral.gateway');
        Route::post('/referral/gateway', 'gatewayStore')->name('user.referral.gateway.store');
        Route::get('/referral/payouts', 'payouts')->name('user.referral.payout');
        Route::post('/referral/email', 'email')->name('user.referral.email');
        Route::get('/referral/payouts/create', 'payoutsCreate')->name('user.referral.payout.create');
        Route::post('/referral/payouts/store', 'payoutsStore')->name('user.referral.payout.store');
        Route::get('/referral/all', 'referrals')->name('user.referral.referrals');        
        Route::get('/referral/payouts/{id}/show', 'payoutsShow')->name('user.referral.payout.show');
        Route::get('/referral/payouts/{id}/cancel', 'payoutsCancel')->name('user.referral.payout.cancel');
        Route::delete('/referral/payouts/{id}/decline', 'payoutsDecline')->name('user.referral.payout.decline');
    });

    // USER INVOICE ROUTES
    Route::controller(PaymentController::class)->group(function() {
        Route::get('/payments/invoice/{order_id}/generate', 'generatePaymentInvoice')->name('user.payments.invoice');
        Route::get('/payments/invoice/{id}/show', 'showPaymentInvoice')->name('user.payments.invoice.show');
        Route::get('/payments/invoice/{order_id}/transfer', 'bankTransferPaymentInvoice')->name('user.payments.invoice.transfer');
    });

    // USER SUPPORT REQUEST ROUTES  
    Route::controller(UserSupportController::class)->group(function() { 
        Route::get('/support', 'index')->name('user.support');
        Route::post('/support', 'store')->name('user.support.store');
        Route::post('/support/delete', 'delete');
        Route::post('/support/response', 'response')->name('user.support.response');
        Route::get('/support/create', 'create')->name('user.support.create'); 
        Route::get('/support/{ticket_id}/show', 'show')->name('user.support.show');
         
    });      

    // USER NOTIFICATION ROUTES
    Route::controller(UserNotificationController::class)->group(function() {
        Route::get('/notification', 'index')->name('user.notifications');
        Route::get('/notification/{id}/show', 'show')->name('user.notifications.show');        
        Route::post('/notification/delete', 'delete');
        Route::get('/notifications/mark-all', 'markAllRead')->name('user.notifications.markAllRead');
        Route::get('/notifications/delete-all', 'deleteAll')->name('user.notifications.deleteAll');
        Route::post('/notifications/mark-as-read', 'markNotification')->name('user.notifications.mark');
    });    

    // USER SEARCH ROUTES
    Route::any('/search', [SearchController::class, 'index'])->name('search');
});