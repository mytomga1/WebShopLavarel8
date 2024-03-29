@extends('backend.layouts.main')

{{--Create: Lê Thành Trung--}}
{{--Date : 30/7/2022--}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            QUẢN LÝ NHÀ CUNG CẤP
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('/admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li class="active">Quản lý nhà cung cấp</li>
        </ol>
    </section>
    <!-- end Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Bảng ver.1 -end-->
{{--            <div class="col-md-12">--}}
{{--                <div class="box">--}}
{{--                    <div class="box-header with-border">--}}
{{--                        @if(\Auth::user()->role_id == 1) <!-- kiểm tra tài khoản có phải là admin ko, nếu là admin thì show combobox filter -->--}}
{{--                        <div class="form-group" style="width: 150px;float: left;margin: 0">--}}
{{--                            <select class="form-control" id="filter_type" name="filter_type">--}}
{{--                                <option {{ $filter_type == 1 ? 'selected' : '' }} value="1">Tất cả</option>--}}
{{--                                <option {{ $filter_type == 2 ? 'selected' : '' }} value="2">Đang Sử Dụng</option>--}}
{{--                                <option {{ $filter_type == 3 ? 'selected' : '' }} value="3">Thùng rác</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        @endif--}}
{{--                        <a href="{{ route('admin.vendor.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>--}}
{{--                    </div>--}}
{{--                    <!-- /.box-header -->--}}
{{--                    <div class="box-body no-padding">--}}
{{--                        <div class="box-header">--}}
{{--                        </div>--}}
{{--                        <table class="table table-bordered">--}}
{{--                            <tr>--}}
{{--                                <th style="width: 10px">TT</th>--}}
{{--                                <th>Hình ảnh</th>--}}
{{--                                <th>Tên nhà cung cấp</th>--}}
{{--                                <th>Số điện thoại</th>--}}
{{--                                <th>Trạng thái</th>--}}
{{--                                <th>Hành động</th>--}}
{{--                            </tr>--}}
{{--                            @foreach($data as $key => $item)--}}
{{--                                @php--}}
{{--                                    @endphp--}}
{{--                                <tr class="item-{{ $item->id }}">--}}
{{--                                    <td>{{ $key + 1 }}</td>--}}
{{--                                    <td>--}}
{{--                                        @if($item->image && file_exists(public_path($item->image)))--}}
{{--                                            <img src="{{ asset($item->image) }}" width="30%" height="75" alt="">--}}
{{--                                        @else--}}
{{--                                            <img src="{{ asset('frontend\Img404.png') }}" width="100" height="75" alt="">--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                    <td>{{ $item->name }}</td>--}}
{{--                                    <td>{{ $item->phone }}</td>--}}
{{--                                    <td>--}}
{{--                                        {!! $item->is_active == 1 ? '<span class="badge bg-green">ON</span>' : '<span class="badge bg-danger">OFF</span>' !!}--}}
{{--                                    </td>--}}
{{--                                    <td class="action" >--}}
{{--                                        <a href="{{ route('admin.vendor.edit', ['vendor' => $item->id]) }}"><span title="Chỉnh sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>--}}
{{--                                        @if($item->deleted_at == null)--}}
{{--                                            <span  data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>--}}
{{--                                            <span style="display:none;" data-id="{{ $item->id }}" title="Khôi phục" class="btn btn-flat btn-warning restoreItem"><i class="fa fa-refresh"></i></span>--}}
{{--                                        @else--}}
{{--                                            <span style="display:none;" data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>--}}
{{--                                            <span  data-id="{{ $item->id }}" title="Khôi phục" class="btn btn-flat btn-warning restoreItem"><i class="fa fa-refresh"></i></span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                    <!-- /.box-body -->--}}
{{--                    <div class="box-footer clearfix">--}}
{{--                        <ul class="pagination pagination-sm no-margin pull-right">--}}
{{--                            {!! $data->links('vendor.pagination.custom2') !!}--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- Bảng ver.1 -end-->

            <!-- Bảng ver.2 -->
            <div class="col-xs-12">
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
                        <a href="{{ route('admin.vendor.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="width: 10px">TT</th>
                                <th>Hình ảnh</th>
                                <th>Tên nhà cung cấp</th>
                                <th>Số điện thoại</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody class="table-group-divider table-divider-color">
                                @foreach($data as $key => $item)
                                @php
                                    @endphp
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($item->image && file_exists(public_path($item->image)))
                                            <img src="{{ asset($item->image) }}" width="30%" height="75" alt="">
                                        @else
                                            <img src="{{ asset('frontend\Img404.png') }}" width="100" height="75" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        {!! $item->is_active == 1 ? '<span class="badge bg-green">ON</span>' : '<span class="badge bg-danger">OFF</span>' !!}
                                    </td>
                                    <td class="action" >
                                        <a href="{{ route('admin.vendor.edit', ['vendor' => $item->id]) }}"><span title="Chỉnh sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>
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
                </div>
                <!-- /.box -->
            </div>
            <!-- Bảng ver.2 -end-->

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
                            url : '/admin/vendor/'+id,
                            type: 'DELETE',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    $('.item-'+id).remove();

                                    var filter_type = $('#filter_type').val();
                                    window.location.href = "{{ route('admin.vendor.index') }}?filter_type="+filter_type;
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
                    text: "Dữ liệu sẽ được khôi phục lại danh sách nhà cung cấp",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : '/admin/vendor/restore/'+id,
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
                                    window.location.href = "{{ route('admin.vendor.index') }}?filter_type="+filter_type;

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
                window.location.href = "{{ route('admin.vendor.index') }}?filter_type="+filter_type;
            });

            // bắt sự kiện filter table by colum and search
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            });
        });
    </script>
@endsection
