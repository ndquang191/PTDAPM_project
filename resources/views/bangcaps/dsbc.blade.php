@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="/css/dsnv/bcNv.css">
    {{-- <link rel="stylesheet" href="/css/dsnv/editNv.css"> --}}
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
    icon: 'success',
    html: '<span style="font-size: 20px">{{ session('message') }}</span>'
  })
</script>
@endif
@if($errors->any())
<script>
    Swal.fire({
    position: 'center',
    icon: 'error',
    title: '{{$errors->first()}}',
    showConfirmButton: true,
    confirmButtonText: 'Đóng',
    timer: 3000
  })
</script>
@endif
    <div class="fluid-container">
        <div class="container-header">
            <div class="header-content">
                <div><a class="tab-hosonv" href="{{route('getEmployeeInfo',['id' => $employee->MaNV])}}">Hồ sơ nhân viên</a></div>
                <div><a class="tab-bangcap active" href="{{route('showDegree',['id' => $employee->MaNV])}}">Bằng cấp nhân viên</a></div>
            </div>
                {{-- <a href="{{route('addDegreeForm',['id' => $employee->MaNV])}}"><button>+ Thêm</button></a> --}}
            <div class="btn-add">
                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Thêm</button>

                {{-- Modal thêm --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-body">
                          <form method="post" action="{{route('storeDegree',['id' => $employee->MaNV])}}">
                            @csrf
                            <div class="mb-3">
                              <label for="tenBC" class="col-form-label">Tên bằng cấp</label>
                              <textarea class="form-control" id="tenBC" name="tenbangcap"></textarea>
                            </div>
                            <div class="mb-3 bottom-info">
                                <div class="left info">

                                    <label for="ngaycap" class="col-form-label">Ngày cấp</label>
                                    <input type="date" class="form-control" id="ngaycap" name="ngaycap">
                                </div>
                                <div class="right info">
                                        <label class="col-form-label" for="inputGroupSelect01">Loại bằng cấp</label>
                                        <select class="form-select" id="inputGroupSelect01" name="loaibangcap">
                                          <option value="Bằng Tiếng Anh" selected>Bằng Tiếng Anh</option>
                                          <option value="Bằng Tin Học">Bằng Tin Học</option>
                                          <option value="Bằng cấp Chuyên Môn">Bằng cấp Chuyên Môn</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Thoát</button>
                            <button type="submit" class="btn btn-primary btn-lg">Lưu</button>
                        </div>
                    </form>
                      </div>
                    </div>
                  </div>
            </div>
           
        </div>
        <table id="table-infor" class="table">
            <thead>
              <tr>
                <td>Họ và tên</td>
                <td>Tên bằng cấp</td>
                <td>Ngày cấp</td>
                <td>Loại Bằng Cấp</td>
                <td>Hành động</td>
              </tr>
            </thead>
            <tbody>
              @if (count($degrees) == 0)
                  <h4>Không có bản ghi</h4>
              @else
                  @foreach ($degrees as $degree)
                  <tr>
                    <td>{{$employee->TenNV}}</td>
                    <td>{{$degree->TenBC}}</td>
                    <td>{{$degree->NgayCap}}</td>
                    <td>{{$degree->LoaiBC}}</td>
                    <td>
                        {{-- <a class="show" href="{{route('editDegreeForm',['id' => $employee->MaNV,'degreeID' => $degree->MaBC])}}"></a> --}}

                        <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModalEdit" data-bs-whatever="@mdo"><i class="fa-solid fa-pen-to-square"></i></a>

                        {{-- Modal sửa --}}
                        <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-body">
                                <form method="get" action="{{route('editDegreeForm',['id' => $employee->MaNV,'degreeID' => $degree->MaBC])}}">
                                  @csrf
                                  <div class="mb-3">
                                    <label for="tenBC" class="col-form-label">Tên bằng cấp</label>
                                    <textarea class="form-control" id="tenBC" name="tenbangcap">{{$degree->TenBC}}</textarea>
                                  </div>
                                  <div class="mb-3 bottom-info">
                                      <div class="left info">
      
                                          <label for="ngaycap" class="col-form-label">Ngày cấp</label>
                                          <input type="date" class="form-control" id="ngaycap" name="ngaycap" value="{{$degree->NgayCap}}">
                                      </div>
                                      <div class="right info">
                                              <label class="col-form-label" for="inputGroupSelect01">Loại bằng cấp</label>
                                              <select class="form-select" id="inputGroupSelect01" name="loaibangcap">
                                                <option value="Bằng Tiếng Anh" {{ $degree->LoaiBC == 'Bằng Tiếng Anh'  ? 'selected' : ''}}>Bằng Tiếng Anh</option>
                                                <option value="Bằng Tin Học" {{ $degree->LoaiBC == 'Bằng Tin Học'  ? 'selected' : ''}}>Băng cấp 2</option>
                                                <option value="Bằng cấp Chuyên Môn" {{ $degree->LoaiBC == 'Bằng cấp Chuyên Môn'  ? 'selected' : ''}}>Băng cấp 3</option>
                                              </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Thoát</button>
                                  <button type="submit" class="btn btn-primary btn-lg">Thêm mới</button>
                              </div>
                          </form>
                            </div>
                          </div>
                        </div>

                        <a href="" class="delete-btn" data-id={{$degree->MaBC}}><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
              @endif
            </tbody>
        </table>
        <form action="" id="delete-form" method="post" style="display: none">
            @csrf
        </form>
        <script>
            const deleteBTN = document.querySelectorAll('.delete-btn');
            const deleteForm = document.getElementById('delete-form')
            deleteBTN.forEach(btn => {
                btn.addEventListener('click', (e)=>{
                    e.preventDefault()
                    Swal.fire({
                    title: 'Xác nhận xóa bằng cấp ?',
                    showCancelButton: true,
                    confirmButtonText: 'Xóa',
                    }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.setAttribute('action',`/employee/degree/${btn.getAttribute('data-id')}/delete`)
                        deleteForm.submit();
                    }
                })
                })
            });
        </script>
    </div>
    <script>
        function myFunction() {
          document.getElementById("table-infor").style.display = "none";
          document.getElementById("tab-bangcap").style.display = "none";
          document.getElementById("body-content").style.display = "block";
        }
        function myFunction2() {
          document.getElementById("table-infor").style.display = "block";
          document.getElementById("tab-bangcap").style.display = "block";
          document.getElementById("body-content").style.display = "none";
        }
      </script>
@endsection