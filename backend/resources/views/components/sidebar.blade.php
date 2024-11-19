<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">ShafeShroom</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <!-- Dashboard Section -->
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ url('dashboard') }}" class="nav-link">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Data Mushroom Section -->
            <li class="menu-header">Data Mushroom</li>
            <li class="nav-item dropdown {{ Request::is('mushrooms/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-columns"></i> 
                    <span>Mushroom Catalog</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('mushrooms/inedible') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('mushroom.inedible') }}">Inedible</a>
                    </li>
                    <li class="{{ Request::is('mushrooms/edible') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('mushroom.edible') }}">Edible</a>
                    </li>
                </ul>
            </li>

            <!-- Recommendation Section -->
            <li class="menu-header">Recommendation</li>
            <li class="{{ Request::is('recommendations*') ? 'active' : '' }}">
                <a href="{{ route('recommendations.index') }}" class="nav-link">
                    <i class="fas fa-lightbulb"></i> 
                    <span>Recommendations</span>
                </a>
            </li>
              <!-- Article Section -->
        <li class="menu-header">Article</li>
        <li class="nav-item {{ Request::is('articles*') ? 'active' : '' }}">
            <a href="{{ route('articles.index') }}" class="nav-link">
                <i class="fas fa-book"></i>
                <span>Articles</span>
            </a>
        </li>
        </ul>
    </aside>
</div>
