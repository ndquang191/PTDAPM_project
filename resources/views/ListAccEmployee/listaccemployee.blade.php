@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/ListAccEmployee/index.css">
@endsection
@section('content')
<div class="fluid-container main_page">
    <div class="title">
        <h1>Danh sách tài khoản</h1>
        <div class="statistical-list">
            <div class="statistical-item box-violet">
                <p>Tổng</p>
                <span>{{count($accounts)}}</span>
            </div>
            <div class="statistical-item box-gray">
                <p>ADMIN 1</p>
                <span>{{$admin1Count}}</span>
            </div>
            <div class="statistical-item box-white">
                <p>ADMIN 2</p>
                <span>{{$admin2Count}}</span>
            </div>
            <div class="statistical-item box-white">
                <p>NHÂN VIÊN</p>
                <span class="">{{$memberCount}}</span>
            </div>
        </div>
    </div>
    <div class="table-stat-container" >
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
                    <th scope="col">Ngày tạo</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($accounts) == 0)
                        <h5>Không có bản ghi</h5>
                    @else
                        @foreach ($accounts as $account)
                        <tr>
                            <td scope="row">{{$account->MaNV}}</td>
                            <td>{{$account->nhanvien->TenNV}}</td>
                            <td>Không có dữ liệu</td>
                            <td >
                                <span class=
                                @if ($account->QuyenTruyCap == 'member')
                                "employee-color"
                                @else
                                    @if($account->QuyenTruyCap == 'admin1')
                                        "ADMIN1-color"
                                    @else
                                        "ADMIN2-color"
                                    @endif
                                @endif
                                >
                                    {{$account->QuyenTruyCap}}
                                </span>
                            </td>
                            <td>{{$account->NgayTao}}</td>
                            <td>
                                <a href="">
                                    <i class="bi bi-pencil-square edit"></i>
                                </a>
                            </td>
                          </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
            </div>
    </div>
</div>
<div class="overlay hidden"></div>
<div class="form-changepw hidden">
    <button class="btn-close-modal">x</button>
    <form class="flex-cl">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label lb-pw">Mật khẩu mới</label>
          <input type="password" class="form-control ip-pw" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label lb-pw"> Nhập lại mật khẩu mới</label>
          <input type="password" class="form-control ip-npw" id="exampleInputPassword1">
        </div>
            <button type="submit" class="btn btn-primary btn-save">Lưu</button>
      </form>
</div>
<div class="form-noti hidden">
    <p>Sửa thành công</p>
</div>
@endsection
@section('linkjs')
    <script src="/js/ListAccEmployee/index.js"></script>
@endsection