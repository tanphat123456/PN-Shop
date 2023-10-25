<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function viewlogin()
    {
        return view('admin.login');
    }
    // public function index()
    // {
    //     $token = session('token');

    //     $response = Http::withOptions([
    //         'verify' => false,
    //     ])->withHeaders([
    //         'Authorization' => 'Bearer ' . $token,
    //     ])->get('https://localhost:3000/api/report/order/total-amount');

    //     $orders= $response->json();
    //     return view('admin.layout.main',compact('orders'));
    // }

    public function account()
    {
        $token = session('token');

        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://localhost:3000/api/admin/list-user');

        $users = $response->json();


        return view('admin.user', compact('users'));
    }
    public function thongke()
    {
        $token = session('token');

        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://localhost:3000/api/report/order/total-revenue');

        $orderrevenues = $response->json();

      
        return view('admin.dashboard', compact('orderrevenues'));
    }

    public function thongkesanpham()
    {
        $token = session('token');
        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://localhost:3000/api/report/product/total-amount');
        $totalproducts = $response->json();
        return view('admin.productreport',compact('totalproducts'));
    }
    public function thongkehoadon()
    {
        $token = session('token');
        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://localhost:3000/api/report/order/total-amount');

        $ordertotals = $response->json();
        return view('admin.orderreport',compact('ordertotals'));
    }
    public function thongkeloai()
    {
        $token = session('token');
        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://localhost:3000/api/report/category/total-amount');

        $categoryreports = $response->json();
        return view('admin.categoryreport',compact('categoryreports'));
    }
    public function indexSupplier()
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/supplier');
        $suppliers = $response->json();
        return view('admin.supplier', ['suppliers' => $suppliers]);
    }
  
    public function indexComment()
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/comment');
        $comments = $response->json();
        return view('admin.comment', ['comments' => $comments]);
    }
    public function indexOrder()
    {
        $token = session('token');
    
        $response = Http::withOptions([
            'verify' => false,
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://localhost:3000/api/order/for-admin');

        $orders = $response->json();

        return view('admin.order', ['orders' => $orders]);
    }
    public function loginAdmin(Request $request)
    {
        $email = $request->input('email');
        $password = base64_encode($request->input('password')); // mã hóa mật khẩu
    
        // Gửi yêu cầu đăng nhập đến API
        $response = Http::withOptions([
            'verify' => false,
        ])->post('https://localhost:3000/api/auth/admin-login', [
            'email' => $email,
            'password' => $password,
        ]);
    
        // Xử lý phản hồi từ API
        $data = json_decode($response->body(), true);
    
        if ($response->status() == 200 && isset($data['data']['token'], $data['data']['full_name'], $data['data']['email'])) {
            // Lưu token và thông tin người dùng vào session
            session(['token' => $data['data']['token']]);
            session(['user' => $data['data']['full_name']]);
            session(['email' => $data['data']['email']]);
            return redirect('thongke')->with('success', 'Đăng nhập thành công');
        } else {
            // Xuất thông báo lỗi
            return redirect('dangnhap')->with('error', 'Đăng nhập thất bại');
        }
    }
    
    public function logout()
    {
        // Xóa token và thông tin người dùng khỏi session
        session()->forget('token');
        session()->forget('user');
        session()->forget('email');
        // dd(session()->all());
        // Điều hướng về trang đăng nhập và thông báo đăng xuất thành công
        return redirect('dangnhap')->with('success', 'Đăng xuất thành công');
    }
}
