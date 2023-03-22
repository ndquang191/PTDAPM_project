@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="/css/bhxh/infobhxh.css">
@endsection
@section('content')
    <div class="fluid-container">
        <div class="container-tilte-table">
            <div class="socialInsuranceList-addSocialInsurance">
                <div><a href="{{route('showListBHXH')}}">Danh sách bảo hiểm xã hội</a></div>
                <div> > </div>
                <div>Sửa thông bảo hiểm xã hội</div>
            </div>
        </div>
        <div class="form">
            <form action="{{route('updateBHXH',['id' => $contract->MaBH])}}" method="POST">
                @csrf
                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="">ID</label>
                            <input class="form-control" type="number" value="{{$contract->MaBH}}"  readonly>
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="startDate">Ngày bắt đầu</label>
                            <input class="form-control" type="date" id="startDate" name="startDate" value="{{$contract->NgayBatDau}}">
                        </div>
                    </div>
                </div>
                
                <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="QDTS">Mức đóng QDTS</label>
                            <input class="form-control" type="number" id="QDTS" name="QDTS" value="{{$contract->MucDongQDTS}}" min="0">
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="TNLD">Mức đóng TNLD</label>
                            <input class="form-control" type="number" id="TNLD" name="TNLD" value="{{$contract->MucDongTNLD}}" min="0">
                        </div>
                    </div>
                </div>
                
                <!-- Columns are always 50% wide, on mobile and desktop -->
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="HT">Mức đóng HT</label>
                            <input class="form-control" type="number" id="HT" name="HT" value="{{$contract->MucDongHT}}" min="0">
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="BHTN">Mức đóng BHTN</label>
                            <input class="form-control" type="number" id="BHTN" name="BHTN" value="{{$contract->MucDongBHTN}}" min="0">
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="month">Tháng</label>
                            <input class="form-control" type="number" name="month" id="month" value="{{$contract->Thang}}" min="1" max="12">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <button class="btn btn-danger"><a href="{{route('showListBHXH')}}">Thoát</a></button>
                        <button class="btn btn-primary" type="submit">Thay đổi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
