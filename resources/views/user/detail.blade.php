@extends('layout.user1')
@section('linkcss')
     <link rel="stylesheet" href="/css/user/detail.css">
@endsection
@section('content')
     <div class="fluid-container user_detail_container">

          <div class="user_detail img_container">
               @if ($employeeInfo->HinhAnh == null)
                    <img src="/image/avatar_user.jpg" alt="">  
               @else
                    <img src="data:image/jpeg;base64,{{ base64_encode($employeeInfo->HinhAnh) }}" alt="Image">    
               @endif
               
               <div class="user_name">{{$employeeInfo->TenNV}}</div>
          </div>


          <div class="user_detail tab_holder">
               <span class="tab_1 active">Thông tin cá nhân</span>
               <span class="tab_2">Bằng cấp</span>
          </div>

          <div class="detail_info user_detail_tab show">
               <div class="d-flex justify-content-between row_4">
                    <div class="row_item">

                         <div class="title_input">Tên</div>
                         <div class="input">{{$employeeInfo->TenNV}}</div>
                    </div>
                    <div class="row_item">

                         <div class="title_input">Dân tộc</div>
                         <div class="input">{{$employeeInfo->DanToc}}</div>
                    </div>
                    <div class="row_item">

                         <div class="title_input">Tôn giáo</div>
                         <div class="input">{{$employeeInfo->TonGiao}}</div>
                    </div>
                    <div class="row_item">

                         <div class="title_input">Giới tính</div>
                         <div class="input">{{$employeeInfo->GioiTinh == 0 ? "Nam" : "Nữ"}}</div>
                    </div>
               </div>

               <div class="d-flex justify-content-between row_3">
                    <div class="row_item">

                         <div class="title_input">Nơi sinh</div>
                         <div class="input">{{$employeeInfo->NoiSinh}}</div>
                    </div>
                    <div class="row_item">

                         <div class="title_input">Địa chỉ</div>
                         <div class="input">{{$employeeInfo->DiaChi}}</div>
                    </div>
                    <div class="row_item">

                         <div class="title_input">CCCD</div>
                         <div class="input">{{$employeeInfo->CCCD}}</div>
                    </div>
          
               </div>

               <div class="d-flex justify-content-between row_3">
                    <div class="row_item">

                         <div class="title_input">SĐT</div>
                         <div class="input">{{$employeeInfo->SDT}}</div>
                    </div>
                    <div class="row_item">

                         <div class="title_input">Email</div>
                         <div class="input">{{$employeeInfo->Email}}</div>
                    </div>
                    <div class="row_item">

                         <div class="title_input">Trình độ học vấn</div>
                         <div class="input">{{$employeeInfo->TrinhDoHocVan->TrinhDoChuyenMon}}</div>
                    </div>
          
               </div>

               
               <div class="d-flex justify-content-between row_3">
                    <div class="row_item">

                         <div class="title_input">Phòng ban</div>
                         <div class="input">{{$employeeInfo->PhongBan->TenPhongBan}}</div>
                    </div>
                    <div class="row_item">

                         <div class="title_input">Chức vụ</div>
                         <div class="input">{{$employeeInfo->ChucVu->TenCV}}</div>
                    </div>
                    <div class="row_item">

                         <div class="title_input">Chuyên ngành</div>
                         <div class="input">{{$employeeInfo->ChuyenNganh}}</div>
                    </div>
          
               </div>
          </div>
          <div class="detail_degree user_detail_tab">
               <table class="table table-striped">
                    <thead>
                         <tr>
                              <th scope="col">STT</th>
                              <th scope="col">Tên bằng cấp</th>
                              <th scope="col">Loại bằng cấp</th>
                              <th scope="col">Ngày cấp</th>
                         </tr>
                    </thead>
                <tbody>
                    <?php $count = 0 ?>
                    @foreach ($degrees as $degree)
                    <?php $count++ ?>
                         <tr>
                              <td scope="col">{{$count}}</td>
                              <td scope="col" class="tbc">{{$degree->TenBC}}</td>
                              <td scope="col">{{$degree->LoaiBC}}</td>
                              <td scope="col">{{$degree->NgayCap}}</td>
                         </tr>
                    @endforeach
                </tbody>
                </table>

          </div>
     </div>


@endsection

@section('linkjs')
     <script src="/js/user/detail.js"></script>
    
@endsection