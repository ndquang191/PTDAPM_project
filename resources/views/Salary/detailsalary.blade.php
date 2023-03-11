@extends('layout.app')
@section('linkcss')
<link rel="stylesheet" href="/css/Salary/detailsalary.css">
@endsection
@section('content')
<div class="fluid-container">
    <div class="heading-section">
        <div class="heading-primary">
            <p>Bảng lương nhân viên : {{$employee->TenNV}}</p>
        </div>
    </div>
    <div class="container">
        <div class="infor-employee">
            <div class="">
                <div class="infor-box">
                    <div class="img-box">
                        <img src="image/detailsalary/NgoThiTam.png" alt="">
                    </div>
                    <div class="infor">
                        <P>Mã nhân viên: {{$employee->MaNV}}</P>
                        <p>{{$employee->TenNV}}</p>
                    </div>
                </div>
            </div>
            <div class="date">
                <p>15/03/2023</p>
            </div>
        </div>
        <div class="detail-salary">
            <div class="box-black"></div>
            <div class="salary-base">
                <span>01</span>
                <p class="name">Lương cơ bản</p>
                <p class="salary-1">{{$luongcoban}} VND</p>
                <p class="salary-2">-</p>
                <div class="eye-hide hidden">
                    <i class="bi bi-eye-fill"></i>
                </div>
            </div>
            <div class="salary-base box-gray">
                <span>02</span>
                <p class="name">Hệ số lương</p>
                <p class="salary-1">{{$hesoluong}}</p>
                <p class="salary-2"></p>
                <div class="eye-hide">
                    <i class="bi bi-eye-fill hidden"></i>
                </div>
            </div>
            <div class="salary-base">
                <span>03</span>
                <p class="name">Ngày nghỉ quá hạn</p>
                <p class="salary-1"></p>
                <p class="salary-2"></p>
                <div class="eye-hide hidden" >
                    <i class="bi bi-eye-fill"></i>
                </div>
            </div>
            <div class="salary-base box-gray">
                <span>04</span>
                <p class="name">Khen thưởng</p>
                <p class="salary-1">{{$khenthuong}} VND</p>
                <p class="salary-2"></p>
                <div class="eye-hide">
                    <i class="bi bi-eye-fill hidden"></i>
                </div>
            </div>
            <div class="salary-base">
                <span>05</span>
                <p class="name">Kỷ luật</p>
                <p class="salary-1"></p>
                <p class="salary-2">{{$kiluat}} VND</p>
                <div class="eye-hide">
                    <i class="bi bi-eye-fill hidden"></i>
                </div>
            </div>
            <div class="salary-base summary" style="background-color: #eee">
                <span></span>
                <p class="name">Tổng</p>
                <p class="salary-1">{{$luongcoban * $hesoluong + $khenthuong + $kiluat}} VND</p>
                <p class="salary-2"></p>
                <div class="eye-hide">
                    <i class="bi bi-eye-fill hidden"></i>
                </div>
            </div>
            <div class="muti-btn">
                <button class="">
                    <a href="" class="print-btn" >
                        <i class="bi bi-printer-fill"></i>
                        <p>Xuất</p>
                    </a>
                </button>
                <button class="">
                    <a href="{{route('createLeave')}}" class="exit-btn">
                        <p>Thoát</p>
                    </a>
                </button>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
@endsection
@section('linkjs')
 <script src="/js/salary/pdfsalary.js"></script>
@endsection