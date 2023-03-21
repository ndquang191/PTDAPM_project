@extends('layout.user1')

@section('linkcss')
     <link rel="stylesheet" href="/css/user/hdld.css">
    
@endsection

@section('content')

     <div class="fluid-container hdld-container">
          <div class="hdld_main_container">
               <div class="h5">Thông tin bảo hiểm</div>
               <br>
               @if ($insurance)

               {{-- <div class="fullrow">
                    <div class="title">ID</div>
                    <div class="value">{{$insurance->MaBH}}</div>
               </div> --}}

               <div class="fullrow">
                    <div class="title">Ngày bắt đầu</div>
                    <div class="value">{{$insurance->NgayBatDau}}</div>
               </div>

               <div class="fullrow">
                    <div class="title">Mức đóng TNLD</div>
                    <div class="value">{{$insurance->MucDongTNLD}}</div>

                    <div class="title">Mức đóng QDTS</div>
                    <div class="value">{{$insurance->MucDongQDTS}}</div>
               </div>

               <div class="fullrow">
                    <div class="title">Mức đóng HT</div>
                    <div class="value">{{$insurance->MucDongHT}}</div>

                    <div class="title">Mức đóng BHTN</div>
                    <div class="value">{{$insurance->MucDongBHTN}}</div>
               </div>

               <div class="fullrow">
                    <div class="title">Tháng</div>
                    <div class="value">5</div>
               </div>
               @else
                    <h1>Không có bảo hiểm</h1>
               @endif
          </div>
     </div>
    
@endsection