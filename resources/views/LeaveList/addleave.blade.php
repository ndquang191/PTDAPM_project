@extends('layout.app')
@section('linkcss')
<link rel="stylesheet" href="/css/LeaveList/addleave.css">
@endsection
@section('content')
    <div class="fluid-container main_page">
        <div class="container">
        <div style="height: 0.1rem"></div>
        <div class="add-function">
                <a href="/leavelist" class="navigation">Danh Sách nghỉ phép</a>
                <span>></span>
                <p>Thêm nghỉ phép</p>
        </div>
        <form class="form-fle" method="post" action="">
            <div class="grid">
            <div class="mb-3 ">
              <label class="form-label lb-add">Mã nhân viên</label>
              <input type="text" class="form-control ip-add" required>
            </div>
            <div class="mb-3">
              <label class="form-label lb-add">Tên Nhân viên</label>
              <input type="text" class="form-control ip-add">
            </div>
            <div class="mb-3 flex">
                <label class="form-label lb-add">Ngày bắt đầu</label>
                <input type="date" id="date" class="ip-add">
              </div>
              <div class="mb-3 flex">
                <label class="form-label lb-add">Ngày kết thúc</label>
                <input type="date" id="date" class="ip-add">
              </div>
              <div class="mb-3 content flex">
                <label class="form-label lb-add">Nội dung</label>
                    <textarea class="form-control txarea" placeholder="Nội dung xin nghỉ..." id="floatingTextarea2" "></textarea>
              </div>
              <button type="submit" class="btn btn-primary save-btn">Lưu</button>
            </div>
          </form>
        </div>
    </div>
@endsection