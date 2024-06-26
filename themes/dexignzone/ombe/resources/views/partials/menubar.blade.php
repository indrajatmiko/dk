@if(request()->segment(1) === 'home' OR request()->segment(1) === 'cart' OR request()->segment(1) === 'faq' OR request()->segment(1) === 'profile')
    <!-- Menubar -->
    <div class="menubar-area footer-fixed">
        <div class="toolbar-inner menubar-nav">
            <a href="{{ route('home.index') }}" class="nav-link @if(request()->segment(1) === 'home') active @endif">
                <i class="fi fi-rr-home"></i>
            </a>
            <a href="{{ route('home.cart') }}" class="nav-link @if(request()->segment(1) === 'cart') active @endif">
                <i class="fi fi-rr-shopping-cart"></i>
            </a>
            <a href="{{ route('home.faq') }}" class="nav-link @if(request()->segment(1) === 'faq') active @endif">
                <i class="fi fi-rr-comments"></i>
            </a>
            <a href="{{ route('home.profile') }}" class="nav-link @if(request()->segment(1) === 'profile') active @endif">
                <i class="fi fi-rr-user"></i>
            </a>
        </div>
    </div>
    <!-- Menubar -->
@endif
