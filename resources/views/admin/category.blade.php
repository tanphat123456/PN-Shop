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
                            <i class="fas fa-tshirt"></i>
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
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Thêm
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Thêm Mới</span>
                                            <span class="fw-light">
                                                Loại
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <span class="input-icon-addon">
                                                                <i class="fa-solid fa-house"></i>
                                                            </span>
                                                            <input id="addName" type="text" class="form-control" placeholder="Tên Loại">
                                                        </div>
                                                        <span style="color:red" id="name" class="error-message"></span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">Mô Tả</span>
                                                            </div>
                                                            <textarea class="form-control" id="addMoTa" aria-label="With textarea"></textarea>
                                                        </div>
                                                        <span style="color:red" id="description" class="error-message"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            @csrf
                                        </form>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button type="submit" id="addRowButton" class="btn btn-primary">Thêm</button>
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
                                        <th>Tên Loại</th>
                                        <th>Mô Tả</th>
                                        <th>Trạng Thái</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($category['data']['list'] as $category)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $category['name'] }}</td>
                                        <td>{{ $category['description'] }}</td>
                                        <td class="category-status">
                                            @if($category['status'] == 0)
                                            <button class="btn btn-danger btn-xs">Ngừng Hoạt Động</button>
                                            @elseif($category['status'] == 1)
                                            <button class="btn btn-success btn-xs">Hoạt Động</button>
                                            @endif
                                        </td>
                                        <td>
                                            <label class="toggle-switch">
                                                <input type="checkbox" class="toggle-input" data-category-id="{{ $category['id'] }}" data-category-status="{{ $category['status'] }}" onchange="toggleCategoryStatus(this)">
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
<!--   Core JS Files   -->
<script src="../admin/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../admin/assets/js/setting-demo2.js"></script>



<script>
    $(document).ready(function() {
        // Add Row
        $('#add-row').DataTable({
            "pageLength": 10,
        });

        // Xử lý nút Thêm
        $('#addRowButton').click(function() {
            // Lấy giá trị từ form
            var token = "{{ session('token') }}";
            var name = $("#addName").val();
            var description = $("#addMoTa").val();
            // Gửi request thêm nhà cung cấp với token trong header
            $.ajax({
                url: "https://localhost:3000/api/category/create",
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
                    swal("Thông báo", "Có lỗi xảy ra khi thêm nhà cung cấp!", "error");
                }
            });
        });
    });
</script>
<script>
    function toggleCategoryStatus(checkbox) {
        var categoryId = checkbox.getAttribute("data-category-id");
        var categoryStatus = checkbox.getAttribute("data-category-status");
        var token = "{{ session('token') }}";

        // Gọi API để thay đổi trạng thái
        var url = "https://localhost:3000/api/category/" + categoryId + "/change-status";
        var newStatus = categoryStatus === "1" ? "0" : "1";

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
                checkbox.setAttribute("data-category-status", newStatus);

                // Cập nhật trạng thái trực tiếp trên giao diện
                var statusColumn = checkbox.closest("tr").querySelector(".category-status");
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
            var categoryStatus = checkbox.getAttribute("data-category-status");
            var statusColumn = checkbox.closest("tr").querySelector(".category-status");
            
            if (categoryStatus === "1") {
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