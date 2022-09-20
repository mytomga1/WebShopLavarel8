<div class="col-xl-3 col-lg-4">
    <!-- khu vực danh mục con sản phẩm -->
    <div class="product-widget mb-30">
        <h5 class="pt-title">Danh mục sản phẩm</h5>
        <div class="widget-category-list mt-20">
            <form action="#">
                @foreach($categories as $item)
                    @if($item->parent_id == $category->id)
                        <div class="single-widget-category">
                            <a href="{{ route('category2',['category2'=>$item->slug]) }}">{{ $item->name }}</a>
                        </div>
                    @endif
                @endforeach
            </form>
        </div>
    </div>
    <!-- khu vực danh mục con sản phẩm end -->

{{--    <div class="product-widget mb-30">--}}
{{--        <h5 class="pt-title">Choose Brand</h5>--}}
{{--        <div class="widget-category-list mt-20">--}}
{{--            <form action="#">--}}

{{--                <div class="single-widget-category">--}}
{{--                    <input type="checkbox" id="brand-item-1" name="brand-item">--}}
{{--                    <label for="brand-item-1">CarRentals <span>(12)</span></label>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="product-widget mb-30">
        <h5 class="pt-title">Special Offers</h5>
        <div class="product__sm mt-20">
            <ul>
                <li class="product__sm-item d-flex align-items-center">
                    <div class="product__sm-thumb mr-20">
                        <a href="product-details.html">
                            <img src="{{ asset('frontend') }}/img/product//sm-1.jpg" alt="">
                        </a>
                    </div>
                    <div class="product__sm-content">
                        <h5 class="product__sm-title">
                            <a href="product-details.html">Classic Leather Backpack Daypack 2022</a>
                        </h5>
                        <div class="product__sm-price">
                            <span class="price">$300.00</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
