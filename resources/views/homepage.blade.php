@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/homepage/index.css">
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
    <div class="fluid-container homepage-content">
      <div class="container_item">
        <div class="container_list_item" {{Auth::user()->QuyenTruyCap == 'admin1' ? '' : 'style=display:none;'}}>
            <a href="{{route('showListAccount')}}" class="link_list_item">
              <i class="bi bi-people"></i>
              <span>Tài khoản</span>
            </a>
        </div>
        <div class="container_list_item" {{Auth::user()->QuyenTruyCap == 'admin1' ? '' : 'style=display:none;'}}>
            <a href="{{route('listEmployee')}}" class="link_list_item">
              <i class="bi bi-person-lock"></i>

              <span>Nhân viên</span>
            </a>
        </div>
        <div class="container_list_item" {{Auth::user()->QuyenTruyCap == 'admin1' ? '' : 'style=display:none;'}}>
            <a href="{{route('showListHDLD')}}" class="link_list_item">
              <i class="bi bi-files"></i>
              <span>Hợp đồng lao động</span>
            </a>
        </div>
        <div class="container_list_item" {{Auth::user()->QuyenTruyCap == 'admin2' ? '' : 'style=display:none;'}}>
            <a href="{{route('showListApproveLeave')}}" class="link_list_item">
              <i class="bi bi-calendar-check"></i>
              <span>Nghỉ phép</span>
            </a>
        </div>
        <div class="container_list_item" {{Auth::user()->QuyenTruyCap == 'admin2' ? '' : 'style=display:none;'}}>
            <a href="{{route('showSalary')}}" class="link_list_item">
              <i class="bi bi-wallet"></i>

              <span>Tiền lương</span>
            </a>
        </div>
        <div class="container_list_item" {{Auth::user()->QuyenTruyCap == 'admin2' ? '' : 'style=display:none;'}}>
            <a href="{{route('showListBHXH')}}" class="link_list_item">
              <i class="bi bi-shield-plus"></i>
              <span>Bảo hiểm</span>
            </a>
        </div>
        <div class="container_list_item" {{Auth::user()->QuyenTruyCap == 'admin2' ? '' : 'style=display:none;'}}>
            <a href="{{route('showListEvaluate')}}" class="link_list_item">
              <i class="bi bi-clipboard2-data"></i>
              <span>Đánh giá nhân viên</span>
            </a>
        </div>
      </div>
    </div>
@endsection