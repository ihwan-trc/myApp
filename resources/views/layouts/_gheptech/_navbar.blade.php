<nav id="navbar" class="navbar">
    <ul>
        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="{{ route('product.index') }}">Shop</a></li>
        <li><a class="nav-link scrollto" href="tutorial.html">Tutorial</a></li>
        <li class="dropdown"><a href="#services"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li><a href="#">Website <span class="badge bg-danger">HOT</span></a></li>
                <li><a href="#">Desain Logo</a></li>
                <li><a href="#">Mobile App</a></li>
                <li><a href="#">SEO</a></li>
            </ul>
        </li>
        <li><a class="nav-link   scrollto" href="#portfolio">Portfolio <span class="badge bg-info">New</span></a></li>
        <li><a class="nav-link   scrollto" href="#portfolio">Team</a></li>
        <li class="dropdown">
            <a href="#services"><span>Layanan</span>
                <i class="bi bi-chevron-down"></i>
            </a>
            <ul>
                <li><a href="#">ID</a></li>
                <li><a href="#">EN</a></li>
            </ul>
        </li>
        <!-- lang:start -->
        <li class="dropdown">
            <a href="#">
                @switch(app()->getLocale())
                    @case('id')
                        Bahasa</i>
                    @break
                    @case('en')
                        Language</i>
                    @break
                @endswitch 
                <i class="bi bi-chevron-down"></i>
            </a>
            <ul>
                <li>
                    <a href="{{ route('localization.switch',['language' => 'id']) }}">
                        {{ trans('localization.id') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('localization.switch',['language' => 'en']) }}">
                        {{ trans('localization.en') }}
                    </a>
                </li>
            </ul>
        </li>
        <!-- lang:end -->
    </ul>
    <i class="bi bi-list mobile-nav-toggle"></i>
</nav>