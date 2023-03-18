@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/hdld/hdld.css">
@endsection

@section('content')
    @if($errors->any())
    <script>
        Swal.fire({
        position: 'center',
        icon: 'error',
        title: '{{$errors->first()}}',
        showConfirmButton: true,
        confirmButtonText: 'Đóng',
        timer: 3000
    })
    </script>
    @endif 
    <div class="add_hdld_main">
        <div class="head_add_hdld_main">
            <h1 class="title_add_htld">Hợp đồng lao động</h1>
        </div>
        <div class="hdld_main_container hdld_main_page">
            <form action="{{route('updateHDLD',['id' => $contract->MaHDLD])}}" class="" method="POST">
                @csrf
                <div class="form_list_hdld">
                    <div class="form_list_item_htld">
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Mã nhân viên</label> <br>
                            <input type="text" name="MaNV" id="id" class="form_input_add_htld" value="{{$contract->MaNV}}" readonly>
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Loại hợp đồng</label> <br>
                            <input type="text" name="LoaiHD" id="loai_hd" class="form_input_add_htld" value="{{$contract->LoaiHopDong}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Ngày ký</label> <br>
                            <input type="date" name="NgayKi" id="ngay_ky" class="form_input_add_htld" value="{{$contract->NgayKi}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Ngày bắt đầu</label> <br>
                            <input type="date" name="NgayBatDau" id="ngay_bat_dau" class="form_input_add_htld" value="{{$contract->NgayBatDau}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Ngày kết thúc</label> <br>
                            <input type="date" name="NgayKetThuc" id="ngay_ket_thuc" class="form_input_add_htld" value="{{$contract->NgayKetThuc}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Trạng thái</label> <br>
                            <input type="text" name="trangthai" id="trangthai" class="form_input_add_htld" value="">
                        </div>
                    </div>
                    <div class="form_list_item_htld">
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Địa điểm làm việc</label> <br>
                            <input type="text" name="DiaDiem" id="" class="form_input_add_htld" value="{{$contract->DiaDiem}}">
                            {{-- <select name="DiaDiem" id="dia_diem" class="form_input_add_htld" style="font-size:14px">
                                <option value="{{old('DiaDiem')}}">Đại học Thủy Lợi cơ sở 1</option>
                                <option value="{{old('DiaDiem')}}">Đại học Thủy Lợi cơ sở 2</option>
                                <option value="{{old('DiaDiem')}}">Đại học Thủy Lợi cơ sở 3</option>
                            </select> --}}
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Chuyên môn</label> <br>
                            <input type="text" name="ChuyenMon" id="chuyen_mon" class="form_input_add_htld" value="{{$contract->ChuyenMon}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Pháp nhân</label> <br>
                            <input type="text" name="PhapNhan" id="phap_nhan" class="form_input_add_htld" value="{{$contract->PhapNhan}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Lương cơ bản</label> <br>
                            <input type="text" name="Luong" id="luong" class="form_input_add_htld" value="{{$contract->LuongCoBan}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Hệ số lương</label> <br>
                            <input type="text" name="HeSoLuong" id="heso" class="form_input_add_htld" value="{{$contract->HeSoLuong}}">
                        </div>
                    </div>
                </div>
                <div class="bottom_add_hdld">
                    <div class="bottom_exit_add_hdld">
                        <a href="" class="link_exit">Thoát</a>
                    </div>
                    <div class="bottom_save_add_hdld">
                        <button type="submit" class="hdld_submit" id="hdld_submit">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const exitBTN = document.querySelector('.bottom_exit_add_hdld')
        exitBTN.addEventListener('click',(e)=>{
            e.preventDefault();
            Swal.fire({
                title: 'Bạn có muốn thoát ở đây ?',
                showCancelButton: true,
                confirmButtonText: 'Có',
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