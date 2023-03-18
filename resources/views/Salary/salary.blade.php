@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/Salary/salary.css">
@endsection
@section('content')
<div class="fluid-container">
    <div class="heading-section">
        <div class="heading-primary">
            <p>Bảng lương nhân viên</p>
        </div>
        <div class="search">
            <div class="form-floating mb-3" style="margin:0!important">
                <input type="text" class="form-control input-search" id="floatingInput" placeholder="Tìm kiếm...">
                <label for="floatingInput" class="floatInput">Tìm kiếm...</label>
            </div>
            <select class="form-select" id="chooseSearch" aria-label="Default select example">
                <option value="1">Tên nhân viên</option>
                <option value="2">Chức vụ</option>
                <option value="3">Phòng ban</option>
              </select>
            <div class="search-btn " onclick="searchSalary()">
                <i class="bi bi-search"></i>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table" id="myTable">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Nhân viên</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Phòng ban</th>
                <th scope="col">Hành động</th>
              </tr>
            </thead>
            <tbody>
              <tr class="infor-data">
                <td><p class="padding">01</p></td>
                <td class="Employee-custom-table">
                    <div class="">
                        <span>NT</span>
                    </div>
                <p>
                        Ngô Thị Tâm
                </p>
                </td>
                <td> <p>Chuyên viên chính trị công tác</p> </td>
                <td> <p>sinh viên</p> </td>
                <td class="muti-btn">
                    <a href="{{route('showSalaryDetail',['id' => 100000])}}">
                        <i class="bi bi-pencil-square edit hidden"></i>
                    </a>
                    <a  href="{{route('showSalaryDetail',['id' => 10000])}}">
                        <i class="bi bi-eye-fill edit"></i>
                    </a>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection
@section('linkjs')
 <script src="js/salary/salary.js"></script>
@endsection