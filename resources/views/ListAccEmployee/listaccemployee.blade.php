@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/ListAccEmployee/index.css">
@endsection
@section('content')
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
                        <input type="text" class="form-control input-search" id="floatingInput myInput" placeholder="Tìm kiếm...">
                        <label for="floatingInput">Tìm kiếm...</label>
                    </div>
                    <select class="form-select" id="chooseSearch" aria-label="Default select example">
                        <option value="1">Mã nhân viên</option>
                        <option value="2">Tên nhân viên</option>
                        <option value="3">Quyền truy cập</option>
                      </select>
                    <div class="search-btn" onclick="searchAccount()">
                        <i class="bi bi-search"></i>
                    </div>
                </div>
            </div>
            <div class="table-acc-list">
                <table class="table table-striped table-hover" id="myTable">
                    <thead>
                  <tr>
                    <th scope="col">Mã nhân viên</th>
                    <th scope="col">Tên nhân viên</th>
                    <th scope="col">Tài khoản</th>
                    <th scope="col">Quyền truy cập</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Chức năng</th>
                  </tr>
                </thead>
                <tbody class="">
                    @if (count($accounts) == 0)
                        <h5>Không có bản ghi</h5>
                    @else
                        @foreach ($accounts as $account)
                        <tr>
                            <td scope="row">{{$account->MaNV}}</td>
                            <td>{{$account->nhanvien->TenNV}}</td>
                            <td>Không có dữ liệu</td>
                            <td class="role-col">
                                <button class=
                                @if ($account->QuyenTruyCap == 'member')
                                "employee-color btn currentRole"
                                @else
                                    @if($account->QuyenTruyCap == 'admin1')
                                        "ADMIN1-color btn currentRole"
                                    @else
                                        "ADMIN2-color btn currentRole"
                                    @endif
                                @endif
                                >
                                    {{$account->QuyenTruyCap}}
                                </button>
                                <div class="role-menu">
                                    @if ($account->QuyenTruyCap == 'member')
                                        <button class="btn ADMIN1-color">admin1</button>
                                        <button class="btn ADMIN2-color">admin2</button>
                                    @else
                                        @if($account->QuyenTruyCap == 'admin1')
                                        <button class="btn employee-color">member</button>
                                        <button class="btn ADMIN2-color">admin2</button>
                                        @else
                                        <button class="btn employee-color">member</button>
                                        <button class="btn ADMIN1-color">admin1</button>
                                        @endif
                                    @endif

                                </div>

                            </td>
                            <td>{{$account->NgayTao}}</td>
                            <td>
                                <button class="reset-password-btn" data-id = '{{$account->ID}}'><i class="bi bi-pencil-square edit"></i></button>
                            </td>
                          </tr>
                        @endforeach
                    @endif
                </tbody>
                </table>
                <form action="" method="post" id="reset-form">@csrf</form>
            </div>
    </div>
</div>

{{-- <div class="overlay hidden"></div>
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
</div> --}}
<script>
    // ---- Alert khi nhấn nút reset mật khẩu
    const resetBTN = document.querySelectorAll('.reset-password-btn');
    const resetForm = document.getElementById('reset-form')
    resetBTN.forEach(btn => {
        btn.addEventListener('click', ()=>{
            Swal.fire({
            title: 'Reset mật khẩu tài khoản ' + btn.getAttribute('data-id') + ' ?',
            showCancelButton: true,
            confirmButtonText: 'Reset',
            // showConfirmButton:'admin2',
            }).then((result) => {
            if (result.isConfirmed) {
                resetForm.setAttribute('action','/account/'+btn.getAttribute('data-id')+'/reset')
                resetForm.submit();
            }
        })
        })
    });
    
</script>
@endsection
@section('linkjs')
    <script src="/js/ListAccEmployee/index.js"></script>
@endsection