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

Route::get('/', 'FrontController@index')->name('index');

Route::get('/404', function () {
    return view('404');
})->name('404');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/register/{reference}', 'FrontController@register');
});


//Lending Cron
Route::get('/cron-lend', 'FrontController@Cron');
//cron for purchase update
Route::get('/cron','PaymentController@cronupdate');

//Payment IPN
Route::get('/ipnbtc', 'PaymentController@ipnBchain')->name('ipn.bchain');
Route::get('/ipnblockbtc', 'PaymentController@blockIpnBtc')->name('ipn.block.btc');
Route::get('/ipnblocklite', 'PaymentController@blockIpnLite')->name('ipn.block.lite');
Route::get('/ipnblockdog', 'PaymentController@blockIpnDog')->name('ipn.block.dog');
Route::post('/ipnpaypal', 'PaymentController@ipnpaypal')->name('ipn.paypal');
Route::post('/ipnperfect', 'PaymentController@ipnperfect')->name('ipn.perfect');
Route::post('/ipnstripe', 'PaymentController@ipnstripe')->name('ipn.stripe');
Route::post('/ipnskrill', 'PaymentController@skrillIPN')->name('ipn.skrill');
Route::post('/ipncoinpaybtc', 'PaymentController@ipnCoinPayBtc')->name('ipn.coinPay.btc');
Route::post('/ipncoinpayeth', 'PaymentController@ipnCoinPayEth')->name('ipn.coinPay.eth');
Route::post('/ipncoinpaybch', 'PaymentController@ipnCoinPayBch')->name('ipn.coinPay.bch');
Route::post('/ipncoinpaydash', 'PaymentController@ipnCoinPayDash')->name('ipn.coinPay.dash');
Route::post('/ipncoinpaydoge', 'PaymentController@ipnCoinPayDoge')->name('ipn.coinPay.doge');
Route::post('/ipncoinpayltc', 'PaymentController@ipnCoinPayLtc')->name('ipn.coinPay.ltc');
Route::post('/ipncoin', 'PaymentController@ipnCoin')->name('ipn.coinpay');
Route::post('/ipncoingate', 'PaymentController@ipnCoinGate')->name('ipn.coingate');
//Payment IPN


//Subscribe
Route::post('/search-wallet', 'FrontController@searchWallet')->name('search.wallet');
Route::get('/subscribe', 'FrontController@subscribe')->name('subscribe');
Route::get('/contact-email', 'FrontController@contactEmail')->name('contactEmail');
Route::get('/lending-contact', 'FrontController@FrontcontactEmail')->name('FrontcontactEmail');

//Authorization
Route::get('/authorization', 'FrontController@authorization')->name('authorization');
Route::post('/sendemailver', 'FrontController@sendemailver')->name('sendemailver');
Route::post('/emailverify', 'FrontController@emailverify')->name('emailverify');
Route::post('/sendsmsver', 'FrontController@sendsmsver')->name('sendsmsver');
Route::post('/smsverify', 'FrontController@smsverify')->name('smsverify');
Route::post('/g2fa-verify', 'FrontController@verify2fa')->name('go2fa.verify');
Auth::routes();

//Forgot Password
Route::post('/forgot-pass', 'FrontController@forgotPass')->name('forgot.pass');
Route::get('/reset/{token}', 'FrontController@resetLink')->name('reset.passlink');
Route::post('/reset/password', 'FrontController@passwordReset')->name('reset.passw');


//User Routes
Route::group(['middleware' => ['auth','ckstatus']], function() {
    Route::group(['prefix' => 'home'], function () {
        
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/referal', 'HomeController@referal')->name('referal');
        Route::get('/my-coin', 'HomeController@myCoin')->name('myCoin');
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::post('/profile-update', 'ProfileController@update')->name('profile.update');
        
        //Buy ICO
        Route::get('/buy-ico', 'HomeController@buyIco')->name('buy.ico');
        Route::post('/buy-data-insert', 'HomeController@buyDataInsert')->name('buy.data-insert');
        Route::get('/buy-preview', 'HomeController@buyPreview')->name('buy.preview');
        Route::get('/buy-confirm', 'PaymentController@purchaseConfirm')->name('buy.confirm');
        
        
        //Change Password
        Route::get('/change-password', 'HomeController@changepass')->name('changepass');
        Route::post('/change-passw', 'HomeController@chnpass')->name('changep');
        
        //TwoFactor-Auth
        Route::get('/g2fa', 'HomeController@google2fa')->name('go2fa');
        Route::post('/g2fa-create', 'HomeController@create2fa')->name('go2fa.create');
        Route::post('/g2fa-disable', 'HomeController@disable2fa')->name('disable.2fa');
        
        
        //Coin-Transaction
        Route::get('/transactions', 'WalletController@transactions')->name('transaction.log');
        Route::get('/all-wallets', 'WalletController@allWallets')->name('all.wallets');
        Route::post('/create-address', 'WalletController@createAddress')->name('create.address');
        Route::post('/send-money', 'WalletController@sendMoney')->name('send.money');
        Route::get('/receive-money', 'WalletController@receiveMoney')->name('receive.money');
        
        //Coin Purchase
        Route::get('/purchase-gateway', 'WalletController@purchaseGateway')->name('purchase.gateway');
        Route::post('/purchase-preview', 'WalletController@purchasePreview')->name('purchase.preview');
        Route::get('/purchase-confirm', 'PurchaseController@purchaseConfirm')->name('purchase.confirm');
        
        //Lendiing
        Route::get('/lending-packages', 'LendingController@packages')->name('lending.packages');
        Route::post('/lending-confirm', 'LendingController@lendingConfirm')->name('lending.confirm');
        Route::get('/lending-log', 'LendingController@log')->name('lending.log');
          // Verify Doccument
      Route::get('/document', 'HomeController@document')->name('document');
     Route::post('/doc-verify', 'HomeController@doc_verify')->name('doc.verify');
     
       //Withdraw
        Route::get('/withdraw-zir', 'HomeController@withdrawBtc')->name('user.withdrawbtc');
        Route::post('/confirm-zir', 'HomeController@confirmwithdrawBtc')->name('withdraw.btc');
        Route::get('/withdraw-log', 'HomeController@withdrawLog')->name('user.withlog'); 
        
        
    });
});
// Route::group(['middleware' => ['demo']], function() {
Route::group(['prefix' => 'admin'], function () {
    
    // General Settings
    Route::get('/general', 'GeneralController@index')->name('general');
    Route::post('/general-update', 'GeneralController@update')->name('general.update');
    Route::get('/logo', 'GeneralController@logo')->name('logo');
    Route::post('/logo-update', 'GeneralController@logoupdate')->name('logo.update');
    Route::get('/change-password', 'GeneralController@changepass')->name('change.password');
    Route::post('/password-update', 'GeneralController@updatepass')->name('password.update');
    
    //prices
    Route::get('/prices', 'GeneralController@prices')->name('price.index');
    Route::post('/price-store', 'GeneralController@priceStore')->name('price.store');
    
    //Email Template
    Route::get('/template', 'EtemplateController@index')->name('template');
    Route::post('/template-update', 'EtemplateController@update')->name('template.update');
    
    //Sms Api
    Route::get('/sms-api', 'EtemplateController@smsApi')->name('sms.api');
    Route::post('/sms-update', 'EtemplateController@smsUpdate')->name('sms.update');
    
    //Sell Log
    Route::get('/sell-log', 'UsersController@sellLog')->name('sellLog');
    Route::get('/transaction-log', 'UsersController@transactionLog')->name('transactionLog');
    
    //Package
    Route::get('/package', 'PackageController@index')->name('package');
    Route::get('/lending-log', 'PackageController@lendLog')->name('lend.log');
    Route::post('/package-store', 'PackageController@store')->name('package.store');
    Route::put('/package/{pack}', 'PackageController@update')->name('package.update');
    
    //ICO Claender
    Route::resource('ico', 'IcoController', ['except' => [ 'create', 'show','edit','destroy' ]]);
        
    //Social
    Route::resource('social', 'SocialController', ['except' => [ 'create', 'show','edit' ]]);

    //Gateway
    Route::resource('gateway', 'GatewayController', ['except' => [ 'create', 'show','edit' ]]);

    //Roadmap
    Route::resource('road', 'RoadController', ['except' => [ 'create', 'show','edit' ]]);

    //Faq
    Route::resource('section', 'FaqController', ['except' => [ 'show']]);

    //Faq
    Route::resource('testim', 'TestimController', ['except' => [ 'create', 'show','edit'    ]]);

    //Services
    Route::resource('services', 'ServiceController', ['except' => [  'create', 'show','edit'    ]]);

    //Team
    Route::resource('teams', 'TeamController', ['except' => [   'create', 'show','edit'  ]]);

    //Frontend Template
    Route::get('/banner', 'FrontendController@banner')->name('banner');
    Route::post('/banner-update', 'FrontendController@bannerUpdate')->name('banner.update');
    
    Route::get('/about', 'FrontendController@about')->name('about');
    Route::post('/about-update', 'FrontendController@aboutUpdate')->name('about.update');
    Route::post('/service-update', 'FrontendController@serviceUpdate')->name('service.update');
    Route::post('/roadmap-update', 'FrontendController@roadmapUpdate')->name('roadmap.update');
    Route::post('/team-update', 'FrontendController@teamUpdate')->name('team.update');
    Route::post('/testm-update', 'FrontendController@testmUpdate')->name('testm.update');
    Route::post('/section-update', 'FaqController@updateSection')->name('update.newsection');
    Route::get('/subsc', 'FrontendController@subsc')->name('subsc');
    Route::post('/subsc-update', 'FrontendController@subscUpdate')->name('subsc.update');
    Route::get('/footer', 'FrontendController@footer')->name('footer');
    Route::post('/footer-update', 'FrontendController@footerUpdate')->name('footer.update');
    
    Route::get('/background', 'FrontendController@background')->name('background');
    Route::post('/background-update', 'FrontendController@backgroundUpdate')->name('background.update');
    
    //User Management
    Route::get('/users', 'UsersController@index')->name('users');;
    Route::post('/user-search', 'UsersController@userSearch')->name('search.users');
    Route::get('/user/{user}', 'UsersController@single')->name('user.single');
    Route::get('/user-banned', 'UsersController@banusers')->name('user.ban');
    
    Route::get('/mail/{user}', 'UsersController@email')->name('email');
    Route::post('/sendmail', 'UsersController@sendemail')->name('send.email');
    Route::put('/user/pass-change/{user}', 'UsersController@userPasschange')->name('user.passchange');
    Route::put('/user/status/{user}', 'UsersController@statupdate')->name('user.status');
    Route::get('/broadcast', 'UsersController@broadcast')->name('broadcast');
    Route::post('/broadcast/email', 'UsersController@broadcastemail')->name('broadcast.email');
    
    Route::get('/subscribers', 'UsersController@subscribers')->name('admin.subscribers');
    Route::post('/subscribers-email', 'UsersController@subsEmail')->name('subscribers.email');
      //dOCUMENT Verify
    Route::get('/document', 'DocverController@requests')->name('document.requests');
    Route::put('/document/approve/{user}', 'DocverController@approve')->name('document.approve');
    
     //referral management
    Route::get('/referral-list', 'ReferralController@index')->name('referral');
    Route::post('/referral-search', 'ReferralController@referralSearch')->name('search.referral');
    Route::get('/referral/{id}', 'ReferralController@singleReferral')->name('user.referral');
    
     //Withdraw
    Route::get('/withdraw', 'WithdrawController@index')->name('withdraw');
    Route::get('/withdraw-requests', 'WithdrawController@requests')->name('withdraw.requests');
    Route::put('/withdraw-approve/{id}', 'WithdrawController@approve')->name('withdraw.approve');
    Route::get('/withdraw/{withdraw}/delete', 'WithdrawController@destroy')->name('withdraw.destroy');
    
});
// });

Route::group(['prefix' => 'admin'], function () {
       
    //Admin Auth
       Route::get('/', 'AdminAuth\LoginController@showLoginForm');
       Route::post('/login', 'AdminAuth\LoginController@login')->name('admin.login');
       Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
       
       Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
       Route::post('/register', 'AdminAuth\RegisterController@register');
       
});

Route::get("/kycapprv", 'KycController@index');

