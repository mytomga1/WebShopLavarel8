<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Create: Lê Thành Trung
 * Date : 11/7/2022
 * BannerController
*/

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cách 1 : lấy dữ liệu mới nhất và phân trang - mỗi trang 10 bản ghi
        //$data = Banner::latest()->paginate(10);

        //Cách 2: Lấy dữ liệu phân trang - mỗi trang 10 bản ghi
        //$data = Banner::paginate(10);

        //kiểm tra dữ liệu
        //dd($data);

        //Cách 3: lấy toàn bộ dữ liệu
        $data = Banner::all(); // tương đương với câu lệnh SELECT * FORM Banners

        // truyền dữ liệu sang view với 2 tham số 1 tên view và 2 là mảng dữ liệu truyền sang
        return view('backend.banner.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /**
        * echo'<pre>';
        * print_r($request->all());
        * die;
        * ==> sử dụng hàm dd(); thay cho 3 thằng trên
       */

        $banner = new Banner();
        $banner->title = $request->input('title');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $banner->slug = Str::slug($request->input('title'));

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/banner/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $banner->image = $path_upload.$filename;
        }

        $banner->url = $request->input('url');
        $banner->target = $request->input('target');
        $banner->type = $request->input('type');
        $banner->position = $request->input('position');
        $banner->is_active = $request->input('is_active');
        $banner->description = $request->input('description');

        $banner->created_at = date('Y-m-d H:i:s');

        $banner->save();

        //sau khi thêm dữ liệu banner vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
