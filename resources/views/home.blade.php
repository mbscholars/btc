<head>
  <title>Trade Cryptocurrencies: Buy, Spend and Store Cryptocurrencies</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('css/app.css')}}">
<link rel="apple-touch-icon" href="{{ asset('ui/app-assets/images/ico/apple-icon-120.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('ui/app-assets/images/ico/favicon.ico') }}">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/vendors/css/extensions/tether-theme-arrows.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/vendors/css/extensions/tether.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/vendors/css/extensions/shepherd-theme-default.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/css/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/css/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/app-assets/css/plugins/tour/tour.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
</head>
    <body class="horizontal-layout horizontal-menu dark-layout 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns" data-layout="dark-layout">
 <!-- BEGIN: Header-->

 <div id="app">
<router-view></router-view>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>