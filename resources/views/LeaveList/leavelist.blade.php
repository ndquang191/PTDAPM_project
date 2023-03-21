{{-- Điều hướng Đơn chờ duyệt ở layout.app --}}
@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/LeaveList/index.css">
@endsection
@section('content')
<div class="fluid-container main_page">
    <div class="container">
        <h1 class="heading">Danh sách nghỉ phép</h1>
        <div class="add-function">
            <p class="navigation">Danh sách đã xét duyệt</p>
           
        </div>
        <table class="table table-striped">
            <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Mã nhân viên</th>
            <th scope="col">Tên nhân viên</th>
            <th scope="col">Ngày bắt đầu</th>
            <th scope="col">Ngày kết thúc</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Có phép</th>
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
                <a href="{{route('editLeave',['id'=>$leave->MaNP])}}">
                <tr >
                    <td scope="row">{{$leave->MaNP}}</th>
                    <td scope="row">{{$leave->MaNV}}</th>
                    <td>{{$leave->nhanvien->TenNV}}</td>
                    <td>{{$leave->NgayBatDau}}</td>
                    <td>{{$leave->NgayKetThuc}}</td>
                    <td>{{$leave->NoiDung}}</td>
                    <td>{{$leave->CoPhep}}</td>
                    <td class="muti-btn">
                        <a href="">
                          <i class="bi bi-person-lines-fill edit"></i>
                        </a>
                        {{-- sang lịch sử nghỉ phép --}}
                        <a  href="">
                            <i class="bi bi-eye-fill edit"></i>
                        </a>
                         {{-- sang xem đơn nghỉ phép --}}

                    </td>
                  </tr>
                </a>
                @endforeach
            @endif
                <tr >
                    <td scope="row">01</th>
                    <td scope="row">2051060698</th>
                    <td>Nguyễn Hà Thái</td>
                    <td>02/07/ 2023</td>
                    <td>03/07/2023</td>
                    <td>Có phép</td>
                    <td>Có phép</td>
                    <td class="muti-btn">
                        <a href="">
                          <i class="bi bi-person-lines-fill edit"></i>
                        </a>
                        <a  href="">
                            <i class="bi bi-eye-fill edit"></i>
                        </a>
                    </td>
                </tr>
                <tr >
                    <td scope="row">01</th>
                    <td scope="row">2051060698</th>
                    <td>Nguyễn Hà Thái</td>
                    <td>02/07/ 2023</td>
                    <td>03/07/2023</td>
                    <td>Có phép</td>
                    <td>Có phép</td>
                    <td class="muti-btn">
                        <a href="">
                          <i class="bi bi-person-lines-fill edit"></i>
                        </a>
                        <a  href="">
                            <i class="bi bi-eye-fill edit"></i>
                        </a>
                    </td>
                </tr>   
        </tbody>
        </table>
    </div>
</div>
@endsection