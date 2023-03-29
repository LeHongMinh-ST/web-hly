<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="#" class="media-left"><img src="{{ asset('assets/admin/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></a>
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
                    @if(checkPermission('dashboard-index'))
                        <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"><a
                                href="{{route('admin.dashboard')}}"><i class="icon-home4"></i>
                                <span>Bảng điều khiển</span></a>
                        </li>
                    @endif
                    @if(checkPermission('posts-index') || checkPermission('categories-index') || checkPermission('tags-index'))
                        <li class="navigation-header"><span>Tin tức</span> <i class="icon-menu"
                                                                                  title="Tin tức"></i>
                        </li>
                        @if(checkPermission('posts-index'))
                            <li class="{{ request()->is('admin/posts*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.posts.index') }}"><i
                                        class="icon-magazine"></i> <span>Bài viết</span></a></li>
                        @endif
                        @if(checkPermission('recruitment-index'))
                            <li class="{{ request()->is('admin/recruitments*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.recruitments.index') }}"><i
                                        class="icon-magazine"></i> <span>Bài tuyển dụng</span></a></li>
                        @endif
                        @if(checkPermission('categories-index'))
                            <li class="{{ request()->is('admin/categories*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.categories.index') }}"><i class="icon-stack"></i> <span>Danh mục bài viết</span></a>
                            </li>
                        @endif
                        @if(checkPermission('tags-index'))
                            <li class="{{ request()->is('admin/tags*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.tags.index') }}"><i class="icon-price-tag2"></i>
                                    <span>Tag</span></a></li>
                        @endif
                    @endif

                    @if(checkPermission('setting-index'))
                        <li class="navigation-header"><span>Giao diện</span> <i class="icon-menu" title="Giao diện"></i>
                        </li>
                        <li class="{{ request()->is('admin/settings*') ? 'active' : '' }}"><a
                                href="{{ route('admin.settings.index') }}"><i class=" icon-users"></i> <span>Tuỳ chọn giao diện</span></a>
                        </li>
                    @endif


                    @if(checkPermission('users-index') || checkPermission('roles-index'))
                        <li class="navigation-header"><span>Hệ thống</span> <i class="icon-menu" title="Hệ thống"></i>
                        </li>
                        @if(checkPermission('users-index'))
                            <li class="{{ request()->is('admin/users*') ? 'active' : '' }}"><a
                                    href="{{ route('admin.users.index') }}"><i class=" icon-users"></i> <span>Tài khoản</span></a>
                            </li>
                        @endif
                        @if(checkPermission('roles-index'))
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
