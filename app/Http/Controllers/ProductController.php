<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use App\Models\Image;


class ProductController extends Controller
{
    public function index()
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/product?limit=1000');
        $products = $response->json();

        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/supplier');
        $suppliers = $response->json()['data']['list'];

        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/image');
        $images = $response->json();

        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/size');
        $sizes = $response->json();

        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/color');
        $colors = $response->json();

        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/category');
        $categorys = $response->json()['data']['list'];
        
        return view('admin.product', compact('products', 'suppliers', 'images' , 'sizes' , 'colors','categorys'));
    }
    public function indeximage()
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/image');
        $images = $response->json();
        return view('admin.image', compact('images'));
    }
    public function indexcolor()
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/color?limit=1000');
        $colors = $response->json();
        return view('admin.color', compact('colors'));
    }
    public function indexCategory()
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/category?limit=1000');
        $category = $response->json();
        return view('admin.category', compact('category'));
    }
    public function indexsize()
    {
        $response = Http::withOptions([
            'verify' => false,
        ])->get('https://localhost:3000/api/size?limit=1000');
        $sizes = $response->json();
        return view('admin.size', compact('sizes'));
    }

    public function addImage(Request $request)
    {
        // Kiểm tra xem có tệp tin nào được gửi lên không
        if ($request->hasFile('image_url')) {
            $images = $request->file('image_url');
            foreach ($images as $image) {
                // Đặt tên tệp tin mới với đường dẫn đầy đủ
                $path = $image->storeAs('public/images', $image->getClientOriginalName());

                // Tạo bản ghi mới trong bảng "images"
                $newImage = new Image();
                $newImage->image_url = Storage::url($path);
                $newImage->save();
            }
            // Thực hiện các xử lý khác nếu cần 
            return redirect()->back()->with('success', 'Thêm hình ảnh thành công.');
        }
        return redirect()->back()->with('error', 'Không có hình ảnh được gửi lên.');
    }


    // public function update(Request $request, $id)
    // {
    //     $supplier_id = intval($request->input('supplier_id'));
    //     $name = $request->input('name');
    //     $description = $request->input('description');
    //     $quantity = intval($request->input('quantity'));
    //     $amount = floatval($request->input('amount'));
    //     $discount_amount = floatval($request->input('discount_amount'));

    //     $discount_percent = floatval($request->input('discount_percent'));


    //     $response = Http::withOptions([
    //         'verify' => false,
    //     ])->post('https://localhost:3000/api/product/' . $id . '/update', [
    //         'supplier_id' => $supplier_id,
    //         'name' => $name,
    //         'description' => $description,
    //         'quantity' => $quantity,
    //         'amount' => $amount,
    //         'discount_amount' => $discount_amount,
    //         'discount_percent' => $discount_percent,
    //     ]);

    //     $data = json_decode($response->body(), true);

    //     if ($response->status() == 200) {

    //         return redirect('admin/product')->with('success', 'Cập knhật thành công');
    //     } else {
    //         // Đăng nhập thất bại, trả về thông báo lỗi
    //         return back()->withErrors(['message' => 'Cập nhật thất bại']);
    //     }
    // }
}

// $image_urls = array();
//         $images = $request->file('image_urls');

//         if ($images) {
//             foreach ($images as $image) {
//                 if ($image->getClientOriginalName()) {
//                     $filename = $image->getClientOriginalName();
//                     $path = $image->storeAs('public/images', $filename);
//                     $url = Storage::url($path);
//                     $image_urls[] = $url;
//                 }
//             }
//         }