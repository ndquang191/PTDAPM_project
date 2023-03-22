@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="/css/dsnv/editNv.css">
@endsection
@section('content')
    <div class="fluid-container">
        @if($errors->any())
        <script>
            Swal.fire({
            position: 'center',
            icon: 'error',
            // title: 'Vui lòng kiểm tra lại thông tin nhân viên',
            title: '{{$errors->first()}}',

            showConfirmButton: true,
            confirmButtonText: 'Đóng',
            timer: 3000
          })
        </script>
        @endif
        <div class="container">
            <form method="post" action="{{route('storeEmployee')}}" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-start" id="container-form">
                    <div class="col-6 col-md-2">
                        <img src="/image/photo_user.jpg" id="image" alt="">
                    </div>
                    <div class="col-6 col-md-10">
                        <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                        <div class="row align-items-start">
                            <div class="col-6 col-md-4">
                                <label for="imageFile" class="form-label">Chọn ảnh: </label>
                                <input class="form-control" onchange="chooseFile(this)" type="file" id="imageFile" name="image" accept="image/png, image/gif, image/jpeg" />
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="name">Họ và tên nhân viên</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}">
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="gender">Giới tính</label>
                                <div>
                                    <select class="col-md-12" name="gender" id="gender">
                                        <option value="0" hidden>Chọn</option>
                                        <option value="Nam" {{ old('gender') == 'Nam' ? 'selected' : '' }}>Nam</option>
                                        <option value="Nữ" {{ old('gender') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                        <div class="row align-items-start">
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="birthday">Ngày sinh</label>
                                <input class="form-control" type="date" name="birthday" id="birthday" value={{old('birthday')}}>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="nation">Dân tộc</label>
                                <input class="form-control" type="text" id="nation" name="nation" value={{old('nation')}}>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="CCCD">Số CMND/Thẻ căn cước</label>
                                <input class="form-control" type="text" name="CCCD" id="CCCD" value={{old('CCCD')}}>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="ngaycap">Ngày cấp</label>
                                <input class="form-control" type="date" name="ngaycap" id="ngaycap" value={{old('ngaycap')}}>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row align-items-start">
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="noicap">Nơi cấp</label>
                        <input class="form-control" type="text" id="noicap" name="noicap" value={{old('noicap')}}>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="">Số điện thoại</label>
                        <input class="form-control" value="" name="" id="" type="text" readonly>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="placeofbirth">Nơi sinh</label>
                        <input class="form-control" type="text" name="placeofbirth" id="placeofbirth" value={{old('placeofbirth')}}>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="address">Địa chỉ thường trú</label>
                        <input class="form-control" type="text" name="address" id="address" value={{old('address')}}>
                    </div>
                </div>
    
                <div class="row align-items-start">
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="religion">Tôn giáo</label>
                        <input class="form-control" type="text" id="religion" name="religion" value={{old('religion')}}>
                    </div>
                    
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email" value={{old('email')}}>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="">Trình độ học vấn</label>
                        <input class="form-control" type="text" name="" id="" value="">    
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="">Trình độ chuyên môn</label>
                        <input class="form-control" type="text" value="" name="" id="" readonly>
                    </div>
                </div>
                
                <!-- Columns are always 50% wide, on mobile and desktop -->   
    
                <div class="row align-items-start">
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="">Vị trí việc làm</label>
                        <input class="form-control" type="text" value="" name="" id="">
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="">Ngày nhậm chức</label>
                        <input class="form-control" type="date" value="" name="" id="">
                    </div>
                    <div class="col-6 col-md-2">
                        <label class="form-label" for="">Phòng ban</label>
                        <div>
                            <select class="col-md-12" name="phongban">
                                @foreach ($phongbans as $phongban)  
                                <option 
                                    value="{{$phongban->MaPB}}" 
                                    {{ old('phongban') == $phongban->TenPhongBan ? 'selected' : '' }}>{{$phongban->TenPhongBan}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <label class="form-label" for="">Chức vụ</label>
                        <div>
                            <select class="col-md-12" name="chucvu">
                                @foreach ($chucvus as $chucvu)  
                                <option 
                                    value="{{$chucvu->MaCV}}" 
                                    {{ old('chucvu') == $chucvu->TenCV ? 'selected' : '' }}>{{$chucvu->TenCV}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-2">
                        <label class="form-label" for="">Trình độ học vấn</label>
                        <div>
                            <select class="col-md-12" name="trinhdo">
                                @foreach ($TDHVs as $TDHV)  
                                <option 
                                    value="{{$TDHV->MaTDHV}}" 
                                    {{ old('trinhdo') == $TDHV->TenHeDaoTao ? 'selected' : '' }}>{{$TDHV->TenHeDaoTao}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="update-exit">
                    <button class="btn btn-primary" type="submit" id="btn" value="Show Alert">Lưu</button>
                    <a href="{{route('listEmployee')}}"><button class="btn btn-success" type="button">Thoát</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('linkjs')
    <script src="/js/ListAccEmployee/index.js"></script>
@endsection


<?php ?>