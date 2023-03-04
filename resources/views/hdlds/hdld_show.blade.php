@extends('layout.app');
{{-- @section('linkcss')
    <link rel="stylesheet" href="/css/hdld/hdld.css">
@endsection --}}

@section('content')
    <div class="add_hdld_main">
        <div class="head_add_hdld_main">
            <h1 class="title_add_htld">Hợp đồng lao động</h1>
        </div>
        <div class="main">
            <form action="" class="form_list_hdld">
                <div class="form_list_item_htld">
                    <div class="form_add_hdld">
                        <label for="" class="form_title_htld">Mã nhân viên</label> <br>
                        <input type="text" name="" id="id" class="form_input_add_htld">
                    </div>
                    <div class="form_add_hdld">
                        <label for="" class="form_title_htld">Loại hợp đồng</label> <br>
                        <input type="text" name="" id="" class="form_input_add_htld">
                    </div>
                    <div class="form_add_hdld">
                        <label for="" class="form_title_htld">Ngày ký</label> <br>
                        <input type="date" name="" id="" class="form_input_add_htld">
                    </div>
                    <div class="form_add_hdld">
                        <label for="" class="form_title_htld">Ngày bắt đầu</label> <br>
                        <input type="date" name="" id="" class="form_input_add_htld">
                    </div>
                    <div class="form_add_hdld">
                        <label for="" class="form_title_htld">Ngày kết thúc</label> <br>
                        <input type="date" name="" id="" class="form_input_add_htld">
                    </div>
                </div>
                <div class="form_list_item_htld">
                    <div class="form_add_hdld">
                        <label for="" class="form_title_htld">Địa điểm làm việc</label> <br>
                        <input type="text" name="" id="" class="form_input_add_htld">
                    </div>
                    <div class="form_add_hdld">
                        <label for="" class="form_title_htld">Chuyên môn</label> <br>
                        <input type="text" name="" id="" class="form_input_add_htld">
                    </div>
                    <div class="form_add_hdld">
                        <label for="" class="form_title_htld">Pháp nhân</label> <br>
                        <input type="text" name="" id="" class="form_input_add_htld">
                    </div>
                    <div class="form_add_hdld">
                        <label for="" class="form_title_htld">Lương cơ bản</label> <br>
                        <input type="text" name="" id="" class="form_input_add_htld">
                    </div>
                    <div class="form_add_hdld">
                        <label for="" class="form_title_htld">Hệ số lương</label> <br>
                        <input type="text" name="" id="" class="form_input_add_htld">
                    </div>
                </div>
            </form>
        </div>
        <div class="bottom_add_hdld">
            <div class="bottom_exit_show">Thoát</div>
        </div>
    </div>
@endsection