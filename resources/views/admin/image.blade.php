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
                            <i class="fa-solid fa-image"></i>
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
                        <a href="#">Hình Ảnh Sản Phẩm</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Hình Ảnh</h4>
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
                                                Hình Ảnh
                                            </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="addImageForm" action="{{ route('addimages') }}" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="input-icon">
                                                            <span class="input-icon-addon">
                                                                <i class="fa-solid fa-image"></i>
                                                            </span>
                                                            <input id="Image" name="image_url[]" values="image_url" type="file" class="form-control" multiple placeholder="">
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
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Hình Ảnh</th>
                                        <!-- <th style="width: 10%">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($images['data']['list'] as $image)
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>
                                            <img src="{{ $image['image_url'] }}" alt="Hình ảnh" class="thumbnail-image">
                                        </td>
                                        <!-- <td>
                                            <div class="form-button-action">
                                                <button type="button" data-toggle="tooltip" title="Edit Task" class="btn btn-link btn-primary btn-lg">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" data-toggle="tooltip" title="Remove" class="btn btn-link btn-danger">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                        </td> -->
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
<style>
    .thumbnail-image {
        max-width: 120px;
        max-height: 120px;
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
        $('#addRowButton').click(function() {
            $('#addImageForm').submit();
        });
    });
</script>
@endsection