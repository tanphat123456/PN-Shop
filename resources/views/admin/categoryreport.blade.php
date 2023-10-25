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
                        <a href="#">Loại Sản Phẩm</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Loại Sản Phẩm</h4>
                            <button class="btn btn-primary btn-round ml-auto" id="search3">Tìm kiếm</button>
                        </div>
                        <input type="text" id="start_date3" name="start_date2" placeholder="Chọn ngày bắt đầu">
                        <input type="text" id="end_date3" name="end_date2" placeholder="Chọn ngày kết thúc">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover nowrap">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên</th>
                                        <th>Mô Tả</th>
                                        <th>Tổng Số Lượng Còn Lại</th>
                                        <th>Tổng Số Lượng Đã Bán</th>
                                        <th>Tổng Tiền Số Lượng Bán</th>
                                    </tr>
                                </thead>
                                <tbody id="categoryList">
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($categoryreports['data']['list'] as $categoryreport)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $categoryreport['name'] }}</td>
                                        <td>{{ $categoryreport['description'] }}</td>
                                        <td>{{ number_format($categoryreport['total_quantity_remain']) }}</td>
                                        <td>{{ number_format($categoryreport['total_quantity_sell']) }}</td>
                                        <td>{{ number_format($categoryreport['total_quantity_amount_sell']) }}VNĐ</td>
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
        $("#start_date3").datepicker({
            dateFormat: "dd/mm/yy"
        });
        $("#end_date3").datepicker({
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
        $("#search3").click(function() {
            // Lấy giá trị từ input ngày
            var token = "{{ session('token') }}";
            var startDate = $("#start_date3").val();
            var endDate = $("#end_date3").val();

            var formatter = new Intl.NumberFormat("vi-VN", {

                minimumFractionDigits: 0,
            });

            // Gửi yêu cầu tìm kiếm đến máy chủ hoặc xử lý tìm kiếm ngay trên trang (tùy vào cách bạn triển khai)

            // Ví dụ: Gửi yêu cầu AJAX đến máy chủ và nhận danh sách sản phẩm tìm được
            $.ajax({
                url: "https://localhost:3000/api/report/category/total-amount",
                method: "GET",
                data: {
                    start_date: startDate,
                    end_date: endDate
                },
                headers: {

                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    // console.log(response)
                    // Xử lý kết quả tìm kiếm
                    var categoryList = response.data.list;

                    // Cập nhật bảng sản phẩm (table) với danh sách sản phẩm tìm được
                    var tableBody = $("#categoryList");
                    tableBody.empty();

                    if (categoryList.length > 0) {
                        // Hiển thị danh sách sản phẩm tìm được
                        for (var i = 0; i < categoryList.length; i++) {
                            var categorys = categoryList[i];
                            var row = "<tr>" +
                                "<td>" + (i + 1) + "</td>" +
                                "<td>" + categorys.name + "</td>" +
                                "<td>" + categorys.description + "</td>" +

                                "<td>" + categorys.total_quantity_remain + "</td>" +
                                "<td>" + categorys.total_quantity_sell + "</td>" +
                                "<td>" + categorys.total_quantity_amount_sell + "</td>" +
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
</script>
@endsection