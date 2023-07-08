$(document).ready(function () {
    CKEDITOR.replace('editorContent', options).on('change', function () {
        $("#error-content").addClass('display-none')
    })

    // $("#message").on('change', function () {
    //     $("#error-message").addClass('display-none')
    // })

    $('.btn-open-reply').click(function () {
        $(this).addClass('display-none')
        $('.form-reply').removeClass('display-none')
    })

    $('.btn-close-reply').click(function () {
        $('.form-reply').addClass('display-none')
        $('.btn-open-reply').removeClass('display-none')
    })
})
