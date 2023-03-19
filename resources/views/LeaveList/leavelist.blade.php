@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/LeaveList/index.css">
@endsection
@section('content')
<div class="fluid-container main_page">
    <div class="container">
        <h1 class="heading">Danh sách nghỉ phép</h1>
        <div class="add-function">
            <p class="navigation">Danh Sách nghỉ phép</p>
           
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
            @if (count($leaves) == 0)
            <script>
                Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Không có bản ghi !',
                showConfirmButton: true,
                confirmButtonText: 'Đóng',
                timer: 3000
              })
              </script>
            @else
                @foreach ($leaves as $leave)
                <tr>
                    <td scope="row">{{$leave->MaNV}}</th>
                    <td>{{$leave->nhanvien->TenNV}}</td>
                    <td>{{$leave->NgayBatDau}}</td>
                    <td>{{$leave->NgayKetThuc}}</td>
                    <td>Có phép</td>
                    <td class="muti-btn">
                        <a href="{{route('editLeave',['id'=>$leave->MaNP])}}">
                            <i class="bi bi-pencil-square edit"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-eye-fill edit"></i>
                        </a>
                    </td>
                  </tr>
                @endforeach
            @endif
        </tbody>
        </table>
    </div>
</div>
@endsection