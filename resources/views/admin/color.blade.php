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
                        <i class="fa-solid fa-droplet"></i>
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
                        <a href="#">Màu Sản Phẩm</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Màu</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Thêm
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Tạo
                                            </span>
                                            <span class="fw-light">
                                                Màu
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <span class="input-icon-addon">
                                                                <i class="fa-solid fa-signature"></i>
                                                            </span>
                                                            <input id="addName2" type="text" class="form-control" placeholder="Tên Màu">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <span class="input-icon-addon">
                                                                <i class="fa-regular fa-images"></i>
                                                            </span>
                                                            <input id="images_id" type="text" class="form-control" placeholder="ID Hình">
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <input id="addName" type="color" class="" style="width: 100%;height:41px" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <span class="input-icon-addon">
                                                                <i class="fa-solid fa-code"></i>
                                                            </span>
                                                            <input id="hexColor" type="text" class="form-control" placeholder="Mã Màu">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="button" id="addRowButton" class="btn btn-primary">Thêm</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Màu</th>
                                        <th>Mã Màu</th>
                                        <th>Trạng Thái</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($colors['data']['list'] as $color)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $color['name'] }}</td>
                                        <td>
                                            <label>
                                                <span class="colorinput-color" style="background-color: {{ $color['description'] }} ; border-radius:50%" title="{{ $color['description'] }}"></span>
                                            </label>
                                        </td>
                                        <td class="color-status">
                                            @if($color['status'] == 0)
                                            <button class="btn btn-danger btn-xs">Ngừng Hoạt Động</button>
                                            @elseif($color['status'] == 1)
                                            <button class="btn btn-success btn-xs">Hoạt Động</button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <label class="toggle-switch ml-3">
                                                    <input type="checkbox" class="toggle-input" data-supplier-id="{{ $color['id'] }}" data-supplier-status="{{ $color['status'] }}" onchange="toggleColorStatus(this)">
                                                    <span class="toggle-slider"></span>
                                                </label>
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
</div>

<script src="../admin/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../admin/assets/js/setting-demo2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinycolor/1.4.2/tinycolor.min.js"></script>
<!-- Thêm stylesheet của Spectrum -->
<script>
    $(document).ready(function() {
        // Add Row
        $('#add-row').DataTable({
            "pageLength": 10,
        });

        $('#addRowButton').click(function(event) {
            event.preventDefault();
            var token = "{{ session('token') }}";
            // Lấy giá trị từ form
            var name = $("#addName2").val();
            var description = $("#hexColor").val();
            var image_id = $("#images_id").val();

            // Gửi request thêm sản phẩm
            $.ajax({
                url: 'https://localhost:3000/api/color/create',
                method: 'POST',
                data: {
                    name: name,
                    description: description,
                    image_id: image_id
                },
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    // Đóng modal trước khi thông báo
                    $('#addRowModal').modal('hide');

                    if (response.message) {
                        // Hiển thị thông báo sau khi đóng modal
                        swal("Thông báo", response.message, "success").then(function() {
                            location.reload();
                        });
                    }
                },
                error: function(error) {
                    swal("Lỗi", "Có lỗi xảy ra khi thêm sản phẩm!", "error");
                    console.log(error);
                }
            });
        });

        // Khi giá trị của trường input "addName" thay đổi
        $("#addName").change(function() {
            // Lấy giá trị của trường input "addName"
            var colorValue = $(this).val();

            // Chuyển đổi giá trị từ "color" sang "hex"
            var hexColor = tinycolor(colorValue).toHexString();

            // Lấy tên màu từ giá trị Hex
            var colorName = tinycolor(hexColor).toName();

            // Đặt giá trị của trường input "hexColor" là giá trị màu Hex
            $("#hexColor").val(hexColor);

            // Đặt giá trị của trường input "addName" là tên màu nếu có
            if (colorName) {
                $(this).val(colorName);
            }
        });
    });

    function toggleColorStatus(checkbox) {
        var colorId = checkbox.getAttribute("data-supplier-id");
        var colorStatus = checkbox.getAttribute("data-supplier-status");
        var token = "{{ session('token') }}";
        // Gọi API để thay đổi trạng thái
        var url = "https://localhost:3000/api/color/" + colorId + "/change-status";
        var newStatus = colorStatus === "1" ? "0" : "1";

        // Sử dụng fetch hoặc AJAX để gửi yêu cầu đến API
        fetch(url, {
                method: "POST",
                body: JSON.stringify({
                    status: newStatus
                }),
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": 'Bearer ' + token
                }
            })
            .then(response => response.json())
            .then(data => {
                // Xử lý kết quả từ API thành công (nếu cần)
                // Cập nhật trạng thái của checkbox
                checkbox.setAttribute("data-supplier-status", newStatus);

                // Cập nhật trạng thái trực tiếp trên giao diện
                var statusColumn = checkbox.closest("tr").querySelector(".color-status");
                if (colorStatus === "1") {
                    statusColumn.innerHTML = '<button class="btn btn-danger btn-xs">Ngừng Hoạt Động</button>';
                } else {
                    statusColumn.innerHTML = '<button class="btn btn-success btn-xs">Hoạt Động</button>';
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    }

    // Kiểm tra và đặt lại trạng thái của checkbox khi tải lại trang
    window.addEventListener("DOMContentLoaded", function() {
        var checkboxes = document.querySelectorAll(".toggle-input");
        checkboxes.forEach(function(checkbox) {
            var colorStatus = checkbox.getAttribute("data-supplier-status");
            var statusColumn = checkbox.closest("tr").querySelector(".color-status");

            if (colorStatus === "1") {
                checkbox.checked = true;
                statusColumn.innerHTML = '<button class="btn btn-success btn-xs">Hoạt Động</button>';
            } else {
                checkbox.checked = false;
                statusColumn.innerHTML = '<button class="btn btn-danger btn-xs">Ngừng Hoạt Động</button>';
            }
        });
    });
</script>
@endsection