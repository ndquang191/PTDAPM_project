@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="/css/dsnv/bcNv.css">

@endsection
@section('content')
    <div class="fluid-container">
        <div class="container-header">
            <div class="header-content">
                <div><a class="tab-hosonv" href="dsnv">Hồ sơ nhân viên</a></div>
                <div><a class="tab-bangcap" href="">Bằng cấp nhân viên</a></div>
            </div>
            <div class="btn-add">
                <a href="{{route('addDegreeForm',['id' => $employee->MaNV])}}"><button>+ Thêm</button></a>
            </div>
        </div>
        <table class="table">
            <thead>
              <tr>
                <td>Họ và tên</td>
                <td>Tên bằng cấp</td>
                <td>Ngày cấp</td>
                <td>Thời hạn</td>
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
                    <td></td>
                    <td>
                        <a class="show" href="{{route('editDegreeForm',['id' => $employee->MaNV,'degreeID' => $degree->MaBC])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href=""><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
              @endif
            </tbody>
          </table>
    </div>
@endsection