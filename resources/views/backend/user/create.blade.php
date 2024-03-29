@extends('backend.layouts.main')
{{--Create: Lê Thành Trung--}}
{{--Date : 1/8/2022--}}

@section('content')
    <section class="content-header">
        <h1>
            Thêm Thành Viên
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">Thêm Thành Viên</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-warning"></i> Lỗi !</h4>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="{{ route('admin.user.index') }}" class="btn btn-info pull-right"><i class="fa fa-list" aria-hidden="true"></i> Danh Sách</a>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Tên hiển thị (*): </label>
                                <input id="name" name="name" type="text" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="avatar">Avatar : </label>
                                <input type="file" name="avatar" id="avatar">
                            </div>

                            <div class="form-group">
                                <label for="email">Email (*): </label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="">
                            </div>

                            <div class="form-group">
                                <label for="password">Mật khẩu (*): </label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="form-group">
                                <label for="role_id">Vai trò (*): </label>
                                <select class="form-control" name="role_id" id="role_id">
                                    <option value="0">-- chọn --</option>
                                    @foreach($role as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input value="1" type="checkbox" name="is_active" id="is_active"> Kích hoạt
                                </label>
                            </div>

                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary btnCreate">Thêm</button>
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

@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            CKEDITOR.replace( 'description' );
            $('.btnCreate').click(function () {
                if ($('#name').val() === '') {
                    $('#name').notify('Bạn nhập chưa nhập tên hiển thị','error');
                    document.getElementById('name').scrollIntoView();
                    return false;
                }
                if ($('#email').val() === '') {
                    $('#email').notify('Bạn nhập chưa nhập email','error');
                    document.getElementById('email').scrollIntoView();
                    return false;
                }
                if ($('#password').val() === '') {
                    $('#password').notify('Bạn nhập chưa tạo mật khẩu','error');
                    document.getElementById('password').scrollIntoView();
                    return false;
                }
                if ($('#role_id').val() === '0') {
                    $('#role_id').notify('Bạn chưa chọn vai trò','error');
                    document.getElementById('role_id').scrollIntoView();
                    return false;
                }
            });
        });
    </script>
@endsection
