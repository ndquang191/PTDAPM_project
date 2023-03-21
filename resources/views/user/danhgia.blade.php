@extends('layout.user1')

@section('linkcss')
     <link rel="stylesheet" href="/css/user/danhgia.css">
@endsection


@section('content')

     <div class="fluid-container danhgia_container">
          <div class="danhgia_main_container">
               <div class="h5">Danh sách khen thưởng / Kỉ luật</div>


               <table class="table table-nghiphep table-striped">
                    <thead>
                      <tr>
                        <th scope="col-4">Nội dung</th>
                        <th scope="col-4">Ngày quyết định</th>
                        <th scope="col-4">Mức khen thưởng / kỉ luật</th>
                      </tr>
                    </thead>
                    <tbody>
                         @if (count($evaluates) == 0)
                             <tr>
                              <td>Không có bản ghi</td>
                             </tr>
                         @else 
                             @foreach ($evaluates as $evaluate)
                             <tr>
                              <td>{{$evaluate->NoiDung}}</td>
                              <td>{{$evaluate->NgayQuyetDinh}}</td>
                              <td>{{$evaluate->Giatri}}</td>
                            </tr>
                             @endforeach
                         @endif
                    </tbody>
                  </table>
          </div>
     </div>



@endsection


@section('linkjs')
     <script src="./js/user/nghiphep.js"></script>
@endsection