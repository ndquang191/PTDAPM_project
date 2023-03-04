@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/ListAccEmployee/index.css">
@endsection
@section('content')
<div class="main_page">
    <div class="title">
        <h1>Danh sách tài khoản</h1>
        <div class="statistical-list">
            <div class="statistical-item box-violet">
                <p>Tổng</p>
                <span>3</span>
            </div>
            <div class="statistical-item box-gray">
                <p>Đang hoạt động</p>
                <span>2</span>
            </div>
            <div class="statistical-item box-white">
                <p>Dừng hoạt động</p>
                <span class="flex-end-item">1</span>
            </div>
        </div>
    </div>
    <div class="container">
            <div class="title-secondary">
                <div class=""></div>
            </div>
    </div>
</div>
@endsection