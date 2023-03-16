@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="./css/bhxh/dsbhxh.css">
@endsection
@section('content')
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
                                <option value="0">Mã nhân viên</option>
                                <option value="1">Mã BHXH</option>
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
                              <th scope="col">Mã nhân viên</th>
                              <th scope="col">Mã BHXH</th>
                              <th scope="col">Ngày bắt đầu</th>
                              <th scope="col">Ngày kết thúc</th>
                              <th scope="col">Mức đóng</th>
                              <th scope="col">Số điện thoại</th>
                              <th scope="col">Tiền được hưởng</th>
                              <th scope="col">Lịch sử đóng</th>
                              <th>Chức năng</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>2051063710</td>
                              <td>0129722530</td>
                              <td>27/02/2002</td>
                              <td>28/02/2002</td>
                              <td>15000000</td>
                              <td>0382899333</td>
                              <td>36000000</td>
                              <td>Không đóng</td>
                              <td>
                                <a href=""><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{route('getInfoBHXH',['id' => 1])}}"><i class="fa-solid fa-eye"></i></a>
                              </td>
                            </tr>
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