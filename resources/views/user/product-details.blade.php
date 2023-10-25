@extends('user.layout.main')
@section('main')
<!-- Shop Details Section Begin -->
<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="/home">Trang Chủ</a>
                        <span>Thông Tin Sản Phẩm</span>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-lg-1 col-md-1">
    <ul class="nav nav-tabs" role="tablist">
        @foreach($product['data']['list'] as $index => $item)
        <li class="nav-item">
            <a class="nav-link{{ $index === 0 ? ' active' : '' }}" data-toggle="tab" href="#tabs-{{ $index + 1 }}" role="tab">
                <div class="product__thumb__pic set-bg" data-setbg="{{ $item['product_image_color'][0]['image_url'] }}"></div>
            </a>
        </li>
        @endforeach
    </ul>
</div>
<div class="col-lg-6 col-md-6">
    <div class="tab-content">
        @foreach($product['data']['list'] as $index => $item)
        <div class="tab-pane{{ $index === 0 ? ' active' : '' }}" id="tabs-{{ $index + 1 }}" role="tabpanel">
            <div class="product__details__pic__item">
                @foreach($item['product_image_color'] as $image)
                <img src="{{ $image['image_url'] }}" alt="">
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

                <div class="col-lg-5 col-md-5">
                    <div class="product__details__content">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product__details__text">
                                        <h4>{{ $productInfo['data']['name'] }}</h4>
                                        <h3>
                                            @if ($productInfo['data']['discount_amount'] > 0)
                                            {{ number_format($productInfo['data']['amount'] - $productInfo['data']['discount_amount']) }} VNĐ
                                            <span>{{ number_format($productInfo['data']['amount']) }} VNĐ</span>
                                            @else
                                            {{ number_format($productInfo['data']['amount']) }} VNĐ
                                            @endif
                                        </h3>
                                        <div class="product__details__option">
                                            <div class="product__details__option__color">
                                                <span>Color</span>
                                                @foreach($product['data']['list'] as $item)
                                                <label class="c-{{ $item['color_id'] }}" for="sp-{{ $item['color_id'] }}" style="background: {{ $item['color_code'] }};">
                                                    <input type="radio" id="sp-{{ $item['color_id'] }}" name="color" value="{{ $item['color_code'] }}" data-color-id="{{ $item['color_id'] }}">
                                                </label>
                                                @endforeach
                                            </div>
                                            <div class="product__details__option__size">
                                                <span style="margin-top:6px">Size</span>
                                                @foreach($product['data']['list'] as $item)
                                                <div id="size-box-{{ $item['color_id'] }}" class="size-box" style="display: none;">
                                                    @foreach($item['size_detail'] as $size)
                                                    <label for="size-{{ $item['color_id'] }}-{{ $size['size_id'] }}">
                                                        {{ $size['size'] }}
                                                        <input type="radio" id="size-{{ $item['color_id'] }}-{{ $size['size_id'] }}" name="size" value="{{ $size['size'] }}" data-color-id="{{ $item['color_id'] }}" data-size-id="{{ $size['size_id'] }}">
                                                    </label>
                                                    @endforeach
                                                </div>
                                                @endforeach
                                                <!-- Add the new size code here -->
                                                @foreach($sizes['data']['list'] as $size)
                                                @php $selectedColor = false; @endphp
                                                <label for="size-{{ $size['id'] }}" class="size-label">
                                                    {{ $size['name'] }}
                                                    <input type="radio" id="size-{{ $size['id'] }}" name="size" value="{{ $size['name'] }}" data-size-id="{{ $size['id'] }}">
                                                </label>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="product__details__cart__option">
                                            <div class="wrapper">
                                                <span class="minus">-</span>
                                                <span class="num">01</span>
                                                <span class="plus">+</span>
                                            </div>
                                            <a href="#" class="primary-btn" id="add-to-cart-btn">Thêm Vào Giỏ Hàng</a>
                                        </div>
                                        <div class="product__details__last__option">
                                            <ul>
                                                <li><span>Mã SP </span> {{$productInfo['data']['code']}} </li>
                                                <li><span>Hãng Sản Xuất </span> {{$supplierName}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="hidden" id="product-id" value="{{ $productId }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="product__details__tab">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Thông Tin Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Cách Chăm Sóc</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-5" role="tabpanel">
                        <div class="product__details__tab__content">
                            <p class="note">CÔNG NGHỆ NHUỘM KHÔNG NƯỚC ĐẦU TIÊN TRÊN THẾ GIỚI</p>
                            <div class="product__details__tab__content__item">
                                <h5>Thông Tin Chi Tiết</h5>
                                <p>Clean Dye - quy trình nhuộm vải KHÔNG SỬ DỤNG NƯỚC và hoá chất đầu tiên trên
                                    hế giới với nhà máy tại Việt Nam, đem đến những sản phẩm “thời trang bền vững".
                                    Clean Dye sử dụng công nghệ Dye Ox - phát minh bởi công ty Hà Lan DyeCoo, mang tính đột phá,
                                    nhuộm vải mà không cần nước bằng cách sử dụng khí CO2 hoá lỏng ở áp suất cao làm phân tán thuốc
                                    nhuộm và đưa chúng vào sâu bên trong sợi vải. Sau khi nhuộm xong, CO2 được thu hồi và tái sử dung đến 95%.
                                    Quá trình nhuộm tiết kiệm năng lượng và không tạo nguồn nước thải đầu ra.</p>
                                <p>0 lít nước sử dụng trong quy trình nhuộm
                                    0 hoá chất thải ra môi trường
                                    Chỉ ~ 50% thuốc nhuộm được sử dụng
                                    50% năng lượng được tiết kiệm vì toàn bộ được tự động hoá nên cần chi phí thấp và ít lao động hơn
                                    100% thân thiện với môi trường</p>
                            </div>
                            <div class="product__details__tab__content__item">
                                <h5></h5>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-7" role="tabpanel">
                        <div class="product__details__tab__content">
                            <div class="product__details__tab__content__item">
                                <h5>Hướng Dẫn</h5>
                                <p>Coolmate luôn tập trung để mang đến những sản phẩm thiết yếu trong cuộc sống hàng ngày để bạn luôn cảm thấy thoải mái và dễ chịu hơn khi sử dụng thông qua những thiết kế và chất liệu tốt. Tuy nhiên để một sản phẩm bền hơn, đẹp lâu hơn việc bảo quản từ bạn cũng rất quang trọng.
                                    Coolmate chia sẻ bạn một số cách chăm sóc với sản phẩm từ sợi Sorona và nhuộm công nghệ Cleandye này nhé!</p>
                                <p>As is the case with any new technology product, the cost of a Pocket PC
                                    was substantial during it’s early release. For approximately $700.00,
                                    consumers could purchase one of top-of-the-line Pocket PCs in 2003.
                                    These days, customers are finding that prices have become much more
                                    reasonable now that the newness is wearing off. For approximately
                                    $350.00, a new Pocket PC can now be purchased.</p>
                            </div>
                            <div class="product__details__tab__content__item">
                                <h5>LOOK GOOD, DO GOOD, FEEL GOOD</h5>
                                <p>Với những “tips" chăm sóc này, Coolmate mong bạn sẽ chăm sóc tốt và có một sản phẩm bền hơn trong tủ đồ của mình!</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>
<!-- Shop Details Section End -->
<section>
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-left mt-6"><span class="total-record"></span> Đánh Giá</h2>
            <div class="comment" id="commentList">
                @foreach ($comments['data']['list'] as $comment)
                @if($comment['status'] == 1)
                <div class="">
                    <div class="row">
                        <div class="col-md-2 comment-row ">
                            @for ($i = 0; $i < $comment['star_rating']; $i++) <span class="float-left"><i class="text-warning fa fa-star"></i></span>
                                @endfor
                        </div>
                        <div class="col-md-10 comment-row">
                            <div class="blog__details__author__pic d-inline-block">
                                <img src="{{ $comment['user_image_url'] }}" alt="">
                            </div>
                            <p class="d-inline-block ml-2">
                                <strong class="name">{{ $comment['user_name'] }}</strong>
                            </p>
                            <div class="clearfix"></div>
                            <p class="write">
                                {{ $comment['user_comment'] }}
                            </p>
                            <p class="text-secondary text-center float-right">{{ $comment['created_at'] }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="product__pagination" style="margin-bottom:30px">
                <a class="active" href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <span>...</span>
                    <a href="#">21</a>
            </div>
            <div class="comment-box">
                <h4 class="mt-4 mb-4">Đánh giá và Bình luận</h4>
                <form>
                    <div class="comment-rating">
                        <label for="rating">Số Sao</label>
                        <div class="rating">
                            <input type="number" id="ratingInput" name="rating" hidden>
                            <i class='bx bx-star star' style="--i: 0;"></i>
                            <i class='bx bx-star star' style="--i: 1;"></i>
                            <i class='bx bx-star star' style="--i: 2;"></i>
                            <i class='bx bx-star star' style="--i: 3;"></i>
                            <i class='bx bx-star star' style="--i: 4;"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comment">Bình luận</label>
                        <textarea class="form-control" id="commentInput" rows="4" placeholder="Viết bình luận của bạn..."></textarea>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="submitReview()">Gửi đánh giá</button>
                </form>
            </div>
        </div>
    </div>
</section>
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<style>
    .name {
        font-weight: 800;
        color: #007bff !important;
    }

    .comment-row {
        padding-top: 10px;
        border-top: 1px solid rgba(0, 0, 0, 0.2);
    }

    .comment {
        padding: 40px 100px;
    }

    .total-record {
        margin-left: 40px;
    }

    .text-left {
        padding-top: 30px;
        border-top: 1px solid rgba(0, 0, 0, 0.2);
    }

    .write {
        margin-top: 20px;
    }

    .comment-box {
        padding-left: 100px;
        padding-right: 100px;
        margin-bottom: 30px;
    }

    .comment-rating {
        display: flex;
        /* justify-content: center;
    align-items: center; */
    }

    .comment-rating label {
        margin-right: 50px;
    }

    .rating {
        display: flex;
        justify-content: center;
        align-items: center;
        grid-gap: .5rem;
        font-size: 2rem;
        color: var(--yellow);
        margin-bottom: 2rem;
    }

    .rating .star {
        cursor: pointer;
    }

    .rating .star.active {
        opacity: 0;
        animation: animate .5s calc(var(--i) * .1s) ease-in-out forwards;
    }

    @keyframes animate {
        0% {
            opacity: 0;
            transform: scale(1);
        }

        50% {
            opacity: 1;
            transform: scale(1.2);
        }

        100% {
            opacity: 1;
            transform: scale(1);
        }
    }

    .rating .star:hover {
        transform: scale(1.1);
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    //Chổ này xử lý chọn sao
    const allStar = document.querySelectorAll('.rating .star')
    const ratingValue = document.querySelector('.rating input')

    allStar.forEach((item, idx) => {
        item.addEventListener('click', function() {
            let click = 0
            ratingValue.value = idx + 1

            allStar.forEach(i => {
                i.classList.replace('bxs-star', 'bx-star')
                i.classList.remove('active')
            })
            for (let i = 0; i < allStar.length; i++) {
                if (i <= idx) {
                    allStar[i].classList.replace('bx-star', 'bxs-star')
                    allStar[i].classList.add('active')
                } else {
                    allStar[i].style.setProperty('--i', click)
                    click++
                }
            }
        })
    })
    // Chỗ xử lý chọn màu
    const colorRadios = document.querySelectorAll('input[name="color"]');
    const sizeBoxes = document.querySelectorAll('.size-box');
    const sizeLabels = document.querySelectorAll('.size-label');

    colorRadios.forEach(radio => {
        radio.addEventListener('change', event => {
            const selectedColor = event.target.value;
            const colorId = event.target.id.slice(3);
            const sizeBox = document.querySelector(`#size-box-${colorId}`);

            sizeBoxes.forEach(box => {
                if (box !== sizeBox) {
                    box.style.display = 'none';
                } else {
                    box.style.display = 'block';
                }
            });

            sizeLabels.forEach(label => {
                if (selectedColor !== '' && label.id === `size-${colorId}`) {
                    label.style.display = 'block';
                } else {
                    label.style.display = 'none';
                }
            });

            const sizeRadios = sizeBox.querySelectorAll('input[name="size"]');
            sizeRadios.forEach(sizeRadio => {
                sizeRadio.addEventListener('change', event => {
                    const selectedSize = event.target.value;
                    // Xử lý logic khi thay đổi kích thước
                    const selectedColorObj = @json($product['data']['list']);
                    selectedColorObj.forEach(color => {
                        if (color.color_code === selectedColor) {
                            color.size_detail.forEach(size => {
                                if (size.size === selectedSize) {
                                    totalQty = size.quantity;
                                    quantityElement.textContent = '01';
                                }
                            });
                        }
                    });
                });
            });
        });
    });

    const increaseBtn = document.querySelector('.plus');
    const decreaseBtn = document.querySelector('.minus');
    const quantityElement = document.querySelector('.num');
    let totalQty = 0;

    increaseBtn.addEventListener('click', () => {
        let currentQty = parseInt(quantityElement.textContent);
        if (currentQty < totalQty) {
            currentQty++;
            quantityElement.textContent = currentQty.toString().padStart(2, '0');
        }
    });

    decreaseBtn.addEventListener('click', () => {
        let currentQty = parseInt(quantityElement.textContent);
        if (currentQty > 1) {
            currentQty--;
            quantityElement.textContent = currentQty.toString().padStart(2, '0');
        }
    });

    $('.primary-btn').on('click', function(e) {
        e.preventDefault();
        // Lấy thông tin sản phẩm đã chọn từ người dùng hoặc dữ liệu sản phẩm
        var token = "{{ session('token_user') }}";
        var productId = parseInt($('#product-id').val()); // Lấy giá trị từ trường input có id "product-id"
        var colorId = parseInt($('input[name="color"]:checked').data('color-id')); // Lấy giá trị của radio button "color" đã chọn
        var sizeId = parseInt($('input[name="size"]:checked').data('size-id')); // Lấy giá trị của radio button "size" đã chọn
        var quantity = parseInt($('.num').text()); // Lấy giá trị số lượng từ phần tử có class "num"
        // Tạo đối tượng yêu cầu
        console.log('Product ID:', productId);
        console.log('Color ID:', colorId);
        console.log('Size ID:', sizeId);
        console.log('Quantity:', quantity);
        // Lấy token từ localStorage

        // Kiểm tra xem có token hay không
        if (!token) {
            swal("Thông báo", "Bạn cần phải đăng nhập để mua hàng", "error");
            return; // Dừng hàm và không gửi yêu cầu nếu không có token
        }
        // Gửi yêu cầu AJAX tới API với token
        $.ajax({
            url: 'https://localhost:3000/api/cart/add',
            type: 'POST',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            data: {
                product_id: productId,
                color_id: colorId,
                size_id: sizeId,
                quantity: quantity
            },
            success: function(response) {
                console.log(response)
                swal("Thông báo", response.message, "success");
            },
            error: function(message, status, error) {
                // Xử lý lỗi
                console.log(message);
            }
        });
    });

    function submitReview() {
        // Lấy giá trị số sao và bình luận từ các input
        const rating = $("#ratingInput").val();
        const comment = $("#commentInput").val();
        // Lấy giá trị product_id từ trường input
        const productId = $("#product-id").val();
        // Lấy token từ localStorage
        var token = "{{ session('token_user') }}";
        // Kiểm tra xem có token hay không
        if (!token) {
            swal("Thông báo", "Bạn cần phải mua hàng để bình luận", "error");
            return; // Dừng hàm và không gửi yêu cầu nếu không có token
        }
        // Tạo payload dữ liệu gửi đi
        const payload = {
            product_id: productId,
            star_rating: rating,
            user_comment: comment
        };
        // Gửi yêu cầu POST đến API
        $.ajax({
            url: "https://localhost:3000/api/comment/create",
            type: "POST",
            headers: {
                "Content-Type": "application/json",
                "Authorization": "Bearer " + token
            },
            data: JSON.stringify(payload),
            success: function(response) {
                console.log(response);
                // Thêm bình luận mới vào phần hiển thị bình luận
                const newComment = response.data;
                const commentHTML = `
            <div class="">
                <div class="row">
                    <div class="col-md-2 comment-row">
                        ${Array.from({ length: newComment.star_rating }).map(() => '<span class="float-left"><i class="text-warning fa fa-star"></i></span>').join('')}
                    </div>
                    <div class="col-md-10 comment-row">
                        <div class="blog__details__author__pic d-inline-block">
                            <img src="${newComment.user_image_url}" alt="">
                        </div>
                        <p class="d-inline-block ml-2">
                            <strong class="name">${newComment.user_name}</strong>
                        </p>
                        <div class="clearfix"></div>
                        <p class="write">
                            ${newComment.user_comment}
                        </p>
                        <p class="text-secondary text-center float-right">${newComment.created_at}</p>
                    </div>
                </div>
            </div>
        `;
                $(".comment").prepend(commentHTML);
                // Xóa nội dung trong input bình luận
                $("#commentInput").val("");
            },
            error: function(error) {
                console.error("Lỗi khi gửi đánh giá:", error);
                // Xử lý lỗi khi gửi đánh giá
            }
        });
    }
</script>


@endsection