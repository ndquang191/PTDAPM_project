@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="./css/dsnv/editNv.css">

@endsection
@section('content')
    <div class="fluid-container">
        <div class="header-content">
            <div><a class="tab-hosonv" href="">Hồ sơ nhân viên</a></div>
            <div><a class="tab-bangcap" href="">Bằng cấp nhân viên</a></div>
        </div>
        <div class="body-content">
            <div class="inf-user">
                <div>
                    <img src="./image/photo_user.jpg" alt="">
                </div>
                <div>
                    <div>
                        <label for="">Mã nhân viên</label>
                        <input type="text">
                    </div>
                    <div>
                        <label for="">Ngày sinh</label>
                        <input type="date">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="">Họ và tên nhân viên</label>
                        <input type="text">
                    </div>
                    <div>
                        <label for="">Số CMND/Thẻ căn cước</label>
                        <input type="text">
                    </div>
                </div>
                <div>
                    <div>  
                        <label for="">Giới tính</label>
                        <select>
                            <option value="0">Chọn</option>
                            <option value="1">Audi</option>
                            <option value="2">BMW</option>
                            <option value="3">Citroen</option>
                            <option value="4">Ford</option>
                            <option value="5">Honda</option>
                            <option value="6">Jaguar</option>
                            <option value="7">Land Rover</option>
                            <option value="8">Mercedes</option>
                            <option value="9">Mini</option>
                            <option value="10">Nissan</option>
                            <option value="11">Toyota</option>
                            <option value="12">Volvo</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Dân tộc</label>
                        <input type="text">
                    </div>
                </div>
            </div>





            <div class="religion-placeofbirth-permanentaddress">
                <div class="religion">
                    <label for="">Tôn giáo</label>
                    <input type="text">
                </div>
                <div class="placeofbirth">
                    <label for="">Nơi sinh</label>
                    <input type="text">
                </div>
                <div class="permanentaddress">
                    <label for="">Địa chỉ thường trú</label>
                    <input type="text">
                </div>
            </div>




            <div class="phonenumber-email-qualification-status">
                <div class="phonenumber">
                    <label for="">Số điện thoại</label>
                    <input type="text">
                </div>
                <div class="email">
                    <label for="">Email</label>
                    <input type="text">
                </div>
                <div class="qualification">
                    <label for="">Trình độ học vấn</label>
                    <select>
                        <option value="0">Chọn</option>
                        <option value="1">Audi</option>
                        <option value="2">BMW</option>
                        <option value="3">Citroen</option>
                        <option value="4">Ford</option>
                        <option value="5">Honda</option>
                        <option value="6">Jaguar</option>
                        <option value="7">Land Rover</option>
                        <option value="8">Mercedes</option>
                        <option value="9">Mini</option>
                        <option value="10">Nissan</option>
                        <option value="11">Toyota</option>
                        <option value="12">Volvo</option>
                    </select>
                </div>
                <div class="status">
                    <label for="">Trạng thái</label>
                    <select>
                        <option value="0">Chọn</option>
                        <option value="1">Audi</option>
                        <option value="2">BMW</option>
                        <option value="3">Citroen</option>
                        <option value="4">Ford</option>
                        <option value="5">Honda</option>
                        <option value="6">Jaguar</option>
                        <option value="7">Land Rover</option>
                        <option value="8">Mercedes</option>
                        <option value="9">Mini</option>
                        <option value="10">Nissan</option>
                        <option value="11">Toyota</option>
                        <option value="12">Volvo</option>
                    </select>
                </div>
            </div>
            <div class="department-position-specialty">
                <div>
                    <label for="">Phòng ban</label>
                    <select>
                        <option value="0">Chọn</option>
                        <option value="1">Audi</option>
                        <option value="2">BMW</option>
                        <option value="3">Citroen</option>
                        <option value="4">Ford</option>
                        <option value="5">Honda</option>
                        <option value="6">Jaguar</option>
                        <option value="7">Land Rover</option>
                        <option value="8">Mercedes</option>
                        <option value="9">Mini</option>
                        <option value="10">Nissan</option>
                        <option value="11">Toyota</option>
                        <option value="12">Volvo</option>
                    </select>
                </div>
                <div>
                    <label for="">Chức vụ</label>
                    <select>
                        <option value="0">Chọn</option>
                        <option value="1">Audi</option>
                        <option value="2">BMW</option>
                        <option value="3">Citroen</option>
                        <option value="4">Ford</option>
                        <option value="5">Honda</option>
                        <option value="6">Jaguar</option>
                        <option value="7">Land Rover</option>
                        <option value="8">Mercedes</option>
                        <option value="9">Mini</option>
                        <option value="10">Nissan</option>
                        <option value="11">Toyota</option>
                        <option value="12">Volvo</option>
                    </select>
                </div>
                <div>
                    <label for="">Chuyên ngành</label>
                    <select>
                        <option value="0">Chọn</option>
                        <option value="1">Audi</option>
                        <option value="2">BMW</option>
                        <option value="3">Citroen</option>
                        <option value="4">Ford</option>
                        <option value="5">Honda</option>
                        <option value="6">Jaguar</option>
                        <option value="7">Land Rover</option>
                        <option value="8">Mercedes</option>
                        <option value="9">Mini</option>
                        <option value="10">Nissan</option>
                        <option value="11">Toyota</option>
                        <option value="12">Volvo</option>
                    </select>
                </div>
            </div>
            <div class="btn-save-exit">
                <div>
                    <a href="dsnv"><button class="save">Lưu</button></a>
                    <a href="dsnv"><button class="exit">Thoát</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection