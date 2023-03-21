@extends('layout.app')
@section('linkcss')
<link rel="stylesheet" href="/css/LeaveList/DuyetDon.css">
@endsection
@section('content')
    <div class="fluid-container main_page">
        <div class="container">
        <div style="height: 0.1rem"></div>
        <div class="add-function">
                <a href="{{route('showListLeave')}}" class="navigation">Danh Sách chờ xét duyệt</a>
                <span>></span>
                <p>Duyệt đơn</p>
        </div>
        <form class="form-fle" method="post" action="">
            @csrf
            <div class="grid">
              <div class="mb-3 ">
                <label class="form-label lb-add">Mã nghỉ phép</label>
                <input type="text" class="form-control ip-add input-id" name="" readonly>
              </div>
            <div class="mb-3 ">
              <label class="form-label lb-add">Mã nhân viên</label>
              <input type="text" class="form-control ip-add input-id" name="" readonly>
            </div>
            <div class="mb-3">
              <label class="form-label lb-add">Tên Nhân viên</label>
              <input type="text" class="form-control ip-add input-name" name="" readonly>
            </div>
            <div class="mb-3 ">
              <label class="form-label lb-add">Có phép</label>
              <input type="text" class="form-control ip-add input-id" name="" readonly>
            </div>
            <div class="mb-3 flex">
                <label class="form-label lb-add">Ngày bắt đầu</label>
                <input type="date" id="date" class="ip-add" name="" readonly>
              </div>
              <div class="mb-3 flex">
                <label class="form-label lb-add">Ngày kết thúc</label>
                <input type="date" id="date" class="ip-add" name="" readonly>
              </div>
              <div class="mb-3 content flex">
                <label class="form-label lb-add">Nội dung</label>
                  <input class="form-control ip-add" placeholder="Nội dung xin nghỉ..." id="floatingTextarea2" " name="" readonly>
              </div>
            <div class="flex-btn">
              <div class="btn btn-primary save-btn">
                <a href="{{route('showListLeave')}}">
                  Thoát
                </a>
              </div>
                <button type="submit" class="btn btn-primary save-btn color-blue">Duyệt đơn</button>
            </div>
            </div>
          </form>
        </div>
    </div>
@endsection
@section('linkjs')
@endsection