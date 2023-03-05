@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/ListAccEmployee/index.css">
@endsection
@section('content')
<div class="main_page">
    <div class="title">
        <h1>Danh sách tài khoản</h1>
        <div class="statistical-list">
            <div class="statistical-item box-violet">
                <p>Tổng</p>
                <span>3</span>
            </div>
            <div class="statistical-item box-gray">
                <p>Đang hoạt động</p>
                <span>2</span>
            </div>
            <div class="statistical-item box-white">
                <p>Dừng hoạt động</p>
                <span class="flex-end-item">1</span>
            </div>
        </div>
    </div>
    <div class="container" >
            <div class="title-secondary">
                <div class="heading">
                    <p>Tài Khoản</p>
                    <div></div>
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
            <div class="table-acc-list">
                <table class="table table-striped">
                    <thead>
                  <tr>
                    <th scope="col">Mã nhân viên</th>
                    <th scope="col">Tên nhân viên</th>
                    <th scope="col">Tài khoản</th>
                    <th scope="col">Quyền truy cập</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">2051063756</th>
                    <td>Ngô Thị Tâm</td>
                    <td>2051063756</td>
                    <td >
                        <span class="employee-color">
                            Nhân viên
                        </span>
                    </td>
                    <td><p>Hoạt động<p></td>
                    <td>26/2/2023</td>
                    <td>
                        <a href="/changepw">
                            <i class="bi bi-pencil-square edit"></i>
                        </a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">2051063756</th>
                    <td>Ngô Thị Tâm</td>
                    <td></td>
                    <td >
                        <span class="ADMIN1-color">
                            ADMIN 1
                        </span>
                    </td>
                    <td><p>Hoạt động<p></td>
                    <td>26/2/2023</td>
                    <td>
                        <a href="/changepw">
                            <i class="bi bi-pencil-square edit"></i></td>
                        </a>
                  </tr>
                  <tr>
                    <th scope="row">2051063756</th>
                    <td>Ngô Thị Tâm</td>
                    <td></td>
                    <td >
                        <span class="ADMIN2-color">
                            ADMIN 2 
                        </span>
                    </td>
                    <td class="stop-active">
                        <p>Dừng Hoạt động<p> 
                        </td>
                    <td>26/2/2023</td>
                    <td ><a href="/changepw" class="hidden">
                        <i class="bi bi-pencil-square edit"></i></td>
                    </a>
                  </tr>
                </tbody>
                </table>
            </div>
    </div>
</div>
<div class="overlay"></div>
<div class="form-changepw">
    <button class="btn-close-modal">x</button>
    <form class=" flex-cl">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label lb-pw">Mật khẩu cũ</label>
          <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label lb-pw">Mật khẩu mới</label>
          <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
            <button type="submit" class="btn btn-primary btn-save">Lưu</button>
      </form>
</div>
@endsection
@section('linkjs')
    <script src="/js/ListAccEmployee/index.js"></script>
@endsection