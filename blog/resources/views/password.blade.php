@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="col-md-8">
                <form action="{{route('changePassword')}}" method="post" id="fromlogin">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" >Thay Đổi Mật Khẩu</th>
                            <th scope="col"  >
                                <div class="row" >
                                    <div class="col-6"></div>
                                    <div class="col-4"><a class="btn btn-danger" href="{{route('me')}}"> Thông tin của tôi</a> </div>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">Mật Khẩu Cũ 1 <span style="color: red">(*)</span></th>
                            <td>
                                <input type="text" maxlength="32" name="old_password" class="form-control" value="123456789">
                                @error('old_password')
                                <div class=" col-6" style="font-size: 12px;color: red">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Mật Khẩu Mới <span style="color: red">(*)</span></th>
                            <td>
                                <input type="text" maxlength="32" name="new_password" class="form-control" value="123456789">
                                @error('new_password')
                                <div class=" col-6" style="font-size: 12px;color: red">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Nhập Lại Mật Khẩu <span style="color: red">(*)</span></th>
                            <td>
                                <input type="text" maxlength="32" name="new_password_confirm" class="form-control" value="123456789">
                                @error('new_password_confirm')
                                <div class=" col-6" style="font-size: 12px;color: red">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6"> <button class="btn btn-primary pull-right" type="submit">Change</button></div>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
    </div>
@endsection
