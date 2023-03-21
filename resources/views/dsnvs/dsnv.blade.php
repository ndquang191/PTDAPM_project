@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="./css/dsnv/dsNv.css">
@endsection
@section('content')
    <div class="fluid-container">
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
      <div class="container-head-body">
            <div class="container-header">
              <div class="header-content">
                  <div><a class="tab-hosonv" href="">Danh sách nhân viên</a></div>
                  <div class="btn-add">
                      <a href="{{route('addEmployeePage')}}"><button class="btn btn-primary">+ Thêm</button></a>
                  </div>
              </div>
            </div>
          <div class="table-search-bar ">
            <div class="search-bar">
              <div>
                <select class="form-select" id="chooseSearch">
                  <option value="0">Mã nhân viên</option>
                  <option value="1">Họ tên</option>
                  <option value="2">Số điện thoại</option>
                  <option value="3">Phòng ban</option>
                  <option value="4">Chức vụ</option>
                  <option value="5">Trạng thái</option>
                </select>
              </div>
              <div class="input-find">
                <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Tìm kiếm">
              </div>
            </div>
            <table class="table table-hover" id="myTable">
              <thead>
                <tr>
                  <th scope="col">Mã nhân viên</th>
                  <th scope="col">Họ tên</th>
                  <th scope="col">Số điện thoại</th>
                  <th scope="col">Phòng ban</th>
                  <th scope="col">Chức vụ</th>
                  <th scope="col">Trạng thái</th>
                  <th scope="col">Hành động</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($employees as $employee)
                  <tr>
                    <td>{{$employee->MaNV}}</td>
                    <td>{{$employee->TenNV}}</td>
                    <td>{{$employee->SDT != null ? $employee->SDT : "Trống"}}</td>
                    <td>{{$employee->PhongBan != null ? $employee->phongban->TenPhongBan : "Trống"}}</td>
                    <td>{{$employee->ChucVu != null ? $employee->chucvu->TenCV : "Trống"}}</td>
                    <td>{{$employee->TrangThai == 1 ? "Đang làm việc" : "Ngừng làm việc"}}</td>
                    <td>
                      <a class="show" href="{{route('getEmployeeInfo',['id' => $employee->MaNV])}}"><i class="fa-solid fa-eye"></i></a>
                      {{-- <a href="" type="button" id="btn" value="Show Alert" onclick="saveEmployee()"><i class="fa-solid fa-trash"></i></a> --}}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>
@endsection

@section('linkjs')
    <script src="/js/ListAccEmployee/index.js"></script>
@endsection

<?php ?>