@extends('admin.layout.main')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Admin</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="fas fa-store"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Các Thành Phần</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Thống Kê Sản Phẩm</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Thống Kê Sản Phẩm</h4>
                            <button class="btn btn-primary btn-round ml-auto" id="search">Tìm kiếm</button>
                        </div>
                        <input type="text" id="start_date" name="start_date" placeholder="Chọn ngày bắt đầu">
                        <input type="text" id="end_date" name="end_date" placeholder="Chọn ngày kết thúc">
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="productDetailModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Thông tin chi tiết sản phẩm</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table nowrap-table">
                                                <thead>
                                                    <tr>
                                                        <!-- <th scope="col">Sản Phẩm</th> -->
                                                        <th scope="col">Tên Màu sắc</th>
                                                        <th scope="col">Kích thước</th>
                                                        <th scope="col">Tổng Số lượng</th>
                                                        <th scope="col">Tổng Tiền</th>
                                                        <th scope="col">Số Lượng Còn Lại</th>
                                                        <th scope="col">Tổng Tiền Còn Lại</th>
                                                        <th scope="col">Số Lượng Bán</th>
                                                        <th scope="col">Tổng Tiền Bán</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="colorSizeList">
                                                    <!-- Dữ liệu chi tiết sản phẩm sẽ được thêm vào đây -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover nowrap">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản Phẩm</th>
                                        <th>Nhà Cung Cấp</th>
                                        <th>Giá tiền</th>
                                        <th>Giảm</th>
                                        <th>Tổng Số Lượng</th>
                                        <th>Thành Tiền</th>
                                        <th>Tổng Thành Tiền</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="productList">
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($totalproducts['data']['list'] as $totalproduct)
                                    <tr data-id="{{ $totalproduct['id'] }}">
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $totalproduct['product_name'] }}</td>
                                        <td>{{ $totalproduct['supplier_name'] }}</td>
                                        <td>{{ number_format($totalproduct['amount']) }} VNĐ</td>
                                        <td>{{ number_format($totalproduct['discount_amount']) }} VNĐ</td>
                                        <td>{{ $totalproduct['total_quantity'] }}</td>
                                        <td>{{ number_format($totalproduct['total_amount']) }} VNĐ</td>
                                        <td><strong>{{ number_format($totalproduct['total_quantity_amount']) }} VNĐ</strong></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <button type='button' class='detailButton btn btn-link btn-success btn-lg' data-target='#productDetailModal' title='Xem chi tiết'><i class='fa fa-info-circle'></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="../admin/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../admin/assets/js/setting-demo2.js"></script>

<script>
    $(function() {
        // Thiết lập datepicker cho các input ngày
        $("#start_date").datepicker({
            dateFormat: "dd/mm/yy"
        });
        $("#end_date").datepicker({
            dateFormat: "dd/mm/yy"
        });

        $('#add-row').DataTable({
            "pageLength": 10,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'excel', 'pdf', 'print'
            ]
        });
        // Sự kiện khi bấm nút "Tìm kiếm"
        $("#search").click(function() {
            // Lấy giá trị từ input ngày
            var token = "{{ session('token') }}";
            var startDate = $("#start_date").val();
            var endDate = $("#end_date").val();

            var formatter = new Intl.NumberFormat("vi-VN", {

                minimumFractionDigits: 0,
            });

            $.ajax({
                url: "https://localhost:3000/api/report/product/total-amount",
                method: "GET",
                data: {
                    start_date: startDate,
                    end_date: endDate
                },
                headers: {

                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    // Xử lý kết quả tìm kiếm
                    var productList = response.data.list;

                    // Cập nhật bảng sản phẩm (table) với danh sách sản phẩm tìm được
                    var tableBody = $("#productList");
                    tableBody.empty();

                    if (productList.length > 0) {
                        // Hiển thị danh sách sản phẩm tìm được
                        for (var i = 0; i < productList.length; i++) {
                            var product = productList[i];
                            var row = "<tr>" +
                                "<td>" + (i + 1) + "</td>" +
                                "<td>" + product.product_name + "</td>" +
                                "<td>" + product.supplier_name + "</td>" +
                                "<td>" + formatter.format(product.amount) + " VNĐ</td>" +
                                "<td>" + formatter.format(product.discount_amount) + " VNĐ</td>" +
                                "<td>" + formatter.format(product.total_amount) + " VNĐ</td>" +
                                "<td>" + product.total_quantity + "</td>" +
                                "<td>" + formatter.format(product.total_quantity_amount) + " VNĐ</td>" +
                                "<td><button type='button' class='detailButton btn btn-link btn-success btn-lg' data-target='#productDetailModal' title='Xem chi tiết'><i class='fa fa-info-circle'></i></button></td>" +
                                "<td class='productId' style='display: none;'>" + product.id + "</td>" + // Thêm cột ẩn chứa id sản phẩm
                                "</tr>";

                            tableBody.append(row);
                        }
                    } else {
                        // Hiển thị thông báo khi không tìm thấy sản phẩm
                        var row = "<tr><td colspan='8'>Không tìm thấy sản phẩm trong khoảng thời gian này.</td></tr>";
                        tableBody.append(row);
                    }
                },
                error: function() {
                    // Xử lý khi có lỗi xảy ra
                    console.log("Error occurred during search.");
                }
            });
        });
    });


    $(document).on('click', '.detailButton', function() {
        var token = "{{ session('token') }}";
        var productId = $(this).closest('tr').data('id');
 // Lấy product_id từ cột ẩn chứa id sản phẩm
        var formatter = new Intl.NumberFormat("vi-VN", {
            minimumFractionDigits: 0,
        });
        // Gọi API để lấy chi tiết sản phẩm
        $.ajax({
            url: "https://localhost:3000/api/report/product/" + productId + "/detail",
            method: "GET",
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function(response) {
                var productDetails = response.data.list;
                
                console.log(productDetails);
                // Cập nhật modal với thông tin chi tiết sản phẩm
                var modalBody = $("#colorSizeList");
                modalBody.empty();

                if (productDetails.length > 0) {
                    // Hiển thị danh sách chi tiết sản phẩm
                    for (var i = 0; i < productDetails.length; i++) {
                        var productDetail = productDetails[i];
                        var row = "<tr>" +
                            // "<td>" + productDetail.product_name + "</td>" +
                            "<td class='nowrap'>" + productDetail.color_name + "</td>" +
                            "<td class='nowrap'>" + productDetail.size_name + "</td>" +
                            "<td class='nowrap'>" + productDetail.total_quantity + "</td>" +
                            "<td class='nowrap'>" + formatter.format(productDetail.total_amount) + " VNĐ</td>" +
                            "<td class='nowrap'>" + productDetail.quantity_remain + "</td>" +
                            "<td class='nowrap'>" + formatter.format(productDetail.total_amount_remain) + " VNĐ</td>" +
                            "<td class='nowrap'>" + productDetail.quantity_sell + "</td>" +
                            "<td class='nowrap'>" + formatter.format(productDetail.total_amount_sell) + " VNĐ</td>" +
                            "</tr>";

                        modalBody.append(row);
                    }
                } else {
                    // Hiển thị thông báo khi không có chi tiết sản phẩm
                    var row = "<tr><td colspan='9'>Không có thông tin chi tiết cho sản phẩm này.</td></tr>";
                    modalBody.append(row);
                }

                // Thêm thuộc tính nowrap cho các ô trong hàng chi tiết sản phẩm
                modalBody.find('.nowrap').css('white-space', 'nowrap');

                // Hiển thị modal
                $('#productDetailModal').modal('show');
            },
            error: function(error) {
                console.log(error);
                // Xử lý lỗi khi gọi API
            }
        });
    });

    // Sự kiện khi đóng modal
    $('#productDetailModal').on('hidden.bs.modal', function() {
        // Xóa nội dung modal khi đóng
        $("#colorSizeList").empty();
    });
</script>
@endsection