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
                      <span class="micon dw dw-house-1"></span><span class="mtext">Trang Chủ</span>
                  </a>
              </li>
            @cannot('view-order')
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Quản Lý Đơn Hàng</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('supplier.order.orders_new')}}">Đơn Hàng Mới</a></li>
                    <li><a href="{{route('supplier.order.orders_shipped')}}">Đơn Hàng Đã Giao</a></li>
                    <li><a href="{{route('supplier.order.orders_shipping')}}">Đơn Hàng Đang Giao</a></li>
                    <li><a href="{{route('supplier.order.orders_block')}}">Đơn Hàng Đã Hủy</a></li>
                </ul>
            </li>
            @endcannot
            @cannot('view-product');
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Quản Lý Sản Phẩm</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('supplier.product.list')}}">Danh Sách Sản Phẩm</a></li>
                    <li><a href="{{route('supplier.product.create')}}">Thêm Sản Phẩm</a></li>
                </ul>
            </li>
            @endcannot
            @cannot('view-user')
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Quản Lý Khách Hàng</span>
                </a>
                <ul class="submenu">
                    <li><a href="#">Danh Sách Khách Hàng</a></li>
                </ul>
            </li>
            @endcannot
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Quản Lý Danh Mục</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('admin.category.list')}}">Danh Sách Danh Mục</a></li>
                    @can('create-category')
                    <li><a href="{{route('admin.category.create')}}">Thêm Danh Mục</a></li>
                    @endcan
                </ul>
            </li>
            @cannot('view-promotion')
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Quản Lý Khuyến Mãi</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('supplier.promotion.list')}}">Danh Sách Khuyến Mãi</a></li>
                    <li><a href="{{route('supplier.promotion.create')}}">Thêm Khuyến Mãi</a></li>
                </ul>
            </li>
            @endcannot
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Quản Lý Đánh Giá</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('admin.rate.list')}}">Danh Sách Đánh Giá</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Thống Kê</span>
                </a>
                <ul class="submenu">
                    <li><a href="#">Thống Kê Doanh Thu</a></li>
                </ul>
            </li>
            @can('view-news')
              <li class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle">
                      <span class="micon dw dw-school"></span><span class="mtext">Quản Lý Tin Tức</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{route('admin.news.list')}}">Danh Sách Tin Tức</a></li>
                      <li><a href="{{route('admin.news.create')}}">Thêm Tin Tức</a></li>
                  </ul>
              </li>
            @endcan
              @can('view-supplier')
              <li class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle">
                      <span class="micon dw dw-clipboard"></span><span class="mtext">Quản Lý Nhà Cung Cấp</span>
                  </a>
                  <ul class="submenu">
                      <li><a href="{{route('admin.supplier.list')}}">Danh Sách Nhà Cung Cấp</a></li>
                      <li><a href="{{route('admin.supplier.create')}}">Thêm Nhà Cung Cấp</a></li>
                  </ul>
              </li>
              @endcan
              @can('view-user')
              <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-clipboard"></span><span class="mtext">Quản Lý User</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('admin.user.list')}}">Danh Sách User</a></li>
                    <li><a href="{{route('admin.user.create')}}">Thêm User</a></li>
                </ul>
                </li>
                @endcan
                @can('view-tax')
              <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle">
                    <span class="micon dw dw-file-3"></span><span class="mtext">Quản Lý Thuế</span>
                </a>
                <ul class="submenu">
                    <li><a href="{{route('admin.tax.list')}}">Danh Sách Thuế</a></li>
                </ul>
            </li>
            @endcan
          </ul>
      </div>
  </div>
</div>
<div class="mobile-menu-overlay"></div>
