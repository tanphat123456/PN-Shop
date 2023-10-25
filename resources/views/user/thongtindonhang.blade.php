@extends('user.layout.main')
@section('main')
<div class="site-content success-content mgb--50">
    <div class="container">
        <div class="thongtin">
            <div id="detail-order">
                <div class="thank-box " style="padding: 0px;">
                    <h2 class="text-center" style="margin-bottom: 1rem;">THÔNG TIN CHI TIẾT</h2>
                    <div style="display: flex; align-items: center;">
                        <div class="order-title" style="margin-right: auto;">
                            <div style="white-space: nowrap;">
                                ĐƠN HÀNG {{ session('order') }}
                                <span style="margin-left: 10px; background-color: #f9f86c; border-radius: 8px; font-size: 10px; padding: 5px; border: 1px solid #8E8E8E;">
                                    @if(session('status') == 0)
                                    Chờ Xác Nhận
                                    @elseif(session('status') == 2)
                                    Đã Hủy
                                    @else
                                    Xác Nhận
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="order-date" style="white-space: nowrap; margin-left: auto; margin-right: 0;">
                            Ngày đặt: {{ session('created_at') }}
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <!-- <th width="120px">Giá niêm yết</th> -->
                                <th>Màu</th>
                                <th>Size</th>
                                <th class="text--right">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails['data']['list'] as $item)
                            <tr>
                                <td class="text--left">
                                    {{ $item['product_name'] }}
                                </td>
                                <td>{{ $item['product_quantity'] }}</td>
                                <!-- <td>
                                    {{ number_format($item['total_amount'], 0, ',', '.') }} VNĐ
                                </td> -->
                                <td>
                                    {{ $item['product_color'] }} 
                                </td>
                                <td>
                                    {{ $item['product_size'] }}
                                </td>
                                <td>{{ number_format($item['total_amount'], 0, ',', '.') }} VNĐ</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    Tổng giá trị sản phẩm
                                </td>
                                <td>
                                    {{ number_format(session('total_amount'), 0, ',', '.') }} VNĐ
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    Tổng khuyến mãi
                                </td>
                                <td>
                                    0 VNĐ
                                </td>
                            </tr>
                            <tr class="total_payment">
                                <td colspan="4">
                                    Tổng thanh toán
                                </td>
                                <td>
                                    {{ number_format(session('total_amount'), 0, ',', '.') }} VNĐ
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <p class="order-heading">
                        THÔNG TIN NHẬN HÀNG
                    </p>
                    <div class="box text--left">
                        <p>Tên người nhận:
                            <span class="text--bold">
                                {{ session('user_name') }}
                            </span>
                        </p>
                        <p>Địa chỉ Email:
                            <span class="text--bold">
                                {{ session('user_email') }}
                            </span>
                        </p>
                        <p>Số điện thoại:
                            <span class="text--bold">
                                {{ session('user_phone') }}
                            </span>
                        </p>
                        <div>Địa chỉ giao hàng:
                            <span class="text--bold">
                                {{ session('address') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .thongtin {
        display: flex;
        justify-content: center;
    }

    thead {
        position: relative;
    }

    thead:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 8px;
        background-color: #2f5acf;
        z-index: -1;
    }


    tbody {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        border: 1px solid #d9d9d9;
        background-color: #d9d9d9;
        margin-top: -16px;
        border-radius: 0 0 16px 16px;
        position: relative;
        z-index: 1
    }

    .table th {
        padding: 10px;
        text-align: left;
        /* border: 1px solid #ddd; */
    }

    .table td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    .order-heading {
        text-align: center;
        font-weight: bold;
        margin-top: 30px;
    }
</style>