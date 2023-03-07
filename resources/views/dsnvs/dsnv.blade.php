@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="./css/dsnv/dsNv.css">
@endsection
@section('content')
    <div class="fluid-container">
      @if (session('add_success'))
      {{-- modal --}}
      @endif
        <div class="container-header">
            <div class="header-content">
                <div><a class="tab-hosonv" href="">Danh sách nhân viên</a></div>
                <div class="btn-add">
                    <a href="{{route('addEmployeePage')}}"><button>+ Thêm</button></a>
                </div>
            </div>
        </div>
        <div class="table-search-bar">
          <div class="search-bar">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Tìm kiếm">
            <select id="chooseSearch">
              <option value="0">Mã nhân viên</option>
              <option value="1">Họ tên</option>
              <option value="2">Số điện thoại</option>
              <option value="3">Phòng ban</option>
              <option value="4">Chức vụ</option>
              <option value="5">Trạng thái</option>
          </select>
          </div>
          <table class="table" id="myTable">
            <thead>
              <tr>
                <th>Mã nhân viên</th>
                <th>Họ tên</th>
                <th>Số điện thoại</th>
                <th>Phòng ban</th>
                <th>Chức vự</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($employees as $employee)
                <tr>
                  <td>{{$employee->MaNV}}</td>
                  <td>{{$employee->TenNV}}</td>
                  <td>{{$employee->SDT != null ? $employee->SDT : "Trống"}}</td>
                  <td>{{$employee->PhongBan != null ? $employee->PhongBan : "Trống"}}</td>
                  <td>{{$employee->ChucVu != null ? $employee->ChucVu : "Trống"}}</td>
                  <td>{{$employee->TrangThai == 1 ? "Đang làm việc" : "Ngừng làm việc"}}</td>
                  <td>
                    <a class="show" href="{{route('getEmployeeInfo',['id' => $employee->MaNV])}}"><i class="fa-solid fa-eye"></i></a>
                    <a href=""><i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
<script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue, e, giatri, stt;
    e = document.getElementById("chooseSearch");
    giaTri = e.options[e.selectedIndex].text;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    if(giaTri == "Mã nhân viên"){
      stt = 0;
    }
    if(giaTri == "Họ tên"){
      stt = 1;
    }
    if(giaTri == "Số điện thoại"){
      stt = 2;
    }
    if(giaTri == "Phòng ban"){
      stt = 3;
    }
    if(giaTri == "Chức vụ"){
      stt = 4;
    }
    if(giaTri == "Trạng thái"){
      stt = 5;
    }
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[stt];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
  </script>
@endsection

@section('linkjs')
  <script src="./js/...."></script>
@endsection