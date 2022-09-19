<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Settings;
use App\Models\Vendor;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    protected $categories;

    public  function  __construct() // tạo 1 hàm khởi tạo
    {
        $setting = Settings::first();

        // Lấy dữ liệu - Danh mục, có trạng thái là hiển thị
        $this->categories = Category::where(['is_active' => 1])->get();

        // Lấy dữ liệu - Category, có trạng thái là hiển thị 1 và position = 1
        $CategoryType1 = Category::where(['is_active' => 1])
            ->where('position', 1)
            ->orderBy('updated_at')
            ->limit(4)
            //->orderBy('id')
            ->get();

        // Lấy dữ liệu - Category, có trạng thái là hiển thị 1 và position = 3
        $CategoryType3 = Category::where(['is_active' => 1])
            ->where('position', 3)
            ->orderBy('updated_at')
            ->limit(3)
            //->orderBy('id')
            ->get();

        // Lấy dữ liệu - Banner, có trạng thái là hiển thị
        $banners = Banner::where(['is_active' => 1])
            // where('type', 5)
            //->orderBy('created_at')
            ->orderBy('id')
            ->get();

        // Lấy dữ liệu - Vendor đỗ vào thanh Vendor footer, có trạng thái là hiển thị
        $vendorFooter = Vendor::where(['is_active' => 1])
            // where('type', 5)
            //->orderBy('created_at')
            ->orderBy('id')
            ->get();

        $articles = Articles::where(['is_active' => 1])
            // where('type', 5)
            //->orderBy('created_at')
            ->orderBy('id')
            ->limit(6)
            ->get();


        View::share('categories', $this->categories);
        View::share('CategoryType1', $CategoryType1);
        View::share('CategoryType3', $CategoryType3);
        View::share('banners', $banners);
        View::share('vendorFooter', $vendorFooter);
        View::share('articles', $articles);
        View::share('setting', $setting);
    }

    public function index()
    {
        // khu vuc show sp cua Top Featured Products
        $hotProduct = Product::where('is_hot', 1)->where('is_active', 1)->limit(2)->orderBy('id', 'desc')->get();
        // $brandsFooter = Brand::where('is_active', 1)->get();

        $list = []; // chứa danh sách sản phẩm  theo danh mục

        foreach($this->categories as $key => $parent) {
            if ($parent->parent_id == 0) { // check danh mục cha
                $ids = []; // tạo chứa các id của danh cha + danh mục con trực thuộc / danh mục con

                $ids[] = $parent->id; // id danh mục cha

                $sub_menu = [];
                foreach ($this->categories as $child) {
                    if ($child->parent_id == $parent->id) {
                        $sub_menu[] = $child;
                        $ids[] = $child->id; // thêm phần tử vào mảng
                    }
                } // ids = [1,7,8,9,..]

                $list[$key]['category'] = $parent; // điện thoại, tablet
                $list[$key]['sub_category'] = $sub_menu; // điện thoại, tablet

                // SELECT * FROM `products` WHERE is_active = 1 AND is_hot = 0 AND category_id IN (1,7,9,11) ORDER BY id DESC LIMIT 10
                $list[$key]['products'] = Product::where(['is_active' => 1]) //, 'is_hot' => 0
                    ->whereIn('category_id', $ids)
                    ->limit(6)
                    ->orderBy('id', 'desc')
                    ->get();


            }
        }
        return view('frontend.index', ['list' => $list])->with('hotProduct', $hotProduct);//->with('brandsFooter', $brandsFooter)
    }

    // Controller chức năng search
    public function search(Request $request)
    {

        $keyword = $request->input('kwd');

        //$slug = Str::slug($keyword);

        //$sql = "SELECT * FROM products WHERE is_active = 1 AND slug like '%$keyword%'";

        //$products = Product::where([
        //['slug', 'like', '%' . $slug . '%'],
        //['is_active', '=', 1]
        //])->orderByDesc('id')->paginate(5);

        //$totalResult = $products->total(); // số lượng kết quả tìm kiếm

        $page = $request->input('page', 1);
        $paginate = 10;

        $products = Product::searchByQuery(['match' => ['name' => $keyword]], null, null, $paginate, $page);
        $totalResult = $products->totalHits();
        $totalResult = $totalResult['value'];
        // $offSet = ($page * $paginate) - $paginate;
        $itemsForCurrentPage = $products->toArray();
        $products = new \Illuminate\Pagination\LengthAwarePaginator($itemsForCurrentPage, $totalResult, $paginate, $page);
        $products->setPath('tim-kiem');

        return view('frontend.search', [
            'products' => $products,
            'totalResult' => $totalResult ?? 0,
            'keyword' => $keyword ? $keyword : ''
        ]);
    }

    //Controller giỏ hàng
    public function cart()
    {
        $cartItems = \Cart::getContent();

        $total = \Cart::getTotal();

        return view('frontend.cart', compact('cartItems', 'total'));
    }

    //Controller function thêm sản phảm ra khỏi giỏ hàng
    public function addToCart(Request $request)
    {
        //dd($request);
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);

        session()->flash('success', 'Thêm vào giỏ hàng thành công');

        return redirect()->route('cart.list');
    }

    //Controller function xoá sản phảm ra khỏi giỏ hàng
    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Xoá sản phẩm ra giỏ hàng thành công !');

        return redirect()->route('cart.list');
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

    // Controller Trang Danh sách bài viết
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


    // Controller Trang Chi tiết Banner
    public  function bannerDetail($slug){

        // select * form Articles where slug = slug and is_active = 1
        $banner = Banner::where('slug', $slug)->where('is_active', 1)->first();

        if($banner == null){
            return view('frontend.404');
        }

        return view('frontend.banner-detail',['banner'=>$banner]);
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
            ->paginate(10); // phân trang (1 trang chứa 15 phần tử)

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
