@extends('layout.app')

@section('linkcss')
    <link rel="stylesheet" href="./css/bhxh/infobhxh.css">
@endsection
@section('content')
    <div class="fluid-container">
        <div class="container-tilte-table">
            <div class="socialInsuranceList-addSocialInsurance">
                <div><a href="">Danh sách bảo hiểm xã hội</a></div>
                <div> > </div>
                <div><a href="">Thêm bảo hiểm xã hội</a></div>
            </div>
        </div>
        <form action="" class="form-information">
            <div class="socialInsuranceInformation">
                <div class="employeeCode-socialInsuranceCode">
                    <div>
                        <label for="">Mã nhân viên</label>
                        <input type="text">
                    </div>
                    <div>
                        <label for="">Mã BHXH</label>
                        <input type="text">
                    </div>
                </div>
                <div class="startDate-endDate">
                    <div>
                        <label for="">Ngày bắt đầu</label>
                        <input type="text">
                    </div>
                    <div>
                        <label for="">Ngày kết thúc</label>
                        <input type="text">
                    </div>
                </div>
                <div class="closingLevel-phoneNumber">
                    <div>
                        <label for="">Mức đóng</label>
                        <input type="text">
                    </div>
                    <div>
                        <label for="">Số điện thoại</label>
                        <input type="text">
                    </div>
                </div>
                <div class="bonusMoney">
                    <div>
                        <label for="">Tiền được thưởng</label>
                        <input type="text">
                    </div>
                </div>
                <div class="btn-save">
                    <button>Lưu</button>
                </div>
            </div>
        </form>
    </div>
@endsection
