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
                        <i class="fas fa-pencil-ruler"></i>
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
                        <a href="#">Size Sản Phẩm</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Size</h4>
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
                                                Thêm</span>
                                            <span class="fw-light">
                                                Size
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="addImageForm" action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="form-label">Size</label>
                                                        <div class="selectgroup w-100">
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="value" value="S" class="selectgroup-input" checked="">
                                                                <span class="selectgroup-button">S</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="value" value="M" class="selectgroup-input">
                                                                <span class="selectgroup-button">M</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="value" value="L" class="selectgroup-input">
                                                                <span class="selectgroup-button">L</span>
                                                            </label>
                                                            <label class="selectgroup-item">
                                                                <input type="radio" name="value" value="XL" class="selectgroup-input">
                                                                <span class="selectgroup-button">XL</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Mô Tả</span>
                                                            </div>
                                                            <input id="addDescription" type="text" class="form-control" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @csrf
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
                            <table id="add-row" class="display table table-striped table-hover nowrap">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Size</th>
                                        <th>Mô Tả</th>
                                        <th>Trạng Thái</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($sizes['data']['list'] as $size)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="value" value="50" class="selectgroup-input" >
                                                <span class="selectgroup-button"> {{ $size['name'] }}</span>
                                            </label>
                                        </td>
                                        <td>{{ $size['description'] }}</td>
                                        <td class="size-status">
                                            @if($size['status'] == 0)
                                            <button class="btn btn-danger btn-xs">Ngừng Hoạt Động</button>
                                            @elseif($size['status'] == 1)
                                            <button class="btn btn-success btn-xs">Hoạt Động</button>
                                            @endif
                                        </td>
                                        <td>
                                            <label class="toggle-switch">
                                                <input type="checkbox" class="toggle-input" data-size-id="{{ $size['id'] }}" data-size-status="{{ $size['status'] }}" onchange="toggleSizeStatus(this)">
                                                <span class="toggle-slider"></span>
                                            </label>
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
<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="https://www.themekita.com">
                        ThemeKita
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Help
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Licenses
                    </a>
                </li>
            </ul>
        </nav>
        <div class="copyright ml-auto">
            2018, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.themekita.com">ThemeKita</a>
        </div>
    </div>
</footer>
</div>
</div>
<style>
    .thumbnail-image {
        max-width: 170px;
        max-height: 170px;
        object-fit: cover;
    }
</style>
<!--   Core JS Files   -->
<script src="../admin/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../admin/assets/js/setting-demo2.js"></script>
<script>
    $(document).ready(function() {
        $('#add-row').DataTable({
            "pageLength": 10,
        });
        var token = "{{ session('token') }}";
        $('#addRowButton').click(function() {
            // Lấy giá trị từ form
            var name = $("input[name='value']:checked").val();
            var description = $("#addDescription").val();

            // Gửi request thêm size với token trong header
            $.ajax({
                url: "https://localhost:3000/api/size/create",
                method: "POST",
                data: {
                    name: name,
                    description: description,
                },
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    // Đóng modal trước khi thông báo
                    $('#addRowModal').modal('hide');
                    setTimeout(function() {
                        swal("Thông báo", response.message, "success").then(function() {
                            location.reload();
                        });
                    });
                },
                error: function() {
                    swal("Thông báo", "Có lỗi xảy ra khi thêm size!", "error");
                }
            });
        });
    });

    function toggleSizeStatus(checkbox) {
        var sizeId = checkbox.getAttribute("data-size-id");
        var sizeStatus = checkbox.getAttribute("data-size-status");
        var token = "{{ session('token') }}";
        // Gọi API để thay đổi trạng thái
        var url = "https://localhost:3000/api/size/" + sizeId + "/change-status";
        var newStatus = sizeStatus === "1" ? "0" : "1";

        // Sử dụng fetch hoặc AJAX để gửi yêu cầu đến API
        fetch(url, {
                method: "POST",
                body: JSON.stringify({
                    status: newStatus
                }),
                headers: {
                    "Content-Type": "application/json",
                    "Authorization": "Bearer " + token
                }
            })
            .then(response => response.json())
            .then(data => {
                // Xử lý kết quả từ API thành công (nếu cần)
                // Cập nhật trạng thái của checkbox
                checkbox.setAttribute("data-size-status", newStatus);

                // Cập nhật trạng thái trực tiếp trên giao diện
                var statusColumn = checkbox.closest("tr").querySelector(".size-status");
                if (newStatus === "1") {
                    checkbox.checked = true;
                    statusColumn.innerHTML = '<button class="btn btn-success btn-xs">Hoạt Động</button>';
                } else {
                    checkbox.checked = false;
                    statusColumn.innerHTML = '<button class="btn btn-danger btn-xs">Ngừng Hoạt Động</button>';
                }
            })
            .catch(error => {
                // Xử lý lỗi khi gọi API (nếu cần)
                console.error("Error:", error);
            });
    }

    // Kiểm tra và đặt lại trạng thái của checkbox khi tải lại trang
    window.addEventListener("DOMContentLoaded", function() {
        var checkboxes = document.querySelectorAll(".toggle-input");
        checkboxes.forEach(function(checkbox) {
            var sizeStatus = checkbox.getAttribute("data-size-status");
            var statusColumn = checkbox.closest("tr").querySelector(".size-status");

            if (sizeStatus === "1") {
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