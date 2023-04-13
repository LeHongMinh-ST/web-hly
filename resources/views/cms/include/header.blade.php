<header>
    <!-- Thường chứa LOGO, MENU NAVIGATION,... -->
    <div class="hdContainer">
        <a class="logo" href="{{ localized_route('home') }}" style="background-image: url('{{ asset('/assets/fe/images/logo.png') }}');">
            <img src="{{ asset('/assets/fe/images/logo.png') }}">
        </a>
        <div class="hamburger-menu">
            <div class="bar"></div>
        </div>
        <div class="botHd">
            <a class="btnSearch" href="{{ localized_route('cms.search') }}"></a>
            <p>
                @if(app()->getLocale() === 'vi')
                <a href="{{ current_route('en') }}">EN</a><em>|</em><span>VN</span>
                @elseif(app()->getLocale() === 'en')
                <span>EN</span><em>|</em><a href="{{ current_route('vi') }}">VN</a>

                @endif
            </p>
        </div>
    </div>

    <div class="ctMenu">
        <nav>
            <ul id="nav">
                <li><a href="{{ localized_route('home') }}" class="active">{{ __('Trang chủ') }}</a></li>
                <li><a href="{{ localized_route('cms.about') }}" class="">{{ __('Giới thiệu HLY') }}</a></li>
                <li class="hasSub">
                    <a href="{{ localized_route('cms.fieldOperation') }}" class="">{{ __('Lĩnh vực hoạt động') }}</a>
                    <div class="submenu">
                        <a href="{{ localized_route('cms.fieldOperation') }}">{{__("Công nghệ xanh")}}</a>
                        <a href="{{ localized_route('cms.fieldOperation.serviceCommerce') }}">{{__("Thương mại dịch vụ")}}</a>
                        <a href="{{ localized_route('cms.fieldOperation.greenFood') }}">{{__("Thực phẩm xanh")}}</a>
                        <a href="{{ localized_route('cms.fieldOperation.medicineHealthcare') }}">{{__("Nam y và chăm sóc sức khỏe")}}</a>
                    </div>
                </li>
                <li>
                </li>
                <li><a href="{{ localized_route('cms.sustainableDevelopment') }}" class="">{{ __('Phát triển bền vững') }}</a></li>
                <li><a href="{{ localized_route('cms.investors') }}" class="">{{ __('Nhà đầu tư') }}</a></li>
                <li><a href="{{ localized_route('cms.news') }}" class="">{{ __('Tin tức mới') }}</a></li>
            </ul>
            <div class="subLink">
                <a href="{{ localized_route('cms.recruitment') }}" target="_blank" class="" style="visibility: inherit; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">{{ __('Tuyển dụng') }}</a>
                <a href="{{ localized_route('cms.contact') }}" class="" style="visibility: inherit; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">{{ __('Liên hệ') }}</a>
            </div>
        </nav>
    </div>
</header>
