@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/hdld/hdld.css">
@endsection
@section('content')
    <div class="fluid-contaier">
        <div class="header_main">
            <div class="tilte_main">
                Danh sách hợp đồng lao động
            </div>
            <div class="add_btn">
                <a href="{{URL::to('hdld/hdld_add')}}" class="link_add_btn"> + Thêm</a>
            </div>
        </div>
        <div class="hdld_main_container">
            <div class="input_search">
                {{-- <form action=""> --}}
                <input type="text" name="search" id="myInput" placeholder="Tìm kiếm ..." class="form_input" onkeyup="myFunction()">
                {{-- </form> --}}
                <a href="#" class="search_btn" onclick="myFunction()">
                    <i class="bi bi-search icon_color_search"></i>
                </a>
            </div>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã nhân viên</th>
                        <th scope="col">Số hợp đồng</th>
                        <th scope="col">Loại hợp đồng</th>
                        <th scope="col">Ngày ký</th>
                        <th scope="col">Ngày bắt đầu</th>
                        <th scope="col">Ngày kết thúc</th>
                        <th scope="col">Địa điểm làm việc</th>
                        <th scope="col">Chuyên môn</th>
                        <th scope="col"></th>
    
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2051063724</td>
                        <td>1</td>
                        <td>Xác định thời hạn</td>
                        <td>18-2-2020</td>
                        <td>18-2-2020</td>
                        <td>20-2-2023</td>
                        <td>ĐH Thủy Lợi cơ sở 1</td>
                        <td>Toán cao cấp</td>
                        <td>
                            <a href="{{URL::to('hdld/hdld_show')}}">
                                <i class="bi bi-eye-fill icon_color"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-trash icon_color"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2051063728</td>
                        <td>2</td>
                        <td>Xác định thời hạn</td>
                        <td>18-2-2021</td>
                        <td>18-2-2021</td>
                        <td>20-2-2023</td>
                        <td>ĐH Thủy Lợi cơ sở 2</td>
                        <td>Toán cao cấp</td>
                        <td>
                            <a href="#">
                                <i class="bi bi-eye-fill icon_color"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-trash icon_color"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2051063762</td>
                        <td>3</td>
                        <td>Xác định thời hạn</td>
                        <td>18-2-2020</td>
                        <td>18-2-2020</td>
                        <td>20-2-2023</td>
                        <td>ĐH Thủy Lợi cơ sở 1</td>
                        <td>Toán cao cấp</td>
                        <td>
                            <a href="#">
                                <i class="bi bi-eye-fill icon_color"></i>
                            </a>
                            <a href="#">
                                <i class="bi bi-trash icon_color"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('linkjs')
    <script src="/js/hdld/hdld.js"></script>
@endsection