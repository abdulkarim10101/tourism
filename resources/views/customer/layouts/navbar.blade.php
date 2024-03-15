@foreach ($categories->where('parent_id', null) as $category)


    <!-- Nav Item MegaMenu -->
    <li class="nav-item @if ($category->children->isNotEmpty()) hs-has-mega-menu @endif u-header__nav-item" data-event="hover" @if ($category->children->isNotEmpty())
        data-animation-in="slideInUp"
        data-animation-out="fadeOut"
@endif
data-position="left">
<a id="basicMegaMenu" class="nav-link u-header__nav-link @if ($category->children->isNotEmpty()) u-header__nav-link-toggle @else font-weight-bold" @endif @if ($category->children->isNotEmpty()) href="{{route('shop.productbycategory',$category->slug)}}" @else href=" javascript:;" @endif
    aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
@if ($category->children->isNotEmpty())

    <!-- Nav Item - Mega Menu -->
    <div class="hs-mega-menu vmm-tfw u-header__sub-menu" aria-labelledby="basicMegaMenu">
        <!-- <div class="vmm-bg">
                <img class="img-fluid" src="../assets/img/500X400/img1.png" alt="Image Description">
            </div> -->
        <div class="row u-header__mega-menu-wrapper">
            @foreach ($category->children as $category1)

                <div class="col mb-3 mb-sm-0">
                    <span class="u-header__sub-menu-title">{{ $category1->name }}</span>
                    <ul class="u-header__sub-menu-nav-group mb-3">
                        <li>
                            <a class="nav-link u-header__sub-menu-nav-link" href="{{route('shop.productbycategory',$category1->slug)}}">All
                                {{ $category1->name }}</a>
                        </li>
                        @if ($category1->children->isNotEmpty())

                            @foreach ($category1->children as $category2)
                                <li>
                                    <a class="nav-link u-header__sub-menu-nav-link"
                                        href="{{route('shop.productbycategory',$category2->slug)}}">{{ $category2->name }}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>

            @endforeach
        </div>
    </div>
    <!-- End Nav Item - Mega Menu -->

@endif

</li>
@endforeach
