@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="/css/dsnv/editNv.css">
@endsection
@section('content')
    <div class="fluid-container">
        <div class="header-content">
            <div><a class="tab-hosonv" href="">Hồ sơ nhân viên</a></div>
            <div><a class="tab-bangcap" href="">Bằng cấp nhân viên</a></div>
        </div>
        <form class="body-content" method="post" action="{{route('storeEmployeePage')}}">
            @csrf
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
                        <label for="birthday">Ngày sinh</label>
                        <input type="date" name="birthday" id="birthday">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="name">Họ và tên nhân viên</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div>
                        <label for="CCCD">Số CMND/Thẻ căn cước</label>
                        <input type="text" name="CCCD" id="CCCD">
                    </div>
                </div>
                <div>
                    <div>  
                        <label for="gender">Giới tính</label>
                        <select name="gender" id="gender">
                            <option value="0" hidden>Chọn</option>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div>
                        <label for="nation">Dân tộc</label>
                        <input type="text" id="nation" name="nation">
                    </div>
                </div>
            </div>

            <div class="religion-placeofbirth-permanentaddress">
                <div class="religion">
                    <label for="religion">Tôn giáo</label>
                    <input type="text" id="religion" name="religion">
                </div>
                <div class="placeofbirth">
                    <label for="placeofbirth">Nơi sinh</label>
                    <input type="text" name="placeofbirth" id="placeofbirth">
                </div>
                <div class="permanentaddress">
                    <label for="address">Địa chỉ thường trú</label>
                    <input type="text" name="address" id="address">
                </div>
            </div>

            <div class="phonenumber-email-qualification-status">
                <div class="phonenumber">
                    <label for="phonenumber">Số điện thoại</label>
                    <input type="text" name="phonenumber" id="phonenumber">
                </div>
                <div class="email">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="qualification">
                    <label for="">Trình độ học vấn</label>
                    <select>
                        <option value="0" hidden>Chọn</option>
                        <option value="Trình độ 1">Trình độ 1</option>
                        <option value="Trình độ 2">Trình độ 2</option>
                        <option value="Trình độ 3">Trình độ 3</option>
                        <option value="Trình độ 4">Trình độ 4</option>
                    </select>
                </div>
                <div class="status">
                    <label for="">Trạng thái</label>
                    <select>
                        <option value="0" hidden>Chọn</option>
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
                        <option value="0" hidden>Chọn</option>
                        <option value="Phòng ban 1">Phòng ban 1</option>
                        <option value="Phòng ban 2">Phòng ban 2</option>
                        <option value="Phòng ban 3">Phòng ban 3</option>
                        <option value="Phòng ban 4">Phòng ban 4</option>
                    </select>
                </div>
                <div>
                    <label for="">Chức vụ</label>
                    <select>
                        <option value="0" hidden>Chọn</option>
                        <option value="Chức vụ 1">Chức vụ 1</option>
                        <option value="Chức vụ 2">Chức vụ 2</option>
                        <option value="Chức vụ 3">Chức vụ 3</option>
                        <option value="Chức vụ 4">Chức vụ 4</option>
                    </select>
                </div>
                <div>
                    <label for="">Chuyên ngành</label>
                    <select>
                        <option value="0" hidden >Chọn</option>
                        <option value="Chuyên ngành 1">Chuyên ngành 1</option>
                        <option value="Chuyên ngành 2">Chuyên ngành 2</option>
                        <option value="Chuyên ngành 3">Chuyên ngành 3</option>
                        <option value="Chuyên ngành 4">Chuyên ngành 4</option>
                    </select>
                </div>
            </div>
            <div class="btn-save-exit">
                <div>
                    <button class="save" type="submit">Lưu</button>
                    <a href="{{route('listEmployee')}}"><button class="exit" type="button">Thoát</button></a>
                </div>
            </div>
        </form>
    </div>
@endsection