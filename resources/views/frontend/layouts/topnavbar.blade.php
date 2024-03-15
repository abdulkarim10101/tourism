@foreach ($categories->where('parent_id', null) as $category)
@if ($category->children->isNotEmpty())
        @if (count($category->children) < 10)
    <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover" data-animation-in="slideInUp"
        data-animation-out="fadeOut">
        <a id="blogMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" @if ($category->children->isEmpty()) href="{{ route('shop.productbycategory', $category->slug) }}" @else href=" javascript:;" @endif
            aria-haspopup="true" aria-expanded="false" aria-labelledby="blogSubMenu">{{ $category->name }}</a>

        <!-- Blog - Submenu -->
        <ul id="blogSubMenu" class="hs-sub-menu u-header__sub-menu" aria-labelledby="blogMegaMenu"
            style="min-width: 230px;">
            @foreach ($category->children as $category1)
            <li><a class="nav-link u-header__sub-menu-nav-link" href="{{ route('shop.productbycategory', $category1->slug) }}">{{ $category1->name }}</a></li>
           @endforeach
        </ul>
        <!-- End Submenu -->
    </li>
@else
<li class="nav-item @if ($category->children->isNotEmpty()) hs-has-mega-menu @endif u-header__nav-item" @if ($category->children->isNotEmpty()) data-event="hover" @endif data-animation-in=" slideInUp" data-animation-out="fadeOut">
    <a id="HomeMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle" @if ($category->children->isEmpty()) href="{{ route('shop.productbycategory', $category->slug) }}" @else href=" javascript:;" @endif
        aria-haspopup="true" aria-expanded="false">{{ $category->name }}
    </a>

    <!-- Home - Mega Menu -->
    <div class="hs-mega-menu w-100 u-header__sub-menu" aria-labelledby="HomeMegaMenu">
        <div class="row u-header__mega-menu-wrapper">
            @foreach ($category->children as $category1)
                <div class="col-md-3">
                    <span class="u-header__sub-menu-title"><a
                            href="{{ route('shop.productbycategory', $category1->slug) }}"
                            class="nav-link u-header__sub-menu-nav-link"> {{ $category1->name }}</a></span>
                    <ul class="u-header__sub-menu-nav-group">
                        @foreach ($category1->children as $category2)
                            <li><a href="{{ route('shop.productbycategory', $category2->slug) }}"
                                    class="nav-link u-header__sub-menu-nav-link">{{ $category2->name }}</a></li>
                        @endforeach
                    </ul>

                </div>
            @endforeach


        </div>
    </div>

    <!-- End Home - Submenu -->
</li>
@endif

@endif

@endforeach



{{-- <li class="nav-item u-header__nav-item">
    <a class="nav-link u-header__nav-link" href="{{route('aboutus')}}">About us</a>
</li>
<!-- End About us -->


<!-- Contact Us -->
<li class="nav-item u-header__nav-item">
    <a class="nav-link u-header__nav-link" href="{{route('contact')}}">Contact
        Us</a>
</li> --}}
