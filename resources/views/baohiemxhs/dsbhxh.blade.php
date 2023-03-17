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
                            <tr>
                              <td>1</td>
                              <td>27/02/2002</td>
                              <td>20000</td>
                              <td>15000000</td>
                              <td>15000000</td>
                              <td>36000000</td>
                              <td>1</td>
                              <td>
                                <a href="/editbhxh"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="/showbhxh"><i class="fa-solid fa-eye"></i></a>
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