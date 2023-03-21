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
            <a href="{{route('showListApproveLeave')}}" class="navigation">Danh sách đã xét duyệt</a>
            <span>></span>
            <p>Lịch sử nghỉ phép</p>
        </div>
            <button>
                <a href="{{route('showListApproveLeave')}}" class="add-btn">
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
                <P>Mã nhân viên : {{$employee->MaNV}}</P>
                <p>{{$employee->Ten}}</p>
              </div>
            </div>
          </div>
          <div class="infor-leave">
            <span class="leave-legal">Số ngày nghỉ phép/Tổng trong năm : {{$cophep >= 20 ? "20" : $cophep}}/20</span>
            <span class="leave-unlegal">Số ngày nghỉ không phép : {{$khongphep}}</span>
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
                  <?php $count = 0?>
                  @foreach ($leaves as $leave)
                  <?php $count++ ?>
                  <tr>
                    <td scope="row">{{$count}}</td>
                    <td>{{$leave->NgayBatDau}}</td>
                    <td>{{$leave->NgayKetThuc}}</td>
                    <td>{{$leave->CoPhep == 1 ? 'Có phép' : 'Không phép'}}</td>
                    <td class="muti-btn">
                      <a href="{{route('showDetailLeave',['id' => $leave->MaNP])}}">
                          <i class="bi bi-eye-fill edit"></i>
                          {{-- sang xem đơn nghỉ phép --}}
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
    @endsection