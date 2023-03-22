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
    @if(session('error'))
    <script>
        Swal.fire({
        position: 'center',
        icon: 'error',
        title: '{{session('error')}}',
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
                            <input type="text" name="MaNV" id="id" class="form-control form_input_add_htld" value="{{$contract->MaNV}}" readonly>
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Loại hợp đồng</label> <br>
                            <input type="text" name="LoaiHD" id="loai_hd" class="form-control form_input_add_htld" value="{{$contract->LoaiHopDong}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Ngày ký</label> <br>
                            <input type="date" name="NgayKi" id="ngay_ky" class="form-control form_input_add_htld" value="{{$contract->NgayKi}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Ngày bắt đầu</label> <br>
                            <input type="date" name="NgayBatDau" id="ngay_bat_dau" class="form-control form_input_add_htld" value="{{$contract->NgayBatDau}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Ngày kết thúc</label> <br>
                            <input type="date" name="NgayKetThuc" id="ngay_ket_thuc" class="form-control form_input_add_htld" value="{{$contract->NgayKetThuc}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="TrangThai" class="form_title_htld">Trạng thái</label><br>
                            <select name="TrangThai" id="TrangThai" class="form-select form_input_add_htld" style="font-size: 16px; background-color: rgba(0, 0, 0, 0.1)">
                                <option value="0" {{$contract->TrangThai == 0 ? 'selected' : ''}}>Hết hiệu lực</option>
                                <option value="1" {{$contract->TrangThai == 1 ? 'selected' : ''}}>Đang áp dụng</option>
                            </select>
                        </div>
                    </div>
                    <div class="form_list_item_htld">
                        <div class="form_add_hdld">
                            <label for="dia_diem" class="form_title_htld">Địa điểm làm việc</label> <br>
                            {{-- <input type="text" name="DiaDiem" id="" class="form_input_add_htld" value="{{$contract->DiaDiem}}"> --}}
                            <select name="DiaDiem" id="dia_diem" class="form_input_add_htld" style="font-size:14px">
                                <option value="Đại học Thủy Lợi cơ sở 1" {{$contract->DiaDiem == 'Đại học Thủy Lợi cơ sở 1' ? 'selected' : ''}}>Đại học Thủy Lợi cơ sở 1</option>
                                <option value="Đại học Thủy Lợi cơ sở 2" {{$contract->DiaDiem == 'Đại học Thủy Lợi cơ sở 2' ? 'selected' : ''}}>Đại học Thủy Lợi cơ sở 2</option>
                                <option value="Đại học Thủy Lợi cơ sở 3" {{$contract->DiaDiem == 'Đại học Thủy Lợi cơ sở 3' ? 'selected' : ''}}>Đại học Thủy Lợi cơ sở 3</option>
                            </select>
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Chuyên môn</label> <br>
                            <input type="text" name="ChuyenMon" id="chuyen_mon" class="form-control form_input_add_htld" value="{{$contract->ChuyenMon}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Pháp nhân</label> <br>
                            <input type="text" name="PhapNhan" id="phap_nhan" class="form-control form_input_add_htld" value="{{$contract->PhapNhan}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Lương cơ bản</label> <br>
                            <input type="text" name="Luong" id="luong" class="form-control form_input_add_htld" value="{{$contract->LuongCoBan}}">
                        </div>
                        <div class="form_add_hdld">
                            <label for="" class="form_title_htld">Hệ số lương</label> <br>
                            <input type="text" name="HeSoLuong" id="heso" class="form-control form_input_add_htld" value="{{$contract->HeSoLuong}}">
                        </div>
                    </div>
                </div>
                <div class="bottom_add_hdld">
                    <div class="bottom_exit_add_hdld">
                        <div class="link_exit">Thoát</div>
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
                title: 'Bạn có muốn thoát ?',
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