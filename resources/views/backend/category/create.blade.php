@extends('backend.layouts.main')
{{--Create: Lê Thành Trung--}}
{{--Date : 11/7/2022--}}
{{--categoryController--}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            THÊM MỚI DANH MỤC
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('/admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li><a href="{{route('admin.category.index')}}"><i class="fa fa-dashboard"></i> Quản lý Danh Mục</a></li>
            <li class="active">Tạo mới Danh Mục</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Error Message -->
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Cảnh Báo !</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div><!-- End Error Message -->

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{route('admin.category.store')}}" enctype="multipart/form-data"> <!--enctype sử dụng để upload file -->
                    @csrf<!-- phòng chống hack thông qua cookie (quyền chứng thực) -->
                        <div class="box-body">

                            <div class="form-group">
                                <label for="name">Tên Danh Mục (*): </label>
                                <input name="name" class="form-control" id="name" placeholder="Nhập tiêu đề">
                            </div>

                            <div class="form-group">
                                <label for="image">Chọn hình ảnh (*): </label>
                                <input type="file" name="image" id="image">
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Chọn Danh Mục Cha: </label>
                                <select id="parent_id" name="parent_id" class="form-control">
                                    <option value="0">-- Chọn Danh Mục Cha --</option>
                                    {{--đổ dữ liệu vào select bằng foreach--}}
                                    @foreach($data as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="position">Vị trí Danh Mục: </label>
                                <select id="position" name="position" class="form-control">
                                    <option value="0">-- Chọn Vị trí category --</option>
                                    @foreach($data as $item)
                                        <option value="{{$item->position}}">{{$item->position}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="is_active">Trạng Thái Kích Hoạt: </label>
                                <select id="is_active" name="is_active" class="form-control">
                                    <option selected value="0">Tắt</option>
                                    <option value="1">Kích Hoạt</option>
                                </select>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnCreate">Submit</button>
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

{{--Tạo Validate theo kiểu JS--}}
@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            $('.btnCreate').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tên danh mục','error',{ position:"right" });
                    document.getElementById('name').scrollIntoView();{{--sử dụng scrollIntoView để trỏ đến khu bị lỗi--}}
                        return false;
                }

            });
        });
    </script>
@endsection
