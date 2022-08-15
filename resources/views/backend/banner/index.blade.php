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
            <li><a href="{{asset('/admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li class="active">Quản lý Banner</li>
        </ol>
    </section>
    <!-- end Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        @if(\Auth::user()->role_id == 1) <!-- kiểm tra tài khoản có phải là admin ko, nếu là admin thì show combobox filter -->
                        <div class="form-group" style="width: 150px;float: left;margin: 0">
                            <select class="form-control" id="filter_type" name="filter_type">
                                <option {{ $filter_type == 1 ? 'selected' : '' }} value="1">Tất cả</option>
                                <option {{ $filter_type == 2 ? 'selected' : '' }} value="2">Đang Sử Dụng</option>
                                <option {{ $filter_type == 3 ? 'selected' : '' }} value="3">Thùng rác</option>
                            </select>
                        </div>
                        @endif
                        <a href="{{ route('admin.banner.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="box-header">
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Loại</th>
                                <th scope="col">#</th>
                            </tr>
                            </thead>

                            <tbody class="table-group-divider table-divider-color">
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}">
                                    <th scope="row">{{$item->id}}</th>

                                    <td>
                                        {{-- kiểm tra hình ảnh có tồn tại hay ko--}}
                                        @if($item->image && file_exists(public_path($item->image)))
                                            <img src="{{asset($item->image)}}" width="100" height="75" alt="">
                                        @else
                                            <img src="{{asset('frontend\Img404.png')}}" width="100" height="75" alt="">
                                        @endif
                                    </td>

                                    <td>{{$item->title}}</td>

                                    <td>
                                    <span class="badge bg-green-gradient">
                                        @if($item->type == null)
                                            Chưa Chọn
                                        @elseif($item->type == 1)
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

                                    <td class="action" >
                                        <a href="{{ route('admin.banner.edit', ['banner' => $item->id]) }}"><span title="Chỉnh sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>
                                        @if($item->deleted_at == null)
                                            <span  data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
                                            <span style="display:none;" data-id="{{ $item->id }}" title="Khôi phục" class="btn btn-flat btn-warning restoreItem"><i class="fa fa-refresh"></i></span>
                                        @else
                                            <span style="display:none;" data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
                                            <span  data-id="{{ $item->id }}" title="Khôi phục" class="btn btn-flat btn-warning restoreItem"><i class="fa fa-refresh"></i></span>
                                        @endif
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

@section('js')
    <script type="text/javascript">
        $( document ).ready(function() {
            //bắt sự kiện nút xoá
            $('.deleteItem').click(function () {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Bạn có chắc muốn xóa ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : '/admin/banner/'+id,
                            type: 'DELETE',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    $('.item-'+id).remove();

                                    var filter_type = $('#filter_type').val();
                                    window.location.href = "{{ route('admin.banner.index') }}?filter_type="+filter_type;
                                } else {
                                    Swal.fire(
                                        'Thông báo !',
                                        res.msg,
                                        'error'
                                    )
                                }
                            },
                            error: function (res) {
                            }
                        });
                    }
                });
            });

            // bắt sự kiện nút khôi phục
            $('.restoreItem').click(function () {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Bạn có muốn khôi phục ?',
                    text: "Dữ liệu sẽ được khôi phục lại danh sách Banner",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : '/admin/banner/restore/'+id,
                            type: 'POST',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    Swal.fire(
                                        'Thông báo !',
                                        'Khôi phục thành công',
                                        'success'
                                    )

                                    var filter_type = $('#filter_type').val();
                                    window.location.href = "{{ route('admin.banner.index') }}?filter_type="+filter_type;
                                } else {
                                    Swal.fire(
                                        'Thông báo !',
                                        'Có lỗi xảy ra',
                                        'error'
                                    )
                                }
                            },
                            error: function (res) {
                            }
                        });
                    }
                });
            });

            // bắt sự kiện combobox filter
            $('#filter_type').change(function () {
                var filter_type = $('#filter_type').val();
                // sử dụng window.location.href để truyền dữ liệu filter và chuyển trang
                window.location.href = "{{ route('admin.banner.index') }}?filter_type="+filter_type;
            });
        });
    </script>
@endsection

{{--@section('js')--}}
{{--    <script type="text/javascript">--}}
{{--        $( document ).ready(function() {--}}
{{--            $('.deleteItem').click(function () {--}}
{{--                var id = $(this).attr('data-id');--}}

{{--                $.ajax({--}}
{{--                    url : '/admin/banner/'+id,--}}
{{--                    type : 'DELETE',--}}
{{--                    data : {},--}}
{{--                    success : function (res){--}}
{{--                        if(res.status){--}}
{{--                            $('.item-'+id).remove();--}}
{{--                        }--}}
{{--                    },--}}
{{--                    error: function (res){--}}

{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
