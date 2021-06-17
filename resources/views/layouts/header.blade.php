<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="es">
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>@yield('title','FitNix | Login')</title>
		<meta name="description" content="FitNix API Content Dashboard" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{ asset('metronic/assets/css/pages/login/classic/login-2.css?v='.rand()) }}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('metronic/assets/plugins/global/plugins.bundle.css?v='.rand()) }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('metronic/assets/plugins/custom/prismjs/prismjs.bundle.css?v='.rand())}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('metronic/assets/css/style.bundle.css?v='.rand())}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{ asset('metronic/assets/css/themes/layout/header/base/dark.css?v='.rand()) }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('metronic/assets/css/themes/layout/header/menu/dark.css?v='.rand()) }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('metronic/assets/css/themes/layout/brand/dark.css?v='.rand()) }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('metronic/assets/css/themes/layout/aside/dark.css?v='.rand()) }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/preloader.css?v='.rand()) }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('css/styles.css?v='.rand()) }}" rel="stylesheet" type="text/css" />
		@stack('css')
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{  asset('images/favicon.png')  }}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">