@extends('layouts.app')
@section('content')
    <div class="container margin-bottom">
        <div class="row">
            <div class="col-md-6">
                <form class="example" action="{{route('search')}}">
                    <input type="text" class="btn border-dark" placeholder="Search.." name="search">
                    <button type="submit" class="btn-primary"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="col-md-6">
                <a>
                    <button type="button" class="btn btn-primary  col-md-3 offset-md-9 "><i class="fas fa-user"></i> Add
                        User
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            @if($users->count()==0)
                <div>
                    Không tìm thấy kết quả nào
                </div>
            @endif
            <div class="col-md-12">

                <form action="">
                    {{--                <form action="{{route('')}}" method="post" id="fromlogin">--}}
                    <table class="table" id="table" style="display: {{ ($users->count()) ? '' : 'none' }}">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col" style="width:50px;">AVATAR</th>
                            <th scope="col">TÊN</th>
                            <th scope="col">GENDER</th>
                            <th scope="col">NGÀY SINH</th>
                            <th scope="col">ADDRESS</th>
                            <th scope="col">ROLE</th>
                            <th scope="col" style="width: 200px">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    <lable>{{$loop->index+1}}</lable>
                                </td>
                                <td>
                                    <lable><img class="image-categoy-edit w-100" src="{{url('/')}}/tải xuống.jpg"/>
                                    </lable>
                                </td>
                                <td class="<?php echo ($user->email_verified_at === null) ? "color-email2" : "color-email"; ?>">
                                    <lable>{{$user->email}}</lable>
                                </td>
                                <td><?php echo ($user->gender == 1) ? "Nam" : "Nữ"; ?></td>
                                <td>
                                    <lable>{{$user->birthday}}</lable>
                                </td>
                                <td>
                                    <lable>{{$user->address}}</lable>
                                </td>
                                <td>
                                    <lable><?php echo ($user->role == 1) ? "Admin" : "User"; ?></lable>
                                </td>
                                <td>
                                    <div class="row">
                                        <a href="{{route('profileUser',$user->id)}}" class="col-md-2 color-black"><i class="fas fa-user-lock"></i></a>
                                        <a href="" class="col-md-2 color-black"><i class="fas fa-user-tag"></i></a>
                                        <a href="" class="col-md-2 color-black"><i class="fas fa-user-edit"></i></a>
                                        <a href="#" class="col-md-2 color-black"  type="button" style="cursor: pointer" data-toggle="modal" data-target="#exampleModal{{$user->id}}"><i class="fas fa-user-minus"></i></a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Bạn có muốn xóa user này không
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Hủy</button>
                                                                <button type="button" class="btn btn-primary" ><a href="{{route('profileUser',$user->id)}}" class="col-md-2 color-black">Đồng ý</a></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div>
                        Tổng số bản gi là : {{$users->count()}}
                    </div>
                    <div class="row col-md-7 offset-md-5">
                        {{ $users->links() }}
                    </div>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
@endsection
