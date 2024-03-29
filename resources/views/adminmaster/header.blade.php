<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shop Shoe">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('backend/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('backend/bower_components/metisMenu/dist/metisMenu.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('backend/dist/css/sb-admin-2.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href=" {{asset('backend/bower_components/font-awesome/css/font-awesome.min.css')}} " rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="{{asset('backend/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href=" {{asset('backend/bower_components/datatables-responsive/css/dataTables.responsive.css')}}" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('categorylist') }}">FreeStyle Shop</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    @if(Auth::check())
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ route('infor') }}"><i class="fa fa-user fa-fw"></i>{{ Auth::user()->fullname }}</a>
                        </li>
                        {{-- <li><a href="admin/user/edit/{{ Auth::user()->id  }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> --}}
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    @endif
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Category<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('categorylist')}}">List Category</a>
                                </li>
                                <li>
                                    <a href="{{route('categoryadd')}}">Add Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Product<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('productlist')}}">List Product</a>
                                </li>
                                <li>
                                    <a href="{{route('addproduct')}}">Add Product</a>
                                    
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Bill Export<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('billex-list') }}">List Bill</a>
                                </li>
                                <li>
                                    <a href="{{route('approved')}}">Approved Orders</a> 
                                    
                                </li>
                            </ul>
                
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Bill Import<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('billim-list') }}">List Bill</a>
                                </li>
                                <li>
                                    <a href="{{route('billim-add')}}">Add Bill</a> 
                                    
                                </li>
                            </ul>
                          
                        </li>
                        @if(Auth::user()->role == 0)
                        <li>
                            <a href="#"><i class="fa fa-area-chart fa-fw"></i> Statistics<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('bill-year') }}">Bill Year</a>
                                </li>
                                <li>
                                    <a href="{{ route('cateproduct') }}">Cate Product</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('userlist') }}">List User</a>
                                </li>
                                <li>
                                    <a href="{{ route('useradd') }}">Add User</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
    </nav>