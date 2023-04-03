$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#form-profile').on('click', '.btn-change-password', function () {
        Swal.fire({
            title: 'Đổi mật khẩu',
            html: `
            <input type="password" name="password" id="passwordCurrent" class="form-control swal2-input" placeholder="Mật khẩu hiện tại">
            <input type="password" id="passwordNew" class="swal2-input" placeholder="Mật khẩu mới">
            <input type="password" id="passwordNewConfirm" class="swal2-input" placeholder="Xác nhận mật khẩu mới">`,
            confirmButtonText: 'Sign in',
            focusConfirm: false,
            preConfirm: async () => {
                const password = Swal.getPopup().querySelector('#passwordCurrent').value
                const passwordNew = Swal.getPopup().querySelector('#passwordNew').value
                const passwordNewConfirm = Swal.getPopup().querySelector('#passwordNewConfirm').value
                if (!password || !passwordNewConfirm || !passwordNew) {
                    Swal.showValidationMessage(`Không được để trống thông tin!`)
                } else if(passwordNewConfirm != passwordNew) {
                    Swal.showValidationMessage(`Xác nhận mật khẩu mơi không chính xác`)
                } else {
                    try {
                        const res = await checkPassword(password)
                        console.log(res?.result);
                        if(!res?.result) Swal.showValidationMessage(`Mật khâu hiện tại không chính xác`)
                        else changePassword({
                            password, 'newPassword': passwordNew
                        })
                    } catch (e) {
                        Swal.showValidationMessage(`Lỗi xác thực mật khẩu`)
                    }

                }
            }
        })

        const checkPassword = async (password) => {
            return $.ajax({
                url: '/admin/profile/exist-password/' ,
                type: 'POST',
                data: {
                    password: password,
                },
            })
        }

        const changePassword = ({password, newPassword}) => {
            $('#password-form-change').val(password);
            $('#new-password-form-change').val(newPassword);
            const url = `/admin/profile/change-password`;
            $('#frm-change-password').get(0).setAttribute('action', url)
            $('#frm-change-password').submit()
        }

})})
