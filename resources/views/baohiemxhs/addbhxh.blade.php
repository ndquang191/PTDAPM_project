@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="/css/bhxh/infobhxh.css">
@endsection
@section('content')
@if (session('message'))
    <script>
            Swal.fire({
                position: 'center',
                icon: '{{session('type')}}',
                title: '{{session('message')}}',
                showConfirmButton: true,
                confirmButtonText: 'Đóng',
                timer: 3000
            })
    </script>
@endif
@if($errors->any())
<script>
    Swal.fire({
    position: 'center',
    icon: 'error',
    title: '{{$errors->first()}}',
    showConfirmButton: true,
    confirmButtonText: 'Đóng',
    timer: 3000
  })
</script>
@endif
    <div class="fluid-container">
        <div class="container-tilte-table">
            <div class="socialInsuranceList-addSocialInsurance">
                <div><a href="{{route('showListBHXH')}}">Danh sách bảo hiểm xã hội</a></div>
                <div> > </div>
                <div>Thêm bảo hiểm xã hội</div>
            </div>
        </div>
        <div class="form">
            <form action="{{route('storeBHXH')}}" method="POST">
                @csrf
                <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="ID">ID</label>
                            <input class="form-control" type="number" min="1" id="ID" name="ID">
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="startDate">Ngày bắt đầu</label>
                            <input class="form-control" type="date" name="startDate" id="startDate">
                        </div>
                    </div>
                </div>
                
                <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="QDTS">Mức đóng QDTS</label>
                            <input class="form-control" type="number" id="QDTS" name="QDTS" min="0">
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="TNLD">Mức đóng TNLD</label>
                            <input class="form-control" type="number" id="TNLD" name="TNLD" min="0">
                        </div>
                    </div>
                </div>
                
                <!-- Columns are always 50% wide, on mobile and desktop -->
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="HT">Mức đóng HT</label>
                            <input class="form-control" type="number" id="HT" name="HT" min="0">
                        </div>
                    </div>
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="BHTN">Mức đóng BHTN</label>
                            <input class="form-control" type="number" id="BHTN" name="BHTN" min="0">
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-6 col-md-6">
                        <div>
                            <label class="form-label" for="month">Tháng</label>
                            <input class="form-control" type="number" id="month" name="month" min="1" max="12">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <button class="btn btn-danger"><a href="{{route('showListBHXH')}}">Thoát</a></button>
                        <button class="btn btn-primary" type="submit">Lưu</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
