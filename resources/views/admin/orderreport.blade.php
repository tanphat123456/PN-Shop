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
                        <a href="#">Hóa Đơn</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Hóa Đơn</h4>
                            <button class="btn btn-primary btn-round ml-auto" id="search2">Tìm kiếm</button>
                        </div>
                        <input type="text" id="start_date2" name="start_date2" placeholder="Chọn ngày bắt đầu">
                        <input type="text" id="end_date2" name="end_date2" placeholder="Chọn ngày kết thúc">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover nowrap">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tổng Đơn Hàng</th>
                                        <th>Tổng Tiền Đơn Hàng</th>
                                        <th>Đã Thanh Toán</th>
                                        <th>Tổng Tiền Đã Thanh Toán</th>
                                        <th>Chưa Thanh Toán</th>
                                        <th>Thổng Tiền Đã Thanh Toán</th>
                                    </tr>
                                </thead>
                                <tbody id="ordertList">
                                    @php
                                    $count = 1;
                                    @endphp
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $ordertotals['data']['total_order'] }}</td>
                                        <td>{{ number_format($ordertotals['data']['total_order_amount']) }} VNĐ</td>
                                        <td>{{ $ordertotals['data']['total_order_pay_complete'] }}</td>
                                        <td>{{ number_format($ordertotals['data']['total_amount_pay_complete']) }} VNĐ</td>
                                        <td>{{ $ordertotals['data']['total_order_unpaid'] }}</td>
                                        <td>{{ number_format($ordertotals['data']['total_amount_unpaid']) }} VNĐ</td>
                                    </tr>
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
        $("#start_date2").datepicker({
            dateFormat: "dd/mm/yy"
        });
        $("#end_date2").datepicker({
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
        $("#search2").click(function() {
            // Lấy giá trị từ input ngày
            var token = "{{ session('token') }}";
            var startDate = $("#start_date2").val();
            var endDate = $("#end_date2").val();

            var formatter = new Intl.NumberFormat("vi-VN", {

                minimumFractionDigits: 0,
            });

            // Gửi yêu cầu tìm kiếm đến máy chủ hoặc xử lý tìm kiếm ngay trên trang (tùy vào cách bạn triển khai)

            // Ví dụ: Gửi yêu cầu AJAX đến máy chủ và nhận danh sách sản phẩm tìm được
            $.ajax({
                url: "https://localhost:3000/api/report/order/total-amount",
                method: "GET",
                data: {
                    start_date: startDate,
                    end_date: endDate
                    
                },
                headers: {

                    'Authorization': 'Bearer ' + token
                },
                
                success: function(response) {
                    var orders = response.data;
                    var tableBody = $("#ordertList");
                    tableBody.empty();

                    if (orders) {
                        var row = "<tr>" +
                            "<td>1</td>" +
                            "<td>" + orders.total_order + "</td>" +
                            "<td>" + formatter.format(orders.total_order_amount) + " VNĐ</td>" +
                            "<td>" + orders.total_order_pay_complete + "</td>" +
                            "<td>" + formatter.format(orders.total_amount_pay_complete) + " VNĐ</td>" +
                            "<td>" + orders.total_order_unpaid + "</td>" +
                            "<td>" + formatter.format(orders.total_amount_unpaid) + " VNĐ</td>" +
                            "</tr>";
                        tableBody.append(row);
                    } else {
                        var errorRow = "<tr><td colspan='8'>Không tìm thấy thông tin đơn hàng trong khoảng thời gian này.</td></tr>";
                        tableBody.append(errorRow);
                    }
                },

                error: function() {
                    // Xử lý khi có lỗi xảy ra
                    console.log(data);
                }
            });
         
        });
    });
</script>
@endsection