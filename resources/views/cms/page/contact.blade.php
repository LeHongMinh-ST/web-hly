@extends('cms.layout.main')
@section('title')
    Liên hệ - Tập đoàn HLY
@endsection
@section('content')
<div>

    <section class="mapContact stagger-up" >
        <img src="./assets/fe/images/contact.jpg" style="width: 100%;"/>
        <div style="display: flex; width: 100%; height: 100px; background-color: #0e6447; font-size: 20px; padding: 0 50px; color: #ffffff;">
        <div style="max-width: 1300px; margin: auto; display: flex; justify-content: space-between" >
            <div style="width: 30%; font-size: 30px; font-weight: bold;">
                Tìm hiểu thêm và kết nối
            </div>
            <div style="width: 60%; font-size: 18px; font-weight: 400">
                Để tìm hiểu thêm về  HLY, về các chuyên gia tư vấn, các dịch vụ cung cấp và đánh giá tiềm năng cơ hội phát triển, chúng tôi rất hân hạnh khi được kết nối với quý doanh nghiệp.
            </div>
        </div>
    </div>
    </section>
    <div class="" style="width: 100%; margin: auto; display: flex; justify-content: space-between;  ">
        <div class="address" style="width: 40%; background-color: #f3f3f5; display: flex; justify-content: end; padding-top: 70px; ">
            <div style="width: 60%;">
            <p style="font-weight: bold; ">
                Hà Nội - Trụ sở chính
            </p><br/>
            <p>
                FPT Tower, 10 Phạm Văn Bạch, P. Dịch Vọng, Q. Cầu Giấy, Hà Nội, Việt Nam
            </p><br/>
            <p style="font-weight: bold; ">
                Hà Nội - Trụ sở chính
            </p><br/>
            <p>
                FPT Tower, 10 Phạm Văn Bạch, P. Dịch Vọng, Q. Cầu Giấy, Hà Nội, Việt Nam
            </p>
            </div>
        </div>
        <!-- <div class="form"> -->
        <div class="formWrap stagger-up" style="width: 60%; padding: 30px 0;">
        <h2 class="" style="font-size: 30px; font-weight: bold; text-align: center">Vui lòng điền vào mẫu đơn bên dưới để nhận thêm thông tin về các dịch vụ cung cấp của chúng tôi</h2>
        <form name="frmContact" class="" style="margin-top: 30px; display: flex; flex-direction: column; gap: 20px;" action="/lien-he" method="POST" >
           <div style="display: flex;  gap: 40px;">
            <div style="width: 50%;">
                    <label for="fullname">Tên *</label>
                    <input class="form-control" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="fullname"  />
                </div>
                <div style="width: 50%;">
                    <label for="fullname">Họ *</label>
                    <input class="form-control" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="fullname"  />
                </div>
           </div>
           <div style="display: flex;  gap: 40px;">
            <div style="width: 50%;">
                    <label for="fullname">Email doanh nghiệp *</label>
                    <input class="form-control" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="fullname"  />
                </div>
                <div style="width: 50%;">
                    <label for="fullname">Số điện thoại *</label>
                    <input class="form-control" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="fullname"  />
                </div>
           </div>
            <div style="width: 100%;">
                <label for="fullname">Doanh nghiệp *</label>
                <input class="form-control" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="fullname"  />
            </div>
            <div style="width: 100%;">
                <label for="fullname">Câu hỏi/Thắc mắc cần giải đáp *</label>
                <input class="form-control" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="fullname"  />
            </div>
            <div style="width: 100%;">
                <label for="fullname">Chủ đề *</label>
                <input class="form-control" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="fullname"  />
            </div>
            <div style="width: 100%;">
                <label for="fullname">Chi tiết cụ thể về câu hỏi/thắc mắc cần giải đáp *</label>
                <textarea rows="5" class="form-control" style="border-radius: 2px; border-color: #9e9e9e height: 50px;" type="text" name="fullname"  >
                </textarea>
            </div>
            <div class="g-recaptcha" data-sitekey="6Lftwq0UAAAAAD43amX4uFmDmkTvDM7m7KqQpv1v" data-message="Vui lòng nh&#7845;n ch&#7885;n &quot;Tôi không ph&#7843;i robot&quot;"></div>
            <div style="width: 100%; text-align: right;">
                <button type="button" style="margin: 0; max-width: unset; border-color: unset;" class="btn-show-more">Gửi yêu cầu</button>
            </div>
        </form>
        <!-- <form name="frmContact" class="frmContact" action="/lien-he" method="POST">
            <ul>
                <li><input type="text" name="Name" class="js-required form-control" placeholder="H&#7885; và tên"></li>
                <li><input type="text" name="Address" class="js-required form-control" placeholder="Đ&#7883;a ch&#7881;"></li>
                <li><input type="text" name="Phone" class="js-required js-phone form-control" placeholder="Đi&#7879;n tho&#7841;i"></li>
                <li><input type="text" name="Email" class="js-required js-email form-control" placeholder="Email"></li>
                <li><textarea placeholder="N&#7897;i dung" name="Content" rows="5"></textarea></li>
                <li>
                    <div class="g-recaptcha" data-sitekey="6Lftwq0UAAAAAD43amX4uFmDmkTvDM7m7KqQpv1v" data-message="Vui lòng nh&#7845;n ch&#7885;n &quot;Tôi không ph&#7843;i robot&quot;"></div>
                </li>
            </ul>
            <div class="btnwrap">
                <input name="__RequestVerificationToken" type="hidden" value="OaqP-KgeFfn1k_8FbT812SVX7-XplvdpYigFw4YjuSKzSjgrl5PqdUUawjP3s3eHQOqzG3b_jpe27hETyQfFI6FK95-nmL7bE9p7DBEuUbE1" />
                <a class="btn btn-submit" style="background-color: #008155" href="#"><span>G&#7917;i n&#7897;i dung</span></a>
            </div>
        </form> -->
    </div>
        <!-- </div> -->
    </div>


    <!-- <div class="formWrap stagger-up">
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
    </div> -->
</div>
    <script src="https://www.google.com/recaptcha/api.js?hl=vi" async defer></script>
@endsection
