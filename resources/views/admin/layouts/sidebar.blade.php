<aside class="main-sidebar elevation-4 skin-red-light dark-with-white" style="">
    <a href="{{ route('home') }}" class="brand-link text-center">
        {{-- <img src="https://infyom.com/images/logo/blue_logo_150x150.jpg"
             alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"> --}}

        <span class="brand-text font-weight-light text-center">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('admin.layouts.menu')
            </ul>
        </nav>
    </div>

</aside>
<style>
    /* .sidebar a, nav a{
        color: white !important;

    } */
    .backimage{
        background-image: url(https://www.wallpapertip.com/wmimgs/227-2278824_pink-wallpaper-for-phone.jpg);
    }
</style>
