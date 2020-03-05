@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
            <div class="col-md-8">
                    <form action="{{route('updateInformation')}}" method="post" id="fromlogin">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" >Thông tin của tôi</th>
                                <th scope="col"  >
                                    <div class="row" >
                                        <div class="col-6"></div>
                                        <div class="col-4"><a class="btn btn-danger" href="{{route('showPassword')}}"> Thay Đổi Mật Khẩu</a> </div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <input type="text" value="{{Auth::user()->id}}" name="id" >
                                    <th scope="row">Họ Và Tên Đệm <span style="color: red">(*)</span></th>
                                    <td>
                                     <input type="text" maxlength="32" name="first_name" class="form-control acc" value="{{ Auth::user()->first_name }}">
                                        @error('first_name')
                                        <div class=" col-6" style="font-size: 12px;color: red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Tên <span style="color: red">(*)</span></th>
                                    <td>
                                        <input type="text" maxlength="32"  name="last_name" class="form-control" value="{{ Auth::user()->last_name }}">
                                        @error('last_name')
                                        <div class=" col-6" style="font-size: 12px;color: red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>
                                        <input type="text" readonly class="form-control-plaintext" value="{{ Auth::user()->email }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender</th>
                                    <td>
                                        <div class="row m-0 p-0" name="ss">
                                            <div class=" form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1" <?php echo ( Auth::user()->gender == '1') ?  "checked" : "" ;  ?>>
                                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                            </div>
                                            <div class=" form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2" <?php echo ( Auth::user()->gender == '2') ?  "checked" : "" ;  ?>>
                                                <label class="form-check-label" for="inlineRadio2">Female</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ngày Sinh<span style="color: red">(*)</span></td>
                                    <td>
                                        <input type="date" class="form-control" name="birthday" value="{{ Auth::user()->birthday }}">
                                        @error('birthday')
                                        <div class=" col-6" style="font-size: 12px;color: red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td><label class="form-control">{{ Auth::user()->role }}</label></td>
                                </tr>
                                <tr>
                                    <td>Ảnh Đại Diện</td>
                                    <td>
                                        <img class="image-categoy-edit" src="{{url('/')}}/tải xuống.jpg"/>
                                        <input type="file"  name="avatar" accept="image/*" class="form-control" value="{{ Auth::user()->avatar }}">
                                        @error('avatar')
                                        <div class=" col-6" style="font-size: 12px;color: red">{{ $message }}</div>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>Địa Chỉ<span style="color: red">(*)</span></td>
                                    <td>
                                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" >{{ Auth::user()->address }}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="row">
                                            <div class="col-6"></div>
                                            <div class="col-6"> <button class="btn btn-primary pull-right" type="submit">Update</button></div>

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
