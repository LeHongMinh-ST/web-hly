@extends('cms.layout.main')
@section('title')
    Liên hệ - Tập đoàn HLY
@endsection
@section('content')

    <section class="mapContact stagger-up" >
    <iframe style="width: 100%; height: 600px;"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d329.3071982872466!2d105.78408276636873!3d20.965135468526267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad2ae5a35ab9%3A0x98d0fb2dd90f4554!2zNTAtNTIgTmfDtSBIw6AgVHLDrCAyLCBIw6AgQ-G6p3UsIEjDoCDEkMO0bmcsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1676704693945!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="copy">
            <h2>T&#7853;p đoàn HLY</h2>
            <h3>Tr&#7909; s&#7903; chính</h3>
            <p><strong><i class="fas fas fa-thumbs-up"></i> Đ&#7883;a ch&#7881;:</strong><span>N02 - LK1, Hà Trì, Phường Hà Cầu, Quận Hà Đông, Thành phố Hà Nội, Việt Nam</span></p>
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
                <a class="btn btn-submit" style="background-color: #008155" href="#"><span>G&#7917;i n&#7897;i dung</span></a>
            </div>
        </form>
    </div>
    <script src="https://www.google.com/recaptcha/api.js?hl=vi" async defer></script>
@endsection
