<section class="ecosytem" section=".cateHomeWrap">
    <div class="container-ecosytem">
        <h2 class="title">{{__('Hệ sinh thái')}}</h2>
        <p>{{trans('cms.about_brand_power')}}</p>
        <div class="wrapper-ecosytem">
        @for ($i = 0; $i < 4; $i++)
            <div class="block-info" style="">
                <img src="{{ asset('assets/fe/images/hg1.jpg') }}" class="img-block">
                <div style="width: 40%; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <h3 > {{__("Sức khỏe")}}</h3>
                    <p>{{trans('cms.about_brand_partner_1')}}</p>
                </div>
                <a type="button" style="" href="/he-sinh-thai/suc-khoe" class="btn-show-more">{{ __('Xem thêm') }}</a>
            </div>
        </div>
        @endfor
        </div>
    </div>
</section>
