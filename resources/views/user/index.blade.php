@extends('layout.user1')


@section('linkcss')
     <link rel="stylesheet" href="./css/user/index.css">
@endsection
@section('content')
<div class="container-fluid user_homepage">
     <div class="homepage-container">
          <a href="{{route('showInfo')}}" class="user_box_item">
               <i class="bi bi-person-vcard"></i>
               <span>Thông tin cá nhân</span>
          </a>
          <a href="" class="user_box_item">
               <i class="bi bi-file-earmark"></i>
               <span>Hợp đồng lao động</span>
          </a>
          <a href="" class="user_box_item">
               <i class="bi bi-file-earmark"></i>
               <span>Bảo hiểm xã hội</span>
          </a>
          <a href="" class="user_box_item">
               <i class="bi bi-calendar2-plus"></i>
               <span>Nghỉ phép</span>
          </a>
          <a href="{{route('showEvaluate')}}" class="user_box_item">
               <i class="bi bi-clipboard-data"></i>
               <span>Đánh giá</span>

          </a>

     </div>
</div>

@endsection
