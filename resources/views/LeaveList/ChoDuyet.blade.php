@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/LeaveList/index.css">
@endsection
@section('content')
<div class="fluid-container main_page">
    <div class="container">
        <h1 class="heading">Danh sách nghỉ phép</h1>
        <div class="add-function">
            <p class="navigation">Danh sách chờ xét duyệt</p>
           
        </div>
        <table class="table table-striped">
            <thead>
          <tr>
            <th scope="col">Mã Nghỉ phép</th>
            <th scope="col">Mã nhân viên</th>
            <th scope="col">Tên nhân viên</th>
            <th scope="col">Ngày bắt đầu</th>
            <th scope="col">Ngày kết thúc</th>
            <th scope="col">Nội dung</th>
            <th scope="col">Có phép</th>
            <th scope="col">Trạng thái</th>
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
                    <a href="">chờ duyệt</a>
                    {{-- chờ duyệt sang form duyệt đơn  --}}
                  </tr>
                </a>
                @endforeach
            @endif
        </tbody>
        </table>
    </div>
</div>
@endsection