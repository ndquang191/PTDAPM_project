@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/danhgia/danhgia.css">
@endsection

@section('content')
    <div class="fluid-container">
        <div class="danhgia_main_container danhgia_main_page">
            <div class="head_add_danhgia_main">
                <a href="{{route('showListEvaluate')}}" class="title_danhgia_add">Danh sách đánh giá</a>
                <span>></span>
                <h5 class="title_add_danhgia">Thêm đánh giá</h5>
            </div>
            <form action="" class="">
                <div class="form_list_danhgia">
                    <div class="form_list_item_danhgia">
                        <div class="form_add_danhgia">
                            <label for="" class="form_title_danhgia">Mã nhân viên</label> <br>
                            <input type="text" name="" id="id" class="form_input_add_danhgia">
                        </div>
                        <div class="form_add_danhgia">
                            <label for="" class="form_title_danhgia">Nội dung</label> <br>
                            <input type="text" name="" id="noidung" class="form_input_add_danhgia">
                        </div>
                        <div class="form_add_danhgia">
                            <label for="" class="form_title_danhgia">Giá trị</label> <br>
                            <input type="date" name="" id="giatri" class="form_input_add_danhgia">
                        </div>
                    </div>
                    <div class="form_list_item_danhgia">
                        <div class="form_add_danhgia">
                            <label for="" class="form_title_danhgia">Tên nhân viên</label> <br>
                            <input type="text" name="" id="ten_nv" class="form_input_add_danhgia">
                        </div>
                        <div class="form_add_danhgia">
                            <label for="" class="form_title_danhgia">Ngày quyết định</label> <br>
                            <input type="text" name="" id="ngay_quyet_dinh" class="form_input_add_danhgia">
                        </div>
                    </div>
                </div>
                <div class="bottom_add_danhgia">
                    <div class="bottom_exit_danhgia">
                        <button type="submit" class="danhgia_submit" id="danhgia_submit">Lưu</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
