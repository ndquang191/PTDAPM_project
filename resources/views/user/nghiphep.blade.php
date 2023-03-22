@extends('layout.user1')

@section('linkcss')
     <link rel="stylesheet" href="/css/user/nghiphep.css">
@endsection


@section('content')
@if (session('message'))
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  Toast.fire({
    icon: '{{session('type')}}',
    html: '<span style="font-size: 20px">{{ session('message') }}</span>'
  })
</script>
@endif
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
                

                    <button type="button" class="btn btn-primary send-req" data-bs-toggle="modal" data-bs-target="#exampleModal">
                         Gửi yêu cầu
                       </button>
                       
                       <!-- Modal -->
                       <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h1 class="modal-title fs-5" id="exampleModalLabel">Yêu cầu nghỉ phép</h1>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                   <form class="form-fle" method="post" action="{{route('storeLeaveRequest')}}">
                                        @csrf
                                        <div class="grid">
                                        <div class="mb-3 ">
                                          <label class="form-label lb-add">Mã nhân viên</label>
                                          <input type="text" class="form-control ip-add input-id" value='{{$user->MaNV}}' name="MaNV" readonly>
                                          {{-- <p class="error hidden"><?php echo $user->tenNV?></p> --}}
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label lb-add">Tên Nhân viên</label>
                                          <input type="text" class="form-control ip-add input-name" value='{{$user->TenNV}}' readonly>
                                        </div>
                                        <div class="mb-3 flex">
                                            <label class="form-label lb-add">Ngày bắt đầu</label>
                                            <input type="date" id="date" class="ip-add" name="startDate">
                                          </div>
                                          <div class="mb-3 flex">
                                            <label class="form-label lb-add">Ngày kết thúc</label>
                                            <input type="date" id="date" class="ip-add" name="endDate">
                                          </div>
                                          <div class="mb-3 content flex mb-4">
                                             <label class="form-label lb-add"  for="floatingTextarea2">Lý do</label>

                                                <select class="form-select ip-add" id="floatingTextarea2" name="reason">
                                                  <option value="Lý do 1" selected>Lý do 1</option>
                                                  <option value="Lý do 2">Lý do 2</option>
                                                  <option value="Lý do 3">Lý do 3</option>
                                                </select>
                                          </div>
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                          <button type="submit" class="btn btn-primary">Gửi yêu cầu</button>    
                                        </div>
                                      </form>
                             </div>
                               
                           </div>
                         </div>
                       </div>
                       
               </div>


               <table class="table table-nghiphep table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Ngày kết thúc</th>
                        <th scope="col">Loại</th>
                        <th scope="col">Lý do</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($leaves as $leave)
                      <tr>
                        <td>{{$leave->NgayBatDau}}</td>
                        <td>{{$leave->NgayKetThuc}}</td>
                        <td>{{$leave->CoPhep == 1 ? 'Có phép' : 'Không phép'}}</td>
                        <td>{{$leave->NoiDung}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
          </div>
     </div>



@endsection


@section('linkjs')
{{-- <script type="module" src="/js/config.js"></script> --}}
<script  type="module" src="../js/user/nghiphep.js"></script>
     {{-- <script src="/js/Leave/fetchApi.js"></script> --}}
@endsection