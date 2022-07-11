@extends('backend.layouts.main')
{{--Create: Lê Thành Trung--}}
{{--Date : 11/7/2022--}}
{{--BannerController--}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            THÊM MỚI BANNER
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('/Admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li><a href="{{route('banner.index')}}"><i class="fa fa-dashboard"></i> Quản lý Banner</a></li>
            <li class="active">Tạo mới Banner</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('banner.store')}}" enctype="multipart/form-data"> <!--enctype sử dụng để upload file -->
                    @csrf<!-- phòng chống hack thông qua cookie (quyền chứng thực) -->
                        <div class="box-body">

                            <div class="form-group">
                                <label for="title">Tiêu Đề: </label>
                                <input name="title" class="form-control" id="title" placeholder="Nhập tiêu đề">
                            </div>

                            <div class="form-group">
                                <label for="image">Chọn hình ảnh: </label>
                                <input type="file" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="url">URL: </label>
                                <input name="url" class="form-control" id="url" placeholder="Nhập link">
                            </div>

                            <div class="form-group">
                                <label for="target">Chọn Target: </label>
                                <select id="target" name="target" class="form-control">
                                    <option value="1">_blank</option>
                                    <option value="0">_self</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="type">Loại Banner: </label>
                                <select id="type" name="type" class="form-control">
                                    <option value="1">Banner bên phải</option>
                                    <option value="2">Banner bên Trái</option>
                                    <option value="3">Banner bên phía trên</option>
                                    <option value="4">Banner bên phía dưới</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="position">Vị trí Banner: </label>
                                <select id="position" name="position" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="is_active">Trạng Thái Kích Hoạt: </label>
                                <select id="is_active" name="is_active" class="form-control">
                                    <option value="1">Kích Hoạt</option>
                                    <option value="0" selected>Tắt</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Mô Tả</label>
                                <textarea id="description" name="description" class="form-control" rows="3"
                                          placeholder="Enter ..."></textarea>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
