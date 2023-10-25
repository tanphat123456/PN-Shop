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
            <a href="#">Nhà Cung Cấp</a>
          </li>
        </ul>
      </div>
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <h4 class="card-title">Nhà Cung Cấp</h4>
              <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                <i class="fa fa-plus"></i>
                Thêm
              </button>
            </div>
          </div>
          <div class="card-body">
            <!-- Modal  -->
            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header no-bd">
                    <h5 class="modal-title">
                      <span class="fw-mediumbold">
                        Thêm Mới</span>
                      <span class="fw-light">
                        Nhà Cung Cấp
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
                              <input id="addName" type="text" class="form-control" placeholder="Tên Nhà Cung Cấp">
                            </div>
                            <span style="color:red" id="name" class="error-message"></span>
                          </div>
                        </div>
                        <!-- <div class="col-sm-6">
                          <div class="form-group">
                            <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fa-brands fa-slack"></i>
                              </span>
                              <input id="addLoGo" type="text" class="form-control" placeholder="LoGo">
                            </div>
                            <span style="color:red" id="logo" class="error-message"></span>
                          </div>
                        </div> -->
                        <div class="col-sm-12">
                          <div class="form-group">
                            <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fa-solid fa-address-book"></i>
                              </span>
                              <input id="addDiaChi" type="text" class="form-control" placeholder="Địa Chỉ">
                            </div>
                            <span style="color:red" id="address" class="error-message"></span>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fa-solid fa-envelope"></i>
                              </span>
                              <input id="addEmail" type="text" class="form-control" placeholder="Email">
                            </div>
                            <span style="color:red" id="email" class="error-message"></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fa-solid fa-phone"></i>
                              </span>
                              <input id="addOffice" type="text" class="form-control" placeholder="SĐT">
                            </div>
                            <span style="color:red" id="phone" class="error-message"></span>
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
            <!-- End Modal Thêm -->

            <!-- Modal  -->
            <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header no-bd">
                    <h5 class="modal-title">
                      <span class="fw-mediumbold">
                        Sửa</span>
                      <span class="fw-light">
                        Nhà Cung Cấp
                      </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="form-group ">
                            <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fa-solid fa-house"></i>
                              </span>
                              <input id="editName" type="text" class="form-control" placeholder="Tên Nhà Cung Cấp">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group ">
                            <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fa-brands fa-slack"></i>
                              </span>
                              <input id="editLoGo" type="text" class="form-control" placeholder="LoGo">
                            </div>
                            <span style="color:red" id="logo" class="error-message"></span>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group ">
                            <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fa-solid fa-address-book"></i>
                              </span>
                              <input id="editDiaChi" type="text" class="form-control" placeholder="Địa Chỉ">
                            </div>
                            <span style="color:red" id="address" class="error-message"></span>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group ">
                            <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fa-solid fa-envelope"></i>
                              </span>
                              <input id="editEmail" type="text" class="form-control" placeholder="Email">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group ">
                            <div class="input-icon">
                              <span class="input-icon-addon">
                                <i class="fa-solid fa-phone"></i>
                              </span>
                              <input id="editOffice" type="text" class="form-control" placeholder="SĐT">
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group ">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">Mô Tả</span>
                              </div>
                              <textarea class="form-control" id="editMoTa" aria-label="With textarea"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      @csrf
                    </form>
                  </div>
                  <div class="modal-footer no-bd">
                    <button type="submit" id="editRowButton" class="btn btn-primary">Sửa</button>
                    <button type="button" class="btn btn-danger" id="closeButton">Đóng</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Modal Sửa -->

            <!-- Bảng dữ liệu -->
            <div class="table-responsive">
              <table id="add-row" class="display table table-striped table-hover nowrap">
                <thead>
                  <tr>
                    <th>STT</th>
                    <!-- <th>LoGo</th> -->
                    <th>Tên Nhà Cung Cấp</th>
                    <th>Địa Chỉ</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Trạng Thái</th>
                    <th style="width: 10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $count = 1;
                  @endphp
                  @foreach($suppliers['data']['list'] as $supplier)
                  <tr data-id="{{ $supplier['id'] }}" data-logo="{{ $supplier['logo'] }}" data-address="{{ $supplier['address'] }}" data-name="{{ $supplier['name'] }}" data-description="{{ $supplier['description'] }}" data-email="{{ $supplier['email'] }}" data-phone="{{ $supplier['phone_number'] }}" data-status="{{ $supplier['status'] }}">
                    <td>{{ $count++ }}</td>
                    <!-- <td>{{ $supplier['logo'] }}</td> -->
                    <td>{{ $supplier['name'] }}</td>
                    <td>{{ $supplier['address'] }}</td>
                    <td>{{ $supplier['email'] }}</td>
                    <td>{{ $supplier['phone_number'] }}</td>
                    <td class="supplier-status">
                      @if($supplier['status'] == 0)
                      <button class="btn btn-danger btn-xs">Không Hoạt Động</button>
                      @elseif($supplier['status'] == 1)
                      <button class="btn btn-success btn-xs">Hoạt Động</button>
                      @endif
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <label class="toggle-switch ml-3">
                          <input type="checkbox" class="toggle-input" data-supplier-id="{{ $supplier['id'] }}" data-supplier-status="{{ $supplier['status'] }}" onchange="toggleSupplierStatus(this)">
                          <span class="toggle-slider"></span>
                        </label>
                        <button type="button" class="editButton btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#EditModal" title="Sửa" data-original-title="Edit Task">
                          <i class="fa fa-edit"></i>
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

</div>
</div>
<!--   Core JS Files   -->
<script src="../admin/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../admin/assets/js/setting-demo2.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<script>
  function validateInputs() {
    // Kiểm tra các input và hiển thị thông báo lỗi nếu cần
    var name = $("#addName").val();
    var description = $("#addMoTa").val();
    var email = $("#addEmail").val();
    var phone_number = $("#addOffice").val();
    var logo = $("#addLoGo").val();
    var address = $("#addDiaChi").val();
    var valid = true;

    if (phone_number === '') {
      $('#phone').text('Vui lòng nhập số điện thoại của bạn.');
      valid = false;
    } else if (phone_number.length < 10 || phone_number.length > 11 || isNaN(phone_number)) {
      $('#phone').text('Số điện thoại không hợp lệ.');
      valid = false;
    } else {
      $('#phone').text('');
    }

    if (name === '') {
      $('#name').text('Vui lòng nhập tên của bạn.');
      valid = false;
    } else {
      $('#name').text('');
    }
    if (logo === '') {
      $('#logo').text('Vui lòng nhập.');
      valid = false;
    } else {
      $('#logo').text('');
    }
    if (address === '') {
      $('#address').text('Vui lòng nhập địa chỉ của bạn.');
      valid = false;
    } else {
      $('#address').text('');
    }
    if (description === '') {
      $('#description').text('Vui lòng nhập mô tả của bạn.');
      valid = false;
    } else {
      $('#description').text('');
    }
    if (email === '') {
      $('#email').text('Vui lòng nhập email của bạn.');
      valid = false;
    } else {
      $('#email').text('');
    }
    return valid;
  }
  $(document).ready(function() {
    // Add Row
    $('#add-row').DataTable({
      recordsTotal: 1000,
    // pageLength: 10
    });
    var token = "{{ session('token') }}";
    // Xử Lý Nút Thêm
    $('#addRowButton').click(function() {
      // lấy giá trị từ form
      var name = $("#addName").val();
      var description = $("#addMoTa").val();
      var email = $("#addEmail").val();
      var phone_number = $("#addOffice").val();
      var logo = ".";
      var address = $("#addDiaChi").val();
      if (validateInputs() == false) {
        return;
      }
      // gửi request thêm nhà cung cấp
      $.ajax({
        url: "https://localhost:3000/api/supplier/create",
        method: "POST",
        data: {
          name: name,
          description: description,
          email: email,
          phone_number: phone_number,
          logo: logo,
          address: address,
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
          alert("Có lỗi xảy ra khi thêm nhà cung cấp!");
        }
      });
    });
  });

  $(document).ready(function() {
    // Khởi tạo biến để kiểm tra người dùng có nhập mới hay không
    var token = "{{ session('token') }}";
    var isModified = false;
    var editor = null; // Biến lưu trữ đối tượng SkEditor
    $('#add-row').on('click', '.editButton', function() {
      // Lấy thông tin của hàng cần sửa
      var currentRow = $(this).closest('tr');
      var id = currentRow.data('id');
      var name = currentRow.data('name');
      var description = currentRow.data('description');
      var email = currentRow.data('email');
      var phone_number = currentRow.data('phone');
      var logo = currentRow.data('logo');
      var address = currentRow.data('address');
      // Điền thông tin của hàng cần sửa vào các trường nhập liệu trong form
      $('#editName').val(name);
      // $('#editMoTa').val(description);
      $('#editEmail').val(email);
      $('#editOffice').val(phone_number);
      $('#editLoGo').val(logo);
      $('#editDiaChi').val(address);
      // Kiểm tra xem SkEditor đã được khởi tạo hay chưa
      if (editor === null) {
        // Khởi tạo SkEditor nếu chưa được khởi tạo
        ClassicEditor
          .create(document.querySelector('#editMoTa'), {
            // Cấu hình khác của SkEditor (nếu cần)
          })
          .then(newEditor => {
            editor = newEditor;
            editor.setData(description); // Đặt nội dung của SkEditor
          })
          .catch(error => {
            console.error(error);
          });
      } else {
        // Sử dụng SkEditor hiện có nếu đã được khởi tạo
        editor.setData(description);
      }
      // Xử lý sự kiện submit của form
      $('#editRowButton').click(function(event) {
        event.preventDefault(); // Ngăn chặn trang web chuyển đến trang khác
        // Lấy thông tin nhập liệu từ form
        var id = currentRow.data('id');
        var name = $('#editName').val();
        var description = editor.getData();
        var email = $('#editEmail').val();
        var phone_number = $('#editOffice').val();
        var logo = $("#editLoGo").val();
        var address = $("#editDiaChi").val();
        // Gửi AJAX request đến server để sửa đổi dữ liệu
        $.ajax({
          url: 'https://localhost:3000/api/supplier/' + id + '/update',
          method: 'POST',
          data: {
            name: name,
            description: description,
            email: email,
            phone_number: phone_number,
            logo: logo,
            address: address,
          },
          headers: {
            'Authorization': 'Bearer ' + token
          },
          success: function(response) {
            // Ẩn modal
            $('#EditModal').modal('hide');
            setTimeout(function() {
              swal("Thông báo", response.message, "success").then(function() {
                // Load lại trang web sau khi người dùng nhấn OK
                location.reload();
              });
            }, 500); // Wait 500ms before showing the alert message
          },
          error: function(error) {
            // Xử lý lỗi nếu có
            swal("Lỗi", "Đã xảy ra lỗi khi sửa đổi dữ liệu", "error");
            console.log(error);
          }
        });
      });
      var closeButton = document.getElementById("closeButton");
      closeButton.addEventListener("click", function(event) {
        // Kiểm tra nếu người dùng nhập mới dữ liệu thì hiển thị swal
        if (isModified) {
          swal({
            title: 'Bạn Có Muốn Đóng?',
            text: "",
            type: 'Cảnh Báo',
            buttons: {
              confirm: {
                text: 'Xác Nhận',
                className: 'btn btn-success'
              },
              cancel: {
                visible: true,
                text: 'Hủy',
                className: 'btn btn-danger'
              }
            },
            // Thêm cấp độ z-index cho swal
            onOpen: function() {
              $('.swal2-container').css('z-index', '99999');
            }
          }).then(function(result) {
            // Nếu người dùng nhấn vào nút xác nhận, đóng modal
            if (result) {
              isModified = false;
              $("#EditModal").modal("hide");
            }
          });
        } else {
          // Nếu người dùng không nhập gì mà bấm vào nút đóng, đóng modal luôn
          isModified = false;
          $("#EditModal").modal("hide");
        }
      });
      // Sự kiện input của các trường nhập liệu
      $('#editName, #editMoTa, #editEmail, #editOffice,#editDiaChi,#editLoGo').on('input', function() {
        // Cập nhật biến isModified khi người dùng nhập mới
        isModified = true;
      });
    });
  });
</script>
<script>
  function toggleSupplierStatus(checkbox) {
    var supplierId = checkbox.getAttribute("data-supplier-id");
    var supplierStatus = checkbox.getAttribute("data-supplier-status");
    var token = "{{ session('token') }}";

    // Gọi API để thay đổi trạng thái
    var url = "https://localhost:3000/api/supplier/" + supplierId + "/change-status";
    var newStatus = supplierStatus === "1" ? "0" : "1";

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
        checkbox.setAttribute("data-supplier-status", newStatus);

        // Cập nhật trạng thái trực tiếp trên giao diện
        var statusColumn = checkbox.closest("tr").querySelector(".supplier-status");
        if (supplierStatus === "1") {
          statusColumn.innerHTML = '<button class="btn btn-danger btn-xs">Không Hoạt Động</button>';
        } else {
          statusColumn.innerHTML = '<button class="btn btn-success btn-xs">Hoạt Động</button>';
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
      var supplierStatus = checkbox.getAttribute("data-supplier-status");
      var statusColumn = checkbox.closest("tr").querySelector(".supplier-status");

      if (supplierStatus === "1") {
        checkbox.checked = true;
        statusColumn.innerHTML = '<button class="btn btn-success btn-xs">Hoạt Động</button>';
      } else {
        checkbox.checked = false;
        statusColumn.innerHTML = '<button class="btn btn-danger btn-xs">Không Hoạt Động</button>';
      }
    });
  });
</script>
@endsection