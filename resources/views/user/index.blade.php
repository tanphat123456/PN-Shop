@extends('user.layout.main')
@section('main')

<!-- Hero Section Begin -->
<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="../User/img/hero/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <!-- <h2 style="color:red">PN-SHOP</h2> -->
                            <p>Một nhãn hiệu chuyên nghiệp tạo ra những thứ thiết yếu sang trọng. Được chế tác một cách có đạo đức với cam kết vững chắc về chất lượng vượt trội</p>
                            <a href="#" class="primary-btn">Mua Ngay<span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero__items set-bg" data-setbg="../User/img/hero/hero-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <!-- <h2 style="color:red">PN-SHOP</h2> -->
                            <p>Một nhãn hiệu chuyên nghiệp tạo ra những thứ thiết yếu sang trọng. Được chế tác một cách có đạo đức với cam kết vững chắc về chất lượng vượt trội</p>
                            <a href="#" class="primary-btn">Mua Ngay<span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Product Section Begin -->
<!-- spad -->
<section class="product ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Danh Mục Sản Phẩm</li>
                    <li data-filter=".new-arrivals">Sản Phẩm Mới</li>
                    <li data-filter=".hot-sales">Khuyến Mãi</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            @foreach(collect($products['data']['list'])->take(12) as $product)
            @if($product['status'] == 1)
            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix @if($product['discount_amount'] > 0) hot-sales @elseif(\Carbon\Carbon::createFromFormat('d/m/Y H:i', $product['updated_at'])->diffInDays(\Carbon\Carbon::now()) <= 7) new-arrivals @endif">
                <div class="product__item">
                    <div class="shop-index-carousel set-bg">
                        <div class="content-slider">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($product['product_image'] as $key => $image)
                                    <div class="item {{ $key == 0 ? 'active' : '' }}">
                                        <div class="product__item__pic set-bg" data-setbg="{{ $image['image_url'] }}">
                                            <a href="{{ route('detail', ['id' => $product['id']]) }}" class="product__item__link">
                                                @if($product['discount_amount'] > 0)
                                                <span class="label">Khuyến mãi</span>
                                                @elseif(\Carbon\Carbon::createFromFormat('d/m/Y H:i', $product['updated_at'])->diffInDays(\Carbon\Carbon::now()) <= 7) <span class="label">Mới</span>
                                                    @endif
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product__color__select">
                        @foreach($product['product_detail'] as $key => $detail)
                        <label for="" style="background: {{ $detail['description'] }}">
                            <input type="radio" id="{{ $detail['color_id'] }}">
                        </label>
                        @endforeach
                    </div>
                    <div class="product__item__text">
                        <h6>{{ $product['name'] }}</h6>
                        <a href="{{ route('detail', ['id' => $product['id']]) }}" class="add-cart">+ Mua Ngay</a>
                        <h5>
                            @if ($product['discount_amount'] > 0)
                            {{ number_format($product['amount'] - $product['discount_amount']) }} VNĐ
                            <span>{{ number_format($product['amount']) }} VNĐ</span>
                            @else
                            {{ number_format($product['amount']) }} VNĐ
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
</section>
<!-- Product Section End -->
<!-- Indicators -->
<!-- <ol class="carousel-indicators">
                                    @foreach($product['product_image'] as $key => $image)
                                    <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol> -->
<!-- <ul class="product__hover">
            <li><a href="#"><img src="../User/img/icon/heart.png" alt=""></a></li>
            <li><a href="#" class="add-to-cart-btn"><img src="../User/img/icon/plus.png" alt=""> <span>ADD</span></a></li>
            <li><a href="#"><img src="../User/img/icon/search.png" alt=""></a></li>
                            </ul> -->
<!-- Banner Section Begin -->
<section class="banner spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-4">
                <div class="banner__item">
                    <div class="banner__item__pic">
                        <img src="../User/img/banner/banner-1.jpg" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Quần Áo Nam</h2>
                        <a href="{{ route('shop') }}">Mua Ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic">
                        <img src="../User/img/banner/banner-4.jpg" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Quần Áo Nữ</h2>
                        <a href="{{ route('shop') }}">Mua Ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="banner__item banner__item--last">
                    <div class="banner__item__pic">
                        <img src="../User/img/banner/banner-2.jpg" alt="">
                    </div>
                    <div class="banner__item__text">
                        <h2>Phụ Kiện</h2>
                        <a href="{{ route('shop') }}">Mua Ngay</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Instagram Section Begin -->
<section class="instagram spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="instagram__pic">
                    <div class="instagram__pic__item set-bg" data-setbg="../User/img/instagram/instagram-1.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="../User/img/instagram/instagram-2.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="../User/img/instagram/instagram-3.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="../User/img/instagram/instagram-4.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="../User/img/instagram/instagram-5.jpg"></div>
                    <div class="instagram__pic__item set-bg" data-setbg="../User/img/instagram/instagram-6.jpg"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="instagram__text">
                    <p>PN-SHOP sẽ trở thành điển hình về mô hình DOANH NGHIỆP TRÁCH NHIỆM
                        bằng cách kinh doanh tử tế, có lợi nhuận và mang lại những giá trị thiết thực và lâu dài
                        cho khách hàng, cho nhân viên, cho đối tác, cho cộng đồng , cho môi trường và cho cổ đông</p>
                    <!-- <h3>#Male_Fashion</h3> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Instagram Section End -->

<!-- Latest Blog Section Begin -->
<section class="latest spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Latest News</span>
                    <h2>Fashion New Trends</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="../User/img/blog/blog-1.jpg"></div>
                    <div class="blog__item__text">
                        <span><img src="../User/img/icon/calendar.png" alt=""> 16/4/2023</span>
                        <h5>What Curling Irons Are The Best Ones</h5>
                        <a href="#">Đọc Thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="../User/img/blog/blog-2.jpg"></div>
                    <div class="blog__item__text">
                        <span><img src="../User/img/icon/calendar.png" alt=""> 16/4/2023</span>
                        <h5>What Curling Irons Are The Best Ones</h5>
                        <a href="#">Đọc Thêm</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="../User/img/blog/blog-3.jpg"></div>
                    <div class="blog__item__text">
                        <span><img src="../User/img/icon/calendar.png" alt=""> 16/4/2023</span>
                        <h5>What Curling Irons Are The Best Ones</h5>
                        <a href="#">Đọc Thêm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal cart thông báo -->
<div class="cart-modal" style="display:none;">
    <div class="cart-modal-content">
        <div class="product-img">
            <img src="../User/img/product/product-1.jpg" alt="product image">
        </div>
        <div class="product-info">
            <h3>Tên Sản Phẩm</h3>
            <p>Màu: Red</p>
            <p>Size: M</p>
            <p>Giá: 0</p>
        </div>
        <div class="close-cart-modal-wrapper">
            <button class="close-cart-modal-btn"><i class="fas fa-times"></i></button>
        </div>
    </div>
</div>
<style>
    .cart-modal {
        position: fixed;
        z-index: 9999;
        top: 150px;
        right: -115px;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        animation: slide-in 0.5s ease-in-out forwards;
    }

    .cart-modal .cart-modal-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .cart-modal .product-img {
        margin-right: 20px;
    }

    .cart-modal .product-img img {
        width: 100px;
        height: 100px;
    }

    .cart-modal .product-info h3 {
        font-size: 20px;
        margin: 0;
    }

    .cart-modal .product-info p {
        margin: 5px 0;
    }

    .close-cart-modal-wrapper {
        align-self: flex-start;
    }

    .close-cart-modal-btn {
        width: 10px;
        height: 10px;
        background-color: white;
        margin-left: 10px;
        color: black;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    @keyframes slide-in {
        0% {
            right: -160px;
        }

        100% {
            right: -115px;
        }
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".add-to-cart-btn").click(function(e) {
            e.preventDefault();
            $(".cart-modal").show();
        });

        $(".close-cart-modal-btn").click(function() {
            $(".cart-modal").hide();
        });
    });
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@endsection