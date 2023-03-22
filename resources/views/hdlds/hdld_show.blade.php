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
    <div class="add_hdld_main">
        <div class="head_add_hdld_main">
            <h1 class="title_add_htld">Hợp đồng lao động</h1>
        </div>
        <div class="hdld_main_container hdld_main_page">
            <form action="" class="">
                <div class="form_list_hdld">
                    <div class="form_list_item_htld">
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Mã nhân viên</label> <br>
                            <input type="text" name="MaNV" id="id" class="form-control form_input_add_htld" value="{{$contract->MaNV}}" readonly>
                        </div> 
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Loại hợp đồng</label> <br>
                            <input type="text" name="LoaiHopDong" id="loai_hd" class="form-control form_input_add_htld" value="{{$contract->LoaiHopDong}}" readonly>
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Ngày ký</label> <br>
                            <input type="date" name="NgayKi" id="ngay_ky" class="form-control form_input_add_htld" value="{{$contract->NgayKi}}" readonly>
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Ngày bắt đầu</label> <br>
                            <input type="date" name="NgayBatDau" id="ngay_bat_dau" class="form-control form_input_add_htld" readonly value="{{$contract->NgayBatDau}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Ngày kết thúc</label> <br>
                            <input type="date" name="NgayKetThuc" id="ngay_ket_thuc" class="form-control form_input_add_htld" readonly value="{{$contract->NgayKetThuc}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="TrangThai" class="form_title_htld">Trạng thái</label><br>
                            <input type="text" class="form-control form_input_add_htld" name="TrangThai" id="TrangThai" value="{{$contract->TrangThai == 0 ? 'Hết hiệu lực' : 'Còn hiệu lực'}}">
                            {{-- <select name="TrangThai" id="TrangThai" class="form-control" style="font-size: 16px; background-color: rgba(0, 0, 0, 0.1)">
                                <option value="0" {{$contract->TrangThai == 0 ? 'selected' : ''}}>Hết hiệu lực</option>
                                <option value="1" {{$contract->TrangThai == 1 ? 'selected' : ''}}>Đang áp dụng</option>
                            </select> --}}
                        </div>
                    </div>
                    <div class="form_list_item_htld">
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Địa điểm làm việc</label> <br>
                            <input type="text" name="DiaDiem" id="dia_diem" class="form-control form_input_add_htld" readonly value="{{$contract->DiaDiem}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Chuyên môn</label> <br>
                            <input type="text" name="ChuyenMon" id="chuyen_mon" class="form-control form_input_add_htld" readonly value="{{$contract->ChuyenMon}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Pháp nhân</label> <br>
                            <input type="text" name="PhapNhan" id="phap_nhan" class="form-control form_input_add_htld" readonly value="{{$contract->PhapNhan}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Lương cơ bản</label> <br>
                            <input type="text" name="Luong" id="luong" class="form-control form_input_add_htld" readonly value="{{number_format(intval($contract->LuongCoBan))}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Hệ số lương</label> <br>
                            <input type="text" name="HSLuong" id="heso" class="form-control form_input_add_htld" readonly value="{{$contract->HeSoLuong }}">
                        </div>
                    </div>
                </div>
                <div class="bottom_add_hdld">
                    <div class="bottom_update_show">
                        <a href="{{route('editHDLD',['id' => $contract->MaHDLD])}}" class="link_exit">Cập nhật</a>
                    </div>
                    <div class="bottom_exit_show">
                        <div class="link_exit">Thoát</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const exitBTN = document.querySelector('.bottom_exit_show')
        exitBTN.addEventListener('click',(e)=>{
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có muốn thoát ở đây ?',
                showCancelButton: true,
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Không',
                icon: 'question',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'http://127.0.0.1:8000/contract';
                }
            })
        })
    </script>
@endsection