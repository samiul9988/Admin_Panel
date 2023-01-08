@extends('admin.master')
@section('body')
            <section class="pt-5">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title"><icon class="fas fa-edit"></icon>Add/Edit</h3>
                    </div>


                    <form action="{{route('menu-page.update',$page->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">

                            <div class="form-group">
                                <div class="card">
                                    <div class="card-header">
                                        Page Name :
                                    </div>
                                    <div class="card-header">
                                        {{-- <label for="">Page Name :</label> --}}
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="checkbox" id="pages" name="pages_id" value="{{$page->id}}" disabled checked >
                                            <label for="pages">{{$page->name}}</label>
                                            </div>
                                        </div>

                                        @error('page_id')
                                        <div class="alert alert-danger">{{ "Page is required" }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="checkbox" value="1" name="active"
                                @foreach($page->menuPages as $menuPage)
                                    @if(isset($menuPage->page_id))
                                        {{$menuPage->active==1?'checked':''}}
                                        @endif
                                    @endforeach
                                >
                                <label for="">Active</label>
                            </div>

                            <div>
                                <input type="checkbox" value="1" name="title_hide"
                                    @foreach($page->menuPages as $menuPage)
                                        @if(isset($menuPage->page_id))
                                        {{$menuPage->title_hide==1?'checked':''}}
                                        @endif
                                    @endforeach
                                >
                                <label for="">Title Hide</label>
                            </div>
                            <div>
                                <input type="checkbox" id="listOfMenus">
                                <label for="listOfMenus">List Of Menus</label>
                            </div>
                            <div class="form-group d-none" id="addListMenus">
{{--                                <label for="">Menu Name :</label><br>--}}
                                <div class="card" >
                                    <div class="card-header">
                                        Update Menu
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($menus as $menu)
                                            <div class="col-md-3">
                                                <input type="checkbox" id="menus" name="menus_id[]" value="{{$menu->id}}"
                                                @foreach($page->menuPages as $menuPage)
                                                    @if(isset($menuPage->menu->id))
                                                        {{$menu->id==$menuPage->menu->id?'checked':''}}
                                                        @endif
                                                @endforeach
                                                >
                                                <label for="menus">{{$menu->name}}</label>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                    
                                </div>

                                @error('menu_id')
                                <div class="alert alert-danger">{{ "Menu is required" }}</div>
                                @enderror
                            </div>


                            <input type="number" name="editedby_id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}" hidden>


                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </section>

@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $("#listOfMenus").click(function(){
                // alert('HI');
                $("#addListMenus").toggleClass('d-none');
            });
        });
    </script>
@endsection
