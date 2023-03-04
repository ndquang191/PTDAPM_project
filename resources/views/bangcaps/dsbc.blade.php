@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="./css/dsnv/bcNv.css">

@endsection
@section('content')
    <div class="container">
        <div class="container-header">
            <div class="header-content">
                <div><a class="tab-hosonv" href="dsnv">Hồ sơ nhân viên</a></div>
                <div><a class="tab-bangcap" href="">Bằng cấp nhân viên</a></div>
            </div>
            <div class="btn-add">
                <a href="addbcnv"><button>+ Thêm</button></a>
            </div>
        </div>
        <table class="table">
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
              <tr>
                <td>Ngô Thị Tâm</td>
                <td>Kỹ sư kỹ thuật phần mềm khoa Công nghệ thông tin trường đại học Thủy Lợi</td>
                <td>3/3/2023</td>
                <td>4/3/2023</td>
                <td>
                    <a class="show" href=""><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href=""><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
    </div>
@endsection