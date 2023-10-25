<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <!-- Nhúng các thư viện CSS -->
 <link href="../User/js/datatables.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="icon" type="image/x-icon" href="../User/logo_shop.jpg">
    <link rel="stylesheet" href="../User/css/font-awesome.min.css" type="text/css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="../User/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../User/fontawesome/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="../User/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../User/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../User/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="../User/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../User/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../User/css/style.css" type="text/css">
</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">ĐĂNG NHẬP</a>
                <a href="#">CÂU HỎI THƯỜNG GẶP</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a class=" search-switch"><img src="../User/img/icon/search.png" alt=""></a>
            <a><img src="../User/img/icon/heart.png" alt=""></a>
            <a><img src="../User/img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Miễn phí vận chuyển, bảo đảm đổi trả hoặc hoàn tiền trong 30 ngày.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="header__top__left">
                            <span>Miễn phí vận chuyển, bảo đảm đổi trả hoặc hoàn tiền trong 30 ngày.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">Trang Chủ</a></li>
                            <li class=""><a href="{{ route('shop') }}">Cửa Hàng</a></li>
                            <!-- <li><a href="{{ route('shop') }}">Quần Áo nam</a>
                            <li><a href="{{ route('shop') }}">Quần Áo Nữ</a> -->
                            <!-- <li><a href="#">Giới Thiệu</a> -->
                                <!-- <ul class="dropdown">
                                    <li><a href=""></a></li>
                                    <li><a href="ml">Shop</a></li>
                                    <li><a href="ml">Shopping Cart</a></li>
                                </ul> -->
                            <!-- </li> -->
                            <li><a href="{{ route('contact') }}">Liên Hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-2">
                    <div class="header__nav__option">
                        <!-- <a href="#" class="search-switch"><img src="../User/img/icon/search.png" alt=""></a> -->
                        <div class="dropdown">
                            <a href="#" class="js-login"><i class="fa-regular fa-user"></i></a>
                            <div class="dropdown-content">
                                <a href="{{ route('userdetails', ['tab' => 'personal-info']) }}" style="font-size: 13px;"><i class="fa-regular fa-user"></i> THÔNG TIN CÁ NHÂN</a>
                                <!-- <a href="{{ route('userdetails', ['tab' => 'order-history']) }}" style="font-size: 13px;"><i class="fa-solid fa-clipboard"></i> LỊCH SỬ ĐƠN HÀNG</a> -->
                                <a href="#" class="logout-link" style="font-size: 13px;"><i class="fas fa-sign-out-alt"></i> ĐĂNG XUẤT</a>
                            </div>
                        </div>
                        <a href="{{route('shoppingcart')}}"><img src="../User/img/icon/cart.png" alt=""> <span id="cartItemCount">0</span></a>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
    </header>
    <!-- Header Section End -->

    @yield('main')

    @include('user.footer')


    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Modal Đăng Nhập -->
    <div class="modal js-modal">
        <form id="login-form" action="" method="" class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <header class="modal-header">
                Đăng Nhập
            </header>
            <div class="modal-body">
                <label class="modal-label">
                    Nếu đã từng mua hàng trên Website trước đây, bạn có thể dùng tính năng
                    <a href="" class="js-forgot">"Lấy mật khẩu"</a>
                    để có thể truy cập vào tài khoản.
                </label>
                <span style="color: red; font-size: 14px;" id="phone_number_error" class="error-message"></span>
                <input type="text" name="phone_number" id="phone_number" class="modal-input" placeholder="SĐT của bạn">

                <span style="color: red; font-size: 14px;" id="password_error" class="error-message"></span>
                <input type="password" name="password" id="password" class="modal-input" placeholder="Mật khẩu">

                <button id="buy-tickets" type="submit">
                    Đăng nhập
                </button>
                <label class="modal-label">
                    Hoặc
                </label>
                <button id="btn-fb">
                    <a href="login-facebook">Đăng nhập với Facebook</a>
                    <i class=" fa-brands fa-square-facebook"></i>
                </button>
                <button id="btn-gg">
                    Đăng nhập với Google
                    <i class=" fa-brands fa-google"></i>
                </button>
            </div>
            <footer class="modal-footer">
                <a href="" class="js-register">Đăng ký tài khoản mới</a>
            </footer>
        </form>
    </div>
    <!-- End Modal -->

    <!-- Đăng Ký -->
    <div class="modal js-modal-register">
        <form id="register-form" action="" method="" class="modal-container-register js-register-container" enctype="multipart/form-data">
            <div class="modal-close js-register-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <header class="modal-header">
                Đăng Ký Tài khoản
            </header>
            <div class="modal-body">
                <label class="modal-label">
                    Nếu đã từng mua hàng trên Website trước đây, bạn có thể dùng tính năng
                    <a href="">"Lấy mật khẩu"</a>
                    để có thể truy cập vào tài khoản.
                </label>
                <span style="color: red; font-size: 14px;" id="register_full_name_error" class="error-message"></span>
                <input type="text" name="full_name" id="register_full_name" class="modal-input" placeholder="Họ và Tên">

                <input type="file" name="image_url" id="register_image_url" class="modal-input" placeholder="URL ảnh">

                <span style="color: red; font-size: 14px;" id="register_email_error" class="error-message"></span>
                <input type="text" name="email" id="register_email" class="modal-input" placeholder="Email">

                <span style="color: red; font-size: 14px;" id="register_phone_number_error" class="error-message"></span>
                <input type="text" name="phone_number" id="register_phone_number" class="modal-input" placeholder="SĐT">

                <span style="color: red; font-size: 14px;" id="register_address_error" class="error-message"></span>
                <input type="text" name="address" id="register_address" class="modal-input" placeholder="Địa Chỉ">

                <span style="color: red; font-size: 14px;" id="register_birthday_error" class="error-message"></span>
                <input type="date" name="birthday" id="register_birthday" class="modal-input" placeholder="Ngày Sinh">

                <span style="color: red; font-size: 14px;" id="register_password_error" class="error-message"></span>
                <input type="password" name="password" id="register_password" class="modal-input" placeholder="Mật khẩu">

                <button id="btn-register" type="submit">
                    Đăng Ký
                </button>
                <label class="modal-label">
                    Hoặc
                </label>
                <button id="btn-fb-register">
                    Đăng ký với Facebook
                    <i class=" fa-brands fa-square-facebook"></i>
                </button>
                <button id="btn-gg-register">
                    Đăng ký với Google
                    <i class=" fa-brands fa-google"></i>
                </button>
            </div>
        </form>
    </div>
    <!-- End Đăng Ký -->
    <!--Modal Quên mật khẩu -->
    <div class="modal js-modal-forgot">
        <form id="forgot-form" action="" method="" class="modal-container-forgot js-forgot-container">
            <div class="modal-close js-forgot-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <header class="modal-header">
                Cấp Lại Mật Khẩu
            </header>
            <div class="modal-body">
                <input type="text" name="email" id="forgot_email" class="modal-input" placeholder="Email">
                <button id="btn-forgot" type="submit">
                    Kiểm Tra
                </button>
            </div>
        </form>
    </div>
    <!-- End Quên Mật Khẩu -->
    <!-- Verify code -->
    <div class="modal js-modal-verify">
        <form id="verify-form" action="" method="" class="modal-container-verify js-verify-container">
            <div class="modal-close js-verify-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <header class="modal-header">
                Xác Thực Mã
            </header>
            <div class="modal-body">
                <input type="text" name="verification_code" id="verification_code" class="modal-input" placeholder="Mã xác thực">
                <button id="btn-verify" type="submit">
                    Xác Thực
                </button>
            </div>
        </form>
    </div>
    <!-- End verify code -->
    <!-- Đổi Mật Khẩu -->
    <div class="modal js-modal-change">
        <form id="change-form" action="" method="" class="modal-container-change js-change-container">
            <div class="modal-close js-change-close">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <header class="modal-header">
                Đổi Mật Khẩu
            </header>
            <div class="modal-body">
                <input type="password" name="new_password" id="new_password" class="modal-input" placeholder="Mật Khẩu Mới">
                <input type="password" name="confirm_password" id="confirm_password" class="modal-input" placeholder="Nhập Lại Mật Khẩu">
                <button id="btn-change" type="submit">
                    Xác Nhận
                </button>
            </div>
        </form>
    </div>
    <!-- End Đổi mật khẩu -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .error {
            border: 1px solid #f88;
        }
    </style>
    <script>
        //Đăng nhập
        const buyBtn = document.querySelector('.js-login')
        const modal = document.querySelector('.js-modal')
        const modalClose = document.querySelector('.js-modal-close')
        const modalContainer = document.querySelector('.js-modal-container')
        //Mở hộp thoại đăng nhập
        function showBuyTicket() {
            // Nếu người dùng chưa đăng nhập, hiển thị modal đăng nhập
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của thẻ a
            if (!isLoggedIn) {
                modal.classList.add('open');
            }
        }

        function closeBuyTickets() {
            //xóa class open
            modal.classList.remove('open');
        }
        //Nhấn mở đăng nhập
        buyBtn.addEventListener('click', showBuyTicket)
        modalClose.addEventListener('click', closeBuyTickets)
        modal.addEventListener('click', closeBuyTickets)
        modalContainer.addEventListener('click', function(event) {
            event.stopPropagation()
        })

        function validateInputs() {
            var phoneNumber = $('#phone_number');
            var password = $('#password');
            var valid = true;

            // phoneNumber.removeClass('error');
            // password.removeClass('error');

            if (phoneNumber.val() === '') {
                $('#phone_number_error').text('Vui lòng nhập số điện thoại của bạn.');
                phoneNumber.addClass('error');
                valid = false;
            } else if (phoneNumber.val().length < 10 || phoneNumber.val().length > 11 || isNaN(phoneNumber.val())) {
                $('#phone_number_error').text('Số điện thoại không hợp lệ.');
                phoneNumber.addClass('error');
                valid = false;
            } else {
                $('#phone_number_error').text('');
            }

            if (password.val() === '') {
                $('#password_error').text('Vui lòng nhập mật khẩu của bạn.');
                password.addClass('error');
                valid = false;
            } else {
                $('#password_error').text('');
            }
            return valid;
        }

        $(document).ready(function() {
            $('.logout-link').click(handleLogout);
        });
        let isLoggedIn = false;
        $(document).ready(function() {
            // Kiểm tra trạng thái đăng nhập khi trang được tải
            isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
            if (isLoggedIn) {
                // Hiển thị dropdown menu và thêm class "success"
                $('.dropdown-content').addClass('success');
            }
            // Khi form đăng nhập được submit
            $('#login-form').submit(function(event) {
                // Ngăn chặn việc submit form
                event.preventDefault();
                // Validation khi người dùng nhập
                if (validateInputs() == false) {
                    return;
                }
                // Lấy các giá trị từ các input trong form
                var phoneNumber = $('#phone_number').val();
                var password = $('#password').val();
                // Gửi yêu cầu đăng nhập bằng Ajax
                $.ajax({
                    url: "{{route('login')}}",
                    method: 'POST',
                    dataType: 'json', // Kiểu dữ liệu trả về là JSON
                    data: {
                        phone_number: phoneNumber,
                        password: password,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            // Lưu trạng thái đăng nhập vào localStorage
                            localStorage.setItem('isLoggedIn', 'true');
                            // Lưu token vào localStorage
                            // localStorage.setItem('token', response.data.token); // Lưu token vào localStorage
                            // Đóng modal trước khi thông báo
                            $('.js-modal').removeClass('open');
                            swal("Thông báo", response.message, "success");
                            // Hiển thị dropdown menu và thêm class "success"
                            $('.dropdown-content').addClass('success');
                            getCartItemCount();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Xử lý lỗi nếu có
                        $('#phone_number_error').text('Sai mật khẩu hoặc số điện thoại');
                        console.error(error);
                    }
                });
            });
        });
        // $(document).ready(function() {
        //     // Kiểm tra trạng thái đăng nhập khi trang được tải
        //     var isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
        //     if (isLoggedIn) {
        //         // Hiển thị dropdown menu và thêm class "success"
        //         $('.dropdown-content').addClass('success');
        //     }

        //     // Xử lý sự kiện click của nút "Đăng nhập với Facebook"
        //     $('#btn-fb').click(function(event) {
        //         event.preventDefault();

        //         // Lưu trạng thái đăng nhập vào localStorage
        //         localStorage.setItem('isLoggedIn', 'true');

        //         // Tiếp tục xử lý đăng nhập với Facebook
        //         window.location.href = $(this).find('a').attr('href');
        //     });
        // });

        //Hàm đăng xuất
        function handleLogout(event) {
            event.preventDefault();
            localStorage.removeItem('token');
            localStorage.removeItem('isLoggedIn');
            localStorage.removeItem('cartItemCount');
            fetch("{{ route('logoutUser') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                })
                .then(() => {
                    // Ẩn dropdown menu
                    $('.dropdown-content').removeClass('success');
                    // Chuyển hướng đến trang 'home'
                    window.location.href = "{{ route('home') }}";
                })
                .catch(error => {
                    // Xử lý lỗi nếu có
                    console.error(error);
                });
        }
    </script>
    <script>
        //Đăng Ký
        const signup = document.querySelector('.js-register')
        const modalregister = document.querySelector('.js-modal-register')
        const modalregisterclose = document.querySelector('.js-register-close')
        const modalregisterCon = document.querySelector('.js-register-container')
        //Mở hộp thoại đăng ký
        function showRegister() {
            modalregister.classList.add('open');
        }

        function closeregister() {
            modalregister.classList.remove('open');
        }
        //Nhấn mở đăng ký
        signup.addEventListener('click', function(event) {
            event.preventDefault();
            closeBuyTickets();
            showRegister();
        });
        modalregisterclose.addEventListener('click', closeregister)
        modalregister.addEventListener('click', closeregister)
        modalregisterCon.addEventListener('click', function(event) {
            event.stopPropagation()
        })

        function validateInputsRegister() {
            // Kiểm tra các input và hiển thị thông báo lỗi nếu cần
            var fullName = $('#register_full_name');
            var email = $('#register_email');
            var phoneNumber = $('#register_phone_number');
            var password = $('#register_password');
            var birthday = $('#register_birthday');
            var valid = true;

            if (fullName.val() === '') {
                $('#register_full_name_error').text('Vui lòng nhập họ tên của bạn.');
                fullName.addClass('error');
                valid = false;
            } else {
                $('#register_full_name_error').text('');
                fullName.removeClass('error');
            }

            if (email.val() === '') {
                $('#register_email_error').text('Vui lòng nhập địa chỉ email của bạn.');
                email.addClass('error');
                valid = false;
            } else {
                $('#register_email_error').text('');
                email.removeClass('error');
            }

            if (phoneNumber.val() === '') {
                $('#register_phone_number_error').text('Vui lòng nhập số điện thoại của bạn.');
                phoneNumber.addClass('error');
                valid = false;
            } else if (phoneNumber.val().length < 10 || phoneNumber.val().length > 11 || isNaN(phoneNumber.val())) {
                $('#register_phone_number_error').text('Số điện thoại không hợp lệ.');
                phoneNumber.addClass('error');
                valid = false;
            } else {
                // Kiểm tra số điện thoại đã tồn tại hay chưa
                $.ajax({
                    url: "{{route('register')}}", // URL của route kiểm tra số điện thoại
                    method: 'POST',
                    dataType: 'json', // Kiểu dữ liệu trả về là JSON
                    data: {
                        phone_number: phoneNumber.val(),
                        _token: '{{ csrf_token() }}' // Thêm token CSRF để bảo vệ chống tấn công CSRF
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#register_phone_number_error').text('Số điện thoại đã được đăng ký.');
                            phoneNumber.addClass('error');
                            valid = false;
                        } else {
                            $('#register_phone_number_error').text('');
                            phoneNumber.removeClass('error');
                            $('#register_form').unbind('submit').submit();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            if (birthday.val() === '') {
                $('#register_birthday_error').text('Vui lòng chọn ngày sinh của bạn.');
                birthday.addClass('error');
                valid = false;
            } else {
                $('#register_birthday_error').text('');
                birthday.removeClass('error');
            }

            if (password.val() === '') {
                $('#register_password_error').text('Vui lòng nhập mật khẩu của bạn.');
                password.addClass('error');
                valid = false;
            } else if (password.val().length < 6) {
                $('#register_password_error').text('Mật khẩu phải có ít nhất 6 ký tự.');
                password.addClass('error');
                valid = false;
            } else {
                $('#register_password_error').text('');
                password.removeClass('error');
            }

            return valid;
        }

        $(document).ready(function() {
            // Khi form đăng ký được submit
            $('#register-form').submit(function(event) {
                // Ngăn chặn việc submit form
                event.preventDefault();
                // Validation khi người dùng nhập
                if (validateInputsRegister() == false) {
                    return;
                }
                // Lấy các giá trị từ các input trong form
                var full_name = $('#register_full_name').val();
                var email = $('#register_email').val();
                var phone_number = $('#register_phone_number').val();
                var password = $('#register_password').val();
                var birthday = $('#register_birthday').val();

                // Tạo FormData object để chứa dữ liệu form và file ảnh
                var formData = new FormData($('#register-form')[0]);
                formData.append('_token', '{{ csrf_token() }}');

                // Gửi yêu cầu đăng ký bằng Ajax
                $.ajax({
                    url: "{{route('register')}}", // URL của route xử lý đăng ký
                    method: 'POST',
                    dataType: 'json', // Kiểu dữ liệu trả về là JSON
                    data: formData,
                    contentType: false, // Không đặt header Content-Type
                    processData: false, // Không xử lý dữ liệu
                    success: function(response) {
                        if (response.success) {
                            // Đóng modal trước khi thông báo
                            $('.js-modal-register').removeClass('open');
                            if (response.message) {
                                // Hiển thị thông báo sau khi đóng modal
                                setTimeout(function() {
                                    swal("Thông báo", response.message, "success");
                                }, 500); // Wait 500ms before showing the alert message
                            }
                        } else {
                            // Hiển thị thông báo lỗi
                            $('#register_full_name_error').text(response.errors.full_name);
                            $('#register_email_error').text(response.errors.email);
                            $('#register_phone_number_error').text(response.errors.phone_number);
                            $('#register_birthday_error').text(response.errors.birthday);
                            $('#register_password_error').text(response.errors.password);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>

    <!-- Xử lý quên mật khẩu -->
    <script>
        //Quên mật khẩu
        const forgot = document.querySelector('.js-forgot')
        const modalforgot = document.querySelector('.js-modal-forgot')
        const modalforgotclose = document.querySelector('.js-forgot-close')
        const modalforgotCon = document.querySelector('.js-forgot-container')

        //Mở hộp thoại mật khẩu
        function showforgot() {
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của thẻ a
            modalforgot.classList.add('open');
        }

        function closeforgot() {
            modalforgot.classList.remove('open');
        }
        forgot.addEventListener('click', function(event) {
            event.preventDefault();
            closeBuyTickets();
            closeforgot();
            showforgot();
        })
        modalforgotclose.addEventListener('click', closeforgot)
        modalforgot.addEventListener('click', closeforgot)
        modalforgotCon.addEventListener('click', function(event) {
            event.stopPropagation()
        })
        $(document).ready(function() {
            // Khi form quên mật khẩu được submit
            $('#forgot-form').submit(function(event) {
                event.preventDefault(); // Ngăn chặn sự kiện mặc định của form
                // Lấy các giá trị từ các input trong form
                var email = $('#forgot_email').val();
                // Gửi yêu cầu đổi mật khẩu bằng Ajax
                $.ajax({
                    url: "https://localhost:3000/api/users/forgot-password", // URL của route xử lý đổi mật khẩu
                    method: 'POST',
                    dataType: 'json', // Kiểu dữ liệu trả về là JSON
                    data: {
                        email: email,
                        _token: '{{ csrf_token() }}' // Thêm token CSRF để bảo vệ chống tấn công CSRF
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            // Xử lý thành công
                            $('.js-modal-forgot').removeClass('open');
                            localStorage.setItem('email', email);
                            localStorage.setItem('token', response.data.token);
                            showverify();
                        } else if (response.status === 400) {
                            var errorMessage = response.message;
                            toastr.error(errorMessage, "", {
                                "toastClass": "toast-error",
                                "closeButton": true,
                                "closeClass": "toast-close-button"
                            });
                        } else if (response.status === 403) {
                            var errorMessage = response.message;
                            toastr.error(errorMessage, "", {
                                "toastClass": "toast-error",
                                "closeButton": true,
                                "closeClass": "toast-close-button"
                            });
                        }
                    },
                    error: function(response) {
                        // Xử lý khi có lỗi trong quá trình gửi yêu cầu
                        console.error(response);
                    }
                });
            });
        });
    </script>
    <!-- Chỗ verify sau khi nhận email -->
    <script>
        //Verify mật khẩu
        const verify = document.querySelector('.js-verify')
        const modalverify = document.querySelector('.js-modal-verify')
        const modalverifyclose = document.querySelector('.js-verify-close')
        const modalverifyCon = document.querySelector('.js-verify-container')
        //Mở hộp thoại mật khẩu
        function showverify() {
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của thẻ a
            modalverify.classList.add('open');
        }

        function closeverify() {
            modalverify.classList.remove('open');
        }
        // verify.addEventListener('click', function(event) {
        //     event.preventDefault();
        //     closeforgot();
        //     showforgot();
        //     closeverify();
        // })
        modalverifyclose.addEventListener('click', closeverify)
        modalverify.addEventListener('click', closeverify)
        modalverifyCon.addEventListener('click', function(event) {
            event.stopPropagation()
        })
        $(document).ready(function() {
            // Khi form verify được submit
            $('#verify-form').submit(function(event) {
                event.preventDefault(); // Ngăn chặn sự kiện mặc định của form
                // Lấy thông tin email và phone_number từ session
                var email = localStorage.getItem('email');
                // Lấy giá trị mã xác thực từ input
                var verification_code = $('#verification_code').val();
                // Gửi yêu cầu xác thực bằng Ajax
                $.ajax({
                    url: "https://localhost:3000/api/users/verify-code", // URL của route xử lý xác thực
                    method: 'POST',
                    dataType: 'json', // Kiểu dữ liệu trả về là JSON
                    data: {
                        email: email,
                        verify_code: verification_code,
                        _token: '{{ csrf_token() }}' // Thêm token CSRF để bảo vệ chống tấn công CSRF
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            var data = response.data; // Lấy dữ liệu từ phản hồi API
                            localStorage.setItem('data', data); // Lưu giá trị 'data' vào Local Storage
                            // Chuyển sang form đổi mật khẩu
                            closeverify();
                            showchange();
                        } else if (response.status === 400) {
                            // Hiển thị thông báo lỗi
                            var errorMessage = response.message;
                            toastr.error(errorMessage, "", {
                                "toastClass": "toast-error",
                                "closeButton": true,
                                "closeClass": "toast-close-button"
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    <script>
        //Change mật khẩu
        const change = document.querySelector('.js-change')
        const modalchange = document.querySelector('.js-modal-change')
        const modalchangeclose = document.querySelector('.js-change-close')
        const modalchangeCon = document.querySelector('.js-change-container')
        //Mở hộp thoại mật khẩu
        function showchange() {
            event.preventDefault(); // Ngăn chặn sự kiện mặc định của thẻ a
            modalchange.classList.add('open');
        }

        function closechange() {
            modalchange.classList.remove('open');
        }
        modalchangeclose.addEventListener('click', closechange)
        modalchange.addEventListener('click', closechange)
        modalchangeCon.addEventListener('click', function(event) {
            event.stopPropagation()
        })
        $(document).ready(function() {
            // Khi form đổi mật khẩu được submit
            $('#change-form').submit(function(event) {
                event.preventDefault(); // Ngăn chặn sự kiện mặc định của form
                var token = localStorage.getItem('token');
                // Lấy giá trị mật khẩu cũ từ Local Storage
                var oldPassword = localStorage.getItem('data');
                // Lấy giá trị mật khẩu mới và xác nhận mật khẩu từ input
                var newPassword = $('#new_password').val();
                var confirmPassword = $('#confirm_password').val();
                // Kiểm tra xác nhận mật khẩu
                if (newPassword !== confirmPassword) {
                    toastr.error("Mật khẩu mới không khớp. Vui lòng nhập lại!", "", {
                        "toastClass": "toast-error",
                        "closeButton": true,
                        "closeClass": "toast-close-button"
                    });
                    return;
                }
                // Mã hóa mật khẩu bằng Base64
                var encodedOldPassword = btoa(oldPassword);
                var encodedNewPassword = btoa(newPassword);
                var encodedConfirmPassword = btoa(confirmPassword);
                // Gửi yêu cầu thay đổi mật khẩu bằng Ajax
                $.ajax({
                    url: "https://localhost:3000/api/users/change-password", // URL của route xử lý thay đổi mật khẩu
                    method: 'POST',
                    dataType: 'json', // Kiểu dữ liệu trả về là JSON
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
                        // console.log(response);
                        localStorage.removeItem('data');
                        localStorage.removeItem('email');
                        localStorage.removeItem('token');
                        // Xử lý phản hồi từ API Change Password
                        closechange();
                        toastr.success(response.message, "", {
                            "toastClass": "toast-success",
                            "closeButton": true,
                            "closeClass": "toast-close-button"
                        });
                        showBuyTicket()
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
    <script>
        // Gọi hàm lấy dữ liệu giỏ hàng từ API và hiển thị số lượng sản phẩm
        function getCartItemCount() {
            var token = localStorage.getItem('token');
            $.ajax({
                url: 'https://localhost:3000/api/cart',
                headers: {
                    'Authorization': 'Bearer ' + token
                },
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 200) {
                        var cartItemCount = response.data.total_record;
                        // Hiển thị số lượng sản phẩm trong thẻ có id "cartItemCount"
                        $('#cartItemCount').text(cartItemCount);
                    } else {
                        console.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
        // Gọi hàm lấy số lượng sản phẩm khi trang tải xong
        $(document).ready(function() {
            getCartItemCount();
        });
    </script>
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
    </script>
    <script>
        const productColors = document.querySelectorAll('.product-color');
        productColors.forEach(color => {
            color.addEventListener('click', () => {
                productColors.forEach(c => c.classList.remove('active'));
                color.classList.add('active');
            });
        });
    </script>
    <!-- Datatables -->

<script src="../User/js/jquery-3.3.1.min.js"></script>

<!-- Nhúng DataTables sau khi đã nhúng jQuery -->
<script src="../User/js/datatables.min.js"></script>

<!-- Nhúng các thư viện JavaScript khác -->
<script src="../User/js/bootstrap.min.js"></script>
<script src="../User/js/jquery.nice-select.min.js"></script>
<script src="../User/js/jquery.nicescroll.min.js"></script>
<script src="../User/js/jquery.magnific-popup.min.js"></script>
<script src="../User/js/jquery.countdown.min.js"></script>
<script src="../User/js/jquery.slicknav.js"></script>
<script src="../User/js/mixitup.min.js"></script>
<script src="../User/js/owl.carousel.min.js"></script>
<script src="../User/js/main.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>