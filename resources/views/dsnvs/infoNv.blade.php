@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="./css/dsnv/infoNv.css">

@endsection
@section('content')
    <div class="fluid-container">
        <div class="header-content">
            <div><a class="tab-hosonv" href="">Hồ sơ nhân viên</a></div>
            <div><a class="tab-bangcap" href="">Bằng cấp nhân viên</a></div>
        </div>
        <div class="staffinformation">
            <div class="avatar">
                <img src="./image/avatar_user.jpg" alt="">
                <label class="employeecode" for="">2051063756</label>
                <label class="status" for="">Đang làm việc</label>
                <label for=""><i class="fa-solid fa-user"></i> Ngô Thị Tâm</label>
                <label for=""><i class="fa-brands fa-steam-symbol"></i></i>Công tác sinh viên</label>
                <label for=""><i class="fa-solid fa-envelope"></i>Tam1234@gmail.com</label>
                <label for=""><i class="fa-solid fa-phone"></i>0987654321</label>
                <label for=""><i class="fa-solid fa-calendar-days"></i>24/03/2002</label>
                <label for=""><i class="fa-solid fa-venus-mars"></i>Nữ</label>
            </div>
            <div class="container-emloyee">
                <div class="Employeeinformationchange">
                    <div class="info-left">
                        <div class="info-employeecode">
                            <label for="">Mã nhân viên</label>
                            <input type="text">
                        </div>
                        <div>
                            <label for="">Dân tộc</label>
                            <input type="text">
                        </div>
                        <div>
                            <label for="">Tôn giáo</label>
                            <input type="text" name="" id="">
                        </div>
                        <div>
                            <label for="">Trình độ học vấn</label>
                            <input type="text" name="" id="">
                        </div>
                        <div>
                            <label for="">Chuyên ngành</label>
                            <input type="text" name="" id="">
                        </div>
                        <div>
                            <label for="">Trạng thái</label>
                            <input type="text">
                        </div>
                    </div>
                    <div class="info-right">
                        <div>
                            <label for="">Họ và tên nhân viên</label>
                            <input type="text" name="" id="">
                        </div>
                        <div>
                            <label for="">Số CMND/Thẻ căn cước</label>
                            <input type="text">
                        </div>
                        <div>
                            <label for="">Nơi sinh</label>
                            <input type="text" name="" id="">
                        </div>
                        <div>
                            <label for="">Địa chỉ thường trú</label>
                            <input type="text" name="" id="">
                        </div>
                        <div>
                            <label for="">Chức vụ</label>
                            <input type="text" name="" id="">
                        </div>
                        <div>
                            <label for="">Phòng ban</label>
                            <input type="text" name="" id="">
                        </div>
                    </div>
                </div>
                <div class="btn-exit">
                    <a href="dsnv"><button>Thoát</button></a>
                </div>
            </div>
        </div>
    </div>
    
@endsection