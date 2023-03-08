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
                <label for="floatingInput">Tìm kiếm...</label>
            </div>
            <div class="search-btn">
                <i class="bi bi-search"></i>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table">
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
              <tr>
                <td>01</td>
                <td class="Employee-custom-table">
                    <div class="">
                        <span>NT</span>
                    </div>
                <p>
                        Ngô Thị Tâm
                </p>
                </td>
                <td>Chuyên viên chính trị công tác</td>
                <td>sinh viên</td>
                <td></td>
              </tr>
            </tbody>
          </table>
    </div>
</div>
@endsection