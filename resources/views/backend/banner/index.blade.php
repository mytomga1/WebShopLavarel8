@extends('backend.layouts.main')

{{--Create: Lê Thành Trung--}}
{{--Date : 11/7/2022--}}
{{--BannerController--}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            QUẢN LÝ BANNER
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('/Admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li class="active">Quản lý Banner</li>
        </ol>
    </section>
    <!-- end Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">Id</th>
                                <th >Hình Ảnh</th>
                                <th >Tên</th>
                                <th>Loại</th>
                                <th>Hành Động</th>
                            </tr>
                            @foreach($data as $key => $item)
                                <tr>
                                    <td>{{$item->id}}</td>

                                    <td>
                                        {{-- kiểm tra hình ảnh có tồn tại hay ko--}}
                                        @if($item->image && file_exists(public_path($item->image)))
                                            <img src="{{asset($item->image)}}" width="100" height="75" alt="">
                                        @else
                                            <img src="{{asset('frontend\Img404.png')}}" width="100" height="75" alt="">
                                        @endif
                                    </td>

                                    <td>{{$item->title}}</td>

                                    <td><span class="badge bg-red">
                                            @if($item->type == 1)
                                                Banner bên phải
                                            @elseif($item->type == 2)
                                                Banner bên trái
                                            @elseif($item->type == 3)
                                                Banner phía trên
                                            @else($item->type == 4)
                                                Banner phía dưới
                                            @endif
                                        </span>
                                    </td>

                                    <td>
                                        <a href="">
                                            <span title="Chỉnh Sửa" type="button" class="btn btn-flat btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </span>
                                        </a>

                                        <span onclick="" title="Xoá" class="btn btn-flat btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            <li><a href="#">«</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
