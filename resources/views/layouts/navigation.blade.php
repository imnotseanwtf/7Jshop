<ul class="nav flex-column pt-3 pt-md-0">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-3">
                {{-- <img src="{{ asset('images/brand/light.svg') }}" height="20" width="20" alt="Volt Logo"> --}}
            </span>
            <span class="mt-1 ms-1 sidebar-text">
                <div class="d-flex">
                    <img src="{{ asset('images/brand/logo.png') }}" alt="" class="me-3" height="25"
                        width="25">
                    <span>7J|Web Portal</span>
                </div>
            </span>
        </a>
    </li>

    @admin
        <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
            <a href="{{ route('home') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Dashboard') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('audit.index') ? 'active' : '' }}">
            <a href="{{ route('audit.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Audit') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('product.index') ? 'active' : '' }}">
            <a href="{{ route('product.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Products') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('marketplace') ? 'active' : '' }}">
            <a href="{{ route('marketplace') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Marketplace') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
            <a href="{{ route('about.create') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('About us') }}</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('top-customer.index') ? 'active' : '' }}">
            <a href="{{ route('top-customer.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Top Customers') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('quotation.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Quotation') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin-supplier.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Supplier(Request)') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('order.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Order') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('sales-report.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Sales Report') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('inventory.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Inventory System') }}</span>
            </a>
        </li>
    @endadmin

    @supplier
        <li class="nav-item {{ request()->routeIs('supplierHome') ? 'active' : '' }}">
            <a href="{{ route('supplierHome') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Dashboard') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('product.index') ? 'active' : '' }}">
            <a href="{{ route('product.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Products') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('marketplace') ? 'active' : '' }}">
            <a href="{{ route('marketplace') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Marketplace') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('order.index') ? 'active' : '' }}">
            <a href="{{ route('order.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Order') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('quotation.index') ? 'active' : '' }}">
            <a href="{{ route('quotation.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Quotation') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('staffs') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Staffs') }}</span>
            </a>
        </li>
    @endsupplier

    @user
        <li class="nav-item {{ request()->routeIs('userHome') ? 'active' : '' }}">
            <a href="{{ route('userHome') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Dashboard') }}</span>
            </a>
        </li>
        <li class="nav-item {{ request()->routeIs('marketplace') ? 'active' : '' }}">
            <a href="{{ route('marketplace') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Marketplace') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('supplier-request.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Request Supplier') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('quotation.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Quotation') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('order.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Orders') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('staffs') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Staffs') }}</span>
            </a>
        </li>
    @enduser

    @staff
        <li class="nav-item">
            <a href="{{ route('quotation.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Quotation') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('sales-report.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Sales Report') }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('order.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Orders') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('inventory.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Inventory System') }}</span>
            </a>
        </li>
    @endstaff
</ul>
