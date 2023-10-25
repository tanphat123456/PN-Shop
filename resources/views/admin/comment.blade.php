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
                        <a href="#">Bình luận</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Bình Luận</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover nowrap">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Tên Người Dùng</th>
                                        <th>Bình Luận</th>
                                        <th>Số Sao</th>
                                        <th>Trạng Thái</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $count = 1;
                                    @endphp
                                    @foreach($comments['data']['list'] as $comment)
                                    <tr data-id="{{ $comment['id'] }}" id="comment-row-{{ $comment['id'] }}">
                                        <td>{{ $count++ }}</td>
                                        <td>
                                            {{ $comment['product_name'] }}
                                        </td>
                                        <td> {{ $comment['user_name'] }} </td>
                                        <td> {{ $comment['user_comment'] }} </td>
                                        <td> {{ $comment['star_rating'] }} </td>
                                        <td class="comment-status">
                                            @if($comment['status'] == 0)
                                            <button class="btn btn-danger btn-xs">Chờ Duyệt</button>
                                            @elseif($comment['status'] == 1)
                                            <button class="btn btn-success btn-xs">Đã Duyệt</button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-button-action">
                                            <button type="button" class="btn-confirm btn btn-link btn-success" title="Xác nhận" data-original-title="Confirm" data-comment-id="{{ $comment['id'] }}">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <button type="button" data-toggle="tooltip" class="btn btn-link btn-danger delete-comment-btn" data-comment-id="{{ $comment['id'] }}">
                                                    <i class="fa fa-times"></i>
                                                </button>                                           
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add-row').DataTable({
            "pageLength": 10,
        });

        // Lắng nghe sự kiện click vào nút Xóa
        $(document).on('click', '.delete-comment-btn', function() {
            var commentId = $(this).data('comment-id');
            var token = "{{ session('token') }}";
            // Gửi yêu cầu xóa bình luận tới API
            $.ajax({
                url: 'https://localhost:3000/api/comment/' + commentId + '/delete',
                type: 'POST',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    // Xóa dòng trong bảng HTML khi xóa thành công
                    swal("Thông báo", response.message, "success");
                    $('#comment-row-' + commentId).remove();
                },
                error: function(xhr, status, error) {
                    console.error('Có lỗi xảy ra khi xóa bình luận.');
                }
            });
        });
    });

    $(document).on('click', '.btn-confirm', function() {
        var commentId = $(this).data('comment-id');
        var token = "{{ session('token') }}";
        $.ajax({
            url: 'https://localhost:3000/api/comment/' + commentId + '/accept-comment',
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            success: function(response) {
                if (response.status === 200) {
                    // Cập nhật trạng thái 
                    var $row = $('#comment-row-' + commentId);
                    $row.find('.comment-status').html('<button class="btn btn-success btn-xs">Đã Duyệt</button>');

                    swal("Thông báo", response.message, "success");
                } else if (response.status === 403) {
                    swal("Lỗi", response.message, "error");
                }
            },
            error: function(xhr, status, error) {
                console.error('Có lỗi xảy ra khi xác nhận đơn hàng.');
            }
        });
    });
</script>

@endsection