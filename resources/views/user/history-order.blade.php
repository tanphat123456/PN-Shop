@extends('user.layout.main')
@section('main')
<section>
    <div class="order-list">
        <div class="title">Đơn Hàng Của Bạn : <span>{{ $historyOrders['data']['total_record'] }}</span> Đơn Hàng</div>
        @foreach ($historyOrders['data']['list'] as $order)
        <a href="{{route('home')}}">
            <div class="order-item">
                <div class="order-code">#{{ $order['code'] }}</div>
                <div class="order-status"><span class="status">{{ $order['status'] == 1 ? 'Đã Xác Nhận' : 'Chờ Xác Nhận' }}</span></div>
            </div>
            <div class="order-item2">
                <div class="order-details">
                    <p>Sản phẩm: Áo thun</p> 
                    <p>Ngày đặt hàng: {{ $order['created_at'] }}</p>
                </div>
            </div>
            <div class="order-item3">
                <div class="order-price">Tổng Tiền : {{number_format($order['total_amount'])}} VNĐ</div>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endsection

<style>
    .order-list {
        list-style-type: none;
        margin: 70px;
        padding: 0;
    }

    .title {
        font-size: 30px;
        font-weight: 700;
        margin: 2rem 0 1rem;
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