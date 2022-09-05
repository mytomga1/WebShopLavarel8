<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    protected $categories;

    public  function  __construct() // tạo 1 hàm khởi tạo
    {
        $setting = Settings::first();

        // Lấy dữ liệu - Danh mục, có trạng thái là hiển thị
        $this->categories = Category::where(['is_active' => 1])->get();


        View::share('categories', $this->categories);
        View::share('setting', $setting);
    }

    public function index()
    {
        return view('frontend.index');
    }

    // Controller Trang liên hệ
    public function contact()
    {
        return view('frontend.contact');
    }

    // Controller chức năng thêm liên hệ
    public function contactPost(Request $request)
    {
        // validate form
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'content' => 'required',
        ],[
            'name.required' => 'Bạn cần phải nhập vào tên',
            'email.required' => 'Bạn chưa nhập email',
            'phone.required' => 'Bạn chưa nhập SĐT',
            'content.required' => 'Bạn chưa nhập nội dung',
        ]);

        $model = new Contact();
        $model->name = $request->input('name');
        $model->phone = $request->input('phone');
        $model->email = $request->input('email');
        $model->content = $request->input('content');
        $model->save();

        return redirect('/lien-he')->with('msgContact', 'Gửi liên hệ thành công !');
    }

    // Controller Trang Danh sánh bài viết
    public function articles(){

        $articles = Articles::latest()->paginate(6);

        return view('frontend.articles',['articles'=>$articles]);
    }

    // Controller Trang Chi tiết bài viết
    public  function ArticleDetail($slug){

        // select * form Articles where slug = slug and is_active = 1
        $article = Articles::where('slug', $slug)->where('is_active', 1)->first();

        if($article == null){
            return view('frontend.404');
        }

        return view('frontend.article-detail',['article'=>$article]);
    }

    // Tạo 1 hàm category router với mục đích lấy danh sách sản phẩm theo menu danh muc
    public function category($slug){
        $category = Category::where('slug', $slug)->where('is_active', 1)->first();

        if ($category == null) {
            return view('frontend.404');
        }

        $ids[] = $category->id; // khai báo mảng chứa các mã danh mục cần tìm kiếm chưa các sản phẩm

        foreach ($this->categories as $child) {
            if ($child->parent_id == $category->id) {
                $ids[] = $child->id; // thêm id của danh mục con vào mảng ids

                foreach ($this->categories as $sub_child) {
                    if ($sub_child->parent_id == $child->id) {
                        $ids[] = $child->id;
                    }
                }
            }
        }

        // cần viết đệ quy lấy toàn bộ danh mục cha con

        // step 2 : lấy list sản phẩm theo thể loại
        $products = Product::where('is_active', 1)
            ->whereIn('category_id' , $ids)
            ->latest() // lấy dữ liệu mới nhất
            ->paginate(15); // phân trang (1 trang chứa 5 phần tử)

        return view('frontend.productList', ['category' => $category, 'products' => $products]);
    }

    public function product(Request $request, $slug)
    {
        $product = Product::where('is_active', 1)->where('slug', $slug)->first();

        if ($product == null) {
            return view('frontend.404');
        }

        return view('frontend.product-detail', ['product' => $product]);
    }

    // Controller Trang Danh 404
    public function errorPage404(){

        return view('frontend.404');
    }
}
