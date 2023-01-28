$(document).ready(function () {
    CKEDITOR.replace('editorContent', options)

    $(".datepicker").datepicker()

    $('#lfm').filemanager('image', {prefix: '/admin/filemanager'});
})
