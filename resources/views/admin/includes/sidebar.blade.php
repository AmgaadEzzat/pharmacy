<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('admin.index')}}">
                    <i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">
                        {{__('admin/index.Main')}}</span></a>
            </li>

            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">لغات الموقع </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href=""
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">أضافة
                            لغة جديده </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">
                        {{__('admin/sidebar.Main categories')}}</span>
                    <span class="badge badge badge-danger badge-pill float-right mr-2">
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href=""
                          data-i18n="nav.dash.ecommerce">{{__('admin/sidebar.Show all')}}</a>
                    </li>
                    <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">
                            {{__('admin/sidebar.Add new category')}}</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/sidebar.Products')}}</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('show.products')}}"
                            data-i18n="nav.dash.ecommerce">{{__('admin/sidebar.Show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('create.product')}}"
                           data-i18n="nav.dash.crypto">{{__('admin/sidebar.Add new product')}}</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">
                        {{__('admin/sidebar.Brands')}}</span>
                    <span class="badge badge badge-success badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href=""
                        data-i18n="nav.dash.ecommerce">{{__('admin/sidebar.Show all')}}</a>
                    </li>
                    <li><a class="menu-item" href=""
                           data-i18n="nav.dash.crypto">
                            {{__('admin/sidebar.Add new brand')}}</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item"><a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">الطلاب  </span>
                    <span
                        class="badge badge badge-warning  badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href=""
                                          data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                    </li>
                    <li><a class="menu-item" href="" data-i18n="nav.dash.crypto">أضافة
                            طالب </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href=""><i class="la la-male"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">تذاكر المراسلات   </span>
                    <span
                        class="badge badge badge-danger  badge-pill float-right mr-2">0</span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href=""
                                          data-i18n="nav.dash.ecommerce"> تذاكر الطلاب </a>
                    </li>
                </ul>
            </li>


            <li class=" nav-item"><a href="#"><i class="la la-television"></i><span class="menu-title"
                                                                                    data-i18n="nav.templates.main">{{__('admin/sidebar.Setting')}}</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" data-i18n="nav.templates.vert.main">{{__('admin/sidebar.Delivery means')}}</a>
                        <ul class="menu-content">
                            <li><a class="menu-item" href=""
                                   data-i18n="nav.templates.vert.classic_menu">{{__('admin/sidebar.Internal delivery')}}</a>
                            </li>
                            <li><a class="menu-item" href="">{{__('admin/sidebar.External connection')}}</a>
                            </li>
                            <li><a class="menu-item" href="">{{__('admin/sidebar.Free delivery')}}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a class="menu-item" href="#"
                   data-i18n="nav.templates.vert.main"> {{__('admin/sidebar.main slider')}} </a>
                <ul class="menu-content">
                    <li><a class="menu-item" href=""
                           data-i18n="nav.templates.vert.classic_menu">صور الاسليدر </a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header">
                <span data-i18n="nav.category.layouts">Layouts00</span><i class="la la-ellipsis-h ft-minus"
                                                                        data-toggle="tooltip"
                                                                        data-placement="right"
                                                                        data-original-title="Layouts"></i>
            </li>
        </ul>
    </div>
</div>
