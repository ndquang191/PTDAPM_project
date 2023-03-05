@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="./css/dsnv/dsNv.css">

@endsection
@section('content')
    <div class="fluid-container">
        <div class="container-header">
            <div class="header-content">
                <div><a class="tab-hosonv" href="">Danh sách nhân viên</a></div>
                <div class="btn-add">
                    <a href="addnv"><button>+ Thêm</button></a>
                </div>
            </div>
        </div>
        <div class="table-search-bar">
          <div class="search-bar">
            <input type="text" placeholder="Tìm kiếm">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
          </div>
          <table class="table">
            <thead>
              <tr>
                <td>Mã nhân viên</td>
                <td>Họ tên</td>
                <td>Số điện thoại</td>
                <td>Phòng ban</td>
                <td>Chức vự</td>
                <td>Trạng thái</td>
                <td>Hành động</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2051063756</td>
                <td>Ngô Thị Tâm</td>
                <td>0987654321</td>
                <td>Công tác sinh viên</td>
                <td>Chuyên viên</td>
                <td>Đang làm việc</td>
                <td>
                  <a class="show" href="/infonv"><i class="fa-solid fa-eye"></i></a>
                  <a href=""><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
@endsection