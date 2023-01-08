@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title"><icon class="fa fa-plus mr-2"></icon> Add New Page</h3>
                    </div>


                    <form action="{{route('menu-page.store')}}" method="POST">
                        @csrf
                        <div class="card-body">

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


                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </section>

            <section class="pt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><icon class="fa fa-book-open mr-2"></icon> All Pages</h3>
                    </div>


                        <div class="card-body" id="drop-items">

                            <div class="form-group">
                                <div class="row">
                                    @foreach($all_pages as $page)
                                        @if(count($page->menuPages)>0)
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <h3>::</h3>
                                                            </div>
                                                            <div class="col-md-8">
                                                                    <span>Page Title : </span>
                                                                    <span class="font-weight-bold">{{$page->name}}</span>, Active
                                                                    <span class="font-weight-bold"> {{$page->active==1?'Yes':'No'}}</span>
                                                                    , List In Menu :
                                                                    <span>
                                                                        @php
                                                                        $c=0;
                                                                        foreach ($page->menuPages as $menu){
                                                                            if(isset($menu->menu->id)){
                                                                                $c=$c+1;
                                                                            }
                                                                        }
                                                                        @endphp
                                                                        @if($c>0)
                                                                            <span class="font-weight-bold">Yes</span>
                                                                        @else
                                                                            <span class="font-weight-bold">No</span>
                                                                        @endif
                                                                    </span>
                                                                    , Title Hide: <span class="font-weight-bold">No</span>
                                                                    , Parts :
                                                                    <span class="font-weight-bold">
                                                                        {{$c}}
                                                                    </span>
                                                            </div>
                                                            <div class="col-md-2">


{{--                                                                @foreach($page->menuPages as $menu)--}}
{{--                                                                    <label for="pages" class="badge-secondary badge-btn">{{$menu->menu->name}}</label>--}}
{{--                                                                @endforeach--}}
                                                            </div>
                                                            <div class="col-md-1">
                                                                <a href="{{route('menu-page.edit',$page->id)}}" class="btn btn-outline-primary mr-1 float-left"><i class="fa fa-edit"></i></a>
                                                                <button type="submit" name="pageDlt"  class="btn btn-outline-danger mr-1 float-left" value="{{$page->id}}"><i class="fa fa-trash"></i></button>
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
@endsection
