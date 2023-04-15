$(document).ready(function () {
    CKEDITOR.replace('editorContent', options).on('change', function () {
        $("#error-content").addClass('display-none')
    })

    $(".datepicker").datepicker()

    $('#lfm').filemanager('image', {prefix: '/admin/filemanager'});

    $("#title").on('change', function () {
        $("#error-title").addClass('display-none')
    })

})
