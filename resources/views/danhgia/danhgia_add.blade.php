@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/danhgia/danhgia.css">
@endsection

@section('content')
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
@endif
@if (session('message'))
<script>
    Swal.fire({
    position: 'center',
    icon: 'error',
    title: '{{session('message')}}',
    showConfirmButton: true,
    confirmButtonText: 'Đóng',
    timer: 3000
})
</script>
@endif
    <div class="fluid-container">
        <div class="danhgia_chucnang">
            <div class="danhgia_main_container danhgia_main_page">
                <div class="head_add_danhgia_main">
                    <a href="{{route('showListEvaluate')}}" id="add_contract_form" class="title_danhgia_add">Danh sách đánh giá</a>
                    <span>></span>
                    <h5 class="title_add_danhgia">Thêm đánh giá</h5>
                </div>
                <form action="{{route('storeEvaluate')}}" class="" method="post">
                    @csrf
                    <div class="form_list_danhgia">
                        <div class="form_list_item_danhgia">
                            <div class="form_add_danhgia" style="">
                                <label for="" class="form_title_danhgia">Mã nhân viên</label> <br>
                                <input type="text" name="MaNV" id="id" class="form-control form_input_add_danhgia input-id" value="{{old('MaNV')}}">
                                <p class="error hidden">Vui lòng nhập đúng mã nhân viên</p>
                            </div>
                            <div class="form_add_danhgia" style="">
                                <label for="" class="form_title_danhgia">Phân loại</label> <br>
                                <select name="PhanLoai" id="phanloai" class="form_input_add_danhgia">
                                    <option value="1" {{ old('PhanLoai') == 1 ? 'selected' : '' }}>Khen thưởng</option>
                                    <option value="0" {{ old('PhanLoai') == 0 ? 'selected' : '' }}>Kỷ luật</option>
                                </select>
                            </div>
                            <div class="form_add_danhgia">
                                <label for="" class="form_title_danhgia">Nội dung</label> <br>
                                <input type="text" name="NoiDung" id="noidung" class="form-control form_input_add_danhgia" value="{{old('NoiDung')}}">
                            </div>
                        </div>
                        <div class="form_list_item_danhgia">
                            <div class="form_add_danhgia">
                                <label for="" class="form_title_danhgia">Tên nhân viên</label> <br>
                                <input type="text" name="tennhanvien" style="background-color: #fff;" id="ten_nv" class="form-control form_input_add_danhgia input-name" value="{{old('tennhanvien')}}" readonly>
                            </div>
                            <div class="form_add_danhgia">
                                <label for="" class="form_title_danhgia">Ngày quyết định</label> <br>
                                <input type="date" name="NgayQuyetDinh" id="ngay_quyet_dinh" value="{{old('NgayQuyetDinh')}}" class="form-control form_input_add_danhgia">
                            </div>
                            <div class="form_add_danhgia">
                                <label for="" class="form_title_danhgia">Giá trị</label> <br>
                                <input type="number" name="GiaTri" id="giatri" class="form-control form_input_add_danhgia" value="{{old('GiaTri')}}">
                            </div>
                        </div>
                    </div>
                    <div class="bottom_add_danhgia">
                        <div class="bottom_exit_danhgia">
                            <div class="link_exit">Thoát</div>
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
@section('linkjs')
    <script src="/js/danhgia/danhgia.js"></script>
    
@endsection