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
						<a href="#">Sản Phẩm</a>
					</li>
				</ul>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<h4 class="card-title">Sản Phẩm</h4>
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
												Thêm
											</span>
											<span class="fw-light">
												Sản Phẩm
											</span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="" method="">
											<div class="row">
												<div class="col-md-12 ">
													<span style="color:red" id="name" class="error-message"></span>
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa-solid fa-shirt"></i>
															</span>
															<input id="addName" type="text" class="form-control" placeholder="Tên Sản Phẩm">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<span style="color:red" id="supplier_id" class="error-message"></span>
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa-solid fa-house"></i>
															</span>
															<select class="form-control" id="addSuplierID">
																@foreach($suppliers as $supplier)
																<option value="{{ $supplier['id'] }}">{{ $supplier['name'] }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-6 ">
													<span style="color:red" id="category_id" class="error-message"></span>
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa-solid fa-clone"></i>
															</span>
															<select class="form-control" id="addCategory">
																@foreach($categorys as $category)
																<option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
																@endforeach
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<span style="color:red" id="amount" class="error-message"></span>
													<div class="form-group ">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa fa-money-bill"></i>
															</span>
															<input id="addTien" type="text" class="form-control" placeholder="Tiền">
														</div>
													</div>
												</div>
												<div class="col-md-6 ">
													<span style="color:red" id="discount_amount" class="error-message"></span>
													<div class="form-group ">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa-solid fa-money-bill-trend-up"></i>
															</span>
															<input id="addTienGiam" type="text" class="form-control" placeholder="Tiền Giảm">
														</div>
													</div>
												</div>
												<!-- <div class="col-md-12">
													<span style="color:red" id="discount_percent" class="error-message"></span>
													<div class="form-group ">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa-solid fa-percent"></i>
															</span>
															<input id="addGiam" type="text" class="form-control" placeholder="Giảm %">
														</div>
													</div>
												</div> -->
												<div class="col-md-12 ">
													<span style="color:red" id="description" class="error-message"></span>
													<div class="form-group">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">Mô Tả</span>
															</div>
															<textarea class="form-control" id="addMoTa" aria-label="With textarea"></textarea>
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
						<!-- Modal  -->
						<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header no-bd">
										<h5 class="modal-title">
											<span class="fw-mediumbold">
												Sửa
											</span>
											<span class="fw-light">
												Sản Phẩm
											</span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form method="post" action="">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa-solid fa-shirt"></i>
															</span>
															<input id="editName" type="text" class="form-control" placeholder="">
														</div>
														<span style="color:red" id="name" class="error-message"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa fa-money-bill"></i>
															</span>
															<input id="editTien" type="text" class="form-control" placeholder="">
														</div>
														<span style="color:red" id="amount" class="error-message"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa-solid fa-money-bill-trend-up"></i>
															</span>
															<input id="editTienGiam" type="text" class="form-control" placeholder="">
														</div>
														<span style="color:red" id="discount_amount" class="error-message"></span>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa-solid fa-percent"></i>
															</span>
															<input id="editGiam" type="text" class="form-control" placeholder="">
														</div>
														<span style="color:red" id="discount_percent" class="error-message"></span>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">Mô Tả</span>
															</div>
															<textarea class="form-control" id="editMoTa" aria-label="With textarea"></textarea>
														</div>
														<span style="color:red" id="description" class="error-message"></span>
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

						<!-- Modal MoTA -->
						<div class="modal fade" id="MoTaModal" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header no-bd">
										<h5 class="modal-title">
											<span class="fw-mediumbold">
											</span>
											<span class="fw-light">
											</span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for="comment">Mô Tả</label>
														<textarea class="form-control" rows="5" id="editMoTa2"></textarea>
													</div>
												</div>
											</div>
											@csrf
										</form>
									</div>
									<div class="modal-footer no-bd">
										<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
									</div>
								</div>
							</div>
						</div>
						<!-- Chi Tiết Product -->
						<div class="modal fade" id="productDetailModal" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Thông tin chi tiết sản phẩm</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<table class="table">
											<thead>
												<tr>
													<th scope="col">Màu sắc</th>
													<th scope="col">Kích thước</th>
													<th scope="col">Số lượng</th>
													<th scope="col">Hình ảnh</th>
												</tr>
											</thead>
											<tbody id="colorSizeList">
												<!-- Generate color and size rows dynamically using JavaScript -->
											</tbody>
										</table>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
										<button type="button" id="addDetailBtn" class="btn btn-primary" data-toggle="modal" data-target="#AddDetailModal">Thêm chi tiết</button>
									</div>
								</div>
							</div>
						</div>
						<!-- End Chi Tiết  -->
						<!-- Thêm Chi Tiết -->
						<div class="modal fade" id="AddDetailModal" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
								<div class="modal-content">
									<div class="modal-header no-bd">
										<h5 class="modal-title">
											<span class="fw-mediumbold"></span>
											<span class="fw-light"></span>
										</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="form-label">Chọn Màu</label>
														<div class="row gutters-xs">
															@foreach($colors['data']['list'] as $color)
															@if($color['status'] == 1)
															<div class="col-auto">
																<label class="colorinput">
																	<input name="color" type="radio" value="{{ $color['id'] }}" class="colorinput-input">
																	<span class="colorinput-color" style="background-color: {{ $color['description'] }}"></span>
																</label>
															</div>
															@endif
															@endforeach
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="form-label">Chọn Hình Hảnh</label>
														<div class="d-flex flex-wrap" id="imageContainer" style="max-height: 200px; overflow-y: auto;">
															@foreach($images['data']['list'] as $image)
															<div class="col-12 col-sm-2">
																<label class="imagecheck">
																	<input name="imagecheck" type="radio" value="{{ $image['id'] }}" class="imagecheck-input">
																	<figure class="imagecheck-figure">
																		<img src="{{ $image['image_url'] }}" alt="title" class="imagecheck-image img-fluid">
																	</figure>
																</label>
															</div>
															@endforeach
														</div>
													</div>

												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="form-label">Size</label>
														<div class="selectgroup w-100">
															@foreach($sizes['data']['list'] as $size)
															@if($size['status'] == 1)
															<label class="selectgroup-item">
																<input type="radio" name="size_id" value="{{ $size['id'] }}" class="selectgroup-input">
																<span class="selectgroup-button">{{ $size['name'] }}</span>
															</label>
															@endif
															@endforeach
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<div class="input-icon">
															<span class="input-icon-addon">
																<i class="fa-solid fa-shirt"></i>
															</span>
															<input id="quantityInput" type="text" class="form-control" placeholder="Số Lượng">
														</div>
													</div>
												</div>
											</div>
											@csrf
										</form>
									</div>
									<div class="modal-footer no-bd">
										<button type="submit" id="addButton" class="btn btn-primary">Thêm</button>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
									</div>
								</div>
							</div>
						</div>
						<!-- End Chi Tiết -->
						<!-- DataTable -->
						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-bordered nowrap">
								<thead>
									<tr>
										<th>STT</th>
										<th>Sản Phẩm</th>
										<th>Nhà Cung Cấp</th>
										<th>Giá tiền</th>
										<th>Giảm Giá (Tiền)</th>
										<th>Màu</th>
										<th style="width: 10%">Action</th>
									</tr>
								</thead>
								<tbody>
									@php
									$count = 1;
									@endphp
									@foreach($products['data']['list'] as $product)
									<tr data-description="{{ $product['description'] }}" data-discount_percent="{{ $product['discount_percent'] }}" data-discount_amount="{{$product['discount_amount']}}" data-amount="{{ $product['amount'] }}" data-id="{{ $product['id'] }}" data-name="{{ $product['name'] }}">
										<td>{{ $count++ }}</td>
										<td>{{ $product['name'] }}</td>
										<td>{{ $product['supplier_name'] }}</td>
										<td>{{ number_format(intval($product['amount'])) }} VNĐ</td>
										<td>{{ number_format(intval($product['discount_amount'])) }} VNĐ</td>
										<td>
											<div class="color-row">
												@foreach($product['product_detail'] as $detail)
												<span class="colorinput">
													<span class="colorinput-color" style="background-color: {{ $detail['description'] }} ; border-radius:50%" title="{{ $detail['description'] }}"></span>
												</span>
												@endforeach
											</div>
										</td>
										<td>
											<div class="form-button-action">
												<button type="button" class="detailButton btn btn-link btn-success btn-lg" data-target="#productDetailModal" title="Xem chi tiết">
													<i class="fa fa-info-circle"></i>
												</button>
												<button type="button" class="btn-view btn btn-link btn-info" data-toggle="modal" data-target="#MoTaModal" title="Xem chi tiết">
													<i class="far fa-eye"></i>
												</button>
												<button type="button" class="editButton btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#EditModal" title="Sửa">
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

<!--   Core JS Files   -->
<script src="../admin/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="../admin/assets/js/setting-demo2.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<style>
	.color-row {
		display: flex;
		align-items: center;
	}

	.colorinput {
		margin-right: 5px;
	}

	.colorinput-color {
		display: inline-block;
		width: 20px;
		height: 20px;
	}

	.carousel-indicators {
		display: flex;
		justify-content: center;
	}

	.carousel-indicators li {
		width: 10px;
		height: 10px;
		background-color: #ccc;
		border-radius: 50%;
		margin: 0 5px;
	}

	.carousel-indicators .active {
		background-color: #000;
	}

	.carousel-inner {
		height: 300px;
	}

	.carousel-inner .carousel-item {
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.carousel-inner .carousel-item img {
		max-height: 250px;
		object-fit: contain;
		margin: 0 30px;
	}

	#colorSizeList td {
		vertical-align: middle;
	}

	#colorSizeList .img-thumbnail {
		max-width: 60px;
		display: inline-block;
		max-height: 60px;
		object-fit: contain;
	}
</style>
<script>
	function validateInputs() {
		// Kiểm tra các input và hiển thị thông báo lỗi nếu cần
		var supplier_id = $("#addSuplierID").val();
		var category_id = $("#addCategory").val();
		var name = $("#addName").val();
		var description = $("#addMoTa").val();
		var amount = $("#addTien").val();
		var discount_amount = $("#addTienGiam").val();
		var discount_percent = $("#addGiam").val();
		var valid = true;
		if (supplier_id === '') {
			$('#supplier_id ').text('Vui lòng nhập.');
			valid = false;
		} else {
			$('#supplier_id ').text('');
		}
		if (category_id === '') {
			$('#category_id').text('Vui lòng nhập.');
			valid = false;
		} else {
			$('#category_id').text('');
		}
		if (name === '') {
			$('#name').text('Vui lòng nhập tên của bạn.');
			valid = false;
		} else {
			$('#name').text('');
		}
		if (description === '') {
			$('#description').text('Vui lòng nhập mô tả của bạn.');
			valid = false;
		} else {
			$('#description').text('');
		}
		if (amount === '') {
			$('#amount').text('Vui lòng nhập giá tiền.');
			valid = false;
		} else {
			$('#amount').text('');
		}
		if (discount_amount === '') {
			$('#discount_amount').text('Vui lòng nhập.');
			valid = false;
		} else {
			$('#discount_amount').text('');
		}
		if (discount_percent === '') {
			$('#discount_percent').text('Vui lòng nhập.');
			valid = false;
		} else {
			$('#discount_percent').text('');
		}
		return valid;
	}
	//Chỗ này xử lý nút thêm
	$(document).ready(function() {
		// Add Row
		$('#add-row').DataTable({
			"pageLength": 10,
		});
		// Xử Lý Nút Thêm
		$('#addRowButton').click(function(event) {
			event.preventDefault();
			// Lấy giá trị từ form
			var token = "{{ session('token') }}";
			var supplier_id = $("#addSuplierID").val();
			var category_id = $("#addCategory").val();
			var name = $("#addName").val();
			var description = $("#addMoTa").val();
			var amount = $("#addTien").val();
			var discount_amount = $("#addTienGiam").val();
			var discount_percent = "0";
			// Kiểm tra dữ liệu nhập vào
			if (validateInputs() == false) {
				return;
			}
			// Gửi request thêm sản phẩm
			$.ajax({
				url: 'https://localhost:3000/api/product/create',
				method: 'POST',
				data: {
					supplier_id: supplier_id,
					category_id: category_id,
					name: name,
					description: description,
					amount: amount,
					discount_amount: discount_amount,
					discount_percent: discount_percent
				},
				headers: {
					'Authorization': 'Bearer ' + token
				},
				success: function(response) {
					// Đóng modal trước khi thông báo
					$('#addRowModal').modal('hide');
					swal("Thông báo", response.message, "success").then(function() {
						location.reload();
					});
				},
				error: function(error) {
					swal("Lỗi", "Có lỗi xảy ra khi thêm sản phẩm!", "error");
					console.log(error);
				}
			});
		});
	});
	//Chỗ này xử lý nút xem mô tả
	// Đầu tiên, tạo biến để theo dõi trình soạn thảo CKEditor
	var editor;

	// Xử lý sự kiện click
	$(document).on('click', '.btn-view', function() {
		var currentRow = $(this).closest('tr');
		var description = currentRow.data('description');

		if (editor) {
			editor.setData(description); // Gán dữ liệu cho trình soạn thảo đã khởi tạo
		} else {
			ClassicEditor
				.create(document.querySelector('#editMoTa2'), {
					// Cấu hình khác của CKEditor (nếu cần)
				})
				.then(newEditor => {
					editor = newEditor;
					editor.setData(description); // Gán dữ liệu cho trình soạn thảo mới khởi tạo
				})
				.catch(error => {
					console.error(error);
				});
		}
	});

	//Chỗ này xử lý nút sửa
	$(document).ready(function() {
		// Khởi tạo biến để kiểm tra người dùng có nhập mới hay không
		var isModified = false;
		var token = "{{ session('token') }}";
		var editor = null; // Biến lưu trữ đối tượng SkEditor
		$('#add-row').on('click', '.editButton', function() {
			// Lấy thông tin của hàng cần sửa
			var currentRow = $(this).closest('tr');
			var id = currentRow.data('id');
			var name = currentRow.data('name');
			var description = currentRow.data('description');
			var amount = currentRow.data('amount');
			var discount_amount = currentRow.data('discount_amount');
			var discount_percent = currentRow.data('discount_percent');
			// Điền thông tin của hàng cần sửa vào các trường nhập liệu trong form
			$('#editName').val(name);
			$('#editMoTa').val(description);
			$('#editTien').val(parseInt(amount));
			$('#editTienGiam').val(parseInt(discount_amount));
			$('#editGiam').val(parseInt(discount_percent));
			// Xử lý sự kiện submit của form
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
			$('#editRowButton').click(function(event) {
				event.preventDefault(); // Ngăn chặn trang web chuyển đến trang khác
				// Lấy thông tin nhập liệu từ form
				var name = $("#editName").val();
				var description = $("#editMoTa").val();
				var amount = $("#editTien").val();
				var discount_amount = $("#editTienGiam").val();
				var discount_percent = $("#editGiam").val();
				// Gửi AJAX request đến server để sửa đổi dữ liệu
				$.ajax({
					url: 'https://localhost:3000/api/product/' + id + '/update',
					method: 'POST',
					data: {
						name: name,
						description: description,
						amount: parseInt(amount),
						discount_amount: parseInt(discount_amount),
						discount_percent: parseInt(discount_percent)
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
			$('#editName, #editMoTa, #editTien, #editTienGiam,#editGiam').on('input', function() {
				// Cập nhật biến isModified khi người dùng nhập mới
				isModified = true;
			});
		});
	});
	// Chỗ này xử lý thêm chi tiết
	$(document).ready(function() {
		var productId; // Biến để lưu trữ productId
		$('#addDetailBtn').click(function() {
			$('#productDetailModal').modal('hide');
			$('#AddDetailModal').modal('show');
		});
		$(document).on('click', '.detailButton', function() {
			var currentRow = $(this).closest('tr');
			productId = currentRow.data('id'); // Lưu trữ productId từ hàng được bấm vào
			var apiUrl = 'https://localhost:3000/api/product/' + productId + '/detail';

			$.ajax({
				url: apiUrl,
				method: 'GET',
				dataType: 'json',
				success: function(response) {
					if (response.status === 200) {
						// Xử lý dữ liệu từ response và cập nhật vào modal
						var productData = response.data.list;

						var colorSizeList = $('#colorSizeList');
						colorSizeList.empty();

						for (var i = 0; i < productData.length; i++) {
							var colorSize = productData[i];

							for (var j = 0; j < colorSize.size_detail.length; j++) {
								var size = colorSize.size_detail[j];
								var row = $('<tr>');
								var colorCell = $('<td>').text(colorSize.color_name);
								var sizeCell = $('<td>').append(
									$('<label>').addClass('selectgroup-item').append(
										$('<input>').attr({
											type: 'radio',
											name: 'value',
											value: size.size,
											class: 'selectgroup-input'
										}),
										$('<span>').addClass('selectgroup-button').text(size.size)
									)
								);
								var quantityCell = $('<td>').text(size.quantity);
								var imageCell = $('<td>');
								var imageRow = $('<div>').addClass('row');
								for (var k = 0; k < colorSize.product_image_color.length; k++) {
									var image = $('<img>').addClass('img-thumbnail').attr('src', colorSize.product_image_color[k].image_url);
									var imageCol = $('<div>').addClass('col-sm-4').append(image); // Thêm lớp image-col
									imageRow.append(imageCol);
								}
								imageCell.append(imageRow);
								row.append(colorCell, sizeCell, quantityCell, imageCell);
								colorSizeList.append(row);
							}
						}
						// Mở modal
						$('#productDetailModal').modal('show');
					} else {
						console.log(response.message);
					}
				},
				error: function(xhr, status, error) {
					console.log(error);
				}
			});
		});
		//Chỗ này xử lý nút thêm chi tiết
		$('#addButton').click(function() {
			var token = "{{ session('token') }}";
			// Lấy dữ liệu từ các trường input
			var colorId = $('input[name="color"]:checked').val();
			var imageIds = [];
			$('input[name="imagecheck"]:checked').each(function() {
				imageIds.push({
					id: parseInt($(this).val())
				}); // Định dạng mỗi phần tử của imageIds
			});
			var sizeId = $('input[name="size_id"]:checked').val();
			var quantity = parseInt($('#quantityInput').val());

			var payload = {
				color_id: parseInt(colorId),
				image_ids: imageIds,
				product_size_quantity_data: [{
					size_id: parseInt(sizeId),
					quantity: quantity
				}]
			};
			$.ajax({
				url: 'https://localhost:3000/api/product/' + productId + '/create-detail',
				method: 'POST',
				dataType: 'json',
				data: JSON.stringify(payload), // Chuyển đổi đối tượng thành chuỗi JSON
				beforeSend: function(xhr) {
					console.log(JSON.stringify(payload)); // Hiển thị dữ liệu trước khi gửi request
				},
				headers: {
					'Content-Type': 'application/json', // Đặt kiểu dữ liệu là JSON
					'Authorization': 'Bearer ' + token
				},
				success: function(response) {
					$('#AddDetailModal').modal('hide');
					swal("Thông báo", response.message, "success")
					location.reload();
					// Thực hiện các hành động khác sau khi thêm chi tiết thành công
				},
				error: function(xhr, status, error) {
					console.log(xhr.responseJSON.message);
				}
			});
		});
	});
</script>
@endsection