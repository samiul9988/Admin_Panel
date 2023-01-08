@extends('admin.master')
@section('body')
    <section class="content py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Menus-Pages</h3>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-sm table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th width="20">SL NO</th>
{{--                                    <th width="100">Action</th>--}}
                                    <th>Page Name</th>
                                    <th>Menu Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menu_pages as $menu_page)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
{{--                                        <td>--}}
{{--                                            <a href="{{route('menu-page.show',$menu_page->id)}}" class="btn btn-xs btn-info mr-1 float-left"><i class="fa fa-eye"></i></a>--}}
{{--                                            <a href="{{route('menu-page.edit',$menu_page->id)}}" class="btn btn-xs btn-primary mr-1 float-left"><i class="fa fa-edit"></i></a>--}}

{{--                                            <form action="{{route('menu-page.destroy',$menu_page->id)}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}

{{--                                                <button type="submit" class="btn btn-xs btn-danger mr-1 float-left"><i class="fa fa-trash"></i></button>--}}

{{--                                            </form>--}}
{{--                                        </td>--}}
                                        <td>{{$menu_page->page->name}}</td>
                                        <td>{{$menu_page->menu->name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection

