@extends('backend.layouts.main')

{{--Create: Lê Thành Trung--}}
{{--Date : 11/7/2022--}}
{{--categoryController--}}

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            QUẢN LÝ DANH MỤC
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{asset('/admin')}}"><i class="fa fa-dashboard"></i> Trang Chủ</a></li>
            <li class="active">Quản lý Danh Mục</li>
        </ol>
    </section>
    <!-- end Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="box-header">
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 10px">TT</th>
                                <th>Hình ảnh</th>
                                <th>Tên</th>
                                <th>Danh mục cha</th>
                                <th>Trạng thái</th>
                                <th>Sắp sếp</th>
                                <th>Hành động</th>
                            </tr>
                            @foreach($data as $key => $item)
                                @php
                                    @endphp
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        @if($item->image && file_exists(public_path($item->image)))
                                            <img src="{{ asset($item->image) }}" width="100" height="75" alt="">
                                        @else
                                            <img src="{{ asset('upload/404.png') }}" width="100" height="75" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        {{ !empty($item->parent->name) ? $item->parent->name : '' }}
                                    </td>
                                    <td>
                                        {!! $item->is_active == 1 ? '<span class="badge bg-green">ON</span>' : '<span class="badge bg-danger">OFF</span>' !!}
                                    </td>
                                    <td>
                                        {{ $item->position }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', ['category' => $item->id]) }}"><span title="Chỉnh sửa" type="button" class="btn btn-flat btn-primary"><i class="fa fa-edit"></i></span></a>
                                        <span data-id="{{ $item->id }}" title="Xóa" class="btn btn-flat btn-danger deleteItem"><i class="fa fa-trash"></i></span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{ $data->links() }}
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
            $('.deleteItem').click(function () {
                var id = $(this).attr('data-id');
                Swal.fire({
                    title: 'Bạn Có Chắc Muốn Xoá ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url : '/admin/category/'+id,
                            type: 'DELETE',
                            data: {},
                            success: function (res) {
                                if(res.status) {
                                    $('.item-'+id).remove();
                                }
                            },
                            error: function (res) {
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
