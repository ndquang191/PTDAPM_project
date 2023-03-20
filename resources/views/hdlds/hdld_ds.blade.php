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
    icon: '{{session('type')}}',
    html: '<span style="font-size: 20px">{{ session('message') }}</span>'
  })
</script>
@endif
    <div class="fluid-contaier">
        <div class="hdld_ds">
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
                    <input type="text" name="search" id="myInput" placeholder="Tìm kiếm theo MNV, trạng thái" class="form_input" onkeyup="myFunction()">
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
                            <th scope="col">Mã HD</th>
                            <th scope="col">Loại hợp đồng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chức năng</th>
        
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
                                <td>{{$contract->MaHDLD}}</td>
                                <td>{{$contract->LoaiHopDong}}</td>
                                {{-- <td></td>
                                <td>{{$contract->NgayKi}}</td>
                                <td>{{$contract->NgayBatDau}}</td>
                                <td>{{$contract->NgayKetThuc}}</td>
                                <td>{{$contract->DiaDiem}}</td>
                                <td>{{$contract->ChuyenMon}}</td> --}}
                                <td>{{$contract->TrangThai == 1 ? 'Còn hiệu lực' : 'Hết hiệu lực'}}</td>
                                <td>
                                    <a class="link_icon" href="{{route('showDetailHDLD', ['id' => $contract->MaHDLD ])}}">
                                        <i class="bi bi-eye-fill icon_color"></i>
                                    </a>
                                    {{-- <a href="{{route('editHDLD',['id' => 1])}}">
                                        <i class="bi bi-pencil-square icon_color"></i>
                                    </a> --}}
                                    <a href="#" class="link_icon">
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
    </div>
    <form action="" id="delete-form" method="post" style="display: none">
        @csrf
    </form>
    <script>
        // ---- Alert khi nhấn nút reset mật khẩu
        const deleteBTN = document.querySelectorAll('.delete-btn');
        const deleteForm = document.getElementById('delete-form')
        deleteBTN.forEach(btn => {
            btn.addEventListener('click', (e)=>{
                e.preventDefault()
                Swal.fire({
                title: 'Xác nhận xóa hợp đồng ?',
                showCancelButton: true,
                confirmButtonText: 'Xóa',
                }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.setAttribute('action',`/contract/${btn.getAttribute('data-id')}/delete`)
                    deleteForm.submit();
                }
            })
            })
        });
    </script>
@endsection
@section('linkjs')
    <script src="/js/hdld/hdld.js"></script>
@endsection