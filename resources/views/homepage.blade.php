@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/homepage/index.css">
@endsection
@section('content')
<div class="main_page">
    <div class="fluid-container">
      <div class="container_item">
        <div class="container_list_item">
          <div class="box_list_item">
            <a href="#" class="link_list_item">
              <i class="fa-regular fa-address-card"></i>
              <span>Thông tin cá nhân</span>
            </a>
          </div>
        </div>
        <div class="container_list_item">
          <div class="box_list_item">
            <a href="#" class="link_list_item">
              <i class="fa-regular fa-address-card"></i>
              <span>Hợp đồng lao động</span>
            </a>
          </div>
        </div>
        <div class="container_list_item">
          <div class="box_list_item">
            <a href="#" class="link_list_item">
              <i class="fa-solid fa-id-badge"></i>
              <span>Bằng cấp</span>
            </a>
          </div>
        </div>
        <div class="container_list_item">
          <div class="box_list_item">
            <a href="#" class="link_list_item">
              <i class="fa-solid fa-calendar-xmark"></i>
              <span>Nghỉ phép</span>
            </a>
          </div>
        </div>
        <div class="container_list_item">
          <div class="box_list_item">
            <a href="#" class="link_list_item">
              <i class="fa-solid fa-user-plus"></i>
              <span>Khen thưởng</span>
            </a>
          </div>
        </div>
        <div class="container_list_item">
          <div class="box_list_item">
            <a href="#" class="link_list_item">
              <i class="fa-solid fa-user-xmark"></i>
              <span>Kỷ luật</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>   
@endsection