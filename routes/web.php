<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SaticiController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\UrunController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\SaticiUrunController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\AfisController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CompareController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\TeslimatAlanController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\StripeController;
use App\Http\Controllers\Backend\SiparisController;
use App\Http\Controllers\Backend\SaticiSiparisController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\Backend\IadeController;
use App\Http\Controllers\Backend\RaporController;
use App\Http\Controllers\Backend\ActiveUserController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Backend\IptalController;


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
    return view('frontend.index');
});

Route::get('/', [IndexController::class, 'Index']);


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');

    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');

    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');

    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});


/// Admin Dashboard

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashobard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');

    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');
    Route::get('/admin/login',[AdminController::class,'AdminLogin'])->name('loginin');
    Route::post('/admin/login',[AdminController::class,'AdminLogin'])->name('loginin');

});




/// SATICI 
Route::middleware(['auth', 'role:satici'])->group(function () {
    Route::get('/satici/dashboard', [SaticiController::class, 'SaticiDashboard'])->name('satici.dashobard');
    Route::get('/satici/logout', [SaticiController::class, 'SaticiSil'])->name('satici.logout');

    Route::get('/satici/profile', [SaticiController::class, 'SaticiProfile'])->name('satici.profile');

    Route::post('/satici/profile/kaydetme', [SaticiController::class, 'SaticiProfileKaydetme'])->name('satici.profile.kaydetme');

    Route::get('/satici/change/password', [SaticiController::class, 'SaticiChangePassword'])->name('satici.change.password');

    Route::post('/satici/update/password', [SaticiController::class, 'SaticiUpdatePassword'])->name('satici.update.password');

    // Satici Add Urun All Route 
    Route::controller(SaticiUrunController::class)->group(function () {
        Route::get('/satici/all/urun', 'SaticiAllUrun')->name('satici.all.urun');
        Route::get('/satici/add/urun', 'SaticiEkleUrun')->name('satici.add.urun');
        Route::post('/satici/store/urun', 'SaticiStoreUrun')->name('satici.store.urun');
        Route::get('/satici/edit/urun/{id}', 'SaticiEditUrun')->name('satici.edit.urun');
        Route::post('/satici/update/urun', 'SaticiUpdateUrun')->name('satici.update.urun');
        Route::post('/satici/update/urun/thambnail', 'SaticiUpdateUrunThabnail')->name('satici.update.urun.thambnail');
        Route::post('/satici/update/urun/multiimage', 'SaticiUpdateUrunmultiImage')->name('satici.update.urun.multiimage');
        Route::get('/satici/urun/multiimg/sil/{id}', 'SaticiMultiimgSil')->name('satici.urun.multiimg.sil');
        Route::get('/satici/urun/inactive/{id}', 'SaticiUrunInactive')->name('satici.urun.inactive');
        Route::get('/satici/urun/active/{id}', 'SaticiUrunActive')->name('satici.urun.active');
        Route::get('/satici/sil/urun/{id}', 'SaticiUrunSil')->name('satici.sil.urun');



        Route::get('/satici/subcategory/ajax/{category_id}', 'SaticiGetSubCategory');
    });



// Siparis Satici 
Route::controller(SaticiSiparisController::class)->group(function(){
    Route::get('/satici/siparis' , 'SaticiSiparis')->name('satici.siparis');
    Route::get('/satici/iade/siparis' , 'SaticiIadeSiparis')->name('satici.iade.siparis');
    Route::get('/satici/iptal/siparis' , 'SaticiIptalSiparis')->name('satici.iptal.siparis');
    Route::get('/satici/tamam/iade/siparis' , 'SaticiTamamIadeSiparis')->name('satici.tamam.iade.siparis');
    Route::get('/satici/tamam/iptal/siparis' , 'SaticiTamamIptalSiparis')->name('satici.tamam.iptal.siparis');
    Route::get('/satici/siparis/detay/{siparis_id}' , 'SaticiSiparisDetay')->name('satici.siparis.detay');


});

Route::controller(ReviewController::class)->group(function(){

    Route::get('/satici/all/review' , 'SaticiAllReview')->name('satici.all.review');
   
   });


   

});  // Middlewar Satici Bitiyor







Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);

Route::get('/satici/login', [SaticiController::class, 'SaticiLogin'])->name('satici.login')->middleware(RedirectIfAuthenticated::class);

Route::get('/become/vendor', [SaticiController::class, 'BecomeSatici'])->name('become.satici');
Route::post('/satici/register', [SaticiController::class, 'SaticiRegister'])->name('satici.register');



Route::middleware(['auth', 'role:admin'])->group(function () {


    // Brand için tüm markalar
    Route::controller(BrandController::class)->group(function () {
        Route::get('/all/brand', 'AllBrand')->name('all.brand');
        Route::get('/add/brand', 'AddBrand')->name('add.brand');
        Route::post('/store/brand', 'StoreBrand')->name('store.brand');
        Route::get('/edit/brand/{id}', 'EditBrand')->name('edit.brand');
        Route::post('/update/brand', 'UpdateBrand')->name('update.brand');
        Route::get('/sil/brand/{id}', 'SilBrand')->name('sil.brand');
    });

    // Kategoriler için
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all/category', 'AllCategory')->name('all.category');

        Route::get('/add/category', 'AddCategory')->name('add.category');
        Route::post('/store/category', 'StoreCategory')->name('store.category');
        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::post('/update/category', 'UpdateCategory')->name('update.category');
        Route::get('/sil/category/{id}', 'SilCategory')->name('sil.category');
    });




    // ALT KATEGORI All Route 
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/all/subcategory', 'AllSubCategory')->name('all.subcategory');
        Route::get('/add/subcategory', 'AddSubCategory')->name('add.subcategory');
        Route::post('/store/subcategory', 'StoreSubCategory')->name('store.subcategory');
        Route::get('/edit/subcategory/{id}', 'EditSubCategory')->name('edit.subcategory');
        Route::post('/update/subcategory', 'UpdateSubCategory')->name('update.subcategory');
        Route::get('/sil/subcategory/{id}', 'SilSubCategory')->name('sil.subcategory');
        Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory');
    });


    // Admin Satici aktif mi diye kontrol 
    Route::controller(AdminController::class)->group(function () {
        Route::get('/inactive/satici', 'InactiveSatici')->name('inactive.satici');
        Route::get('/active/satici', 'ActiveSatici')->name('active.satici');
        Route::get('/inactive/satici/details/{id}', 'InactiveSaticiDetay')->name('inactive.satici.detay');
        Route::post('/active/satici/onay', 'ActiveSaticiOnay')->name('active.satici.onay');
        Route::get('/active/satici/details/{id}', 'ActiveSaticiDetay')->name('active.satici.detay');
        Route::post('/inactive/satici/onay', 'InActiveSaticiOnay')->name('inactive.satici.onay');
    });



    // Tüm Urun  Route 
    Route::controller(UrunController::class)->group(function () {
        Route::get('/all/urun', 'AllUrun')->name('all.urun');
        Route::get('/ekle/urun', 'EkleUrun')->name('ekle.urun');
        Route::post('/store/urun', 'StoreUrun')->name('store.urun');
        Route::get('/edit/urun/{id}', 'EditUrun')->name('edit.urun');
        Route::post('/update/urun', 'UpdateUrun')->name('update.urun');
        Route::post('/update/urun/thambnail', 'UpdateUrunThambnail')->name('update.urun.thambnail');
        Route::post('/update/urun/multiimage', 'UpdateUrunMultiimage')->name('update.urun.multiimage');
        Route::get('/urun/multiimg/sil/{id}', 'MulitImageSil')->name('urun.multiimg.sil');
        Route::get('/urun/inactive/{id}', 'UrunInactive')->name('urun.inactive');
        Route::get('/urun/active/{id}', 'UrunActive')->name('urun.active');
        Route::get('/sil/urun/{id}', 'UrunSil')->name('sil.urun');
    
      // Urun Stock
      Route::get('/urun/stock' , 'UrunStock')->name('urun.stock');

    });

    Route::controller(SliderController::class)->group(function () {
        Route::get('/all/slider', 'AllSlider')->name('all.slider');
        Route::get('/add/slider', 'AddSlider')->name('add.slider');
        Route::post('/store/slider', 'StoreSlider')->name('store.slider');
        Route::get('/edit/slider/{id}', 'EditSlider')->name('edit.slider');
        Route::post('/update/slider', 'UpdateSlider')->name('update.slider');
        Route::get('/delete/slider/{id}', 'DeleteSlider')->name('delete.slider');
    });


    // Afis All Route 
    Route::controller(AfisController::class)->group(function () {
        Route::get('/all/afis', 'AllAfis')->name('all.afis');
        Route::get('/add/afis', 'AddAfis')->name('add.afis');
        Route::post('/store/afis', 'StoreAfis')->name('store.afis');
        Route::get('/edit/afis/{id}', 'EditAfis')->name('edit.afis');
        Route::post('/update/afis', 'UpdateAfis')->name('update.afis');
        Route::get('/sil/afis/{id}', 'SilAfis')->name('sil.afis');
    
    
    });
             // Coupon All
    Route::controller(CouponController::class)->group(function(){
        Route::get('/all/coupon' , 'AllCoupon')->name('all.coupon');
        Route::get('/add/coupon' , 'AddCoupon')->name('add.coupon');
        Route::post('/store/coupon', 'StoreCoupon')->name('store.coupon');
        Route::get('/edit/coupon/{id}' , 'EditCoupon')->name('edit.coupon');
        Route::post('/update/coupon' , 'UpdateCoupon')->name('update.coupon');
        Route::get('/delete/coupon/{id}' , 'DeleteCoupon')->name('delete.coupon');

    }); 

 // Nakliye Bolum All Route 
 Route::controller(TeslimatAlanController::class)->group(function(){
    Route::get('/all/bolum' , 'AllBolum')->name('all.bolum');
    Route::get('/add/bolum' , 'AddBolum')->name('add.bolum');
    Route::post('/store/bolum' , 'StoreBolum')->name('store.bolum');
    Route::get('/edit/bolum/{id}' , 'EditBolum')->name('edit.bolum');
    Route::post('/update/bolum' , 'UpdateBolum')->name('update.bolum');
    Route::get('/delete/bolum/{id}' , 'DeleteBolum')->name('delete.bolum');

});

Route::controller(TeslimatAlanController::class)->group(function(){
    Route::get('/all/bolge' , 'AllBolge')->name('all.bolge');
    Route::get('/add/bolge' , 'AddBolge')->name('add.bolge');
    Route::post('/store/bolge' , 'StoreBolge')->name('store.bolge');
    Route::get('/edit/bolge/{id}' , 'EditBolge')->name('edit.bolge');
    Route::post('/update/bolge' , 'UpdateBolge')->name('update.bolge');
    Route::get('/delete/bolge/{id}' , 'DeleteBolge')->name('delete.bolge');
}); 

Route::controller(TeslimatAlanController::class)->group(function(){
    Route::get('/all/durum' , 'AllDurum')->name('all.durum');
    Route::get('/add/durum' , 'AddDurum')->name('add.durum');
    Route::post('/store/durum' , 'StoreDurum')->name('store.durum');
    Route::get('/edit/durum/{id}' , 'EditDurum')->name('edit.durum');
    Route::post('/update/durum' , 'UpdateDurum')->name('update.durum');
    Route::get('/delete/durum/{id}' , 'DeleteDurum')->name('delete.durum');
    
    
    Route::get('/bolge/ajax/{bolum_id}' , 'GetBolge');


}); 


Route::controller(SiparisController::class)->group(function(){
    Route::get('/beklemede/siparis' , 'BeklemedeSiparis')->name('beklemede.siparis');
    Route::get('/admin/siparis/detay/{siparis_id}' , 'AdminSiparisDetay')->name('admin.siparis.detay');
    Route::get('/admin/onay/siparis' , 'AdminOnaySiparis')->name('admin.onay.siparis');

    Route::get('/admin/isleniyor/siparis' , 'AdminIsleniyorSiparis')->name('admin.isleniyor.siparis');

 Route::get('/admin/teslim_edildi/siparis' , 'AdminTeslimSiparis')->name('admin.teslim_edildi.siparis');
 Route::get('/beklemede/onay/{siparis_id}' , 'BeklemedeOnay')->name('pending-confirm');
 Route::get('/onay/isleniyor/{siparis_id}' , 'Onayisleniyor')->name('confirm-processing');
 Route::get('/isleniyor/teslim_edildi/{siparis_id}' , 'IsleniyorTeslim')->name('processing-delivered');
 Route::get('/admin/fatura/download/{siparis_id}' , 'AdminFaturaDownload')->name('admin.fatura.download');


}); 

// Iade Siparis All Route 
Route::controller(IadeController::class)->group(function(){
    Route::get('/iade/istek' , 'IadeIstek')->name('iade.istek');
    Route::get('/iade/istek/onaylandi/{siparis_id}' , 'IadeTalebOnaylandı')->name('iade.istek.onaylandi');
    Route::get('/tamam/iade/istek' , 'IadeIstekTamamla')->name('tamam.iade.istek');


});

// Iptal Siparis All Route
Route::controller(IptalController::class)->group(function(){
    Route::get('/iptal/istek' , 'IptalIstek')->name('iptal.istek');
    Route::get('/iptal/istek/onaylandi/{siparis_id}' , 'IptalTalebOnaylandı')->name('iptal.istek.onaylandi');
    Route::get('/tamam/iptal/istek' , 'IptalIstekTamamla')->name('tamam.iptal.istek');


});



// Raport All Route 
Route::controller(RaporController::class)->group(function(){

   Route::get('/rapor/view' , 'RaporView')->name('rapor.view');
   Route::post('/arama/by/tarih' , 'AramaTarih')->name('arama-by-tarih');
   Route::post('/arama/by/ay' , 'AramaAy')->name('arama-by-ay');
   Route::post('/arama/by/yil' , 'AramaYil')->name('arama-by-yil');

   Route::get('/siparis/by/user' , 'SiparisByUser')->name('siparis.by.user');
   Route::post('/arama/by/user' , 'AramaByUser')->name('arama-by-user');

});

// Active user ve satici All Route 
Route::controller(ActiveUserController::class)->group(function(){

    Route::get('/all/user' , 'AllUser')->name('all-user');
    Route::get('/all/satici' , 'AllSatici')->name('all-satici');


});

// Blog Category All Route
Route::controller(BlogController::class)->group(function(){

    Route::get('/admin/blog/category' , 'AllBlogCategory')->name('admin.blog.category'); 

    Route::get('/admin/add/blog/category' , 'EkleBlogCategory')->name('add.blog.category');
  
    Route::post('/admin/store/blog/category' , 'StoreBlogCategory')->name('store.blog.category');
    
    Route::get('/admin/edit/blog/category/{id}' , 'EditBlogCategory')->name('edit.blog.category');

    Route::post('/admin/update/blog/category' , 'UpdateBlogCategory')->name('update.blog.category');
  
    Route::get('/admin/sil/blog/category/{id}' , 'SilBlogCategory')->name('sil.blog.category');

});


// Blog Post All Route 
Route::controller(BlogController::class)->group(function(){

    Route::get('/admin/blog/post' , 'AllBlogPost')->name('admin.blog.post'); 
   
     Route::get('/admin/add/blog/post' , 'AddBlogPost')->name('add.blog.post');
   
     Route::post('/admin/store/blog/post' , 'StoreBlogPost')->name('store.blog.post');
     Route::get('/admin/edit/blog/post/{id}' , 'EditBlogPost')->name('edit.blog.post');
   
     Route::post('/admin/update/blog/post' , 'UpdateBlogPost')->name('update.blog.post');
   
     Route::get('/admin/sil/blog/post/{id}' , 'SilBlogPost')->name('sil.blog.post');
   
   
   });


// Admin Reviw All Route 
Route::controller(ReviewController::class)->group(function(){

    Route::get('/beklemede/review' , 'BeklemedeReview')->name('beklemede.review'); 
    Route::get('/review/onay/{id}' , 'ReviewOnay')->name('review.onay'); 
    Route::get('/paylas/review' , 'PaylasReview')->name('paylas.review'); 
    Route::get('/review/sil/{id}' , 'ReviewSil')->name('review.sil');


   });

// Site Setting All Route 
Route::controller(SiteSettingController::class)->group(function(){

    Route::get('/site/setting' , 'SiteSetting')->name('site.setting');
    Route::post('/site/setting/update' , 'SiteSettingUpdate')->name('site.setting.update');
   
   
    Route::get('/seo/setting' , 'SeoSetting')->name('seo.setting');
    Route::post('/seo/setting/update' , 'SeoSettingUpdate')->name('seo.setting.update');


   });







});  // Admin Middleware Bitiyor




    Route::get('/urun/detay/{id}/{slug}', [IndexController::class, 'UrunDetay']);
    Route::get('/satici/detay/{id}', [IndexController::class, 'SaticiDetay'])->name('satici.detay');
    Route::get('/satici/all', [IndexController::class, 'SaticiAll'])->name('satici.all');
    Route::get('/urun/category/{id}/{slug}', [IndexController::class, 'CatUrun']);
    Route::get('/urun/subcategory/{id}/{slug}', [IndexController::class, 'SubUrun']);


// Urun PopUp Ekran View Modal  Ajax

Route::get('/urun/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);
/// Add to cart store data
 Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
// Mini Cart
Route::get('/urun/mini/cart', [CartController::class, 'AddMiniCart']);
    
Route::get('/minicart/urun/remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

/// Add to cart store data For Product Details Page 
Route::post('/dcart/data/store/{id}', [CartController::class, 'AddToCartDetails']);


/// Add to Wishlist 
Route::post('/add-to-wishlist/{urun_id}', [WishlistController::class, 'AddToWishList']);

/// Add to Compare 
Route::post('/add-to-compare/{urun_id}', [CompareController::class, 'AddToCompare']);

/// Frontend Coupon Option
Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);

Route::get('/checkout', [CartController::class, 'KontrolCreate'])->name('checkout');

    // Cart All
    Route::controller(CartController::class)->group(function(){
        Route::get('/mycart' , 'MyCart')->name('mycart');
        Route::get('/get-cart-product' , 'GetCartProduct');
        Route::get('/cart-remove/{rowId}' , 'CartRemove');
        Route::get('/cart-decrement/{rowId}' , 'CartDecrement');
        Route::get('/cart-increment/{rowId}' , 'CartIncrement');
    
       });



// Frontend Blog Post All Route 
Route::controller(BlogController::class)->group(function(){

    Route::get('/blog' , 'AllBlog')->name('home.blog');  
    Route::get('/post/detay/{id}/{slug}' , 'BlogDetay');  
    Route::get('/post/category/{id}/{slug}' , 'BlogPostCategory');  

   
   });


// Frontend Yorum Post All Route 
Route::controller(ReviewController::class)->group(function(){

    Route::post('/store/review' , 'StoreReview')->name('store.review'); 
   


   });

// Search All Route 
Route::controller(IndexController::class)->group(function(){

    Route::post('/search' , 'UrunArama')->name('urun.search'); 
    Route::post('/search-product' , 'SearchProduct'); 

   });

 // Shop Page All Route
   Route::controller(ShopController::class)->group(function(){

    Route::get('/shop' , 'ShopPage')->name('shop.page'); 
    Route::post('/shop/filter' , 'ShopFilter')->name('shop.filter'); 


   });



/// User All Route Yani login yapmadan wishlist açılmıyor
Route::middleware(['auth','role:user'])->group(function() {

    // Wishlist All Route 
   Route::controller(WishlistController::class)->group(function(){
       Route::get('/wishlist' , 'AllWishlist')->name('wishlist');
       Route::get('/get-wishlist-product' , 'GetWishlistProduct');
       Route::get('/wishlist-remove/{id}' , 'WishlistRemove');


   }); 
      // Compare All
   Route::controller(CompareController::class)->group(function(){
    Route::get('/compare' , 'AllCompare')->name('compare');
    Route::get('/get-compare-product' , 'GetCompareProduct');
    Route::get('/compare-remove/{id}' , 'CompareRemove'); 


}); 


// Checkout All Route 
Route::controller(CheckoutController::class)->group(function(){
    Route::get('/district-get/ajax/{bolum_id}' , 'DistrictGetAjax');
    Route::get('/state-get/ajax/{bolge_id}' , 'StateGetAjax');

    Route::post('/checkout/store' , 'CheckoutStore')->name('checkout.store');


}); 


// Stripe All Route
Route::controller(StripeController::class)->group(function(){
    Route::post('/stripe/order' , 'StripeOrder')->name('stripe.order');
    Route::post('/cash/order' , 'CashOrder')->name('cash.order');



}); 



// User Dashboard All Route 
Route::controller(AllUserController::class)->group(function(){
    Route::get('/user/account/page' , 'UserAccount')->name('user.account.page');
    Route::get('/user/degistirme/password' , 'UserDegistirmePassword')->name('user.degistirme.password');
    Route::get('/user/siparis/page' , 'UserSiparisPage')->name('user.siparis.page');
    Route::get('/user/siparis_detay/{siparis_id}' , 'UserSiparisDetay');
    Route::get('/user/invoice_download/{siparis_id}' , 'UserSiparisFatura');  
    Route::post('/iade/siparis/{siparis_id}' , 'IadeSiparis')->name('iade.siparis');
    Route::post('/iptal/siparis/{siparis_id}' , 'IptalSiparis')->name('iptal.siparis');

    Route::get('/iade/siparis/page' , 'IadeSiparisPage')->name('iade.siparis.page');
    Route::get('/iptal/siparis/page' , 'IptalSiparisPage')->name('iptal.siparis.page');

 // Siparis  Takip Etmek 
 Route::get('/user/takip/siparis' , 'UserTakipSiparis')->name('user.takip.siparis');
 Route::post('/siparis/takip' , 'SiparisTakip')->name('siparis.takip');



}); 






});  //  User middleware bitiyor

