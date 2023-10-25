@extends('user.layout.main')
@section('main')
<?php
$activeTab = $_GET['tab'] ?? 'personal-info';
?>
<section class="user-details">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="user-details__content2">
                    <ul class="nav flex-column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link2 <?= $activeTab === 'personal-info' ? 'active' : '' ?>" data-toggle="tab" href="#tabs-5" role="tab">Thông Tin Cá Nhân</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link2 <?= $activeTab === 'order-history' ? 'active' : '' ?>" data-toggle="tab" href="#tabs-6" role="tab">Lịch Sử Hóa Đơn</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link2" data-toggle="tab" href="#tabs-7" role="tab">Đổi Mật Khẩu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link2" href="{{ route('home') }}">Thoát</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-5" role="tabpanel">
                        <div class="user-details__content">
                            <h2 class="user-details__title">Hồ Sơ Của Tôi</h2>
                            <form class="user-details__form">
                                <div class="form">
                                    <label for="full-name">Họ tên:</label>
                                    <input type="text" class="form-control" id="full-name" value="{{ $details['data']['full_name'] }}" placeholder="">
                                </div>
                                <div class="form">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control" id="email" value="{{ $details['data']['email'] }}" placeholder="" disabled>
                                </div>
                                <div class="form">
                                    <label for="phone-number">Số điện thoại:</label>
                                    <input type="tel" class="form-control" id="phone-number" value="{{ $details['data']['phone_number'] }}" placeholder="" disabled>
                                </div>
                                <div class="form">
                                    <label for="dob">Ngày sinh:</label>
                                    <input type="text" class="form-control" id="dob" value="{{ $details['data']['birthday'] }}">
                                </div>
                                <button type="submit" class="btn btn-primary" id="update-btn">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-6" role="tabpanel">
                        <div class="table-responsive">
                            <table id="order" class="display table table-striped table-hover nowrap">
                                <thead>
                                    <tr>
                                        <th>Thời Gian</th>
                                        <th> Mã Đơn Hàng</th>
                                        <th>Thành Tiền</th>
                                        <th>Trạng thái</th>                                 
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historyOrders['data']['list'] as $order)
                                    <tr>
                                    <td><a href="{{ route('orderdetail', ['id' => $order['id']]) }}">{{ $order['created_at'] }}</a></td>
                                        <td><a href="{{ route('orderdetail', ['id' => $order['id']]) }}">#{{ $order['code'] }}</a></td>
                                        <td><a href="{{ route('orderdetail', ['id' => $order['id']]) }}">{{ number_format($order['total_amount']) }} VNĐ</a></td>
                                        <td class="order-status">
                                            <a href="{{ route('orderdetail', ['id' => $order['id']]) }}">
                                                @if($order['status'] == 0)
                                                <button class="btn-danger btn-xs">Chờ Xác Nhận</button>
                                                @elseif($order['status'] == 1)
                                                <button class="btn-success btn-xs">Đã Xác Nhận</button>
                                                @else
                                                <button class="btn-secondary btn-xs">Đã Hủy</button>
                                                @endif
                                            </a>
                                        </td>        
                                        <td>
                                            <div class="cart__close">
                                            <i class="fa fa-close" data-order-id="{{ $order['id'] }}" onclick="deleteOrder(this, {{ $order['id'] }})"></i>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-7" role="tabpanel">
                        <div class="user-details__content">
                            <h2 class="user-details__title">Đổi Mật Khẩu</h2>
                            <form class="user-details__form" id="change-password-form">
                                <div class="form">
                                    <label for="old-password">Mật Khẩu Cũ:</label>
                                    <input type="password" class="form-control" id="old-password" placeholder="Mật Khẩu Cũ">
                                </div>
                                <div class="form">
                                    <label for="new-password">Mật Khẩu Mới:</label>
                                    <input type="password" class="form-control" id="new-password" placeholder="Mật Khẩu Mới">
                                </div>
                                <div class="form">
                                    <label for="confirm-password">Xác Nhận Mật Khẩu:</label>
                                    <input type="password" class="form-control" id="confirm-password" placeholder="Xác Nhận Mật Khẩu">
                                </div>
                                <button type="submit" class="btn btn-primary" id="update2-btn">Đổi Mật Khẩu</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<style>
    .title {
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 10px;
    }

    tr td {
        cursor: pointer;
    }

    .btn-xs {
        font-size: 12px;
        padding: 5px;
        border-radius: 8px;
    }

    .date {
        font-size: 14px;
    }

    .order-item {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        background-color: #2f5acf;
        border-radius: 16px;
        padding: 10px 30px;
        position: relative;
        z-index: 2;
        margin-bottom: 10px;
    }

    .order-item2 {
        border: 1px solid #d9d9d9;
        background-color: white;
        margin-top: -16px;
        border-radius: 0 0 16px 16px;
        position: relative;
        z-index: 1;
        padding-top: 32px;
    }

    .order-item3 {
        display: flex;
        justify-content: flex-end;
        width: 100%;
        border: 1px solid #d9d9d9;
        background-color: #d9d9d9;
        padding: calc(0.5rem + 16px) 30px 0.5rem;
        margin-top: -16px;
        border-radius: 0 0 16px 16px;
        position: relative;
        margin-bottom: 15px;
        z-index: 0;
    }


    .order-item .order-code {
        color: white;
    }

    .order-item .order-status {
        background-color: white;
        border-radius: 8px;
        color: #8E8E8E;
        font-size: 10px;
        padding: 8px;
    }

    .order-details {
        font-weight: 600;
        margin: 0 10px 10px 10px;
    }

    .order-item3 .order-price {
        font-weight: 800;
    }
</style>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
<script src="../User/js/jquery-3.3.1.min.js"></script>
<script>
    // $(document).ready(function() {
    //     $('.clickable-row').click(function() {
    //         window.location.href = $(this).data('href');
    //     });
    // });

    $(document).ready(function() {
        // Xử lý sự kiện khi nhấn vào nút "Cập nhật"
        $('#order').DataTable({
            "pageLength": 10,
            "info": false,
        });

        $('#update-btn').click(function(event) {
            event.preventDefault(); // Ngăn chặn việc gửi yêu cầu mặc định
            var token = "{{ session('token_user') }}";
            // Lấy giá trị từ các trường nhập liệu
            var fullName = $('#full-name').val();
            var email = $('#email').val();
            var phoneNumber = $('#phone-number').val();
            var image_url ='/storage/images/avatar.jpg';
            var dob = $('#dob').val();

            // Tạo đối tượng dữ liệu yêu cầu
            var requestData = {
                "full_name": fullName,
                "email": email,
                "phone_number": phoneNumber,
                "birthday": dob
            };
            // Gửi yêu cầu cập nhật thông tin người dùng
            $.ajax({
                url: "https://localhost:3000/api/users/update-profile",
                type: "POST",
                data: JSON.stringify(requestData),
                contentType: "application/json",
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                success: function(response) {
                    // Xử lý phản hồi thành công
                    if (response.status === 200) {
                        swal("Thông báo", response.message, "success");
                        // Cập nhật thông tin người dùng trên giao diện
                        $('#full-name').val(response.data.full_name);
                        $('#email').val(response.data.email);
                        $('#phone-number').val(response.data.phone_number);
                        $('#dob').val(response.data.birthday);
                    }
                },
                error: function(error) {

                    console.log(error);
                }
            });
        });
    });
    // Chỗ này xử lý đổi mật khẩu
    $(document).ready(function() {
        // Xử lý sự kiện khi nhấn vào nút "Đổi Mật Khẩu"
        $('#update2-btn').click(function(event) {
            event.preventDefault(); // Ngăn chặn việc gửi yêu cầu mặc định
            var token = "{{ session('token_user') }}";

            var oldPassword = $('#old-password').val();
            var newPassword = $('#new-password').val();
            var confirmPassword = $('#confirm-password').val();
            // Kiểm tra mật khẩu mới và xác nhận mật khẩu phải khớp nhau
            if (newPassword !== confirmPassword) {
                swal("Lỗi", "Mật khẩu mới và xác nhận mật khẩu không khớp nhau", "error");
                return;
            }
            // Mã hóa mật khẩu bằng Base64
            var encodedOldPassword = btoa(oldPassword);
            var encodedNewPassword = btoa(newPassword);
            var encodedConfirmPassword = btoa(confirmPassword);
            $.ajax({
                url: "https://localhost:3000/api/users/change-password",
                type: "POST",
                dataType: 'json',
                data: {
                    old_password: encodedOldPassword,
                    new_password: encodedNewPassword,
                    confirm_password: encodedConfirmPassword,
                    _token: '{{ csrf_token() }}' // Thêm token CSRF để bảo vệ chống tấn công CSRF
                },
                headers: {
                    'Authorization': 'Bearer ' + token
                },

                success: function(response) {
                    console.log(response);
                    if (response.status === 200) {
                        swal("Thành công", 'Đổi Thành Công  ', "success");
                        // Xóa giá trị các trường nhập liệu
                        $('#old-password').val('');
                        $('#new-password').val('');
                        $('#confirm-password').val('');
                    } else if (response.status === 403) {
                        swal("Thất Bại", response.message, "error");
                    } else if (response.status === 400) {
                        swal("Thất Bại", response.message, "error");
                    }
                },
            });

        });
    });
    //Đổi Trạng Thái Order
    function deleteOrder(checkbox, orderId) {
        var token = "{{ session('token_user') }}";

        // Gọi API để xóa đơn hàng
        $.ajax({
            url: 'https://localhost:3000/api/order/' + orderId + '/cancel-payment',
            headers: {
                'Authorization': 'Bearer ' + token
            },
            method: 'POST',
            dataType: 'json',
            success: function(response) {
            if (response.status === 400) {
                swal("Lỗi", response.message, "error");
            } else {
                // Cập nhật trạng thái trong DOM
                var statusColumn = checkbox.closest("tr").querySelector(".order-status");
                if (statusColumn) {
                    statusColumn.innerHTML = '<button class="btn btn-secondary btn-xs">Đã Hủy</button>';
                }
                swal("Thông báo", response.message, "success");
            }
        },
        });
    }
</script>


@endsection