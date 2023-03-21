@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/danhgia/danhgia.css">
@endsection
@section('content')
    <div class="fluid-container">
        <div class="danhgia_chucnang">
            <div class="danhgia_main_container">
                <div class="head_add_danhgia_main head_ls_danhgia">
                    <div>
                        <a href="{{route('showListEvaluate')}}" class="title_danhgia_add">Danh sách đánh giá</a>
                        <span>></span>
                        <h5 class="title_add_danhgia">Chi tiết đánh giá</h5>
                    </div>
                    <div class="danhgia_ls_btn">
                        <a href="{{route('showListEvaluate')}}" class="danhgia_add_btn_exit">Quay lại</a>
                    </div>
                </div>
                <div class="danhgia_ls_info">
                    <div class="danhgia_ls_img_avatar">
                        @if ($evaluate->nhanvien->HinhAnh == null)
                            <img src="/image/photo_user.jpg" alt="" style="width: 150px; height: 180px;">      
                        @else 
                            <img src="data:image/jpeg;base64,{{ base64_encode($evaluate->nhanvien->HinhAnh) }}" alt="Image">
                        @endif
                    </div>
                    <div class="danhgia_ls_para">
                        <p>Mã nhân viên: {{$evaluate->MaNV}}</p>
                        <p>Tên nhân viên: {{$evaluate->nhanvien->TenNV}}</p>
                    </div>
                </div>
                <div class="danhgia_main_show">
                    <div class="full-row">
                        <div class="title">Phân loại:</div>
                        <div class="value">{{$evaluate->PhanLoai == 1 ? 'Khen thưởng' : 'Kỉ luật'}}</div>
                    </div>
                    <div class="full-row">
                        <div class="title">Nội dung:</div>
                        <div class="value" style="min-height: 60px;">{{$evaluate->NoiDung}}</div>
                    </div>
                    <div class="full-row">
                        <div class="title">Ngày quyết định:</div>
                        <div class="value">{{$evaluate->NgayQuyetDinh}}</div>
                    </div>
                    <div class="full-row">
                        <div class="title">Giá trị:</div>
                        <div class="value">{{number_format($evaluate->Giatri)}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection