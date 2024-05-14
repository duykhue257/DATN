@extends('layouts.client.layout_account')
@section('content')
<section class="border shadow rounded-custom py-2 px-4">
    <div class="pt-4">
        <h6 style="font-weight: 500;">Thông tin tài khoản</h6>
        <p>Bạn có thể cập nhật thông tin của mình ở trang này</p>
    </div>
    <hr>
    <div>
        <div class="row">
            <div class="col-md">
                <h6 class="mb-4" style="font-weight: 500;">Thông tin đăng nhập</h6>

                <div>
                    <div class="d-flex">
                        <p class="mr-2">Email: </p>
                        <p style="font-weight: 500;">{{  $user->email }}</p>
                    </div>
                    <div class="d-flex">
                        <p class="mr-2">Số điện thoại: </p>
                        <p style="font-weight: 500;">{{  $user->phone }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="toggleFormCheckbox">
                        <label class="form-check-label" for="defaultCheck1" id="toggleFormCheckbox">
                            Đổi mật khẩu
                        </label>
                    </div>
                </div>

                <form class="d-none" id="myForm">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mật khẩu mới<span style="color: red;">
                                *</span></label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nhập lại mật khẩu mới<span
                                style="color: red;"> *</span></label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-dark btn-block mb-4">
                        CẬP NHẬT
                    </button>
                </form>
                <!-- Form ẩn hiện -->
                <script>
                    document.getElementById('toggleFormCheckbox').addEventListener('change', function() {
                        var form = document.getElementById('myForm');
                        if (this.checked) {
                            form.classList.remove('d-none');
                        } else {
                            form.classList.add('d-none');
                        }
                    });
                </script>

                {{-- <div class="d-flex"><p class="mr-2" >Hạng hội viên:</p><p style="font-weight: 500;">Silver</p></div> --}}
            </div>

            <div class="col">
                <h6 class="mb-4" style="font-weight: 500;">Thông tin cá nhân</h6>
                <form class="row g-3">
                    <div class="col-12 mb-4">
                        <label for="inputFirstName" class="form-label">Họ và tên<span style="color: red;"> *</span></label>
                        <input type="text" class="form-control" id="inputFirstName" placeholder="Nguyễn Văn A">
                    </div>
                    <div class="col-12 mb-4">
                        <label for="inputEmail" class="form-label">Email<span style="color: red;"> *</span></label>
                        <input type="text" class="form-control" id="inputEmail" placeholder="admin@gmail.com" disabled>
                    </div>
                    <div class="col-12 mb-4">
                        <label for="inputNumber" class="form-label">Số điện thoại<span style="color: red;"> *</span></label>
                        <input type="text" class="form-control" id="inputNumber" placeholder="0123456789">
                    </div>
                    <div class="col-12 mb-4">
                        <div><label for="inputSex" class="form-label">Giới tính<span style="color: red;">
                            *</span></label></div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                value="option1">
                            <label class="form-check-label" for="inlineRadio1">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                value="option2">
                            <label class="form-check-label" for="inlineRadio2">Nữ</label>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <label for="inputBirthDay" class="form-label">Sinh nhật<span style="color: red;">
                            *</span></label>
                        <input type="date" class="form-control" id="inputBirthDay">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-dark btn-block">
                            CẬP NHẬT THÔNG TIN
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
</section>
   <style>
    .rounded-custom{
        border-radius: 20px;
    }
</style>
@endsection


