<!-- need to remove -->
<style>
    [class*=sidebar-dark-] .nav-sidebar>.nav-item1.menu-open>.nav-link,
    [class*=sidebar-dark-] .nav-sidebar>.nav-item1>.nav-link:focus {
        background-color: #0b195261;
        color: #ffffff;
    }

</style>
{{-- @if (auth()->user()->role->name=='Admin') --}}

    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link active">
            <i class="nav-icon fas fa-home"></i>
            <p>Home</p>
        </a>
    </li>


    <li class="nav-item has-treeview  @if(url()->current()==route('users.index') || url()->current()==route('users.create')) menu-open @endif">
        <a href="{{route('users.index')}}" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
                Users
                {{-- <i class="right fas fa-angle-left"></i> --}}
            </p>
        </a>
        {{-- <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('users.index')) far fa-dot-circle  red @endif" ></i>
                    <p>List</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('users.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('users.create')) far fa-dot-circle  red @endif"></i>
                    <p>Create</p>
                </a>
            </li>

        </ul> --}}
    </li>
    {{-- @endif --}}

    {{-- <li class="nav-item has-treeview  @if(url()->current()==route('vendors.index') || url()->current()==route('vendors.create')) menu-open @endif">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
                Vendors
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('vendors.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('vendors.index')) far fa-dot-circle  red @endif" ></i>
                    <p>List</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('vendors.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('vendors.create')) far fa-dot-circle  red @endif"></i>
                    <p>Create</p>
                </a>
            </li>

        </ul>
    </li> --}}

    <li class="nav-item has-treeview  @if(url()->current()==route('customers.index')) menu-open @endif">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
                Customers
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('customers.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('customers.index')) far fa-dot-circle  red @endif" ></i>
                    <p>List</p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ route('leads.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('users.create')) far fa-dot-circle  red @endif"></i>
                    <p>Create</p>
                </a>
            </li> --}}

        </ul>
    </li>

    <li class="nav-item has-treeview  @if(url()->current()==route('categories.index') || url()->current()==route('categories.create')) menu-open @endif">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
                Categories
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('categories.index')) far fa-dot-circle  red @endif" ></i>
                    <p>List</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('categories.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('categories.create')) far fa-dot-circle  red @endif"></i>
                    <p>Create</p>
                </a>
            </li>

        </ul>
    </li>


    <li class="nav-item has-treeview  @if(url()->current()==route('products.index') || url()->current()==route('products.create')) menu-open @endif">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
                Products
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">

            <li class="nav-item">
                <a href="{{ route('products.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('products.index')) far fa-dot-circle  red @endif" ></i>
                    <p>List</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('products.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('products.create')) far fa-dot-circle  red @endif"></i>
                    <p>Create</p>
                </a>
            </li>

        </ul>
    </li>


    <li class="nav-item has-treeview  @if(url()->current()==route('orders.index') || url()->current()==route('orders.create')) menu-open @endif">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
                Orders
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('orders.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('orders.index')) far fa-dot-circle  red @endif" ></i>
                    <p>List</p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="{{ route('orders.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('orders.create')) far fa-dot-circle  red @endif"></i>
                    <p>Create</p>
                </a>
            </li> --}}

        </ul>
    </li>



    <li class="nav-item has-treeview  @if(url()->current()==route('promocodes.index') || url()->current()==route('promocodes.create')) menu-open @endif">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
                Promo Codes
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('promocodes.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('promocodes.index')) far fa-dot-circle  red @endif" ></i>
                    <p>List</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('promocodes.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon @if(url()->current()==route('promocodes.create')) far fa-dot-circle  red @endif"></i>
                    <p>Create</p>
                </a>
            </li>

        </ul>
    </li>


    {{-- @if (auth()->user()->role->name=='Admin') --}}

    <li class="nav-item has-treeview nav-item1">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-cog"></i>
            <p>
                Settings
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>


    </li>
{{-- @endif --}}
