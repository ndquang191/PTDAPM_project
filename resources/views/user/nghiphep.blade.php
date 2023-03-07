@extends('layout.user1')

@section('linkcss')
     <link rel="stylesheet" href="./css/user/nghiphep.css">
@endsection


@section('content')

     <div class="fluid-container nghiphep_container">
          <div class="nghiphep_main_container">
               <div class="h5">Thông tin nghỉ phép</div>


               <div class="fullrow">
                    <button class="btn btn-back primary-btn"><i class="bi bi-caret-left"></i></button>
                    <div class="month-nav">Tháng 5</div>
                    <button class="btn btn-next primary-btn"><i class="bi bi-caret-right"></i></button>
               </div>


               <div class="fullrow info-row">
                    <div class="info-remainday">Số ngày nghỉ có phép còn lại trong năm : <span>10</span></div>
               </div>



               <table class="table table-nghiphep table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Ngày kết thúc</th>
                        <th scope="col">Số ngày nghỉ</th>
                        <th scope="col">Lý do</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                    </tbody>
                  </table>
          </div>
     </div>



@endsection


@section('linkjs')
     <script src="./js/user/nghiphep.js"></script>
@endsection