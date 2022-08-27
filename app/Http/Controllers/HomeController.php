<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Contact;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    public  function  __construct() // tạo 1 hàm khởi tạo
    {
        $setting = Settings::first();

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
            return view('frontend.frontend.404');
        }

        return view('frontend.article-detail',['article'=>$article]);
    }

    // Controller Trang Danh 404
    public function errorPage404(){

        return view('frontend.404');
    }
}
