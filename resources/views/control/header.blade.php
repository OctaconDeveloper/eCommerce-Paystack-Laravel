<?php
if(session()->has('username') < 1){ ?>
  <script>
  window.location="account";
  </script>
<?php }elseif(session()->get('role')!= 1){ ?>
  <script>
  window.location="account";
  </script>
<?php } ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{Config::get('constant.options.sitename')}}</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/simple-line-icon/css/simple-line-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/iconfonts/font-awesome/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{ asset('vendors/icheck/skins/all.css')}}">
  <link rel="stylesheet" href="{{ asset('vendors/summernote/dist/summernote-bs4.css')}}">
  <link rel="stylesheet" href="{{ asset('css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{Config::get('constant.options.icon')}}" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
      <div class="container d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top">
          <a class="navbar-brand brand-logo" href="{{Config::get('constant.options.sitelink')}}dashboard">
            <img src="{{Config::get('constant.options.icon')}}" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="{{Config::get('constant.options.sitelink')}}dashboard">
            <img src="{{Config::get('constant.options.icon')}}" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <form class="search-field ml-auto" action="#">
            <div class="form-group mb-0">
              <div class="input-group">
              </div>
            </div>
          </form>
          {{!$msgCount = App\contact::where('stat','0')->count()}}
          <ul class="navbar-nav navbar-nav-right mr-0">
            <li class="nav-item dropdown ml-4">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                @if($msgCount>0)
                <span class="count bg-warning">{{$msgCount}}</span>
                @endif
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <a class="dropdown-item py-3">
                  @if($msgCount>0)

                  <p class="mb-0 font-weight-medium float-left">You have {{$msgCount}} new notifications
                  </p>
                  @endif

                </a>
                <div class="dropdown-divider"></div>
                @if($msgCount>0)
                {{!$msgs=App\contact::where('stat','0')->get()}}
                @foreach($msgs as $msg)
                <a class="dropdown-item preview-item" href="{{Config::get('constant.options.sitelink')}}readmsg/{{$msg->msgID}}">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-inverse-success">
                      <i class="mdi mdi-email-outline mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">{{ucwords($msg->subject)}}</h6>
                    <p class="font-weight-light small-text mb-0">
                      {{date('j M, Y', strtotime($msg->created_at))}}
                    </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                @endforeach
                @else
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <h6 class="preview-subject font-weight-normal text-dark mb-1">No Unread Message</h6>
                    <div class="dropdown-divider"></div>
                  </div>
                </a>
                @endif
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="{{ asset('user.png') }}" alt="Profile image">
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a class="dropdown-item" href="{{Config::get('constant.options.sitelink')}}configure">
                  Change Password
                </a>
                <a class="dropdown-item" href="{{Config::get('constant.options.sitelink')}}logout">
                  Sign Out
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </div>
      <div class="nav-bottom">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a href="{{Config::get('constant.options.sitelink')}}dashboard" class="nav-link">
                <i class="link-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span></a>
            </li>
            <li class="nav-item mega-menu">
              <a href="#" class="nav-link"><i class="link-icon icon icon-basket"></i><span class="menu-title">Shop</span><i class="menu-arrow"></i></a>
              <div class="submenu">
                <div class="col-group-wrapper row">
                  <div class="col-group col-md-2">
                    <div class="row">
                      <div class="col-12">
                        <p class="category-heading">Shop Category</p>
                      </div>
                      <div class="col-md-12">
                        <ul class="submenu-item">
                          <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}newcategory">New Category</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}viewcategory">View Category</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-group col-md-2">
                    <div class="row">
                      <div class="col-12">
                        <p class="category-heading">Brand</p>
                      </div>
                      <div class="col-md-12">
                        <ul class="submenu-item">
                          <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}newbrand">New Brand</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}viewbrand">View Brand</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-group col-md-2">
                    <div class="row">
                      <div class="col-12">
                        <p class="category-heading">Product Category</p>
                      </div>
                      <div class="col-md-12">
                        <ul class="submenu-item">
                          <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}newproduct">New Product</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}viewproduct">View Product</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-group col-md-3">
                    <div class="row">
                      <div class="col-12">
                        <p class="category-heading">Featured Product Category</p>
                      </div>
                      <div class="col-md-12">
                        <ul class="submenu-item">
                          <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}viewfeaturedproduct">View Featured Product</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-group col-md-3">
                    <div class="row">
                      <div class="col-12">
                        <p class="category-heading">Special Offer Product Category</p>
                      </div>
                      <div class="col-md-12">
                        <ul class="submenu-item">
                          <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}viewspecialoffer">View Special Offer Product</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link"><i class="link-icon icon icon-user"></i><span class="menu-title">Users</span><i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}useraccount">Account Info</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}userorders">Orders</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}userpayments">Payments</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}userhistory">History</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item mega-menu">
              <a href="#" class="nav-link"><i class="link-icon fa fa-handshake-o"></i><span class="menu-title">Transactions</span><i class="menu-arrow"></i></a>
              <div class="submenu">
                <div class="col-group-wrapper row">
                  <div class="col-group col-md-3">
                    <div class="row">
                      <div class="col-12">
                        <p class="category-heading">Orders</p>
                      </div>
                      <div class="col-md-12">
                        <ul class="submenu-item">
                          <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}pendingorders">Pending Orders</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}orderhistory">Order History</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}searchorder">Search Order</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                    <div class="col-group col-md-3">
                      <div class="row">
                        <div class="col-12">
                          <p class="category-heading">Negotiations</p>
                        </div>
                        <div class="col-md-12">
                          <ul class="submenu-item">
                            <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}pendingnegotiation">Pending Negotiations</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}negotiationhistory">Negotiations History</a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-group col-md-3">
                      <div class="row">
                        <div class="col-12">
                          <p class="category-heading">Payments</p>
                        </div>
                        <div class="col-md-12">
                          <ul class="submenu-item">
                            <li class="nav-item">
                              <a class="nav-link" href="{{Config::get('constant.options.sitelink')}}chequepayments">
                                Cheque Payments
                              </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{Config::get('constant.options.sitelink')}}onlinepayments">
                                Online Payments
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link"><i class="link-icon icon icon-envelope"></i><span class="menu-title">Messages</span><i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}unreadmessage">Unread Message</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}messages">Message Logs</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link"><i class="link-icon icon icon-settings"></i><span class="menu-title">Settings</span><i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}faq">FAQ</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}office_addresses">Office Addresses</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{Config::get('constant.options.sitelink')}}slider">Slider</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
      @yield('content')


    <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © {{date('Y')}}
              <a href="{{Config::get('constant.options.sitelink')}}" target="_blank">{{Config::get('constant.options.sitename')}}</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
              powered by Octagon Technologies with
              <i class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('vendors/js/vendor.bundle.addons.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <script src="{{ asset('js/dashboard.js') }}"></script>

  <script src="{{ asset('js/file-upload.js') }}"></script>
  <script src="{{ asset('js/iCheck.js') }}"></script>
  <script src="{{ asset('js/typeahead.js') }}"></script>
  <script src="{{ asset('js/select2.js') }}"></script>
  <script src="{{ asset('js/data-table.js') }}"></script>

    <script src="{{ asset('js/modal-demo.js') }}"></script>
  <script src="{{ asset('s/editorDemo.js') }}"></script>
  <script src="{{ asset('vendors/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('vendors/tinymce/themes/modern/theme.js') }}"></script>
  <script src="{{ asset('vendors/summernote/dist/summernote-bs4.min.js') }}"></script>


  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/libertyui/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Apr 2019 01:21:43 GMT -->
</html>
