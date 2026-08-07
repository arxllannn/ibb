 <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                   
                        
                        @can('view-services')
                       {{-- <li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark"
                                href="{{route('portal.services.index')}}" aria-expanded="false"><i class="mdi mdi-washing-machine"></i><span
                                    class="hide-menu">Services </span></a>
                            
                        </li>--}}
                        @endcan


                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('portal.dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><spanclass="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Services </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                @can('manage-business-sale-flow')<li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="{{route('portal.business-sale-flow.index')}}" aria-expanded="false"><i class="mdi mdi-account-star-variant"></i><span class="hide-menu">Sell Business </span></a></li>@endcan
                                @can('manage-business-purchase-flow')<li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="{{route('portal.business-purchase-flow.index')}}" aria-expanded="false"><i class="mdi mdi-account-star-variant"></i><span class="hide-menu">Buy Business </span></a></li>@endcan
                                @can('manage-business-evaluation')<li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark" href="{{route('portal.business-evaluation.index')}}" aria-expanded="false"><i class="mdi mdi-account-star-variant"></i><span class="hide-menu">Business Evaluation</span></a></li>@endcan
                                @can('manage-visa-services')<li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark"  href="{{route('portal.visa.index')}}" aria-expanded="false"><i class="mdi mdi-account-star-variant"></i><span class="hide-menu">Visa Services</span></a></li>@endcan
                                @can('manage-franchise-services')<li class="sidebar-item"> <a class="sidebar-link  waves-effect waves-dark"  href="{{route('portal.franchise.index')}}" aria-expanded="false"><i class="mdi mdi-account-star-variant"></i><span class="hide-menu">Franchise Services</span></a></li>@endcan
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('portal.intro.index')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><spanclass="hide-menu">Services Intro</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi  mdi-blogger"></i><span class="hide-menu">Blogs </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                @can('manage-blog-categories')<li class="sidebar-item"><a class="sidebar-link  waves-effect waves-dark" href="{{route('portal.blog-categories.index')}}" aria-expanded="false"><i class="mdi mdi-cast"></i><span class="hide-menu">Blog Categories </span></a></li>@endcan
                                @can('manage-blogs')<li class="sidebar-item"><a class="sidebar-link  waves-effect waves-dark" href="{{route('portal.blog.index')}}" aria-expanded="false"><i class="mdi mdi-blogger"></i><span class="hide-menu">Blogs </span></a></li>@endcan
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi  mdi-google-circles"></i><span class="hide-menu">Communication </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('portal.message.index')}}" aria-expanded="false"><i class="mdi mdi-message"></i><spanclass="hide-menu">Messages</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('portal.subscriber.index')}}" aria-expanded="false"><i class="mdi mdi-google-chrome"></i><spanclass="hide-menu">Subscribers</span></a></li>
                                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('portal.subscriber.broadcast')}}" aria-expanded="false"><i class="mdi mdi-radio-tower"></i><spanclass="hide-menu">Broadcast</span></a></li>
                            </ul>
                        </li>

                       

                        <li class="sidebar-item"><a class="sidebar-link  waves-effect waves-dark" href="{{route('portal.team.index')}}" aria-expanded="false"><i class="mdi mdi-human-male-female"></i><span class="hide-menu">Team </span></a></li>
                        <li class="sidebar-item"><a class="sidebar-link  waves-effect waves-dark" href="{{route('portal.about.index')}}" aria-expanded="false"><i class="mdi mdi-teamviewer"></i><span class="hide-menu">About Us </span></a></li>
                        <li class="sidebar-item"><a class="sidebar-link  waves-effect waves-dark" href="{{route('portal.resource.index')}}" aria-expanded="false"><i class="mdi mdi-asterisk"></i><span class="hide-menu">Resource </span></a></li>
                       
                        @can('manage-content')
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-arrow-compress-all"></i><span class="hide-menu">Content Managment </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                            <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark" href="{{ route('portal.content.index', ['page_name' => 'Home']) }}" aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu">Home</span></a></li>
                            <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark" href="{{ route('portal.content.index', ['page_name' => 'contact-us']) }}" aria-expanded="false"><i class="mdi mdi-phone"></i><span class="hide-menu">Contact Us</span></a></li>
                            
                            <li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark" href="{{ route('portal.content.index', ['page_name' => 'Social']) }}" aria-expanded="false"><i class="mdi mdi-facebook-box"></i><span class="hide-menu">Social</span></a></li>
                            </ul>
                        </li>
                        @endcan


                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">User Managment </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                @can('view-users')<li class="sidebar-item"><a class="sidebar-link  waves-effect waves-dark" href="{{route('portal.users.index')}}" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Users </span></a></li>@endcan
                                @can('view-roles')<li class="sidebar-item"><a class="sidebar-link  waves-effect waves-dark" href="{{route('portal.roles')}}" aria-expanded="false"><i class="mdi mdi-account-key"></i><span class="hide-menu">Roles </span></a></li>@endcan
                                @can('view-permissions')<li class="sidebar-item"><a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('portal.permissions.index')}}" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Permissions</span></a></li>@endcan
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->