@extends('index')
@section('title','Widaos | Tablero de control')
@section('content')
    {{-- HEADER-MOBILE --}}
    @include('layouts.admin-metronic.mobile-header')
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            {{-- ASIDE --}}
            @include('layouts.admin-metronic.aside')
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                {{-- HEADER --}}
                @include('layouts.admin-metronic.header')
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    {{-- @include('layouts.admin-metronic.subheader') --}}
                    {{-- PRINCIPAL CONTENT --}}
                    @yield('superadmin-content')
                </div>
                <!--end::Content-->
                {{-- FOOTER --}}
                @include('layouts.admin-metronic.footer')
                {{-- USER PANEL --}}
                @include('layouts.admin-metronic.user-panel')
                {{-- SHOPPING CART --}}
                @include('layouts.admin-metronic.quick-cart')
                {{-- QUICK PANEL --}}
                @include('layouts.admin-metronic.quick-panel')
                {{-- CHAT PANEL --}}
                @include('layouts.admin-metronic.chat-panel')
                {{-- SCROLL TOP --}}
                @include('layouts.admin-metronic.scroll-top')
                {{-- STICKY TOOLBAR --}}
                {{-- @include('layouts.admin-metronic.sticky-toolbar') --}}
                {{-- DEMO PANEL --}}
                @include('layouts.admin-metronic.demo-panel')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
@endsection