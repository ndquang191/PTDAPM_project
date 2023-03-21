@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/danhgia/danhgia.css">
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
@if($errors->any())
<script>
    Swal.fire({
    position: 'center',
    icon: 'error',
    // title: 'Vui lòng kiểm tra lại thông tin nhân viên',
    title: '{{$errors->first()}}',

    showConfirmButton: true,
    confirmButtonText: 'Đóng',
    timer: 3000
  })
</script>
{{-- {!! implode('', $errors->all('<div>:message</div>')) !!} --}}
@endif
    <div class="fluid-container">
        <div class="danhgia_chucnang">
            <div class="danhgia_main_container danhgia_main_page">
                <div class="head_add_danhgia_main">
                    <a href="{{route('showListEvaluate')}}" class="title_danhgia_add">Danh sách đánh giá</a>
                    <span>></span>
                    <h5 class="title_add_danhgia">Cập nhật đánh giá</h5>
                </div>
                <form action="{{route('updateEvaluate',['id' => $evaluate->MaDG])}}" method="post" class="">
                    @csrf
                    <div class="form_list_danhgia">
                        <div class="form_list_item_danhgia">
                            <div class="form_add_danhgia">
                                <label for="" class="form_title_danhgia">Mã nhân viên</label> <br>
                                <input type="text" name="MaNV" value="{{$evaluate->MaNV}}" style="background-color: #fff;" id="id" class="form-control form_input_add_danhgia" readonly>
                            </div>
                            <div class="form_add_danhgia">
                                <label for="" class="form_title_danhgia">Phân loại</label> <br>
                                <select name="PhanLoai" id="phanloai" class="form-control form_input_add_danhgia">
                                    <option value="1" {{$evaluate->PhanLoai == 1 ? 'selected' : ''}}>Khen thưởng</option>
                                    <option value="0" {{$evaluate->PhanLoai == 0 ? 'selected' : ''}}>Kỷ luật</option>
                                </select>
                                {{-- <input type="text" name="" id="noidung" class="form_input_add_danhgia"> --}}
                            </div>
                            <div class="form_add_danhgia">
                                <label for="" class="form_title_danhgia">Nội dung</label> <br>
                                <input type="text" name="NoiDung" id="noidung" value="{{$evaluate->NoiDung}}" class="form-control form_input_add_danhgia">
                            </div>
                        </div>
                        <div class="form_list_item_danhgia">
                            <div class="form_add_danhgia">
                                <label for="" class="form_title_danhgia">Tên nhân viên</label> <br>
                                <input type="text" name="" value="{{$evaluate->nhanvien->TenNV}}" style="background-color: #fff;" id="ten_nv" class="form-control form_input_add_danhgia" readonly>
                            </div>
                            <div class="form_add_danhgia">
                                <label for="" class="form_title_danhgia">Ngày quyết định</label> <br>
                                <input type="date" name="NgayQuyetDinh" id="ngay_quyet_dinh" class="form-control form_input_add_danhgia" value="{{$evaluate->NgayQuyetDinh}}">
                            </div>
                            <div class="form_add_danhgia">
                                <label for="" class="form_title_danhgia">Giá trị</label> <br>
                                <input type="text" name="GiaTri" id="giatri" class="form-control form_input_add_danhgia" value="{{$evaluate->Giatri}}">
                            </div>
                        </div>
                    </div>
                    <div class="bottom_add_danhgia">
                        <div class="bottom_exit_danhgia">
                            <div class="link-exit">Thoát</div>
                        </div>
                        <div class="bottom_save_danhgia">
                            <button type="submit" class="danhgia_submit" id="danhgia_submit">Lưu</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const exitBTN = document.querySelector('.bottom_exit_danhgia')
         exitBTN.addEventListener('click',()=>{
             Swal.fire({
                 title: 'Bạn có muốn thoát ở đây ?',
                 showCancelButton: true,
                 confirmButtonText: 'Có',
                 cancelButtonText: 'Không',
                 icon: 'question',
             }).then((result) => {
                 if (result.isConfirmed) {
                     window.location.href = 'http://127.0.0.1:8000/evaluate';
                 }
             })
         })
 </script>
@endsection
