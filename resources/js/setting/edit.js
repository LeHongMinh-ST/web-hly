$(document).ready(function () {
    CKEDITOR.replace('editorContent', options)?.on('change', function () {
        $("#error-content").addClass('display-none')
    })

    $(".datepicker")?.datepicker()

    $('.lfm').each(function () {
        let currentElement = $(this);
        currentElement.filemanager('image', {prefix: '/admin/filemanager'});
        currentElement.on('change', function () {
            $("#error-title").addClass('display-none');
        })
    })
})
