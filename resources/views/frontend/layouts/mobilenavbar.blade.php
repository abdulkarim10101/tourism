<!-- List -->
<ul id="headerSidebarList" class="u-header-collapse__nav">
    <!-- Home Section -->
    <li class="u-has-submenu u-header-collapse__submenu">
        <a class="u-header-collapse__nav-link" href="{{ route('shop.index') }}">
            Home
        </a>


    </li>
    <!-- End Home Section -->

    <!-- Shop Pages -->

    @foreach ($categories->where('parent_id', null) as $category)
        <li class="u-has-submenu u-header-collapse__submenu">
            <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" @if ($category->children->isNotEmpty()) href="javascript:;" @else href="{{ route('shop.productbycategory', $category->slug) }}" @endif
                data-target="#headerSidebarPagesCollapse{{$category->id}}" role="button" data-toggle="collapse" aria-expanded="false"
                aria-controls="headerSidebarPagesCollapse">
                {{ $category->name }}
            </a>

            @if ($category->children->isNotEmpty())
                <div id="headerSidebarPagesCollapse{{$category->id}}" class="collapse" data-parent="#headerSidebarContent">
                    <ul id="headerSidebarPagesMenu" class="u-header-collapse__nav-list">
                        <!-- Shop Grid -->
                        @foreach ($category->children as $category1)
                            <li>
                                <a class="u-header-collapse__submenu-nav-link"
                                    href="{{ route('shop.productbycategory', $category1->slug) }}">
                                    {{ $category1->name }}
                                </a>
                            </li>
                        @endforeach
                        <!-- End Shop Grid -->

                        <!-- Shop List View -->
                        <!-- End Shop Right Sidebar -->
                    </ul>
                </div>
            @endif
        </li>

    @endforeach
    <!-- End Shop Pages -->




    <!-- Blog Pages -->
    {{-- <li class="u-has-submenu u-header-collapse__submenu">
        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;"
            data-target="#headerSidebarblogsCollapse" role="button" data-toggle="collapse" aria-expanded="false"
            aria-controls="headerSidebarblogsCollapse">
            Blog Pages
        </a>

        <div id="headerSidebarblogsCollapse" class="collapse" data-parent="#headerSidebarContent">
            <ul id="headerSidebarblogsMenu" class="u-header-collapse__nav-list">
                <!-- Blog v1 -->
                <li><a class="u-header-collapse__submenu-nav-link" href="../blog/blog-v1.html">Blog v1</a>
                </li>
                <!-- End Blog v1 -->

                <!-- Blog v2 -->
                <li><a class="u-header-collapse__submenu-nav-link" href="../blog/blog-v2.html">Blog v2</a>
                </li>
                <!-- End Blog v2 -->

                <!-- Blog v3 -->
                <li><a class="u-header-collapse__submenu-nav-link" href="../blog/blog-v3.html">Blog v3</a>
                </li>
                <!-- End Blog v3 -->

                <!-- Blog Full Width -->
                <li><a class="u-header-collapse__submenu-nav-link" href="../blog/blog-full-width.html">Blog
                        Full Width</a></li>
                <!-- End Blog Full Width -->

                <!-- Single Blog Post -->
                <li><a class="u-header-collapse__submenu-nav-link" href="../blog/single-blog-post.html">Single
                        Blog Post</a></li>
                <!-- End Single Blog Post -->
            </ul>
        </div>
    </li> --}}
    <!-- End Blog Pages -->

</ul>
<!-- End List -->
