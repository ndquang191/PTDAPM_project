@extends('layout.user1')


@section('linkcss')
     <link rel="stylesheet" href="/css/user/index.css">
@endsection

@section('content')
     @if (session('message'))
     <script>
          Swal.fire({
               icon: 'error',
               title: '{{session('message')}}',
               timer: 2000,
          })
     </script>
     @endif
<div class="container-fluid user_homepage">
     <div class="homepage-container">
          <a href="{{route('showInfoUser')}}" class="user_box_item">
               <i class="bi bi-person-vcard"></i>
               <span>Thông tin cá nhân</span>
          </a>
          <a href="{{route('showContractUser')}}" class="user_box_item">
               <i class="bi bi-file-earmark"></i>
               <span>Hợp đồng lao động</span>
          </a>
          <a href="{{route('showInsuranceUser')}}" class="user_box_item">
               <i class="bi bi-shield-plus"></i>
               <span>Bảo hiểm xã hội</span>
          </a>
          <a href="{{route('showLeaveUser')}}" class="user_box_item">
               <i class="bi bi-calendar2-plus"></i>
               <span>Nghỉ phép</span>
          </a>
          <a href="{{route('showEvaluateUser')}}" class="user_box_item">
               <i class="bi bi-clipboard-data"></i>
               <span>Đánh giá</span>
          </a>

          <a href="{{route('showSalaryUser')}}" class="user_box_item">
               <i class="bi bi-wallet-fill"></i>

               <span>Lương</span>
          </a>

     </div>
</div>

@endsection
