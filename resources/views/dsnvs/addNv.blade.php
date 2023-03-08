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
        <div class="header-content">
            <div><a class="tab-hosonv" href="">Hồ sơ nhân viên</a></div>
            <div><a class="tab-bangcap" href="">Bằng cấp nhân viên</a></div>
        </div>
        <form class="body-content" method="post" action="{{route('storeEmployee')}}" enctype="multipart/form-data">
            @csrf
            <div class="inf-user">
                <div>
                    <img src="./image/photo_user.jpg" id="image" alt="">
                </div>
                <div>
                    <div>
                        <label for="imageFile" >Chọn ảnh: </label>
                        <input onchange="chooseFile(this)" type="file" id="imageFile" name="image" accept="image/png, image/gif, image/jpeg" />
                    </div>
                    <div>
                        <label for="birthday">Ngày sinh</label>
                        <input type="date" name="birthday" id="birthday" value={{old('birthday')}}>
                    </div>
                    <div>
                        <label for="name">Họ và tên nhân viên</label>
                        <input type="text" id="name" name="name" value="{{old('name')}}">
                    </div>
                    <div>
                        <label for="CCCD">Số CMND/Thẻ căn cước</label>
                        <input type="text" name="CCCD" id="CCCD" value={{old('CCCD')}}>
                    </div>
                </div>
                <div>
                    <div>  
                        <label for="gender">Giới tính</label>
                        <select name="gender" id="gender">
                            <option value="0" hidden>Chọn</option>
                            <option value="Nam" {{ old('gender') == 'Nam' ? 'selected' : '' }}>Nam</option>
                            <option value="Nữ" {{ old('gender') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                        </select>
                    </div>
                    <div>
                        <label for="nation">Dân tộc</label>
                        <input type="text" id="nation" name="nation" value={{old('nation')}}>
                    </div>
                </div>
            </div>

            <div class="religion-placeofbirth-permanentaddress">
                <div class="religion">
                    <label for="religion">Tôn giáo</label>
                    <input type="text" id="religion" name="religion" value={{old('religion')}}>
                </div>
                <div class="placeofbirth">
                    <label for="placeofbirth">Nơi sinh</label>
                    <input type="text" name="placeofbirth" id="placeofbirth" value={{old('placeofbirth')}}>
                </div>
                <div class="permanentaddress">
                    <label for="address">Địa chỉ thường trú</label>
                    <input type="text" name="address" id="address" value={{old('address')}}>
                </div>
            </div>

            <div class="phonenumber-email-qualification-status">
                <div class="phonenumber">
                    <label for="phonenumber">Số điện thoại</label>
                    <input type="text" name="phonenumber" id="phonenumber" value={{old('phonenumber')}}>
                </div>
                <div class="email">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value={{old('email')}}>
                </div>
                <div class="qualification">
                    <label for="">Trình độ học vấn</label>
                    <select name="trinhdo">
                        <option value="0" hidden>Chọn</option>
                        <option value="Trình độ 1" {{ old('trinhdo') == 'Trình độ 1' ? 'selected' : '' }}>Trình độ 1</option>
                        <option value="Trình độ 2" {{ old('trinhdo') == 'Trình độ 2' ? 'selected' : '' }}>Trình độ 2</option>
                        <option value="Trình độ 3" {{ old('trinhdo') == 'Trình độ 3' ? 'selected' : '' }}>Trình độ 3</option>
                        <option value="Trình độ 4" {{ old('trinhdo') == 'Trình độ 4' ? 'selected' : '' }}>Trình độ 4</option>
                    </select>
                </div>
            </div>
            <div class="department-position-specialty">
                <div>
                    <label for="">Phòng ban</label>
                    <select name="phongban">
                        <option value="0" hidden>Chọn</option>
                        <option value="Phòng ban 1" {{ old('phongban') == 'Phòng ban 1' ? 'selected' : '' }}>Phòng ban 1</option>
                        <option value="Phòng ban 2" {{ old('phongban') == 'Phòng ban 2' ? 'selected' : '' }}>Phòng ban 2</option>
                        <option value="Phòng ban 3" {{ old('phongban') == 'Phòng ban 3' ? 'selected' : '' }}>Phòng ban 3</option>
                        <option value="Phòng ban 4" {{ old('phongban') == 'Phòng ban 4' ? 'selected' : '' }}>Phòng ban 4</option>
                    </select>
                </div>
                <div>
                    <label for="">Chức vụ</label>
                    <select name="chucvu">
                        <option value="0" hidden>Chọn</option>
                        <option value="Chức vụ 1" {{ old('chucvu') == 'Chức vụ 1' ? 'selected' : '' }}>Chức vụ 1</option>
                        <option value="Chức vụ 2" {{ old('chucvu') == 'Chức vụ 2' ? 'selected' : '' }}>Chức vụ 2</option>
                        <option value="Chức vụ 3" {{ old('chucvu') == 'Chức vụ 3' ? 'selected' : '' }}>Chức vụ 3</option>
                        <option value="Chức vụ 4" {{ old('chucvu') == 'Chức vụ 4' ? 'selected' : '' }}>Chức vụ 4</option>
                    </select>
                </div>
                <div>
                    <label for="">Chuyên ngành</label>
                    <select name="chuyennganh">
                        <option value="0" hidden >Chọn</option>
                        <option value="Chuyên ngành 1" {{ old('chuyennganh') == 'Chuyên ngành 1' ? 'selected' : '' }}>Chuyên ngành 1</option>
                        <option value="Chuyên ngành 2" {{ old('chuyennganh') == 'Chuyên ngành 2' ? 'selected' : '' }}>Chuyên ngành 2</option>
                        <option value="Chuyên ngành 3" {{ old('chuyennganh') == 'Chuyên ngành 3' ? 'selected' : '' }}>Chuyên ngành 3</option>
                        <option value="Chuyên ngành 4" {{ old('chuyennganh') == 'Chuyên ngành 4' ? 'selected' : '' }}>Chuyên ngành 4</option>
                    </select>
                </div>
            </div>
            <div class="btn-save-exit">
                <div>
                    <button class="save" type="submit" id="btn" value="Show Alert">Lưu</button>
                    <a href="{{route('listEmployee')}}"><button class="exit" type="button">Thoát</button></a>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('linkjs')
    <script src="/js/ListAccEmployee/index.js"></script>
@endsection