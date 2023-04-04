$(document).ready(function () {
    CKEDITOR.replace('editorContent', options).on('change', function () {
        $("#error-content").addClass('display-none')
    })

    // $("#message").on('change', function () {
    //     $("#error-message").addClass('display-none')
    // })

})
