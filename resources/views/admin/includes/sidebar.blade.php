<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="{{ Avatar::create(auth()->user()->fullname)->toBase64() }}"
                                                        class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ auth()->user()->fullname }}</span>
                        <div class="text-size-mini text-muted">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><a
                            href="{{route('admin.dashboard')}}"><i class="icon-home4"></i>
                            <span>Bảng điều khiển</span></a>
                    </li>
                    @if(checkPermission('post-index') || checkPermission('category-index') || checkPermission('recruitment-index'))
                        <li class="navigation-header"><span>Tin tức</span> <i class="icon-menu"
                                                                              title="Tin tức"></i>
                        </li>
                        @if(checkPermission('post-index'))
                            <li class="{{ request()->is('admin/posts*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.posts.index') }}"><i
                                        class="icon-magazine"></i> <span>Bài viết</span></a></li>
                        @endif
                        @if(checkPermission('recruitment-index'))
                            <li class="{{ request()->is('admin/recruitments*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.recruitments.index') }}"><i
                                        class="icon-newspaper2"></i> <span>Bài tuyển dụng</span></a></li>
                        @endif
                        @if(checkPermission('category-index'))
                            <li class="{{ request()->is('admin/categories*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.categories.index') }}"><i class="icon-stack"></i> <span>Danh mục bài viết</span></a>
                            </li>
                        @endif
                    @endif

                    @if(checkPermission('contact-index'))
                        <li class="navigation-header"><span>Khách hàng</span> <i class="icon-menu"
                                                                                 title="Giao diện"></i>
                        </li>
                        <li class="{{ request()->is('admin/contact*') ? 'active' : '' }}"><a
                                href="{{ route('admin.contact.index') }}"><i class=" icon-mail5"></i>
                                <span>Liên hệ</span></a>
                        </li>
                    @endif

                    @if(checkPermission('supplier-index') || checkPermission('investment-article-index'))
                        <li class="navigation-header"><span>Nhà đầu tư</span> <i class="icon-menu"
                                                                                 title="Giao diện"></i>
                        </li>
                        @if(checkPermission('supplier-index'))
                            <li class="{{ request()->is('admin/suppliers*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.suppliers.index') }}"><i class="  icon-address-book"></i>
                                    <span>Nhà đầu tư</span></a>
                            </li>
                        @endif
                        @if(checkPermission('investment-article-index'))
                            <li class="{{ request()->is('admin/investment-articles*') ? 'active' : '' }}"><a
                                    href="{{route('admin.investment-article.index')}}"><i class="   icon-file-openoffice"></i>
                                    <span>Tin tức đầu tư</span></a>
                            </li>
                        @endif
                    @endif

                    @if(checkPermission('setting-index'))
                        <li class="navigation-header"><span>Giao diện</span> <i class="icon-menu" title="Giao diện"></i>
                        </li>
                        <li class="{{ request()->is('admin/settings*') ? 'active' : '' }}"><a
                                href="{{ route('admin.settings.index') }}"><i class=" icon-users"></i> <span>Tuỳ chọn giao diện</span></a>
                        </li>
                    @endif


                    @if(checkPermission('user-index') || checkPermission('role-index'))
                        <li class="navigation-header"><span>Hệ thống</span> <i class="icon-menu" title="Hệ thống"></i>
                        </li>
                        @if(checkPermission('user-index'))
                            <li class="{{ request()->is('admin/users*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.users.index') }}"><i class=" icon-users"></i>
                                    <span>Tài khoản</span></a>
                            </li>
                        @endif
                        @if(checkPermission('role-index'))
                            <li class="{{ request()->is('admin/roles*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.roles.index') }}"><i class="icon-lock"></i>
                                    <span>Vai trò</span></a>
                            </li>
                        @endif
                    @endif
                    <!-- /page kits -->

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
