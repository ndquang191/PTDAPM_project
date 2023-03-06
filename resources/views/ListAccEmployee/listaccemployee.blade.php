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
                <span>{{count($accounts)}}</span>
            </div>
            <div class="statistical-item box-gray">
                <p>Đang hoạt động</p>
                <span>{{$activeCount}}</span>
            </div>
            <div class="statistical-item box-white">
                <p>Dừng hoạt động</p>
                <span class="flex-end-item">{{$stopActiveCount}}</span>
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
                    @if (count($accounts) == 0)
                        <h5>Không có bản ghi</h5>
                    @else
                        @foreach ($accounts as $accounts)
                        <tr>
                            <th scope="row">{{$accounts->MaNV}}</th>
                            <td>{{$accounts->nhanvien->TenNV}}</td>
                            <td>Trống</td>
                            <td >
                                <span class="employee-color">
                                <span class=
                                @if ($accounts->QuyenTruyCap == 'member')
                                    "employee-color"
                                @else
                                    @if($accounts->QuyenTruyCap == 'admin1')
                                        "ADMIN1-color"
                                    @else
                                        "ADMIN2-color"
                                    @endif
                                @endif
                                >
                                    {{$accounts->QuyenTruyCap}}
                                </span>
                            </td>
                            <td class={{$accounts->TrangThai == 0 ? "stop-active" : ""}}>
                                <p>
                                    {{$accounts->TrangThai == 1 ? "Hoạt động" : "Dừng hoạt động"}}
                                <p>
                            </td>
                            <td>Trống</td>
                            <td>
                                <a href="/changepw">
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

@endsection
