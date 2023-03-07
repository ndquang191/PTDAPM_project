@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="./css/dsnv/bcNv.css">
    <link rel="stylesheet" href="./css/dsnv/editNv.css">
@endsection
@section('content')
    <div class="fluid-container">
        <div class="container-header">
            <div class="header-content">
                <div><a class="tab-hosonv" onclick="myFunction()">Hồ sơ nhân viên</a></div>
                <div><a class="tab-bangcap" id="tab-bangcap">Bằng cấp nhân viên</a></div>
            </div>
            <div class="btn-add">
                <a href="{{route('addDegreeForm',['id' => $employee->MaNV])}}"><button>+ Thêm</button></a>
            </div>
        </div>
        <table id="table-infor" class="table">
            <thead>
              <tr>
                <td>Họ và tên</td>
                <td>Tên bằng cấp</td>
                <td>Ngày cấp</td>
                <td>Thời hạn</td>
                <td>Hành động</td>
              </tr>
            </thead>
            <tbody>
              @if (count($degrees) == 0)
                  <h4>Không có bản ghi</h4>
              @else
                  @foreach ($degrees as $degree)
                  <tr>
                    <td>{{$employee->TenNV}}</td>
                    <td>{{$degree->TenBC}}</td>
                    <td>{{$degree->NgayCap}}</td>
                    <td></td>
                    <td>
                        <a class="show" href="{{route('editDegreeForm',['id' => $employee->MaNV,'degreeID' => $degree->MaBC])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href=""><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
              @endif
            </tbody>
        </table>



        <div id="body-content" class="body-content">
            <form action="">
                <div class="inf-user">
                    <div>
                        <img src="./image/avatar_user.jpg" alt="">
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
                        <button class="save" onclick="myFunction2()">Cập nhật</button>
                        <button class="exit" onclick="myFunction2()">Thoát</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function myFunction() {
          document.getElementById("table-infor").style.display = "none";
          document.getElementById("tab-bangcap").style.display = "none";
          document.getElementById("body-content").style.display = "block";
        }
        function myFunction2() {
          document.getElementById("table-infor").style.display = "block";
          document.getElementById("tab-bangcap").style.display = "block";
          document.getElementById("body-content").style.display = "none";
        }
      </script>
@endsection