<script type="text/javascript" src="{{asset('assets/admin/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/fe/js/libraries/sweetalert.min.js')}}"></script>
<script>
    $(document).ready(function () {
        @if(\session()->has('success'))
            console.log('Success')
        setTimeout(()=>{
            swal("Thành công", "Gửi yêu cầu thành công", "success");
        }, 1500);
        @endif

        @if(\session()->has('error'))
        console.log('Success')
        setTimeout(()=>{
            swal("Thất bại", "Gửi yêu cầu thất bại", "warning");
        }, 1500);
        @endif
    })

</script>

