$(document).ready(function () {
    $("#name").change(function(){
        $("#error-name").addClass('display-none')
    });

    $("#btn-clone-supplier").on("click", function () {
        const form_supplier = $("*[name='warpp-form-suppperli-tmp']").clone()
        form_supplier.attr('name', $('.warpp-form-suppperli').length +1);
        const btnDelete = form_supplier.find('.btn-delete-suppperli')
        const inputImage = form_supplier.find('.input-image')
        const aTagImg = form_supplier.find('.lfm')
        const previewImage = form_supplier.find('.image-preview')
        const inputName = form_supplier.find('.input-name-brand')
        inputName.attr('name', 'nameBrand[]')
        inputImage.attr({
            'id': `input-image-${$('.warpp-form-suppperli').length +1}`,
            'name': 'imgBrand[]'
        })
        aTagImg.attr({
            'data-input': `input-image-${$('.warpp-form-suppperli').length +1}`,
            'data-preview': `holder-image-${$('.warpp-form-suppperli').length +1}`
        })
        previewImage.attr('id', `holder-image-${$('.warpp-form-suppperli').length +1}`)

        $(btnDelete).on('click', function() {
            var parentElement = $(this).parent();
            parentElement.remove();
            console.log(parentElement)
        })
        $("#multiple-form-supplier").append(
            form_supplier
        )
        aTagImg.filemanager('image', {prefix: '/admin/filemanager'});
    })

    CKEDITOR.replace('editorContent', options).on('change', function () {
        $("#error-content").addClass('display-none')
    })

    $(".datepicker").datepicker()

    $('.lfm').each(function () {
        let currentElement = $(this);
        currentElement.filemanager('image', {prefix: '/admin/filemanager'});
        currentElement.on('change', function () {
            $("#error-title").addClass('display-none');
        })
    })

    $('.btn-delete-suppperli').on('click', function() {
        var parentElement = $(this).parent();
        parentElement.remove();
        console.log(parentElement)
    })
});
