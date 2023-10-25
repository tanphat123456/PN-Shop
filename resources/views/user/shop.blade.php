@extends('user.layout.main')
@section('main')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Cửa Hàng</h4>
                    <div class="breadcrumb__links">
                        <a href="{{route('home')}}">Trang Chủ</a>
                        <span>Cửa Hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="#">
                            <input type="text" id="searchInput" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Loại Sản Phẩm</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                                @foreach($categorys['data']['list'] as $category)
                                                <li><a href="#" class="category-link" data-category="{{ $category['id'] }}">{{ $category['name'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Thương Hiệu</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul>
                                                @foreach($suppliers['data']['list'] as $supplier)
                                                <li><a href="#" class="supplier-link" data-supplier="{{ $supplier['id'] }}">{{ $supplier['name'] }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9">

                <div class="row" id="productList">
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            @php
                            $currentPage = request()->input('page', 1);
                            @endphp
                            @for ($i = 1; $i <= $currentPage + 1; $i++) <a class="{{ $i == $currentPage ? 'active' : '' }}" href="{{ route('shop', ['page' => $i]) }}">{{ $i }}</a>
                                @endfor
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script>
    const searchForm = document.querySelector('form');
    const searchInput = document.getElementById('searchInput');
    const productList = document.querySelector('.col-lg-9 .row');

    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const keyword = searchInput.value.trim();
        if (keyword !== '') {
            // Gọi API tìm kiếm và lấy danh sách sản phẩm
            fetch(`https://localhost:3000/api/product?key_search=${keyword}`)
                .then(response => response.json())
                .then(data => {
                    // Xử lý dữ liệu và hiển thị danh sách sản phẩm
                    const products = data.data.list;
                    if (Array.isArray(products)) {
                        // Xóa danh sách sản phẩm hiện tại
                        productList.innerHTML = '';

                        products.forEach(product => {
                            // Tạo phần tử HTML cho từng sản phẩm
                            const productItemHTML = `
                            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="shop-index-carousel set-bg">
                                        <div class="content-slider">
                                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    ${product.product_image.map((image, index) => `
                                                        <div class="item ${index === 0 ? 'active' : ''}">
                                                        <div class="product__item__pic set-bg" data-setbg="${image.image_url}" style="background-image: url('${image.image_url}');">
                                                        <a href="/${product.id}/detail" class="product__item__link">
                                                            
                                                         </a>
                                                     </div>
                                                        </div>
                                                    `).join('')}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product__color__select">
                                     ${product.product_detail.map(detail => `
                                     <label for="" style="background: ${detail.description}">
                                         <input type="radio" id="${detail.color_id}">
                                     </label>
                                    `).join('')}
                                 </div>
                                    <div class="product__item__text">
                                        <h6>${product.name}</h6>
                                        <a href="/${product.id}/detail" class="add-cart">+ Mua Ngay</a>
                                        <h5>${numberFormat(product.amount)} VNĐ</h5>
                                    </div>
                                </div>
                            </div>
                        `;

                            productList.insertAdjacentHTML('beforeend', productItemHTML);
                        });
                    } else {
                        console.error('Invalid product data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });

    function numberFormat(number) {
        return new Intl.NumberFormat('vi-VN').format(number);
    }
</script>
<script>
   const categoryLinks = document.querySelectorAll('.category-link');
categoryLinks.forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    const categoryId = this.dataset.category;
    callApi(categoryId);
  });
});

const supplierLinks = document.querySelectorAll('.supplier-link');
supplierLinks.forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    const supplierId = this.dataset.supplier;
    callApi(null, supplierId);
  });
});


    // Hàm gọi API và cập nhật nội dung trang
    function callApi(categoryId, supplierId) {
        // Xử lý logic gọi API và cập nhật nội dung trang
        // Sử dụng AJAX hoặc Fetch API để gọi API
        // Ví dụ sử dụng Fetch API:
        fetch(`https://localhost:3000/api/product?${categoryId ? `category_id=${categoryId}` : ''}${supplierId ? `&supplier_id=${supplierId}` : ''}`)
            .then(response => response.json())
            .then(data => {
      console.log('API Response:', data);

      if (data.status === 200 && data.data && data.data.list) {
        updateProductList(data.data.list);
      }
    })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function updateProductList(products) {
        const productList = document.getElementById('productList');
        productList.innerHTML = '';

        products.forEach(product => {
            if (product.status === 1) {
                const productHTML = `
                        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="shop-index-carousel set-bg">
                            <div class="content-slider">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    ${product.product_image
                                    .map(
                                        (image, index) => `
                                        <div class="item ${index === 0 ? 'active' : ''}">
                                            <div class="product__item__pic set-bg" data-setbg="${image.image_url}" style="background-image: url('${image.image_url}');">
                                            <a href="/${product.id}/detail" class="product__item__link"></a>
                                            </div>
                                        </div>
                                        `
                                    )
                                    .join('')}
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="product__color__select">
                            ${product.product_detail
                                .map(
                                detail => `
                                    <label for="" style="background: ${detail.description}">
                                    <input type="radio" id="${detail.color_id}">
                                    </label>
                                `
                                )
                                .join('')}
                            </div>
                            <div class="product__item__text">
                            <h6>${product.name}</h6>
                            <a href="/${product.id}/detail" class="add-cart">+ Mua Ngay</a>
                            <h5>${numberFormat(product.amount)} VNĐ</h5>
                            </div>
                        </div>
                        </div>
                    `;

                productList.innerHTML += productHTML;
            }
        });
    }
</script>

@endsection

<!-- <div class="shop__product__option">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__left">
                                <p>Showing 1–12 of 126 results</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="shop__product__option__right">
                                <p>Giá:</p>
                                <select>
                                    <option value="">Thấp Đến Cao</option>
                                    <option value="">0 - 150.000</option>
                                    <option value="">150.000 - 450.000</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div> -->

<!-- <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Loại Sản Phẩm</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                                <li><a href="#">Áo</a></li>
                                                <li><a href="#">Túi</a></li>
                                                <li><a href="#">Quần</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseTwo">Thương Hiệu</a>
                                </div>
                                <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__brand">
                                            <ul>
                                                <li><a href="#">Louis Vuitton</a></li>
                                                <li><a href="#">Chanel</a></li>
                                                <li><a href="#">Hermes</a></li>
                                                <li><a href="#">Gucci</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
<!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            @php
                                $currentPage = request()->input('page', 1);
                            @endphp
                            @for($i = 1; $i <= $products['data']['total_record'] / $products['data']['limit']; $i++)
                                <a class="{{ $i == $currentPage ? 'active' : '' }}" href="{{ route('shop', ['page' => $i]) }}">{{ $i }}</a>
                            @endfor
                        </div>
                    </div> -->