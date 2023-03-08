@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="/css/dsnv/infoNv.css">

@endsection
@section('content')
    <div class="fluid-container">
        <div class="container-title-form">
            <div class="header-content">
                <div><a class="tab-hosonv" href="">Hồ sơ nhân viên</a></div>
                <div><a class="tab-bangcap" href="">Bằng cấp nhân viên</a></div>
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
                    <label for=""><i class="fa-brands fa-steam-symbol"></i></i>{{$employee->PhongBan == null ? "Trống" : $employee->PhongBan}}</label>
                    <label for=""><i class="fa-solid fa-envelope"></i>{{$employee->Email == null ? "Trống" : $employee->Email}}</label>
                    <label for=""><i class="fa-solid fa-phone"></i>{{$employee->SDT == null ? "Trống" : $employee->SDT}}1</label>
                    <label for=""><i class="fa-solid fa-calendar-days"></i>{{$employee->NgaySinh == null ? "Trống" : $employee->NgaySinh}}</label>
                    <label for=""><i class="fa-solid fa-venus-mars"></i>{{$employee->GioiTinh == 0 ? "Nam" : "Nữ"}}</label>
                </div>
                <div class="container-emloyee">
                    <form action="" name="myForm" onsubmit="return validateForm()">
                        <div class="Employeeinformationchange">
                            <div class="info-left">
                                <div class="info-employeecode">
                                    <label for="">Mã nhân viên</label>
                                    <input type="text" id="employeeCode" name="employeeCode" value="{{$employee->MaNV}}" readonly>
                                </div>
                                <div>
                                    <label for="">Dân tộc</label>
                                    <input type="text" id="nation" name="nation" value="{{$employee->DanToc}}" readonly>
                                </div>
                                <div>
                                    <label for="">Tôn giáo</label>
                                    <input type="text" id="religion" name="religion" value="{{$employee->TonGiao}}" name="" id="" readonly>
                                </div>
                                <div>
                                    <label for="">Trình độ học vấn</label>
                                    <select id="academicLevel" disabled>
                                        <option value="{{$employee->TrinhDoHocVan}}">Trình độ 1</option>
                                        <option value="{{$employee->TrinhDoHocVan}}">Trình độ 2</option>
                                        <option value="{{$employee->TrinhDoHocVan}}">Trình độ 3</option>
                                        <option value="{{$employee->TrinhDoHocVan}}">Trình độ 4</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="">Chuyên ngành</label>
                                    <select id="Specialized" disabled>
                                        <option value="{{$employee->ChuyenNganh}}">Chuyên ngành 1</option>
                                        <option value="{{$employee->ChuyenNganh}}">Chuyên ngành 2</option>
                                        <option value="{{$employee->ChuyenNganh}}">Chuyên ngành 3</option>
                                        <option value="{{$employee->ChuyenNganh}}">Chuyên ngành 4</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="">Trạng thái</label>
                                    <select id="status" disabled>
                                        <option value="{{$employee->TrangThai == 1 ? "Đang làm việc" : "Ngừng làm việc"}}">Đang làm việc</option>
                                        <option value="{{$employee->TrangThai == 1 ? "Đang làm việc" : "Ngừng làm việc"}}">Ngừng làm việc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="info-right">
                                <div>
                                    <label for="">Họ và tên nhân viên</label>
                                    <input type="text" name="name" id="nameEmployee" value="{{$employee->TenNV}}" readonly>
                                </div>
                                <div>
                                    <label for="">Số CMND/Thẻ căn cước</label>
                                    <input type="text" id="citizenIdentification" name="CCCD" value="{{$employee->CCCD}}" readonly>
                                </div>
                                <div>
                                    <label for="">Nơi sinh</label>
                                    <input type="text" name="" id="placeOfBirth" name="placeofbirth" value="{{$employee->NoiSinh}}" readonly>
                                </div>
                                <div>
                                    <label for="">Địa chỉ thường trú</label>
                                    <input type="text" name="" id="permanentAddress" name="address" value="{{$employee->DiaChi}}" readonly>
                                </div>
                                <div>
                                    <label for="">Chức vụ</label>
                                    <select id="position" disabled>
                                        <option value="{{$employee->ChucVu}}">Chức vụ 1</option>
                                        <option value="{{$employee->ChucVu}}">Chức vụ 2</option>
                                        <option value="{{$employee->ChucVu}}">Chức vụ 3</option>
                                        <option value="{{$employee->ChucVu}}">Chức vụ 4</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="">Phòng ban</label>
                                    <select id="department" disabled>
                                        <option value="{{$employee->PhongBan}}">Phòng ban 1</option>
                                        <option value="{{$employee->PhongBan}}">Phòng ban 2</option>
                                        <option value="{{$employee->PhongBan}}">Phòng ban 3</option>
                                        <option value="{{$employee->PhongBan}}">Phòng ban 4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="btn-update-exit">
                            <div>
                                <a href=""><button type="submit" class="save" id="btn-save" value="Show Alert">Lưu</button></a>
                                <a><button onclick="myHiddenUpdate()" class="update" type="button" id="btn-update" value="Show Alert">Cập nhật</button></a>
                                <a href=""><button class="exit" type="button">Thoát</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('linkjs')
    <script src="/js/ListAccEmployee/index.js"></script>
@endsection