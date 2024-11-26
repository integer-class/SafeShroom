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
        <li class="nav-item {{ Request::is('mushrooms') ? 'active' : '' }}">
            <a href="{{ route('mushroom.index') }}" class="nav-link">
                <i class="fas fa-cog"></i> 
                <span>Mushroom Catalog</span>
            </a>
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
        <li class="menu-header">Summary Result</li>
        <li class="nav-item {{ Request::is('summary-results*') ? 'active' : '' }}">
            <a href="{{ route('summary-results.index') }}" class="nav-link">
                <i class="fas fa-book"></i>
                <span>Summary Results</span>
            </a>
        </li>        
        </ul>
    </aside>
</div>
