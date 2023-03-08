@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/hdld/hdld.css">
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
    <div class="fluid-contaier">
        <div class="header_main">
            <div class="tilte_main">
                Danh sách hợp đồng lao động
            </div>
            <div class="add_btn">
                <a href="{{route('createHDLD')}}" class="link_add_btn"> + Thêm</a>
            </div>
        </div>
        <div class="hdld_main_container">
            <div class="input_search">
                {{-- <form action=""> --}}
                <input type="text" name="search" id="myInput" placeholder="Tìm kiếm ..." class="form_input" onkeyup="myFunction()">
                {{-- </form> --}}
                <a href="#" class="search_btn" onclick="myFunction()">
                    <i class="bi bi-search icon_color_search"></i>
                </a>
            </div>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã nhân viên</th>
                        <th scope="col">Số hợp đồng</th>
                        <th scope="col">Loại hợp đồng</th>
                        <th scope="col">Ngày ký</th>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Ngày kết thúc</th>
                        <th scope="col">Địa điểm làm việc</th>
                        <th scope="col">Chuyên môn</th>
                        <th scope="col"></th>
    
                    </tr>
                </thead>
                <tbody>
                    @if (count($contracts) == 0)
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
                      <?php $count = 0 ?>
                        @foreach ($contracts as $contract)
                      <?php $count ++ ?>
                        <tr>
                            <td scope="row">{{$count}}</td>
                            <td>{{$contract->MaNV}}</td>
                            <td>{{$contract->SoHD}}</td>
                            <td>{{$contract->LoaiHopDong}}</td>
                            <td>{{$contract->NgayKi}}</td>
                            <td>{{$contract->NgayBatDau}}</td>
                            <td>{{$contract->NgayKetThuc}}</td>
                            <td>{{$contract->DiaDiem}}</td>
                            <td>{{$contract->ChuyenMon}}</td>
                            <td>
                                <a href="{{URL::to('hdld/hdld_show')}}">
                                    <i class="bi bi-eye-fill icon_color"></i>
                                </a>
                                <a href="{{URL::to('hdld/hdld_edit')}}">
                                    <i class="bi bi-pencil-square icon_color"></i>
                                </a>
                                <a href="#">
                                    <i class="bi bi-trash icon_color"></i>
                                </a>
                            </td>
                        <tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('linkjs')
    <script src="/js/hdld/hdld.js"></script>
@endsection