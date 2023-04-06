@extends('cms.layout.main')
@section('title')
    Liên hệ - Tập đoàn HLY
@endsection
@section('js-notication')
    @include('cms.include.script')
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
                N02 - LK1, Hà Trì, Phường Hà Cầu, Quận Hà Đông, Thành phố Hà Nội, Việt Nam
            </p><br/>
            </div>
        </div>
        <!-- <div class="form"> -->
        <div class="formWrap stagger-up" style="width: 60%; padding: 30px 0;">
        <h2 class="" style="font-size: 30px; font-weight: bold; text-align: center">Vui lòng điền vào mẫu đơn bên dưới để nhận thêm thông tin về các dịch vụ cung cấp của chúng tôi</h2>
        <form name="frmContact" class="" style="margin-top: 30px; display: flex; flex-direction: column; gap: 20px;" action="{{ route('cms.contact.store') }}" method="POST" >
            @csrf
            <div style="display: flex;  gap: 40px;">
                <div style="width: 100%;">
                    <label for="name">Họ và tên <span class="text-danger">*</span></label>
                    <input class="form-control" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="name"  />

                    @error('name')
                    <label id="error-title" class="text-danger validation-error-label"
                           for="basic">{{ $message }}</label>
                    @enderror
                </div>
           </div>
           <div style="display: flex;  gap: 40px;">
            <div style="width: 50%;">
                    <label for="email">Email doanh nghiệp <span class="text-danger">*</span></label>
                    <input  class="form-control" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="email"  />
                @error('email')
                <label id="error-title" class="text-danger validation-error-label"
                       for="basic">{{ $message }}</label>
                @enderror
            </div>
                <div style="width: 50%;">
                    <label for="phone">Số điện thoại <span class="text-danger">*</span></label>
                    <input  class="form-control" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="phone"  />
                    @error('name')
                    <label id="error-title" class="text-danger validation-error-label"
                           for="basic">{{ $message }}</label>
                    @enderror
                </div>
           </div>
            <div style="width: 100%;">
                <label for="address">Địa chỉ <span class="text-danger">*</span></label>
                <input  class="form-control" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="address"  />
                @error('address')
                <label id="error-title" class="text-danger validation-error-label"
                       for="basic">{{ $message }}</label>
                @enderror
            </div>
            <div style="width: 100%;">
                <label for="subject">Chủ đề <span class="text-danger">*</span></label>
                <input class="form-control" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="subject"  />
                @error('subject')
                <label id="error-title" class="text-danger validation-error-label"
                       for="basic">{{ $message }}</label>
                @enderror
            </div>
            <div style="width: 100%;">
                <label for="content">Chi tiết cụ thể về câu hỏi/thắc mắc cần giải đáp <span class="text-danger">*</span></label>
                <textarea  rows="5" class="form-control" style="border-radius: 2px; border-color: #9e9e9e; height: 150px;" type="text" name="content"  >
                </textarea>
                @error('content')
                <label id="error-title" class="text-danger validation-error-label"
                       for="basic">{{ $message }}</label>
                @enderror
            </div>
            <div style="width: 100%; text-align: right;">
                <button type="submit" style="margin: 0; max-width: unset; border-color: unset;" class="btn-show-more">Gửi yêu cầu</button>
            </div>
        </form>
    </div>
    </div>

</div>
@endsection
