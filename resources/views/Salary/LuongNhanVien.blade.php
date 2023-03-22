@extends('layout.user1')
@section('linkcss')
<link rel="stylesheet" href="/css/Salary/detailsalary.css">
<link rel="stylesheet" href="/css/Salary/LuongNhanVien.css">
@endsection
@section('content')
<div class="fluid-container">
    <div class="heading-section">
        <div class="heading-primary">
            <p>Bảng lương nhân viên : {{$user->TenNV}} </p>
        </div>
    </div>
    <div class="container">
        <div class="infor-employee">
            <div class="">
                <div class="infor-box">
                    <div class="img-box">
                        <img src="/image/detailsalary/NgoThiTam.png" alt="">
                    </div>
                    <div class="infor">
                        <P class="idEm">Mã nhân viên:{{$user->MaNV}}</P>
                        <p class="nameEm">{{$user->TenNV}}</p>
                    </div>
                </div>
            </div>
               <div class="fullrow">
                    <button class="btn btn-back primary-btn"><i class="bi bi-caret-left"></i></button>
                    <div class="month-nav">Tháng 5</div>
                    <button class="btn btn-next primary-btn"><i class="bi bi-caret-right"></i></button>
               </div>
        </div>
        <div class="detail-salary">
            <div class="box-black"></div>
            <div class="salary-base box-gray">
                <span>01</span>
                <p class="name">Lương cơ bản</p>
                <p class="salary-1 luongCoBan">{{number_format(intval($luongcoban))}} VND</p>
                <p class="salary-2 heSoLuong">{{$hesoluong}}</p>
                {{-- hệ số lương --}}
                <div class="eye-hide">
                    <p class="salary-1 LuongChinh">{{number_format(intval($luongcoban * $hesoluong))}} VNĐ</p>
                </div>
            </div>
            <div class="salary-base">
                <span>02</span>
                <p class="name">Ngày nghỉ quá hạn</p>
                <p class="salary-2 soTienMat1Ngay">- {{number_format(intval($luongcoban * $hesoluong  / $dayInMonth))}} VND</p>
                <p class="salary-1 soNgayNghi"> {{$leaveDayCount}}</p>
                <div class="eye-hide " >
                    <p class="salary-1 TongSoTienMat">{{number_format(intval($leaveDayCount * $luongcoban * $hesoluong  / $dayInMonth))}}</p>

                </div>
            </div>
            <div class="salary-base box-gray">
                <span>03</span>
                <p class="name">Khen thưởng</p>
                <p class="salary-1">{{number_format($khenthuong)}} VND</p>
                <p class="salary-2"></p>
                <div class="eye-hide">
                    <p class="salary-1 khenthuong">{{number_format($khenthuong)}} VND</p>

                </div>
            </div>
            <div class="salary-base">
                <span>04</span>
                <p class="name">Kỷ luật</p>
                <p class="salary-2">{{number_format($kiluat)}} VND</p>    
                <p class="salary-1"></p>
                <div class="eye-hide">
                    <p class="salary-1 kyluat">{{number_format($kiluat)}} VND</p>

                </div>
            </div>
            <div class="salary-base summary" style="background-color: #eee">
                <span></span>
                <p class="name">Tổng</p>
                <p class="salary-2"></p>
                <div class="eye-hide">
                    {{-- <i class="bi bi-eye-fill hidden"></i> --}}
                </div>
                <p class="salary-1 Total">{{number_format(intval($luongcoban * $hesoluong + $khenthuong + $kiluat - $leaveDayCount * $luongcoban * $hesoluong  / $dayInMonth))}} VND</p>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
@endsection
@section('linkjs')
 <script src="/js/salary/pdfsalary.js"></script>
 <script >
    
const month = document.querySelector('.month-nav')

const backBtn = document.querySelector('.btn-back')
const nextBtn = document.querySelector('.btn-next')

let today = new Date();


function updateStr(){
     const str = "Tháng " + (today.getMonth()+1) + " năm " + (1900 + today.getYear()) ; 
     month.innerHTML = str;

}

backBtn.addEventListener('click' , () => {
     today = new Date(today.setMonth(today.getMonth() - 1 ));

     updateStr()
})


nextBtn.addEventListener('click' , () => {
     today = new Date(today.setMonth(today.getMonth() + 1 ));

     updateStr()
})

updateStr()
 </script>
@endsection