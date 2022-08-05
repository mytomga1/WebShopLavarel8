<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cách 1 : lấy dữ liệu mới nhất và phân trang - mỗi trang 10 bản ghi
        $data = Brand::latest()->paginate(10);

        //Cách 2: Lấy dữ liệu phân trang - mỗi trang 10 bản ghi
        //$data = Brand::paginate(10);

        //kiểm tra dữ liệu
        //dd($data);

        //Cách 3: lấy toàn bộ dữ liệu
        //$data = Brand::all(); // tương đương với câu lệnh SELECT * FORM Brands

        // truyền dữ liệu sang view với 2 tham số 1 tên view và 2 là mảng dữ liệu truyền sang
        return view('backend.brand.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //lấy tất cả dữ liệu từ bản Brand
        $data = Brand::all(); // => Select * form Brands

        // truyền dữ liệu thấy dc qua view create
        return view('backend.brand.create', ['data'=> $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // xác thực dữ liệu - validate từ phía server (ưu điểm user ko thể tắt validate - nhược điểm gây chậm server)
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tên Nhãn Hiệu',
            'image.required' => 'Bạn chưa chọn file ảnh',
            'image.image' => 'File ảnh phải có dạng jpeg,png,jpg,gif,svg',
        ]);

        $Brand = new Brand();
        $Brand->name = $request->input('name');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $Brand->slug = Str::slug($request->input('name'));

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/brand/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $Brand->image = $path_upload.$filename;
        }

        $Brand->position = $request->input('position');
        $Brand->is_active = $request->input('is_active');

        $Brand->created_at = date('Y-m-d H:i:s');

        $Brand->save();

        //sau khi thêm dữ liệu Brand vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.brand.index');
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
        $model = Brand::findOrFail($id);
        //lấy tất cả dữ liệu từ bản Brand
        $data = Brand::all(); // => Select * form Brand

        // sau khi tìm dữ liệu thành công, bắt đầu chuyên dữ liệu đó sang view edit
        return view('backend.brand.edit', ['model' => $model, 'data' => $data]);
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
        $Brand = Brand::findOrFail($id);
        $Brand->name = $request->input('name');

        //  Trong laravel sử dụng <use Illuminate\Support\Str;> để chuyển đổi tiêu đề thành dạng slug
        //  :: trong laravel tượng trưng cho hàm static
        $Brand->slug = Str::slug($request->input('name'));

        if($request->hasFile('image')){// kiểm tra xem có ảnh dc chọn ko
            // Sử Dụng Hàm unlink() để xoá file ảnh củ khi thực hiện upload ảnh mới
            @unlink(public_path($Brand->image));

            // get file - tạo ra 1 biến file đại diện cho file ảnh dc up lên
            $file = $request->file('image');

            // đặt tên cho file ảnh (thời gian tạo + tên ảnh)
            $filename = time().'_'.$file->getClientOriginalName();

            // định nghĩa đường dẫn lưu trữ file ảnh
            $path_upload = 'frontend/img/brand/';

            // thực hiện chuyển file ảnh (thông qua hàm move()) vào thư mục đã cấu hình
            $file->move($path_upload,$filename);

            //lưu lại trên
            $Brand->image = $path_upload.$filename;
        }

        $Brand->position = $request->input('position');
        $Brand->is_active = $request->input('is_active');

        $Brand->updated_at = date('Y-m-d H:i:s');

        $Brand->save();

        //sau khi thêm dữ liệu Brand vào db thành công chuyển hướng về trang danh sách
        // hàm redirect() tương tự hàm header() dùng chuyễn hướng trang
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Brand = Brand::findOrFail($id);
        // xóa ảnh cũ
        @unlink(public_path($Brand->image));

        Brand::destroy($id);

        return response()->json(['status' => true, 'msg' => 'Xóa thành công']);
    }
}
