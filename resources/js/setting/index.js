$(document).ready(function () {
    $('#setting-table').on('click', '.btn-delete', function () {
        const id = $(this).attr('data-id')
        swal({
            title: "Bạn có chắc chắn?",
            text: "Dữ liệu sau khi xóa không thể phục hồi!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#FF7043",
            confirmButtonText: "Đồng ý!",
            cancelButtonText: "Đóng!"
        }, async function (value) {
            if (value) {
                const url = `/admin/settings/${id}`
                const deleteButtonQuerySelector = '#frm-delete'
                $(deleteButtonQuerySelector).get(0).setAttribute('action', url)
                $(deleteButtonQuerySelector).submit()
            }
        })
    })

})
