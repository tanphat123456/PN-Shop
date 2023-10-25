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
                            <i class="fas fa-clipboard"></i>
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
                        <a href="#">Hóa Đơn</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Hóa Đơn</h4>

                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal  -->
                        <div class="modal fade" id="HoaDonModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Chi Tiết</span>
                                            <span class="fw-light">
                                                Hóa Đơn
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sản Phẩm</th>
                                                    <th scope="col">Màu</th>
                                                    <th scope="col">SL</th>
                                                    <th scope="col">Size</th>
                                                    <th scope="col">Tổng Giá</th>
                                                </tr>
                                            </thead>
                                            <tbody id="colorSizeList">
                                                <!-- Generate color and size rows dynamically using JavaScript -->
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Sửa -->

                        <!-- Bảng dữ liệu -->
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover nowrap">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Hóa Đơn</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Địa Chỉ</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Trạng Thái</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($orders['data']['list'] as $order)
                                    <tr data-id="{{ $order['id'] }}" id="order-row-{{ $order['id'] }}">
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $order['code'] }}</td>
                                        <td>{{ $order['user_name'] }}</td>
                                        <td>{{ $order['address'] }}</td>
                                        <td>{{ $order['user_email'] }}</td>
                                        <td>{{ $order['user_phone'] }}</td>
                                        <td class="supplier-status">
                                            @if($order['status'] == 0)
                                            <button class="btn btn-warning btn-xs">Chờ Duyệt</button>
                                            @elseif($order['status'] == 1)
                                            <button class="btn btn-success btn-xs">Đã Duyệt</button>
                                            @elseif($order['status'] == 2)
                                            <button class="btn btn-danger btn-xs">Đã Hủy</button>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center">
                                                <button type="button" class="btn-view btn btn-link btn-info" data-toggle="modal" data-target="#HoaDonModal" title="Chi Tiết Hóa Đơn" data-original-title="Edit Task">
                                                    <i class="far fa-eye"></i>
                                                </button> 
                                                @if ($order['status'] != 1 && $order['status'] != 2)
                                                <button type="button" class="btn-confirm btn btn-link btn-success" title="Xác nhận" data-original-title="Confirm" data-order-id="{{ $order['id'] }}">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                @endif
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

</div>
<style>
    .text-center {
        text-align: center;
    }
</style>
</div>
<!--   Core JS Files   -->
<script src="../admin/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../admin/assets/js/setting-demo2.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        // Add Row
        $('#add-row').DataTable({
            "pageLength": 10,
        });

    });

    $(document).ready(function() {
        // Lắng nghe sự kiện click cho nút "Xem chi tiết"
        $(document).on('click', '.btn-view', function() {
            var currentRow = $(this).closest('tr');
            var orderId = currentRow.attr('data-id');
            var token = "{{ session('token') }}";

            $.ajax({
                url: 'https://localhost:3000/api/order/' + orderId + '/for-admin',
                method: 'GET',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    if (response.status === 200 && response.data.list.length > 0) {
                        $('#colorSizeList').empty();

                        $.each(response.data.list, function(index, item) {
                            var row = '<tr>' +
                                '<td>' + item.product_name + '</td>' +
                                '<td>' + item.product_color + '</td>' +
                                '<td>' + item.product_quantity + '</td>' +
                                '<td>' +
                                '<label class="selectgroup-item">' +
                                '<input type="radio" name="value" value="' + item.product_size + '" class="selectgroup-input">' +
                                '<span class="selectgroup-button">' + item.product_size + '</span>' +
                                '</label>' +
                                '</td>' +
                                '<td>' + item.total_amount + '</td>' +
                                '</tr>';
                            $('#colorSizeList').append(row);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra khi lấy chi tiết hóa đơn.');
                }
            });
        });

        // Lắng nghe sự kiện click cho nút "Xác nhận"
        $(document).on('click', '.btn-confirm', function() {
            var orderId = $(this).data('order-id');
            var token = "{{ session('token') }}";
            $.ajax({
                url: 'https://localhost:3000/api/order/' + orderId + '/confim-payment',
                method: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    if (response.status === 200) {
                        // Cập nhật trạng thái thành "Đã Duyệt"
                        var $row = $('#order-row-' + orderId);
                        $row.find('.supplier-status').html('<button class="btn btn-success btn-xs">Đã Duyệt</button>');

                        swal("Thông báo", response.message, "success");
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra khi xác nhận đơn hàng.');
                }
            });
        });
    });
</script>
@endsection