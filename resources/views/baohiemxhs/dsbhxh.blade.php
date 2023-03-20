@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="./css/bhxh/dsbhxh.css">
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
    icon: '{{ session('type') }}',
    html: '<span style="font-size: 20px">{{ session('message') }}</span>'
  })
</script>
@endif
    <div class="fluid-container">
        <div>
            <div class="container-tilte-table">
                <div>
                    <h1>Danh sách bảo hiểm</h1>
                </div>
                <div class="title-extrainsurance">
                    <div><p>Danh sách bảo hiểm xã hội</p></div>
                    <div class="search-slect-btn">
                        <div>
                            <select class="form-select" id="chooseSearch">
                                <option value="0">ID</option>
                                <option value="1">Ngày bắt đầu</option>
                                <option value="2">Mức đóng QDTS</option>
                                <option value="3">Mức đóng TNLD</option>
                                <option value="4">Mức đóng HT</option>
                                <option value="5">Mức đóng BHTN</option>
                                <option value="6">Tháng</option>
                            </select>
                        </div>
                        <div>
                            <input class="form-control" type="text" id="myInput" onkeyup="searchBhxh()" placeholder="Nhập thông tin">
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary"><a href="{{route('createBHXH')}}">+ Thêm</a></button>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table table-hover" id="myTable">
                        <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Ngày bắt đầu</th>
                              <th scope="col">Mức đóng QDTS</th>
                              <th scope="col">Mức đóng TNLD</th>
                              <th scope="col">Mức đóng HT</th>
                              <th scope="col">Mức đóng BHTN</th>
                              <th scope="col">Tháng</th>
                              <th>Chức năng</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($insurances as $insurance)
                            <tr>
                                <td>{{$insurance->MaBH}}</td>
                                <td>{{$insurance->NgayBatDau}}</td>
                                <td>{{$insurance->MucDongQDTS}}</td>
                                <td>{{$insurance->MucDongTNLD}}</td>
                                <td>{{$insurance->MucDongHT}}</td>
                                <td>{{$insurance->MucDongBHTN}}</td>
                                <td>{{$insurance->Thang}}</td>  
                                <td>
                                  <a href="{{route('editBHXH',['id' => $insurance->MaBH])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                  <a href="{{route('getInfoBHXH',['id' => $insurance->MaBH])}}"><i class="fa-solid fa-eye"></i></a>
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('linkjs')
    <script src="/js/ListAccEmployee/index.js"></script>
@endsection