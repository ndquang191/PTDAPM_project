@extends('layout.app')
@section('linkcss')
<link rel="stylesheet" href="/css/LeaveList/historyleave.css">
@endsection
@section('content')
<div class="fluid-container">

    <div class="container">
        <h1 class="heading">Danh sách nghỉ phép</h1>
        <div class="add-function">
        <div class="flex-row">
            <a href="{{route('showListLeave')}}" class="navigation">Danh sách đã xét duyệt</a>
            <span>></span>
            <p>Lịch sử nghỉ phép</p>
        </div>
            <button>
                <a href="{{route('showListLeave')}}" class="add-btn">
                    <p>Quay lại</p>
                </a>
            </button>
        </div>
        <div class="flex-infor">
          <div class="infor-employee">
            <div class="infor-box">
              <div class="img-box">
              </div>
              <div class="infor">
                <P>Mã nhân viên : 2051060698</P>
                <p>Nguyễn Hà Thái</p>
              </div>
            </div>
          </div>
          <div class="infor-leave">
            <span class="leave-legal">Số ngày nghỉ phép/Tổng trong năm : 2/XXX</span>
            <span class="leave-unlegal">Số ngày nghỉ không phép : XXX</span>
          </div>
          </div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Ngày bắt đầu</th>
                    <th scope="col">Ngày kết thúc</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Chi tiết</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td scope="row">01</td>
                    <td>02/07/2023</td>
                    <td>03/07/2023</td>
                    <td>Có phép</td>
                    <td class="muti-btn">
                      <a  href="">
                          <i class="bi bi-eye-fill edit"></i>
                          {{-- sang xem đơn nghỉ phép --}}
                      </a>
                  </td>
                  </tr>
                  <tr>
                    <td scope="row">01</td>
                    <td>07/06/2023</td>
                    <td>08/06/2023</td>
                    <td>Có phép</td>
                    <td class="muti-btn">
                      <a  href="">
                          <i class="bi bi-eye-fill edit"></i>
                          {{-- sang xem đơn nghỉ phép --}}
                      </a>
                  </td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
    @endsection