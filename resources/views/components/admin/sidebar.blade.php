<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                {{-- adash-dashboard --}}
                {{-- <li class="menu-title">Admin Main</li> --}}
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- end adash-dashboard --}}
                <li class="menu-title">Manage Website</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Course Manage</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.courses.create') }}" class="btn-loader">New Course</a></li>
                        <li><a href="{{ route('admin.courses.index') }}" class="btn-loader">All Courses</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-blog"></i>
                        <span>Blog Manage</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.blog_categories.create') }}" class="btn-loader">New Blog
                                Category</a>
                        </li>
                        <li><a href="{{ route('admin.blog_categories.index') }}" class="btn-loader">All Blog
                                Categories</a>
                        </li>
                        <li><a href="{{ route('admin.blogs.create') }}" class="btn-loader">New Blog Post</a></li>
                        <li><a href="{{ route('admin.blogs.index') }}" class="btn-loader">All Blog Posts</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-desktop"></i>
                        <span>Services Manage</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.services.create') }}" class="btn-loader">New Service</a></li>
                        <li><a href="{{ route('admin.services.index') }}" class="btn-loader">All Services</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-briefcase"></i>
                        <span>Portfolio Manage</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.portfolios.create') }}" class="btn-loader">New Portfolio</a></li>
                        <li><a href="{{ route('admin.portfolios.index') }}" class="btn-loader">All Portfolios</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-comments-smiley"></i>
                        <span>Testimonial Manage</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.testimonials.create') }}" class="btn-loader">New Testimonial</a>
                        </li>
                        <li><a href="{{ route('admin.testimonials.index') }}" class="btn-loader">All Testimonials</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-question-circle"></i>
                        <span>Faq's Manage</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.faqs.create') }}" class="btn-loader">New Faq</a></li>
                        <li><a href="{{ route('admin.faqs.index') }}" class="btn-loader">All Faq's</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-layers-alt"></i>
                        <span>Page Manage</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.pages.create') }}" class="btn-loader">New Page</a></li>
                        <li><a href="{{ route('admin.pages.index') }}" class="btn-loader">All Pages</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.abouts.index') }}" class="waves-effect">
                        <i class="fas fa-info"></i>
                        <span>About Manage</span>
                    </a>
                </li>


                <li class="menu-title">Manage Data</li>
                <li>
                    <a href="{{ route('admin.contacts.index') }}" class="waves-effect">
                        <i class="fas fa-address-book"></i>
                        <span>Contact Request</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.newsletters.index') }}" class="waves-effect">
                        <i class="fas fa-newspaper"></i>
                        <span>Newsletter Request</span>
                    </a>
                </li>

                @can('queries_access')
                <li>
                    <a href="{{ route('admin.queries.index') }}" class="waves-effect">
                        <i class="fas fa-question-circle"></i>
                        <span>Queries</span>
                    </a>
                </li>
                @endcan

                {{-- @canany(['roles_access', 'permissions_access', 'users_access'])
                <li class="menu-title">Manage Users</li>
                @can('roles_access')
                <li>
                    <a href="{{ route('admin.roles.index') }}" class="waves-effect">
                        <i class="fas fa-users-cog"></i>
                        <span>All Roles</span>
                    </a>
                </li>
                @endcan

                @can('permissions_access')
                <li>
                    <a href="{{ route('admin.permissions.index') }}" class="waves-effect">
                        <i class="fas fa-user-shield"></i>
                        <span>All Permissions</span>
                    </a>
                </li>
                @endcan

                @can('users_access')
                <li>
                    <a href="{{ route('admin.users.index') }}" class="waves-effect">
                        <i class="fas fa-users"></i>
                        <span>All Users</span>
                    </a>
                </li>
                @endcan
                @endcanany --}}


                <li class="menu-title">Manage Account</li>
                <li>
                    <a href="{{ route('admin.profile.edit') }}" class=" waves-effect">
                        <i class="fas fa-user"></i>
                        <span>Update Profile</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class=" waves-effect"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="fas fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
