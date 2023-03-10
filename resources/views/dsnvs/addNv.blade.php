@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="/css/dsnv/editNv.css">
@endsection
@section('content')
    <div class="fluid-container">
        @if($errors->any())
        <script>
            Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Vui lòng kiểm tra lại thông tin nhân viên',
            showConfirmButton: true,
            confirmButtonText: 'Đóng',
            timer: 3000
          })
        </script>
        {{-- {!! implode('', $errors->all('<div>:message</div>')) !!} --}}
        @endif
        <div class="container">
            <form method="post" action="{{route('storeEmployee')}}" enctype="multipart/form-data">
                @csrf
                <div class="row align-items-start" id="container-form">
                    <div class="col-6 col-md-3">
                        <img src="./image/photo_user.jpg" id="image" alt="">
                    </div>
                    <div class="col-6 col-md-9">
                        <!-- Stack the columns on mobile by making one full-width and the other half-width -->
                        <div class="row align-items-start">
                            <div class="col-6 col-md-4">
                                <label for="imageFile" class="form-label">Chọn ảnh: </label>
                                <input class="form-control" onchange="chooseFile(this)" type="file" id="imageFile" name="image" accept="image/png, image/gif, image/jpeg" />
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="name">Họ và tên nhân viên</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}">
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="gender">Giới tính</label>
                                <div>
                                    <select class="col-md-12" name="gender" id="gender">
                                        <option value="0" hidden>Chọn</option>
                                        <option value="Nam" {{ old('gender') == 'Nam' ? 'selected' : '' }}>Nam</option>
                                        <option value="Nữ" {{ old('gender') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Columns start at 50% wide on mobile and bump up to 33.3% wide on desktop -->
                        <div class="row align-items-start">
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="birthday">Ngày sinh</label>
                                <input class="form-control" type="date" name="birthday" id="birthday" value={{old('birthday')}}>
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="CCCD">Số CMND/Thẻ căn cước</label>
                                <input class="form-control" type="text" name="CCCD" id="CCCD" value={{old('CCCD')}}>
                            </div>
                            <div class="col-6 col-md-4">
                                <label class="form-label" for="nation">Dân tộc</label>
                                <input class="form-control" type="text" id="nation" name="nation" value={{old('nation')}}>
                            </div>
                        </div>
                    </div>
                </div>
                
    
                <div class="row align-items-start">
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="religion">Tôn giáo</label>
                        <input class="form-control" type="text" id="religion" name="religion" value={{old('religion')}}>
                    </div>
                    <div class="col-6 col-md-5">
                        <label class="form-label" for="placeofbirth">Nơi sinh</label>
                        <input class="form-control" type="text" name="placeofbirth" id="placeofbirth" value={{old('placeofbirth')}}>
                    </div>
                    <div class="col-6 col-md-4">
                        <label class="form-label" for="address">Địa chỉ thường trú</label>
                        <input class="form-control" type="text" name="address" id="address" value={{old('address')}}>
                    </div>
                </div>
                
                <!-- Columns are always 50% wide, on mobile and desktop -->
                <div class="row align-items-start">
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="phonenumber">Số điện thoại</label>
                        <input class="form-control" type="text" name="phonenumber" id="phonenumber" value={{old('phonenumber')}}>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email" value={{old('email')}}>
                    </div>
                    <div class="col-6 col-md-3">
                        <label class="form-label" for="">Trình độ học vấn</label>
                        <div>
                            <select class="col-md-12" name="trinhdo">
                                <option value="0" hidden>Chọn</option>
                                <option value="Trình độ 1" {{ old('trinhdo') == 'Trình độ 1' ? 'selected' : '' }}>Trình độ 1</option>
                                <option value="Trình độ 2" {{ old('trinhdo') == 'Trình độ 2' ? 'selected' : '' }}>Trình độ 2</option>
                                <option value="Trình độ 3" {{ old('trinhdo') == 'Trình độ 3' ? 'selected' : '' }}>Trình độ 3</option>
                                <option value="Trình độ 4" {{ old('trinhdo') == 'Trình độ 4' ? 'selected' : '' }}>Trình độ 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <label for="exampleFormControlInput1" class="form-label">Trạng thái</label>
                        <div>
                            <select class="col-md-12" aria-label="Default select example">
                                <option selected>Chọn</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>    
    
                <div class="row align-items-start">
                    <div class="col-6 col-md-4">
                        <label class="form-label" for="">Phòng ban</label>
                        <div>
                            <select class="col-md-12" name="phongban">
                                <option value="0" hidden>Chọn</option>
                                <option value="Phòng ban 1" {{ old('phongban') == 'Phòng ban 1' ? 'selected' : '' }}>Phòng ban 1</option>
                                <option value="Phòng ban 2" {{ old('phongban') == 'Phòng ban 2' ? 'selected' : '' }}>Phòng ban 2</option>
                                <option value="Phòng ban 3" {{ old('phongban') == 'Phòng ban 3' ? 'selected' : '' }}>Phòng ban 3</option>
                                <option value="Phòng ban 4" {{ old('phongban') == 'Phòng ban 4' ? 'selected' : '' }}>Phòng ban 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <label class="form-label" for="">Chức vụ</label>
                        <div>
                            <select class="col-md-12" name="chucvu">
                                <option value="0" hidden>Chọn</option>
                                <option value="Chức vụ 1" {{ old('chucvu') == 'Chức vụ 1' ? 'selected' : '' }}>Chức vụ 1</option>
                                <option value="Chức vụ 2" {{ old('chucvu') == 'Chức vụ 2' ? 'selected' : '' }}>Chức vụ 2</option>
                                <option value="Chức vụ 3" {{ old('chucvu') == 'Chức vụ 3' ? 'selected' : '' }}>Chức vụ 3</option>
                                <option value="Chức vụ 4" {{ old('chucvu') == 'Chức vụ 4' ? 'selected' : '' }}>Chức vụ 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <label class="form-label" for="">Chuyên ngành</label>
                        <div>
                            <select class="col-md-12" name="chuyennganh">
                                <option value="0" hidden >Chọn</option>
                                <option value="Chuyên ngành 1" {{ old('chuyennganh') == 'Chuyên ngành 1' ? 'selected' : '' }}>Chuyên ngành 1</option>
                                <option value="Chuyên ngành 2" {{ old('chuyennganh') == 'Chuyên ngành 2' ? 'selected' : '' }}>Chuyên ngành 2</option>
                                <option value="Chuyên ngành 3" {{ old('chuyennganh') == 'Chuyên ngành 3' ? 'selected' : '' }}>Chuyên ngành 3</option>
                                <option value="Chuyên ngành 4" {{ old('chuyennganh') == 'Chuyên ngành 4' ? 'selected' : '' }}>Chuyên ngành 4</option>
                            </select>
                        </div>
                    </div>
                </div> 
                <div class="update-exit">
                    <button class="btn btn-primary" type="submit" id="btn" value="Show Alert">Lưu</button>
                    <a href="{{route('listEmployee')}}"><button class="btn btn-success" type="button">Thoát</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('linkjs')
    <script src="/js/ListAccEmployee/index.js"></script>
@endsection