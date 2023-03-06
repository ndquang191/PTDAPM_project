@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="/css/dsnv/addbcNv.css">

@endsection
@section('content')
    {{-- <div class="container-all"> --}}
        <div class="fluid-container">
            <form action="">
                <div>
                    <label for="">Tên bằng cấp</label>
                    <input class="degree-name" type="text" value="{{$degree->TenBC}}">
                </div>
                <div class="issue-dateterm">
                    <div>
                        <label for="">Ngày cấp</label>
                        <input type="date" value="{{$degree->NgayCap}}">                
                    </div>
                    <div>
                        <label for="">Thời hạn</label>
                        <input type="date">
                    </div>
                </div>
                <div class="btn-save">
                    <button>Cập nhật</button>
                </div>
            </form>
        </div>
    {{-- </div> --}}
@endsection