<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Supplier;

class MainController extends Controller
{
    //Trang chủ
    public function index()
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/product');
        $products = $response->json();
        return view('user.index', ['products' => $products]);
    }
    public function indexthankyou()
    {
        return view('user.camon');
    }
    public function indexcontact()
    {
        return view('user.contacts');
    }
    //Chỗ này trang shop
    public function indexshop(Request $request)
    {
        $page = $request->query('page', 1);
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/product?page='.$page);
        $products = $response->json();

        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/category?limit=1000');
        $categorys = $response->json();

        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/supplier');
        $suppliers = $response->json();


        return view('user.shop', compact('products','categorys','suppliers'));
    }

    //Trang Chi Tiết Sản Phẩm
    public function detail($id, $page = 1)
    {
        // Chi tiết trả về màu và size
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/product/' . $id . '/detail');
        $product = $response->json();

        // Lấy danh sách size
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/size');
        $sizes = $response->json();

        // Lấy danh sách size
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/comment');
        $comments = $response->json();

        // Lấy chi tiết sản phẩm
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/product/' . $id);
        $productInfo = $response->json();
        $productId = $productInfo['data']['id'];
      

        // Lấy ra tên nhà cung cấp
        $supplierId = $productInfo['data']['supplier_id'];
        $supplier = Supplier::findOrFail($supplierId);
        $supplierName = $supplier->name;
       
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/product');
        $productInfo2 = $response->json();
        
        // dd($productInfo2);
        return view('user.product-details', compact('productInfo2','comments', 'productInfo', 'product', 'productId', 'supplierName', 'sizes'));
    }

    // Lấy thông tin category từ cơ sở dữ liệu
    // $categoryId = $productInfo['data']['category_id'];
    // $category = Category::findOrFail($categoryId);
    // $categoryName = $category->name;
    // Lấy thông tin discount_amount từ API
    // public function indexdetail()
    // {
    //     return view('user.product-details');
    // }
    public function indexcart()
    {
        $token = session('token_user');
        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://localhost:3000/api/cart');
        $carts = $response->json();

        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://localhost:3000/api/users/detail');
        $details = $response->json();
        return view('user.shopping-cart', compact('carts', 'details'));
    }
    public function userdetails()
    {
        $token = session('token_user');
        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://localhost:3000/api/users/detail');
        $details = $response->json();

        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://localhost:3000/api/order?limit=10000');
        $historyOrders = $response->json();

        return view('user.user-details', compact('historyOrders', 'details'));
    }

    public function orderdetail($id)
    {
        $token = session('token_user');

        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://localhost:3000/api/order/' . $id . '/detail');
        $orderDetails = $response->json();

        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://localhost:3000/api/order/' . $id);
        $details = $response->json();

        return view('user.thongtindonhang2', compact('orderDetails', 'details'));
    }


    public function order(Request $request)
    {
        $token = session('token_user');
        $address = $request->input('address');

        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post('https://localhost:3000/api/order/create', [
            'address' => $address
        ]);
        $data = $response->json();
        if ($response->status() == 200) {
            // Lưu token và thông tin người dùng vào session
            session(['order_id' => $data['data']['id']]);
            session(['user_id' => $data['data']['user_id']]);
            session(['order' => $data['data']['code']]);
            session(['user_name' => $data['data']['user_name']]);
            session(['user_email' => $data['data']['user_email']]);
            session(['user_phone' => $data['data']['user_phone']]);
            session(['address' => $data['data']['address']]);
            session(['total_amount' => $data['data']['total_amount']]);
            session(['created_at' => $data['data']['created_at']]);
            session(['status' => $data['data']['status']]);
            // dd(session()->all());
            return redirect('thankyou');
        } else {
            // Trả về dữ liệu JSON để xử lý ở phía client
            return response()->json(['success' => false, 'message' => 'thất bại']);
        }
    }

    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function online_checkout(Request $request)
    {
        if (isset($_POST['cod'])) {

            $token = session('token_user');
            $address = $request->input('address');

            $response = Http::withOptions([
                'verify' => false,
            ])->withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post('https://localhost:3000/api/order/create', [
                'address' => $address
            ]);
            $data = $response->json();
            if ($response->status() == 200) {
                // Lưu token và thông tin người dùng vào session
                session(['order_id' => $data['data']['id']]);
                session(['user_id' => $data['data']['user_id']]);
                session(['order' => $data['data']['code']]);
                session(['user_name' => $data['data']['user_name']]);
                session(['user_email' => $data['data']['user_email']]);
                session(['user_phone' => $data['data']['user_phone']]);
                session(['address' => $data['data']['address']]);
                session(['total_amount' => $data['data']['total_amount']]);
                session(['created_at' => $data['data']['created_at']]);
                session(['status' => $data['data']['status']]);
                // dd(session()->all());
                $orderId = session('order_id');

                $response = Http::withOptions([
                    'verify' => false,
                ])->withHeaders([
                    'Authorization' => 'Bearer ' . $token,
                ])->get('https://localhost:3000/api/order/' . $orderId . '/detail');

                $orderDetails = $response->json();

                return view('user.thongtindonhang', compact('orderDetails'));
            } else {
                return response()->json(['success' => false, 'message' => 'thất bại']);
            }
        } else if (isset($_POST['payUrl'])) {

            // $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


            // $partnerCode = 'MOMOBKUN20180529';
            // $accessKey = 'klm05TvNBzhg7h7j';
            // $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            // $orderInfo = "Thanh toán qua MoMo";
            // $amount = "10000";
            // $orderId = time() . "";
            // $redirectUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
            // $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
            // $extraData = "";


            //     // $partnerCode = $_POST["partnerCode"];
            //     // $accessKey = $_POST["accessKey"];
            //     // $serectkey = $_POST["secretKey"];
            //     // $orderId = $_POST["orderId"]; // Mã đơn hàng
            //     // $orderInfo = $_POST["orderInfo"];
            //     // $amount = $_POST["amount"];
            //     // $ipnUrl = $_POST["ipnUrl"];
            //     // $redirectUrl = $_POST["redirectUrl"];
            //     // $extraData = $_POST["extraData"];

            //     $requestId = time() . "";
            //     $requestType = "payWithATM";
            //     // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
            //     //before sign HMAC SHA256 signature
            //     $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            //     $signature = hash_hmac("sha256", $rawHash, $secretKey);
            //     $data = array(
            //         'partnerCode' => $partnerCode,
            //         'partnerName' => "Test",
            //         "storeId" => "MomoTestStore",
            //         'requestId' => $requestId,
            //         'amount' => $amount,
            //         'orderId' => $orderId,
            //         'orderInfo' => $orderInfo,
            //         'redirectUrl' => $redirectUrl,
            //         'ipnUrl' => $ipnUrl,
            //         'lang' => 'vi',
            //         'extraData' => $extraData,
            //         'requestType' => $requestType,
            //         'signature' => $signature
            //     );
            //     $result = $this->execPostRequest($endpoint, json_encode($data));
            //     $jsonResult = json_decode($result, true);  // decode json

            //     //Just a example, please check more in there

            //     return redirect()->to($jsonResult['payUrl']);
        

            $token = session('token_user');
            $address = $request->input('address');
            $response = Http::withOptions([
                'verify' => false,
            ])->withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post('https://localhost:3000/api/order/create', [
                'address' => $address
            ]);
            $data = $response->json();
            if ($response->status() == 200  && isset($data['data']['id'], $data['data']['user_id'],$data['data']['status'] ,$data['data']['created_at'],$data['data']['code'],$data['data']['total_amount'],$data['data']['user_name'],$data['data']['user_phone'],$data['data']['address'],$data['data']['user_email'])) {
                // Lưu token và thông tin người dùng vào session
                session(['order_id' => $data['data']['id']]);
                session(['user_id' => $data['data']['user_id']]);
                session(['order' => $data['data']['code']]);
                session(['user_name' => $data['data']['user_name']]);
                session(['user_email' => $data['data']['user_email']]);
                session(['user_phone' => $data['data']['user_phone']]);
                session(['address' => $data['data']['address']]);
                session(['total_amount' => $data['data']['total_amount']]);
                session(['created_at' => $data['data']['created_at']]);
                session(['status' => $data['data']['status']]);
            }

            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
            $partnerCode = 'MOMOBKUN20180529';
            $accessKey = 'klm05TvNBzhg7h7j';
            $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
            $orderInfo = "Thanh toán qua MoMo";
            $amount = session('total_amount'); // Lấy giá trị total_amount từ session
            $orderId = session('order');
            $redirectUrl = "http://localhost:8000/camon";
            $ipnUrl = "http://localhost:8000/camon";
            $extraData = "";
            $requestId = time() . "";
            // $requestType = "payWithATM";
            $requestType = "captureWallet";
            //before sign HMAC SHA256 signature
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);

            $data = array(
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature
            );

            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);

            // if (isset($jsonResult['data']['code'])) {
            //     session(['order' => $jsonResult['data']['code']]);
            // }

            return redirect()->to($jsonResult['payUrl']);

        } else if (isset($_POST['redirect'])) {
            $token = session('token_user');
            $address = $request->input('address');
            $response = Http::withOptions([
                'verify' => false,
            ])->withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post('https://localhost:3000/api/order/create', [
                'address' => $address
            ]);
            $data = $response->json();
            if ($response->status() == 200) {
                // Lưu token và thông tin người dùng vào session
                session(['order_id' => $data['data']['id']]);
                session(['user_id' => $data['data']['user_id']]);
                session(['order' => $data['data']['code']]);
                session(['user_name' => $data['data']['user_name']]);
                session(['user_email' => $data['data']['user_email']]);
                session(['user_phone' => $data['data']['user_phone']]);
                session(['address' => $data['data']['address']]);
                session(['total_amount' => $data['data']['total_amount']]);
                session(['created_at' => $data['data']['created_at']]);
                session(['status' => $data['data']['status']]);
            }

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost:8000/camon";
            $vnp_TmnCode = "O34YVYZR"; //Mã website tại VNPAY 
            $vnp_HashSecret = "RHUSHAVSFIBADMCHXBOQFDZDVVEJHEWM"; //Chuỗi bí mật

            $vnp_TxnRef = session('order'); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh Toán Qua VNPAY';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = session('total_amount') * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef

            );

            $token = session('token_user');
            $orderId = session('order_id');

            $response = Http::withOptions([
                'verify' => false,
            ])->withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ])->post('https://localhost:3000/api/order/' . $orderId . '/confim-payment');

            $orderDetails = $response->json();
            if ($response->status() == 200) {
                session()->forget('order_id');
            }
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }


            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            } else {
                echo json_encode($returnData);
            }
        }
    }
}
