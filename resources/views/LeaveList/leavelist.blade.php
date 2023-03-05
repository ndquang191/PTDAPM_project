@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/LeaveList/index.css">
@endsection
@section('content')
<div class="main_page">
    <div class="container">
        <h1 class="heading">Danh sách nghỉ phép</h1>
        <div class="add-function">
            <p class="navigation">Danh Sách nghỉ phép</p>
            <button>
                <a href="/addleave" class="add-btn">
                    <i class="bi bi-plus"></i>
                    <p>Thêm</p>
                </a>
            </button>
        </div>
        <table class="table table-striped">
            <thead>
          <tr>
            <th scope="col">Mã nhân viên</th>
            <th scope="col">Tên nhân viên</th>
            <th scope="col">Ngày bắt đầu</th>
            <th scope="col">Ngày kết thúc</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">2051063754</th>
            <td>Nguyễn Như Minh</td>
            <td>07/07/2023</td>
            <td>08/07/2023</td>
            <td>Có phép</td>
            <td class="muti-btn">
                <a href="#">
                    <i class="bi bi-pencil-square edit"></i>
                </a>
                <a href="#">
                    <i class="bi bi-eye-fill edit"></i>
                </a>
            </td>
          </tr>
          <tr>
            <th scope="row">2051060698</th>
            <td>Nguyễn Hà Thái</td>
            <td>02/07/2023</td>
            <td>03/07/2023</td>
            <td>Có phép</td>
            <td class="muti-btn">
                <a href="#">
                    <i class="bi bi-pencil-square edit"></i>
                </a>
                <a href="#">
                    <i class="bi bi-eye-fill edit"></i>
                </a>
            </td>
          </tr>
        </tbody>
        </table>
    </div>
</div>
@endsection