@extends('layout.user1')

@section('linkcss')
     <link rel="stylesheet" href="/css/user/hdld.css">
    
@endsection

@section('content')

     <div class="fluid-container hdld-container">
          <div class="hdld_main_container">
               <div class="h5">Thông tin hợp đồng</div>
               <br>
               @if ($contract)
               <div class="fullrow">
                    <div class="title">Loại hợp đồng</div>
                    <div class="value">{{$contract->LoaiHopDong}}</div>
               </div>

               <div class="fullrow">
                    <div class="title">Ngày kí</div>
                    <div class="value">{{$contract->NgayKi}}</div>

                    {{-- <div class="title">Bên A</div>
                    <div class="value">Hợp đồng A</div> --}}
               </div>

               {{-- <div class="fullrow">
                    <div class="title">Tên hợp đồng</div>
                    <div class="value">Hợp đồng A</div>
               </div> --}}

               <div class="fullrow">
                    <div class="title">Ngày bắt đầu hợp đồng</div>
                    <div class="value">{{$contract->NgayBatDau}}</div>

                    <div class="title">Ngày hết hạn hợp đồng</div>
                    <div class="value">{{$contract->NgayKetThuc}}</div>
               </div>

               <div class="fullrow">
                    {{-- <div class="title">Bên B</div>
                    <div class="value">Hợp đồng A</div> --}}

                    <div class="title">Địa điểm làm việc</div>
                    <div class="value">{{$contract->DiaDiem}}</div>
               </div>


               <div class="fullrow">
                    <div class="title">Chuyên môn</div>
                    <div class="value">{{$contract->ChuyenMon}}</div>
               </div>

               
               <div class="fullrow">
                    <div class="title">Lương cơ bản</div>
                    <div class="value">{{$contract->LuongCoBan}}</div>

                    <div class="title">Hệ số lương</div>
                    <div class="value">{{$contract->HeSoLuong}}</div>
               </div>
               @else
                    <h1>Không có hợp đồng</h1>
               @endif
          </div>
     </div>
    
@endsection