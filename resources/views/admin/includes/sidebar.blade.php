<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href="{{route('admin.index')}}">
                    <i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">
                        {{__('admin/index.Main')}}</span></a>
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

            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/sidebar.Pharmacies')}}</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('show.pharmacies')}}"
                                          data-i18n="nav.dash.ecommerce">{{__('admin/sidebar.Show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('create.pharmacy')}}"
                           data-i18n="nav.dash.crypto">{{__('admin/sidebar.Add new pharmacy')}}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">{{__('admin/sidebar.Stores')}}</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('show.stores')}}"
                                          data-i18n="nav.dash.ecommerce">{{__('admin/sidebar.Show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('create.store')}}"
                           data-i18n="nav.dash.crypto">{{__('admin/sidebar.Add new store')}}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">
                        {{__('admin/sidebar.Supply of medicines')}}</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('show.supplies')}}"
                                          data-i18n="nav.dash.ecommerce">{{__('admin/sidebar.Show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('create.newSupply')}}"
                           data-i18n="nav.dash.crypto">{{__('admin/sidebar.Add a new supply')}}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a href=""><i class="la la-group"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">
                        {{__('admin/sidebar.Supply of pharmacies')}}</span>
                    <span
                        class="badge badge badge-danger badge-pill float-right mr-2">
                    </span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item"
                          href="{{route('show.suppliesPharmacies')}}" data-i18n="nav.dash.ecommerce">
                            {{__('admin/sidebar.Show all')}} </a>
                    </li>
                    <li><a class="menu-item" href="{{route('create.newSupplyPharmacy')}}"
                           data-i18n="nav.dash.crypto">
                            {{__('admin/sidebar.Add a new supply to pharmacy')}}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
