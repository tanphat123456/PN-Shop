@extends('user.layout.main')
@section('main')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Giỏ Hàng</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Trang Chủ</a>
                        <a href="./shop.html">Bộ Sưu Tập</a>
                        <span>Giỏ Hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Size</th>
                                <th>Màu</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts['data']['list'] as $cart)
                            <tr id="cartRow_{{ $cart['id'] }}">
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{ $cart['product_name'] }}</h6>
                                        <h5>   
                                            {{ number_format($cart['amount'] - $cart['discount_amount']) }} VNĐ            
                                        </h5>
                                    </div>
                                </td>
                                <td>
                                    <div class="size">
                                        {{ $cart['size_name'] }}
                                    </div>
                                </td>
                                <td>
                                    <div class="product__details__option__color">
                                        <label class="c-{{ $cart['color_id'] }}" for="sp-{{ $cart['color_id'] }}" style="background: {{ $cart['color_code'] }};">
                                            <input type="radio" id="sp-{{ $cart['color_id'] }}" name="color" value="{{ $cart['color_code'] }}" data-color-id="{{ $cart['color_id'] }}">
                                        </label>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="wrapper" style="margin-left: 21px;">
                                        <span class="minus">-</span>
                                        <span class="num">{{ $cart['quantity'] }}</span>
                                        <span class="plus">+</span>
                                    </div>
                                </td>
                                <td class="cart__price">{{ number_format($cart['total_amount'], 0, ',', '.') }} VNĐ</td>
                                <td class="cart__close"><i class="fa fa-close" onclick="deleteCart({{$cart['id'] }})"></i></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{route('onlineCheckout')}}" method="post">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h6 class="checkout__title">Thông Tin Cá Nhân</h6>
                        <div class="checkout__input">
                            <p>Họ Và Tên<span>*</span></p>
                            <input type="text" class="form-control" id="full-name" value="{{ $details['data']['full_name'] }}" placeholder="Họ và Tên">
                        </div>
                        <div class="checkout__input">
                            <p>Ngày Sinh<span>*</span></p>
                            <input type="text" class="form-control" id="dob" value="{{ $details['data']['birthday'] }}" placeholder="SĐT">
                        </div>
                        <div class="checkout__input">
                            <p>Địa Chỉ<span>*</span></p>
                            <select name="address" class="select" required>
                                <option value="{{$details['data']['address'] }}">{{ $details['data']['address'] }}</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>SĐT<span>*</span></p>
                                    <input type="phone" class="form-control" id="phone-number" value="{{ $details['data']['phone_number'] }}" placeholder="SĐT">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="email" class="form-control" id="email" value="{{ $details['data']['email'] }}" placeholder="Email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Đơn Hàng</h4>
                            <div class="checkout__order__products">
                                <span class="product__title">Sản Phẩm</span>
                                <span class="product__quantity">Số Lượng</span>
                                <span class="product__total">Thành Tiền</span>
                            </div>
                            <ul class="checkout__total__products">
                                @foreach($carts['data']['list'] as $cart)
                                <li>
                                    <span class="product__title">{{ $cart['product_name'] }}</span>
                                    <span class="product__quantity">{{ $cart['quantity'] }}</span>
                                    <span class="product__total">{{ number_format($cart['total_amount'], 0, ',', '.') }} VNĐ</span>
                                </li>
                                @endforeach
                            </ul>
                            <ul class="checkout__total__all">
                                <!-- <li>Tạm Tính: <span></span></li> -->
                                <li>Giảm: <span> 0 VNĐ</span></li>
                                <li>Total: <span>{{ number_format($carts['data']['total_amount'], 0, ',', '.') }} VNĐ</span></li>
                            </ul>
                            <div class="title">
                                <h4> Chọn <span style="color: #6064b6">Phương Thức</span> Thanh Toán</h4>
                            </div>
                            <button type="submit" class="site-btn" name="cod"> <img src="../User/img/ship.jpg" class="icon" alt="">Thanh Toán COD</button>
                            <button type="submit" class="momo-btn" name="payUrl"><img src="../User/img/logo-momo.jpg" class="icon" alt="">Thanh Toán MoMo</button>
                            <button type="submit" class="momo-btn" name="redirect"><img src="../User/img/logo-vnpay.png" class="icon" alt="">Thanh Toán VNPAY</button>
                        </div>
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>

    <div class="container">


        <form action="#">

        </form>
    </div>
</section>
<style>
    .icon {
        width: 50px;
        height: 50px;
        margin-right: 20px;
    }

    .container .title {
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .container form .disable {
        display: none;
    }

    .container form .category {
        margin-top: 10px;
        padding-top: 20px;

    }

    .category label {
        width: 100%;
        height: 65px;
        /* height: 145px; */
        padding: 20px;
        box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.2);
        display: flex;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
        border-radius: 5px;
    }

    label:nth-child(2),
    label:nth-child(3) {
        margin: 15px 0;
    }


    #visa:checked~.category .visaMethod,
    #mastercard:checked~.category .mastercardMethod,
    #paypal:checked~.category .paypalMethod,
    #AMEX:checked~.category .amexMethod {
        box-shadow: 0px 0px 0px 1px #6064b6;
    }


    #visa:checked~.category .visaMethod .check,
    #mastercard:checked~.category .mastercardMethod .check,
    #paypal:checked~.category .paypalMethod .check,
    #AMEX:checked~.category .amexMethod .check {
        display: block;
    }


    label .imgName {
        display: flex;
        justify-content: space-between;
        align-items: center;

    }

    .imgName span {
        margin-left: 20px;
        font-family: Arial, Helvetica, sans-serif;

    }

    .imgName .imgContainer {
        width: 50px;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    /* img{
    width: 50px;
    height: auto;
} */

    .visa img {
        width: 60px;
        margin-left: 5px;
    }

    .mastercard img {
        width: 65px;
    }

    .paypal img {
        width: 70px;
    }

    .AMEX img {
        width: 45px;
    }

    .check {
        display: none;
    }
</style>
<!-- Checkout Section End -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function deleteCart(cartId) {
        var token = "{{ session('token_user') }}";
        $.ajax({
            url: 'https://localhost:3000/api/cart/' + cartId + '/delete',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            method: 'POST', 
            dataType: 'json',
            success: function(response) {
                if (response.status === 200) {
                    swal("Thông báo", response.message, "success");

                    // Xóa hàng khỏi bảng khi xóa thành công
                    $('#cartRow_' + cartId).remove();
                } else {
                    console.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>
@endsection