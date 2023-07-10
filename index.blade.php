<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Project</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <!--START THE NAVBAR SECTION-->
    <div class="row">
        @include('includes.drop_quanly')

        <!--START INFO SECTION-->
        <div class="col-md-9">
            <section class="vh-100" style="background-color: #f4f5f7;">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col col-lg-6 mb-4 mb-lg-0">
                            <div class="card mb-3" style="border-radius: .5rem;">
                                <div class="row g-0">
                                    <div class="col-md-4 gradient-custom text-center text-white"
                                        style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava1-bg.webp"
                                            alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                        <h5>Marie Horwitz</h5>
                                        <p>Web Designer</p>
                                        <i class="far fa-edit mb-5"></i>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body p-4">
                                            <h6>Thông tin</h6>
                                            <hr class="mt-0 mb-4">
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6 class="text-muted">Tên</h6>
                                                    <p class="text-muted">{{ Session::get('user')->name }}</p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Email</h6>
                                                    <p class="text-muted">{{ Session::get('user')->email }}</p>
                                                </div>
                                            </div>
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Giới tính</h6>
                                                    <p class="text-muted">{{ Session::get('user')->gender}}</p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <h6>Số điện thoại</h6>
                                                    <p class="text-muted">{{ Session::get('user')->sdt}}</p>
                                                </div>
                                            </div>
                                            <div class="row pt-1">
                                                <div class="col-6 mb-3">
                                                    <h6>Địa chỉ</h6>
                                                    <p class="text-muted">{{ Session::get('user')->address}}</p>
                                                </div>
                                               
                                            </div>
                                            <h6>Chức vụ</h6>
                                            @if( Session::get('user')->role ==1 )
                                            <p>Admin</p>
                                            @else
                                            <p>Nhân viên</p>
                                            @endif
                                            <h6>Đổi mật khẩu</h6>
                                            <hr class="mt-0 mb-4">
                                            <!-- Email input -->
                                            <form id="form-change-pass">
                                            @csrf
                                            <div class="form-outline mb-4">
                                                <input type="password" name="pass" id="password" class="form-control" />
                                                <label class="form-label" for="password">Mật khẩu cũ</label>
                                            </div>

                                            <!-- Password input -->
                                            <div class="form-outline mb-4">
                                                <input type="password" name="newpass" id="newpassword" class="form-control" />
                                                <label class="form-label" for="newpassword">Mật khẩu mới</label>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="password"  id="renewpassword" class="form-control" />
                                                <label class="form-label" for="renewpassword">Nhập lại mật khẩu mới</label>
                                            </div>
                                            <button type="button" class= "js-submit-change-pass btn btn-primary btn-block mb-4">Xác
                                                nhận</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script>
        $('.js-submit-change-pass').click(function(){
           
            let $newpass= $('#newpassword').val();
            let $renewpass =$('#renewpassword').val();
            if($newpass != $renewpass){
                alert("Mật khẩu mới nhập lại chưa khớp !");
            }else{
              let $data = $('#form-change-pass').serialize();
                $.ajax({
                url: "{{ route('change_pass') }}",
                type: "POST",
                data: $data,
                success: function (data) {
                    if (data.status == 1) {
                        alert('mật khẩu thay đổi thành công');
                        location.reload();
                    } else {
                        alert('mật khẩu cũ bạn nhập vào sai');
                    }
                }
            });
            }
        })
    </script>
</body>

</html>
