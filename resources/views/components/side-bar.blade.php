<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="/assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Otika</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li>
            <a href="{{ route('company.index') }}"><i data-feather="briefcase"></i><span>Company</span></a>
        </li>
        <li>
            <a href="{{ route('category.index') }}"><i data-feather="briefcase"></i><span>Category</span></a>
        </li>
        <li>
            <a href="{{ route('post.index') }}"><i data-feather="briefcase"></i><span>Post</span></a>
        </li>
    </ul>
</aside>
