@extends('cms.layout.main')
@section('title')
    Liên hệ - Tập đoàn HLY
@endsection
@section('content')

    <section class="mapContact stagger-up" style="padding-top: 40px;">
        <img src="./assets/fe/images/map.png" style="height: 540px; object-fit: cover; width: 100%">
        <div class="copy">
            <h2>T&#7853;p đoàn HLY</h2>
            <h3>Tr&#7909; s&#7903; chính</h3>
            <p><strong><i class="fas fa-map-marker-alt"></i> Đ&#7883;a ch&#7881;:</strong><span>N02 - LK1, Hà Trì, Phường Hà Cầu, Quận Hà Đông, Thành phố Hà Nội, Việt Nam</span></p>
            <p><strong><i class="fas fa-phone"></i> Đi&#7879;n tho&#7841;i:</strong><span>+84 (24) 0000 0000</span></p>
            <p><strong><i class="fas fa-fax"></i> Fax:</strong><span>+84 (24) 0000 0000</span></p>
        </div>
    </section>
    <div class="formWrap stagger-up">
        <h2 class="title">Liên h&#7879; v&#7899;i chúng tôi</h2>
        <form name="frmContact" class="frmContact" action="/lien-he" method="POST">
            <ul>
                <li><input type="text" name="Name" class="js-required form-control" placeholder="H&#7885; và tên"></li>
                <li><input type="text" name="Address" class="js-required form-control" placeholder="Đ&#7883;a ch&#7881;"></li>
                <li><input type="text" name="Phone" class="js-required js-phone form-control" placeholder="Đi&#7879;n tho&#7841;i"></li>
                <li><input type="text" name="Email" class="js-required js-email form-control" placeholder="Email"></li>
                <li><textarea placeholder="N&#7897;i dung" name="Content"></textarea></li>
                <li>
                    <div class="g-recaptcha" data-sitekey="6Lftwq0UAAAAAD43amX4uFmDmkTvDM7m7KqQpv1v" data-message="Vui lòng nh&#7845;n ch&#7885;n &quot;Tôi không ph&#7843;i robot&quot;"></div>
                </li>
            </ul>
            <div class="btnwrap">
                <input name="__RequestVerificationToken" type="hidden" value="OaqP-KgeFfn1k_8FbT812SVX7-XplvdpYigFw4YjuSKzSjgrl5PqdUUawjP3s3eHQOqzG3b_jpe27hETyQfFI6FK95-nmL7bE9p7DBEuUbE1" />
                <a class="btn btn-submit" href="#"><span>G&#7917;i n&#7897;i dung</span></a>
            </div>
        </form>
    </div>
    <script src="https://www.google.com/recaptcha/api.js?hl=vi" async defer></script>
@endsection
