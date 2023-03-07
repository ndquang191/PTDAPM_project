@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/Salary/salary.css">
@endsection
@section('content')
<div class="fluid-container">
    <div class="heading-section">
        <div class="heading-primary">
            <p>Tài Khoản</p>
            <div></div>
        </div>
        <div class="search">
            <div class="form-floating mb-3" style="margin:0!important">
                <input type="text" class="form-control input-search" id="floatingInput" placeholder="Tìm kiếm...">
                <label for="floatingInput">Tìm kiếm...</label>
            </div>
            <div class="search-btn">
                <i class="bi bi-search"></i>
            </div>
        </div>
    </div>
    <div class="container">
</div>
@endsection