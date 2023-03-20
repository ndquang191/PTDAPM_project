@extends('layout.user1')

@section('linkcss')
     <link rel="stylesheet" href="/css/user/hdld.css">
    
@endsection

@section('content')

     <div class="fluid-container hdld-container">
          <div class="hdld_main_container">
               <div class="h5">Thông tin bảo hiểm</div>
               <br>
               @if ($contract)

               <div class="fullrow">
                    <div class="title">ID</div>
                    <div class="value">10002</div>
               </div>

               <div class="fullrow">
                    <div class="title">Ngày bắt đầu</div>
                    <div class="value">27/02/2003</div>
               </div>

               <div class="fullrow">
                    <div class="title">Mức đóng TNLD</div>
                    <div class="value">88888888</div>

                    <div class="title">Mức đóng QDTS</div>
                    <div class="value">999999999</div>
               </div>

               <div class="fullrow">
                    <div class="title">Mức đóng HT</div>
                    <div class="value">7777777</div>

                    <div class="title">Mức đóng BHTN</div>
                    <div class="value">666666</div>
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