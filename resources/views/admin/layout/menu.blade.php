<div class="right-sidebar">
  <div class="sidebar-title">
      <h3 class="weight-600 font-16 text-blue">
          Layout Settings
          <span class="btn-block font-weight-400 font-12">User Interface Settings</span>
      </h3>
      <div class="close-sidebar" data-toggle="right-sidebar-close">
          <i class="icon-copy ion-close-round"></i>
      </div>
  </div>
  <div class="right-sidebar-body customscroll">
      <div class="right-sidebar-body-content">
          <h4 class="weight-600 font-18 pb-10">Header Background</h4>
          <div class="sidebar-btn-group pb-30 mb-10">
              <a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
              <a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
          </div>

          <h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
          <div class="sidebar-btn-group pb-30 mb-10">
              <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
              <a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
          </div>

          <h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
          <div class="sidebar-radio-group pb-10 mb-10">
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input"
                         value="icon-style-1" checked="">
                  <label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input"
                         value="icon-style-2">
                  <label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input"
                         value="icon-style-3">
                  <label class="custom-control-label" for="sidebaricon-3"><i
                          class="fa fa-angle-double-right"></i></label>
              </div>
          </div>

          <h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
          <div class="sidebar-radio-group pb-30 mb-10">
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input"
                         value="icon-list-style-1" checked="">
                  <label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input"
                         value="icon-list-style-2">
                  <label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o"
                                                                                 aria-hidden="true"></i></label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input"
                         value="icon-list-style-3">
                  <label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input"
                         value="icon-list-style-4" checked="">
                  <label class="custom-control-label" for="sidebariconlist-4"><i
                          class="icon-copy dw dw-next-2"></i></label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input"
                         value="icon-list-style-5">
                  <label class="custom-control-label" for="sidebariconlist-5"><i
                          class="dw dw-fast-forward-1"></i></label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                  <input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input"
                         value="icon-list-style-6">
                  <label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
              </div>
          </div>

          <div class="reset-options pt-30 text-center">
              <button class="btn btn-danger" id="reset-settings">Reset Settings</button>
          </div>
      </div>
  </div>
</div>

<div class="left-side-bar">
  <div class="brand-logo">
      <a href="{{ route('admin.index') }}">
          <div class="weight-600 font-30 text-white">Admin</div>
      </a>
      <div class="close-sidebar" data-toggle="left-sidebar-close">
          <i class="ion-close-round"></i>
      </div>
  </div>
  <div class="menu-block customscroll">
      <div class="sidebar-menu">
          <ul id="accordion-menu">
              <li class="dropdown">
                  <a href="{{ route('admin.index') }}" class="dropdown-toggle no-arrow">
                      <span class="micon dw dw-house-1"></span><span class="mtext">Trang Ch???</span>
                  </a>
              </li>
            @cannot('view-order')
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Qu???n L?? ????n H??ng</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('supplier.order.orders_new')}}">????n H??ng M???i</a></li>
                    <li><a href="{{route('supplier.order.orders_shipped')}}">????n H??ng ???? Giao</a></li>
                    <li><a href="{{route('supplier.order.orders_shipping')}}">????n H??ng ??ang Giao</a></li>
                    <li><a href="{{route('supplier.order.orders_block')}}">????n H??ng ???? H???y</a></li>
                </ul>
            </li>
            @endcannot
            @cannot('view-product');
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Qu???n L?? S???n Ph???m</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('supplier.product.list')}}">Danh S??ch S???n Ph???m</a></li>
                    <li><a href="{{route('supplier.product.create')}}">Th??m S???n Ph???m</a></li>
                </ul>
            </li>
            @endcannot
            @cannot('view-user')
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Qu???n L?? Kh??ch H??ng</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('admin.customer')}}">Danh S??ch Kh??ch H??ng</a></li>
                </ul>
            </li>
            @endcannot
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Qu???n L?? Danh M???c</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('admin.category.list')}}">Danh S??ch Danh M???c</a></li>
                    @can('create-category')
                    <li><a href="{{route('admin.category.create')}}">Th??m Danh M???c</a></li>
                    @endcan
                </ul>
            </li>
            @cannot('view-promotion')
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Qu???n L?? Khuy???n M??i</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('supplier.promotion.list')}}">Danh S??ch Khuy???n M??i</a></li>
                    <li><a href="{{route('supplier.promotion.create')}}">Th??m Khuy???n M??i</a></li>
                </ul>
            </li>
            @endcannot
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Qu???n L?? ????nh Gi??</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('admin.rate.list')}}">Danh S??ch ????nh Gi??</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Th???ng K??</span>
                </a>
                <ul class="submenu">
                    @can('view-tax')
                    <li><a href="{{route('admin.statistical.list')}}">Th???ng K?? Doanh Thu website</a></li>
                    @endcan
                    @cannot('view-promotion')
                    <li><a href="{{route('supplier.statistical.list')}}">Th???ng K?? Doanh Thu B??n H??ng</a></li>
                    @endcannot
                </ul>
            </li>
            @can('view-news')
              <li class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle">
                      <span class="micon dw dw-school"></span><span class="mtext">Qu???n L?? Tin T???c</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{route('admin.news.list')}}">Danh S??ch Tin T???c</a></li>
                      <li><a href="{{route('admin.news.create')}}">Th??m Tin T???c</a></li>
                  </ul>
              </li>
            @endcan
              @can('view-supplier')
              <li class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle">
                      <span class="micon dw dw-clipboard"></span><span class="mtext">Qu???n L?? Nh?? Cung C???p</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{route('admin.supplier.list')}}">Danh S??ch Nh?? Cung C???p</a></li>
                      <li><a href="{{route('admin.supplier.create')}}">Th??m Nh?? Cung C???p</a></li>
                  </ul>
              </li>
              @endcan
              @can('view-user')
              <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Qu???n L?? User</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('admin.user.list')}}">Danh S??ch User</a></li>
                    <li><a href="{{route('admin.user.create')}}">Th??m User</a></li>
                </ul>
                </li>
                @endcan
                @can('view-tax')
              <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-file-3"></span><span class="mtext">Qu???n L?? Thu???</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('admin.tax.list')}}">Danh S??ch Thu???</a></li>
                </ul>
            </li>
            @endcan
          </ul>
      </div>
  </div>
</div>
<div class="mobile-menu-overlay"></div>
