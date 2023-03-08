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
                    <a href="/linh-vuc-hoat-dong" class="">{{ __('Lĩnh vực hoạt động') }}</a>
                    <div class="submenu">
                        <a href="/linh-vuc-hoat-dong">{{__("Công nghệ xanh")}}</a>
                        <a href="/linh-vuc-hoat-dong">{{__("Thương mai dịch vụ")}}</a>
                        <a href="/linh-vuc-hoat-dong">{{__("Thực phẩm xanh")}}</a>
                        <a href="/linh-vuc-hoat-dong">{{__("Nam y và chăm sóc sức khỏe")}}</a>
                    </div>
                </li>
                <li>
                </li>
                <li><a href="/phat-trien-ben-vung" class="">{{ __('Phát triển bền vững') }}</a></li>
                <li><a href="{{ localized_route('cms.investors') }}" class="">{{ __('Nhà đầu tư') }}</a></li>
                <li><a href="{{ localized_route('cms.news') }}" class="">{{ __('Tin tức mới') }}</a></li>
            </ul>
            <div class="subLink">
                <a href="{{ localized_route('cms.recruitment') }}" target="_blank" class="" style="visibility: inherit; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">Tuyển dụng</a>
                <a href="{{ localized_route('cms.contact') }}" class="" style="visibility: inherit; opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">{{ __('Liên hệ') }}</a>
            </div>
        </nav>
    </div>
</header>
