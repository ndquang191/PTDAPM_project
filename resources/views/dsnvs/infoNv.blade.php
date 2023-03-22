@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="/css/dsnv/infoNv.css">
    <link rel="stylesheet" href="/css/dsnv/editNv.css">
@endsection
@section('content')
@if (session('message'))
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: 'success',
    html: '<span style="font-size: 20px">{{ session('message') }}</span>'
  })
</script>
@endif
@if($errors->any())
<script>
    Swal.fire({
    position: 'center',
    icon: 'error',
    title: '{{$errors->first()}}',
    showConfirmButton: true,
    confirmButtonText: 'Đóng',
    timer: 3000
  })
  </script>
{{-- {!! implode('', $errors->all('<div>:message</div>')) !!} --}}
@endif
    <div class="fluid-container">
        <div class="container-title-form" id="container-title-form">
            <div class="header-content">
                <div><a class="tab-hosonv active" href="">Hồ sơ nhân viên</a></div>
                <div><a class="tab-bangcap" href="{{route('showDegree',['id' => $employee->MaNV])}}">Bằng cấp nhân viên</a></div>
            </div>
            <div class="staffinformation">
                <div class="avatar">
                    @if ($employee->HinhAnh == null)
                        <img src="/image/avatar_user.jpg" alt="">  
                    @else
                        <img src="data:image/jpeg;base64,{{ base64_encode($employee->HinhAnh) }}" alt="Image">
                    @endif
                    <label class="employeecode" for="">{{$employee->MaNV}}</label>
                    <label class="status" for="">{{$employee->TrangThai == 1 ? "Đang làm việc" : "Ngừng làm việc"}}</label>
                    <label for=""><i class="fa-solid fa-user"></i> {{$employee->TenNV}}</label>
                    <label for=""><i class="fa-brands fa-steam-symbol"></i></i>{{$employee->PhongBan == null ? "Trống" : $employee->PhongBan->TenPhongBan}}</label>
                    <label for=""><i class="fa-solid fa-envelope"></i>{{$employee->Email == null ? "Trống" : $employee->Email}}</label>
                    <label for=""><i class="fa-solid fa-phone"></i>{{$employee->SDT == null ? "Trống" : $employee->SDT}}1</label>
                    <label for=""><i class="fa-solid fa-calendar-days"></i>{{$employee->NgaySinh == null ? "Trống" : $employee->NgaySinh}}</label>
                    <label for=""><i class="fa-solid fa-venus-mars"></i>{{$employee->GioiTinh == 0 ? "Nam" : "Nữ"}}</label>
                </div>
                <div class="container-emloyee">
                    <form action="{{route('updateEmployeeInfo',['id' => $employee->MaNV])}}" name="myForm" method="POST">
                        @csrf
                        <div class="row align-items-start">
                            <div class="col-6 col-md-2">
                                <label class="form-label" for="">Mã nhân viên</label>
                                <input class="form-control" type="text" id="employeeCode" name="employeeCode" value="{{$employee->MaNV}}" readonly>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="">Họ và tên nhân viên</label>
                                <input class="form-control" type="text" name="name" id="nameEmployee" value="{{$employee->TenNV}}" readonly>
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-label" for="">Giới tính</label>
                                <input class="form-control" type="text" name="" value="" readonly>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="">Ngày sinh</label>
                                <input class="form-control" type="date" name="" value="">
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-label" for="">Dân tộc</label>
                                <input class="form-control" type="text" id="nation" name="nation" value="{{$employee->DanToc}}" readonly>
                            </div>
                        </div>
                        <div class="row align-items-start">
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="">Số CMND/Thẻ căn cước</label>
                                <input class="form-control" type="text" id="citizenIdentification" name="CCCD" value="{{$employee->CCCD}}" readonly>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="">Ngày cấp</label>
                                <input class="form-control" value="" name="" id="" type="date" readonly>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="">Nơi cấp</label>
                                <input class="form-control" value="" name="" id="" type="text" readonly>
                            </div>
                            <div class="col-6 col-md-2">
                                <label class="form-label" for="">Số điện thoại</label>
                                <input class="form-control" value="" name="" id="" type="text" readonly>
                            </div>
                        </div>
                        <div class="row align-items-start">
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="">Nơi sinh</label>
                                <input class="form-control" type="text" name="" id="placeOfBirth" name="placeofbirth" value="{{$employee->NoiSinh}}" readonly>
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="">Địa chỉ thường trú</label>
                                <input class="form-control" type="text" name="" id="permanentAddress" name="address" value="{{$employee->DiaChi}}" readonly>
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="">Email</label>
                                <input class="form-control" type="text" value="" name="" id="" readonly>
                            </div>
                        </div>
                        <div class="row align-items-start">
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="">Trình độ học vấn</label>
                                <input class="form-control" type="text" name="" id="academicLevel" value="{{$employee->TrinhDoHocVan->TenHeDaoTao}}" readonly>    
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="">Trình độ chuyên môn</label>
                                <input class="form-control" type="text" value="" name="" id="" readonly>
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="">Vị trí việc làm</label>
                                <input class="form-control" type="text" value="" name="" id="" readonly>
                            </div>
                        </div>
                        <div class="row align-items-start">
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="">Chức vụ</label>
                                <input class="form-control" type="text" name="" id="position" value="{{$employee->ChucVu->TenCV}}" readonly>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="">Trạng thái</label>
                                <input class="form-control" type="text" name="" id="status" value="{{$employee->TrangThai == 1 ? 'Đang làm việc' : "Đã nghỉ việc"}}" readonly>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="">Ngày nhậm chức</label>
                                <input class="form-control" type="date" value="" name="" id="" readonly>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="">Phòng ban</label>
                                <input class="form-control" type="text" name="" id="department" value="{{$employee->PhongBan->TenPhongBan}}" readonly>
                            </div>
                        </div>
                        <div class="btn-update-exit">
                            <div>
                                <a><button onclick="formShow()" onclick="myHiddenUpdate()" class="btn btn-primary" type="button" id="btn-update" value="Show Alert">Cập nhật</button></a>
                                <a href="{{route('listEmployee')}}"><button class="btn btn-success" type="button">Thoát</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container" id="form-update">
            <form method="post" action="{{route('updateEmployeeInfo',['id' => $employee->MaNV])}}" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-start" id="container-form">
                    <div class="col-6 col-md-2">
                        @if ($employee->HinhAnh == null)
                        <img src="/image/avatar_user.jpg" alt="">  
                    @else
                        <img src="data:image/jpeg;base64,{{ base64_encode($employee->HinhAnh) }}" alt="Image">
                    @endif
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
                                <input class="form-control" type="text" id="name" name="name" value="{{$employee->TenNV}}">
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="gender">Giới tính</label>
                                <div>
                                    <select class="col-md-12" name="gender" id="gender">
                                        <option value="0" {{ $employee->GioiTinh == 0 ? 'selected' : '' }}>Nam</option>
                                        <option value="1" {{ $employee->GioiTinh == 1 ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                        <div class="row align-items-start">
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="birthday">Ngày sinh</label>
                                <input class="form-control" type="date" name="birthday" id="birthday" value={{$employee->NgaySinh}}>
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="nation">Dân tộc</label>
                                <input class="form-control" type="text" id="nation" name="nation" value="{{$employee->DanToc}}">
                            </div>
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="CCCD">Số CMND/Thẻ căn cước</label>
                                <input class="form-control" type="text" name="CCCD" id="CCCD" value={{$employee->CCCD}}>
                            </div>
                            
                            <div class="col-6 col-md-3">
                                <label class="form-label" for="dateRange">Ngày cấp</label>
                                <input class="form-control" type="date" id="dateRange" name="ngaycap" value="{{$employee->NgayCap}}">
                            </div>
                        </div>
                    </div>
                </div>
                
    
                <div class="row align-items-start">
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="nation">Nơi cấp</label>
                        <input class="form-control" type="text" id="nation" name="noicap" value={{$employee->DanToc}}>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="phonenumber">Số điện thoại</label>
                        <input class="form-control" type="text" name="phonenumber" id="phonenumber" value="{{$employee->SDT}}">
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="placeofbirth">Nơi sinh</label>
                        <input class="form-control" type="text" name="placeofbirth" id="placeofbirth" value="{{$employee->NoiSinh}}">
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="address">Địa chỉ thường trú</label>
                        <input class="form-control" type="text" name="address" id="address" value="{{$employee->DiaChi}}">
                    </div>
                </div>
                
                <!-- Columns are always 50% wide, on mobile and desktop -->
                <div class="row align-items-start">
                    
                    <div class="col-6 col-md-2">
                        <label class="form-label" for="religion">Tôn giáo</label>
                        <input class="form-control" type="text" id="religion" name="religion" value="{{$employee->TonGiao}}">
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email" value="{{$employee->Email}}">
                    </div>
                    <div class="col-6 col-md-2">
                        <label class="form-label" for="">Trình độ học vấn</label>
                        <input class="form-control" type="text" name="" id="" value="">    
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="">Trình độ chuyên môn</label>
                        <input class="form-control" type="text" value="" name="" id="" readonly>
                    </div>
                    <div class="col-6 col-md-2">
                        <label class="form-label" for="">Vị trí việc làm</label>
                        <input class="form-control" type="text" value="" name="" id="">
                    </div>
                </div>    
    
                <div class="row align-items-start">
                    <div class="col-6 col-md-3">
                        <label for="exampleFormControlInput1" class="form-label">Trạng thái</label>
                        <div>
                            <select class="col-md-12" aria-label="Default select example" name="TrangThai">
                                <option value="1" {{$employee->TrangThai == 1 ? 'selected' : ''}}>Đang làm việc</option>
                                <option value="0" {{$employee->TrangThai == 0 ? 'selected' : ''}}>Đã nghỉ việc</option>
                            </select>
                        </div>
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
                                    {{ $employee->MaPB == $phongban->MaPB ? 'selected' : '' }}>{{$phongban->TenPhongBan}}
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
                                    {{ $employee->MaCV == $chucvu->MaCV ? 'selected' : '' }}>{{$chucvu->TenCV}}
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
                                    {{ $employee->MaTDHV == $TDHV->MaTDHV ? 'selected' : '' }}>{{$TDHV->TenHeDaoTao}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="update-exit">
                    <button class="btn btn-primary" type="submit" id="btn" value="Show Alert">Cập nhật</button>
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