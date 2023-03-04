@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="./css/dsnv/addbcNv.css">

@endsection
@section('content')
    <div class="container-all">
        <div class="container">
            <div>
                <label for="">Tên bằng cấp</label>
                <input class="degree-name" type="text">
            </div>
            <div class="issue-dateterm">
                <div>
                    <label for="">Ngày cấp</label>
                    <input type="date">                
                </div>
                <div>
                    <label for="">Thời hạn</label>
                    <input type="date">
                </div>
            </div>
            <div class="btn-save">
                <a href="dsbcnv"><button>Lưu</button></a>
            </div>
        </div>
    </div>
@endsection