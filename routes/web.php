<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Models\Supplier;

//Route Xử lý login User
Route::post('/login', 'UserController@login')->name('login');
//Route Xử lý register User
Route::post('/register', 'UserController@register')->name('register');

Route::post('/logoutUser', 'UserController@logout')->name('logoutUser');

Route::post('/momo', 'MainController@momo')->name('momo');

// Route::post('/order', 'MainController@order')->name('order');

Route::post('/onlineCheckout', 'MainController@online_checkout')->name('onlineCheckout');

Route::get('home', 'MainController@index')->name('home');


Route::get('/{id}/detail', 'MainController@detail')->name('detail');
Route::get('/{id}/thongtindonhang', 'MainController@orderdetail')->name('orderdetail');
Route::get('detail', 'MainController@indexdetail');
Route::get('shop', 'MainController@indexshop')->name('shop');
Route::get('cart', 'MainController@indexcart')->name('shoppingcart');
Route::get('user-details', 'MainController@userdetails')->name('userdetails');
Route::get('camon', 'MainController@indexthankyou')->name('camon');
Route::get('historyOrder', 'MainController@indexHistoryOrder')->name('historyOrder');
Route::get('contact', 'MainController@indexcontact')->name('contact');
Route::get('/login-facebook', 'UserController@login_facebook')->name('login-facebook');
Route::get('/home/callback', 'UserController@callback_facebook');
Route::get('/login-google','UserController@login_google');
Route::get('/google/callback','UserController@callback_google');




//Chỗ này  chức năng thêm sản phẩm 
Route::post('/addimages', 'ProductController@addImage')->name('addimages');

//Route hiển thị đăng nhập
Route::get('/dangnhap', 'AdminController@viewlogin')->name('dangnhap');

Route::post('/logout', 'AdminController@logout')->name('logout');
// Route::get('/logoutindex', 'UserController@logout')->name('logoutindex');

Route::post('/loginAdmin', 'AdminController@loginAdmin')->name('loginAdmin');

// Route::get('/index', 'AdminController@index')->name('index');

Route::middleware(['auth'])->group(function () {
    Route::get('/product', 'ProductController@index')->name('product');
    Route::get('/supplier', 'AdminController@indexSupplier')->name('supplier');
    Route::get('/color', 'ProductController@indexcolor')->name('color');
    Route::get('/category', 'ProductController@indexCategory')->name('category');
    Route::get('/image', 'ProductController@indeximage')->name('image');
    Route::get('/account', 'AdminController@account')->name('account');
    Route::get('/size', 'ProductController@indexsize')->name('size');
    Route::get('/comment', 'AdminController@indexComment')->name('comment');
    Route::get('/order', 'AdminController@indexOrder')->name('order');
    Route::get('/thongke', 'AdminController@thongke')->name('thongke');
    Route::get('/thongkesanpham', 'AdminController@thongkesanpham')->name('thongkesanpham');
    Route::get('/thongkehoadon', 'AdminController@thongkehoadon')->name('thongkehoadon');
    Route::get('/thongkeloai', 'AdminController@thongkeloai')->name('thongkeloai');
});


// <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
// <script src="https://unpkg.com/moment@2.29.1/moment.min.js"></script>

// <script>
//     const searchForm = document.querySelector('form');
//     const searchInput = document.getElementById('searchInput');
//     const productList = document.querySelector('.col-lg-9 .row');

//     searchForm.addEventListener('submit', function(e) {
//         e.preventDefault();
//         const keyword = searchInput.value.trim();
//         if (keyword !== '') {
//             // Gọi API tìm kiếm và lấy danh sách sản phẩm
//             fetch(`https://localhost:3000/api/product?key_search=${encodeURIComponent(keyword)}`)
//                 .then(response => response.json())
//                 .then(data => {
//                     // Xử lý dữ liệu và hiển thị danh sách sản phẩm
//                     const products = data.data.list;
//                     if (Array.isArray(products)) {
//                         // Xóa danh sách sản phẩm hiện tại
//                         productList.innerHTML = '';

//                         products.forEach(product => {
//                             if (product.status === 1) {
//                                 const productDiv = document.createElement('div');
//                                 productDiv.className = 'col-lg-4 col-md-6 col-sm-6 col-md-6 col-sm-6 mix';

//                                 const productItemHTML = `
//                         <div class="product__item">
//                             <div class="shop-index-carousel set-bg">
//                                 <div class="content-slider">
//                                     <div id="myCarousel" class="carousel slide" data-ride="carousel">
//                                         <div class="carousel-inner">
//                                             ${product.product_image.map((image, index) => `
//                                                 <div class="item ${index === 0 ? 'active' : ''}">
//                                                     <div class="product__item__pic set-bg" data-setbg="${image.image_url}">
//                                                     <a href="/${product.id}/detail" class="product__item__link">
//                                                             ${product.discount_amount > 0 ? '<span class="label">Khuyến mãi</span>' : ''}
//                                                             ${moment(product.updated_at, 'DD/MM/YYYY HH:mm').diff(moment(), 'days') <= 7 ? '<span class="label">Mới</span>' : ''}
//                                                         </a>
//                                                     </div>
//                                                 </div>
//                                             `).join('')}
//                                         </div>
//                                     </div>
//                                 </div>
//                             </div>
//                             <div class="product__color__select">
//                                 ${product.product_detail.map(detail => `
//                                     <label for="" style="background: ${detail.description}">
//                                         <input type="radio" id="${detail.color_id}">
//                                     </label>
//                                 `).join('')}
//                             </div>
//                             <div class="product__item__text">
//                                 <h6>${product.name}</h6>
//                                 <a href="/${product.id}/detail" class="add-cart">+ Mua Ngay</a>
//                                 <h5>
//                                     ${product.discount_amount > 0 ? `${numberFormat(product.amount - product.discount_amount)} VNĐ <span>${numberFormat(product.amount)} VNĐ</span>` : `${numberFormat(product.amount)} VNĐ`}
//                                 </h5>
//                             </div>
//                         </div>
//                     `;

//                                 productDiv.innerHTML = productItemHTML;
//                                 productList.appendChild(productDiv);
//                             }
//                         });
//                     } else {
//                         console.error('Invalid product data');
//                     }
//                 })
//                 .catch(error => {
//                     console.error('Error:', error);
//                 });

//         }
//     });

//     function numberFormat(number) {
//         return new Intl.NumberFormat('vi-VN').format(number);
//     }
// </script>