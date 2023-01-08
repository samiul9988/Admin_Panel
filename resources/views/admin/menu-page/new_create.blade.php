@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title" id="addPage"><icon class="fa fa-plus mr-2"></icon> Add New Page</h3>
                    </div>


                    <form action="{{route('menu-page.store')}}" method="POST">
                        @csrf
                        <div class="card-body d-none" id="addPageForm">

                            <div class="form-group">
                                <div class="card">
                                    <div class="card-header">
                                        Page Title :
                                    </div>
                                    <div class="card-body">
                                        {{-- <label for=""></label> --}}
                                        <div class="row">
                                            @foreach($all_pages as $page)
                                                <div class="col-md-3">
                                                    <input type="checkbox" id="pages" class="" name="pages_id[]" value="{{$page->id}}"
                                                        @foreach($page->menuPages as $menu)
                                                            {{$page->id==$menu->page_id? 'checked disabled':''}}
                                                        @endforeach
                                                    >
                                                    <label for="pages">{{$page->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('pages_id')
                                        <div class="alert alert-danger">{{ "Page is required" }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div>
                                <input type="checkbox" value="1" name="active">
                                <label for="">Active</label>
                            </div>

                            <div>
                                <input type="checkbox" value="1" name="title_hide">
                                <label for="">Title Hide</label>
                            </div>

                            <div>
                                <input type="checkbox" id="listOfMenus">
                                <label for="listOfMenus">List In Menu</label>
                            </div>
                            <div class="form-group d-none" id="addListMenus">
{{--                                <label for="">Menu Name :</label><br>--}}
                                <div class="card">
                                    <div class="card-header">
                                        Update Menu
                                    </div>
                                    <div class="card-body">
                                        <div class="row" >
                                            @foreach($all_menus as $menu)
                                                <div class="col-md-3">
                                                    <input type="checkbox" id="menus" name="menus_id[]" value="{{$menu->id}}">
                                                    <label for="menus">{{$menu->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>

                                        @error('menus_id')
                                        <div class="alert alert-danger">{{ "Menu is required" }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <input type="number" name="addedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>

                            <div class="pt-2">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>


                    </form>
                </div>
            </section>

            <section class="pt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><icon class="fa fa-book-open mr-2"></icon> All Pages</h3>
                    </div>


                        <div class="card-body">

                            <div class="form-group">
                                <div class="row">

                                    @foreach($all_pages as $page)
                                        @php
                                            $c=0;
                                            $active=0;
                                            $title_hide=0;
                                        @endphp
                                    @if(count($page->menuPages)>0)
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-1 pt-1">
                                                        <icon class="fas fa-arrows-alt"></icon>
                                                    </div>
                                                    <div class="col-md-10  pt-1">
                                                        <span>Page Title : </span>
                                                        <span class="font-weight-bold mr-1">{{$page->name}},</span>
                                                        @php
                                                            foreach ($menu_pages as $menu_page){
                                                                if ($page->id==$menu_page->page_id){
                                                                    $active = $menu_page->active;
                                                                    $title_hide=$menu_page->title_hide;
                                                                    if (isset($menu_page->menu_id)){
                                                                        $c=$c+1;
                                                                    }
                                                                }
                                                            }
                                                        @endphp

                                                        Active :
                                                        <span class="font-weight-bold mr-1"> {{$active==1?'Yes':'No'}},</span>
                                                        List In Menu : <span class="font-weight-bold mr-1">{{$c>0?'Yes':'No'}},</span>

                                                        Title Hide: <span class="font-weight-bold mr-1">{{$title_hide==1?'Yes':'No'}},</span>
                                                        Parts :  <span class="font-weight-bold mr-1">{{$c}}</span>
{{--                                                        <a href="{{route('menu-page.page',$page->id)}}" class="font-weight-bold">{{$c}}</a>--}}

                                                    </div>
                                                    <div class="col-md-1 pt-1">
                                                        <a href="{{route('menu-page.edit',$page->id)}}" class="btn btn-xs btn-primary mr-1 float-left"><i class="fa fa-edit"></i></a>
                                                        <button type="submit" name="pageDlt"  class="btn btn-xs btn-danger mr-1 float-left" value="{{$page->id}}"><i class="fa fa-trash"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
            </section>


@endsection

@section('script')
    <script>
        $('button[name=pageDlt]').click(function(){
            // var mode=$(this).prop('checked');
            var id=$(this).val()
            $.ajax({
                url:"{{route('menu-page.pageDelete')}}",
                type:"POST",
                data:{
                    _token:'{{csrf_token()}}',
                    id:id,
                },
                success:function(response){
                    if(response.status){
                        alert(response.msg);
                        window.location.reload();
                    }
                    else{
                        alert('please try again');
                    }
                }
            })
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#listOfMenus").click(function(){
                // alert('HI');
                $("#addListMenus").toggleClass('d-none');
            });
        });
    </script>

<script>
    $(document).ready(function(){
        $("#addPage").click(function(){
            // alert('HI');
            $("#addPageForm").toggleClass('d-none');
        });
    });
</script>
@endsection
