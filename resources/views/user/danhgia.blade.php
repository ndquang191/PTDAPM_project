@extends('layout.user1')

@section('linkcss')
     <link rel="stylesheet" href="./css/user/danhgia.css">
@endsection


@section('content')

     <div class="fluid-container danhgia_container">
          <div class="danhgia_main_container">
               <div class="h5">Danh sách khen thưởng / Kỉ luật</div>


               <table class="table table-nghiphep table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Nội dung</th>
                        <th scope="col">Ngày quyết định</th>
                        <th scope="col">Mức khen thưởng / kỉ luật</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
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