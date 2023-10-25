<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Models\Social; //sử dụng model Social
use Laravel\Socialite\Facades\Socialite; //sử dụng Socialite
//sử dụng model Login
use Illuminate\Support\Facades\Session;
use Firebase\JWT\JWT;


class UserController extends Controller
{
    public function login(Request $request)
    {
        $phone_number = $request->input('phone_number');
        $password = base64_encode($request->input('password')); // mã hóa mật khẩu
        // Gửi yêu cầu đăng nhập đến API
        $response = Http::withOptions([
            'verify' => false,
        ])->post('https://localhost:3000/api/auth/user-login', [
            'phone_number' => $phone_number,
            'password' => $password,
        ]);
        if ($response->status() == 200) {
            $data = json_decode($response->body(), true);
            session(['token_user' => $data['data']['token']]);
            return response()->json(['status' => 200, 'message' => 'Đăng nhập thành công']);
        }
    }

    public function logout()
    {
        Session::flush();
    }
    public function register(Request $request)
    {
        $full_name = $request->input('full_name');
        $email = $request->input('email');
        $phone_number = $request->input('phone_number');
        $birthday = date('d/m/Y', strtotime($request->input('birthday')));
        $address = $request->input('address');
        $password = base64_encode($request->input('password')); // mã hóa mật khẩu
        $image_url = null;

        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $image_extension = $image->getClientOriginalExtension();
            $image_name = $image->getClientOriginalName();
            $image_name = pathinfo($image_name, PATHINFO_FILENAME); // Lấy tên tệp tin (loại bỏ phần mở rộng)
            $image_name = $image_name . '.' . $image_extension; // Kết hợp tên tệp tin với phần mở rộng đúng
            $image_path = $image->storeAs('public/images', $image_name);
            $image_url = str_replace('public/', '/storage/', $image_path);
        }

        $response = Http::withOptions([
            'verify' => false,
        ])->post('https://localhost:3000/api/users/register', [
            'full_name' => $full_name,
            'email' => $email,
            'phone_number' => $phone_number,
            'birthday' => $birthday,
            'address' => $address,
            'password' => $password,
            'image_url' => $image_url,
        ]);

        $data = json_decode($response->body(), true);

        if ($response->successful()) {
            // Trả về dữ liệu JSON để xử lý ở phía client
            return response()->json(['success' => true, 'message' => 'Đăng Ký thành công']);
        } else {
            // Trả về dữ liệu JSON để xử lý ở phía client
            return response()->json(['success' => false, 'message' => 'Đăng Ký thất bại']);
        }
    }



    public function login_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }



    public function callback_facebook()
    {
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();

        if ($account) {
            $account_name = User::where('id', $account->user)->first();
            return redirect('home')->with('success', 'Đăng nhập thành công');
        } else {
            $user = User::where('email', $provider->getEmail())->first();
            // dd($provider);
            if (!$user) {
                $user = User::create([
                    'full_name' => $provider->getName(),
                    'email' => $provider->getEmail(),
                    'password' => '',
                ]);


            }
            return redirect('home')->with('success', 'Đăng nhập thành công');
        }
    }

 // Tạo đối tượng Social và lưu vào cơ sở dữ liệu
            // $social = new Social([
            //     'provider_user_id' => $provider->getId(),
            //     'provider' => 'facebook'
            // ]);

            // $social->user()->associate($user);
            // $social->save();

    public function login_google()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callback_google()
    {
        $users = Socialite::driver('google')->user();
        // return $users->id;
        $authUser = $this->findOrCreateUser($users, 'google');
        $account_name = User::where('id', $authUser->user)->first();
        // Session::put('admin_login', $account_name->admin_name);
        // Session::put('admin_id', $account_name->admin_id);
        return redirect('home')->with('success', 'Đăng nhập thành công');
    }
    public function findOrCreateUser($users, $provider)
    {
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if ($authUser) {

            return $authUser;
        }

        $hieu = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
        ]);

        $orang = User::where('email', $users->email)->first();

        if (!$orang) {
            $orang = User::create([
                'full_name' => $users->name,
                'email' => $users->email,
                'password' => '',

            ]);
        }
        $hieu->login()->associate($orang);
        $hieu->save();

        $account_name = User::where('admin_id', $authUser->user)->first();
        Session::put('admin_login', $account_name->admin_name);
        Session::put('admin_id', $account_name->admin_id);
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
    }
}
