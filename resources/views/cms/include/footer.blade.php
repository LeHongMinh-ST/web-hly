<footer>
    <!-- Chứa footer -->
    <div class="loading">
        <div>
            <div class="outerCircle"></div>
            <div class="innerCircle"></div>
        </div>
    </div>

    <div class="container">

        <div class="row">
            <div class="left" style="color: white">
                <div >
                    <h4 style="color: white">{{ __('Tập đoàn HLY') }}(HLYJSC)</h4>
                    <p>© {{ __('Bản quyền') }} HLY2019</p>
                </div>
                <div>
                    <p>N02 - LK1, Hà Trì, Phường Hà Cầu, Quận Hà Đông, Thành phố Hà Nội, Việt Nam</p>
                </div>
            </div>
            <div class="right">
                <ul style="color: white">
                    <li><a href="{{ localized_route('home') }}" style="color: white"><strong>{{ __('Trang chủ') }}</strong> </a></li>
                    <li><a href="{{ localized_route('cms.about') }}" style="color: white"><strong>{{ __('Giới thiệu HLY') }}</strong> </a></li>
                    <li><a href="{{ localized_route('cms.fieldOperation') }}" style="color: white"><strong>{{ __('Lĩnh vực hoạt động') }}</strong> </a>
                    </li>
                    <li><a href="{{ localized_route('cms.sustainableDevelopment') }}" style="color: white"><strong>{{ __('Nhà đầu tư') }}</strong> </a></li>
                    <li><a href="{{ localized_route('cms.news') }}" style="color: white">{{ __('Tin tức sự kiện') }}</a> </li>
                </ul>
                <ul style="color: white">
                    <li><a href="{{ localized_route('cms.investors') }}" target="_blank" rel="noopener" style="color: white">{{ __('Tuyển dụng') }}</a>
                    </li>
                    <li><a href="{{ localized_route('cms.contact') }}" style="color: white">{{ __('Liên hệ') }}</a> </li>
                </ul>
            </div>
        </div>
        <div class="botFooter">
            <p><a href="./chinh-sach-quyen-rieng-tu" style="color: white">{{ __('Chính sách quyền riêng tư') }}</a></p>
        </div>
    </div>
</footer>
