@extends('layout.user1')
@section('linkcss')
     <link rel="stylesheet" href="/css/user/detail.css">
@endsection
@section('content')
     <div class="fluid-container user_detail_container">

          <div class="user_detail img_container">
               <img src="/image/avatar_user.jpg" alt="">
               <div class="user_name">{{$employeeInfo->TenNV}}</div>
          </div>


          <div class="user_detail tab_holder">
               <span class="tab_1">Thông tin cá nhân</span>
               <span class="tab_2">Bằng cấp</span>
          </div>

          <div class="detail_info user_detail_tab">
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
                         <div class="input">{{$employeeInfo->TrinhDoHocVan}}</div>
                    </div>
          
               </div>

               
               <div class="d-flex justify-content-between row_3">
                    <div class="row_item">

                         <div class="title_input">Phòng ban</div>
                         <div class="input">{{$employeeInfo->PhongBan}}</div>
                    </div>
                    <div class="row_item">

                         <div class="title_input">Chức vụ</div>
                         <div class="input">{{$employeeInfo->ChucVu}}</div>
                    </div>
                    <div class="row_item">

                         <div class="title_input">Chuyên ngành</div>
                         <div class="input">{{$employeeInfo->ChuyenNganh}}</div>
                    </div>
          
               </div>
          </div>
          <div class="detail_degree user_detail_tab">


          </div>
     </div>


@endsection

@