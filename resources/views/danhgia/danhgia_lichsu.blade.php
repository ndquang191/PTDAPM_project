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
                        <h5 class="title_add_danhgia">Lịch sử đánh giá</h5>
                    </div>
                    <div class="danhgia_ls_btn">
                        <a href="{{route('showListEvaluate')}}" class="danhgia_add_btn_exit">Quay lại</a>
                    </div>
                </div>
                <div class="danhgia_ls_info">
                    <div class="danhgia_ls_img_avatar">
                        <img src="/image/photo_user.jpg" alt="" style="width: 150px; height: 180px;">  
                    </div>
                    <div class="danhgia_ls_para">
                        <p>Mã nhân viên: 2051063754</p>
                        <p>Tên nhân viên: Nguyễn Như Minh</p>
                    </div>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Phân loại</th>
                            <th scope="col">Mã nhân viên</th>
                            <th scope="col">Tên nhân viên</th>
                            <th scope="col">Ngày quyết định</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Giá trị</th>
                            <th scope="col">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Khen thưởng</td>
                            <td>2051053754</td>
                            <td>Nguyễn Như Minh</td>
                            <td>28/07/2023</td>
                            <td>Khen thưởng</td>
                            <td>Giá trị</td>
                            <td>
                                <a href="{{URL::to('/danhgia/danhgia_show')}}" class="link-icon-eye">
                                    <i class="bi bi-eye-fill icon_color"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection