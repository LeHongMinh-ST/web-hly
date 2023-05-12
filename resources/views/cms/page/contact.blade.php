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
        <img class= "img" src="{{asset('assets/fe/images/contact.jpg')}}" style="width: 100%;"/>
        <div class="heading">
        <div style="max-width: 1300px; margin: auto; display: flex; justify-content: space-between" >
            <div class="heading2">
            {{__("Tìm hiểu thêm và kết nối")}}
            </div>
            <div class="heading1">
            {{trans('cms.about_heading_contact')}}
            </div>
        </div>
    </div>
    </section>
    <div class="add_form">
        <div class="address_contact">
            <div class="add_contact">
            <p style="font-weight: bold; ">
                Hà Nội - {{__("Trụ sở chính")}}
            </p><br/>
            <p>
                {{getValueKeySetting('contact_address')}}
            </p><br/>
            </div>
        </div>
        <!-- <div class="form"> -->
        <div class="formWrap stagger-up">
        <h2 class="fill_the_form" style="font-size: 30px; font-weight: bold; text-align: center">{{trans('cms.about_heading_form_contact')}}</h2>
        <h2 class="fill_the_form2" style="font-size: 20px; font-weight: bold; text-align: center">{{trans('cms.about_heading_form_contact')}}</h2>

        <form name="frmContact" class="frmContact" style="margin-top: 30px; display: flex; flex-direction: column; gap: 20px;" action="{{ route('cms.contact.store') }}" method="POST" >
            @csrf
            <div style="display: flex;  gap: 40px;">
                <div style="width: 100%;">
                    <label for="name">{{__("Họ và tên")}}<span class="text-danger">*</span></label>
                    <input class="form-control form-control-contact" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="name"  />

                    @error('name')
                    <label id="error-title" class="text-danger validation-error-label"
                           for="basic">{{ $message }}</label>
                    @enderror
                </div>
           </div>
           <div class=" frminput" style="display: flex;  gap: 40px;">
            <div class="">
                    <label for="email">{{__("Email doanh nghiệp")}} <span class="text-danger">*</span></label>
                    <input  class="form-control form-control-contact" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="email"  />
                @error('email')
                <label id="error-title" class="text-danger validation-error-label"
                       for="basic">{{ $message }}</label>
                @enderror
            </div>
                <div class="">
                    <label for="phone">{{__("Số điện thoại")}}<span class="text-danger">*</span></label>
                    <input  class="form-control form-control-contact" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="phone"  />
                    @error('name')
                    <label id="error-title" class="text-danger validation-error-label"
                           for="basic">{{ $message }}</label>
                    @enderror
                </div>
           </div>
            <div style="width: 100%;">
                <label for="address">{{__("Địa chỉ")}}<span class="text-danger">*</span></label>
                <input  class="form-control form-control-contact" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="address"  />
                @error('address')
                <label id="error-title" class="text-danger validation-error-label"
                       for="basic">{{ $message }}</label>
                @enderror
            </div>
            <div style="width: 100%;">
                <label for="subject">{{__("Chủ đề")}}<span class="text-danger">*</span></label>
                <input class="form-control form-control-contact" style="border-radius: 2px; border-color: #9e9e9e" type="text" name="subject"  />
                @error('subject')
                <label id="error-title" class="text-danger validation-error-label"
                       for="basic">{{ $message }}</label>
                @enderror
            </div>
            <div style="width: 100%;">
                <label for="content">{{trans('cms.about_question_form_contact')}}<span class="text-danger">*</span></label>
                <label>
                    <textarea  rows="5" class="form-control form-control-contact" style="border-radius: 2px; border-color: #9e9e9e; height: 150px;" type="text" name="content"  ></textarea>
                </label>
                @error('content')
                <label id="error-title" class="text-danger validation-error-label"
                       for="basic">{{ $message }}</label>
                @enderror
            </div>
            <div style="width: 100%; text-align: right; margin-bottom: 20px;">
                <button type="submit" style="margin: 0; max-width: unset; border-color: unset;" class="btn-show-more">{{__("Gửi yêu cầu")}}</button>
            </div>
        </form>
    </div>
    </div>

</div>
@endsection
