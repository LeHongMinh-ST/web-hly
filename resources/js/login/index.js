const idBtnLogin = $('#btn-login')
$(document).ready(function () {
    $("#username").change(function(){
        $("#error-username").addClass('display-none')
    })

    $("#password").change(function(){
        $("#error-password").addClass('display-none')
    })

    idBtnLogin.keyup(function (e) {
        if (e.keyCode === 13) {
            $(this).trigger("enterKey");
        }
    });
    idBtnLogin.bind("enterKey", function (e) {
        $('#loginForm').submit()
    });
})
