@extends('admin.layout.main')
@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Bảng Dữ Liệu</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="#">
                            <i class="fas fa-user-tie"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tài Khoản</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Người Dùng</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Người Dùng</h4>
                            <!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Thêm
                            </button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Màu</label>
                                                        <input id="addName" type="color" class="form-control" placeholder="">
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
                        </div> -->

                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Họ Tên</th>
                                        <th>Email</th>
                                        <th>Ngày Sinh</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Địa Chỉ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                @php
                  $count = 1;
                  @endphp
                  @foreach($users['data']['list'] as $user)
                  <tr >
                    <td>{{ $count++ }}</td>
                 
                    <td>{{ $user['full_name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['birthday'] }}</td>
                    <td>{{ $user['phone_number'] }}</td>
                    <td>{{ $user['address'] }}</td>
                    
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

        var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $('#addRowButton').click(function() {
            $('#add-row').dataTable().fnAddData([
                $("#addName").val(),
                $("#addPosition").val(),
                $("#addOffice").val(),
                action
            ]);
            $('#addRowModal').modal('hide');

        });
    });
    $(document).ready(function() {
        $('.colorpicker').colorpicker();
    });
</script>
@endsection