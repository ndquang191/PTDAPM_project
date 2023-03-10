@extends('layout.app')
@section('linkcss')
    <link rel="stylesheet" href="/css/danhgia/danhgia.css">
@endsection
@section('content')
<div class="fluid-contaier">
    <div class="danhgia_main_container">
        <div class="header_main">
            <div class="title_main">
                <h2 class="title_danhgia">ĐÁNH GIÁ NHÂN VIÊN</h2>
            </div>
        </div>
        <div class="danhgia_title">
            <h5>Danh sách đánh giá</h5>
        </div>
        <div class="input_search">
            <form action="">
            <thead>
                <input type="text" name="search" id="myInput" placeholder="Tìm kiếm ..." class="form_input" >
            </form>
            <a href="#" class="search_btn" onclick="myFunction()">
                <i class="bi bi-search icon_color_search"></i>
            </a>
        </div>
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Mã nhân viên</th>
                    <th scope="col">Tên nhân viên</th>
                    <th scope="col">Người quyết định</th>
                    <th scope="col">Nội dung</th>
                    <th scope="col">Giá trị</th>
                    <th scope="col">Chức năng</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2051063754</td>
                    <td>Nguyễn Như Minh</td>
                    <td>07/07/2023</td>
                    <td>Khen thưởng</td>
                    <td>Giá trị</td>
                    <td>
                        <a href="{{route('addEvaluate')}}">
                            <i class="bi bi-plus-square icon_color"></i>
                        </a>
                        <a href="{{route('editEvaluate',['id' => 1])}}">
                            <i class="bi bi-pencil-square icon_color"></i>
                        </a>
                        {{-- <a href="#">
                            <i class="bi bi-trash icon_color"></i>
                        </a> --}}
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>2051060698</td>
                    <td>Nguyễn Hà Thái</td>
                    <td>07/03/2023</td>
                    <td>Khen thưởng</td>
                    <td>Giá trị</td>
                    <td>
                        <a href="#">
                            <i class="bi bi-plus-square icon_color"></i>
                        </a>
                        <a href="#">
                            <i class="bi bi-pencil-square icon_color"></i>
                        </a>
                        {{-- <a href="#">
                            <i class="bi bi-trash icon_color"></i>
                        </a> --}}
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