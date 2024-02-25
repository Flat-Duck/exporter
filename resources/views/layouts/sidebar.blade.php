<header class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar">
            <div class="container-xl">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}" >
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="nav-link-title">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                            @can('view-any', App\Models\User::class)
                                <li class="nav-item {{ $page == 'users'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('users.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Users -->
                                            <!-- Users Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            Users
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Ad::class)
                                <li class="nav-item {{ $page == 'ads'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('ads.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Ads -->
                                            <!-- Ads Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            Ads
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\SupportType::class)
                                <li class="nav-item {{ $page == 'support-types'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('support-types.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Support Types -->
                                            <!-- Support Types Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            Support Types
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Exporter::class)
                                <li class="nav-item {{ $page == 'exporters'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('exporters.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Exporters -->
                                            <!-- Exporters Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            Exporters
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Company::class)
                                <li class="nav-item {{ $page == 'companies'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('companies.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Companies -->
                                            <!-- Companies Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            Companies
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Card::class)
                                <li class="nav-item {{ $page == 'cards'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('cards.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Cards -->
                                            <!-- Cards Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            Cards
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @can('view-any', App\Models\Support::class)
                                <li class="nav-item {{ $page == 'supports'? 'active':''  }}">
                                    <a class="nav-link" href="{{ route('supports.index') }}" >
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/Supports -->
                                            <!-- Supports Icon -->
                                        </span>
                                        <span class="nav-link-title">
                                            Supports
                                        </span>
                                    </a>
                                </li>
                            @endcan
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</header>