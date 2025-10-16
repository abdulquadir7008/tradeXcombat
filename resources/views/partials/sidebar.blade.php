<!-- ========== App Menu ========== -->
<style>
    .child_menu{
        list-style-type: none;
    }
</style>

@php
    $pages = session('user_pages');
@endphp
{{-- {{ dd($pages) }} --}}
		<div class="app-menu navbar-menu">
			<!-- LOGO -->
			<div class="navbar-brand-box">
				<a href="{{ route('home') }}" class="logo logo-dark">
					<span class="logo-sm">
						<img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="26">
					</span>
					<span class="logo-lg">
						<img src="{{ asset('assets/images/Logo-2.png') }}" alt="" height="26">
					</span>
				</a>
				<a href="{{ route('home') }}" class="logo logo-light">
					<span class="logo-sm">
						<img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="26">
					</span>
					<span class="logo-lg">
						<img src="{{ asset('assets/images/Logo-2.png') }}" alt="" height="26">
					</span>
				</a>
				<button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
					<i class="ri-record-circle-line"></i>
				</button>
			</div>

			<div id="scrollbar">
				<div class="container-fluid">

					<div id="two-column-menu">
					</div>
					{{-- <ul class="navbar-nav" id="navbar-nav">

						<li class="menu-title"><span data-key="t-menu">Overview</span></li>
						<li class="nav-item">
							<a href="{{ route('home') }}" class="nav-link menu-link"> <i class="bi bi-speedometer2"></i> <span data-key="t-dashboard">Dashboard</span> </a>
						</li>

						<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">User Management</span></li>
						<li class="nav-item">
							<a href="{{ route('players') }}" class="nav-link menu-link"> <i class="bi bi-person-circle"></i> <span data-key="t-dashboard">Player List</span> </a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link menu-link"> <i class="bi bi-currency-dollar"></i> <span data-key="t-dashboard">Refer and Earn</span> </a>
						</li>

						<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Battle Management</span></li>
						<li class="nav-item">
							<a href="#" class="nav-link menu-link"> <i class="bi bi-person-circle"></i> <span data-key="t-dashboard">Combats Match</span> </a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link menu-link"> <i class="bi bi-person-circle"></i> <span data-key="t-dashboard">Loyalties</span> </a>
						</li>

						<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Finance Management</span></li>
						 <li class="nav-item">
							<a href="{{ route('paymentmethods') }}" class="nav-link menu-link"> <i class="bi bi-credit-card-2-front-fill"></i> <span data-key="t-dashboard">Payment Methods</span> </a>
						</li>
						<li class="nav-item">
							<a href="{{ route('transactions') }}" class="nav-link menu-link"> <i class="bi bi-arrow-left-right"></i> <span data-key="t-dashboard">Transaction</span> </a>
						</li>
						<li class="nav-item">
							<a href="{{ route('pendingtransactions') }}" class="nav-link menu-link"> <i class="bi bi-person-circle"></i> <span data-key="t-dashboard">Pending Transaction</span> </a>
						</li>
						<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Content Management</span></li>
						<li class="nav-item">
							<a href="{{ route('currencies') }}" class="nav-link menu-link"> <i class="bi bi-person-circle"></i> <span data-key="t-dashboard">Currency List</span> </a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link menu-link"> <i class="bi bi-person-circle"></i> <span data-key="t-dashboard">News And Tutorials</span> </a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link menu-link"> <i class="bi bi-person-circle"></i> <span data-key="t-dashboard">Events And Promotion</span> </a>
						</li>

						<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Masters Management</span></li>
						<li class="nav-item">
							<a href="{{ route('combattypes') }}" class="nav-link menu-link"> <i class="bi bi-dice-5"></i> <span data-key="t-dashboard">Combat Types</span> </a>
						</li>
						<li class="nav-item">
							<a href="{{ route('playersvs') }}" class="nav-link menu-link"> <i class="bi bi-person-circle"></i> <span data-key="t-dashboard">Players VS</span> </a>
						</li>
						<li class="nav-item">
							<a href="{{ route('tournaments') }}" class="nav-link menu-link"> <i class="bi bi-person-circle"></i> <span data-key="t-dashboard">Tournaments</span> </a>
						</li>
                        <li class="nav-item">
							<a href="{{ route('usdtAccounts') }}" class="nav-link menu-link"> <i class="bi bi-person-circle"></i> <span data-key="t-dashboard">USDT Accounts</span> </a>
						</li>

						<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">System Settings</span></li>
						<li class="nav-item">
							<a class="nav-link menu-link" href="#staff_management" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
								<i class="bi bi-journal-medical"></i> <span data-key="t-pages">Staff Management</span>
							</a>
							<div class="collapse menu-dropdown" id="staff_management">
								<ul class="nav nav-sm flex-column">
									<li class="nav-item">
										<a href="{{ route('staffList') }}" class="nav-link" data-key="t-starter"> Staff Management </a>
									</li>
                                    <li class="nav-item">
										<a href="{{ route('userroles') }}" class="nav-link" data-key="t-starter"> Roles </a>
									</li>
                                    <li class="nav-item">
										<a href="{{ route('permissions') }}" class="nav-link" data-key="t-starter"> Permissions </a>
									</li>
								</ul>
							</div>
						</li>

						<li class="nav-item">
							<a href="#" class="nav-link menu-link"> <i class="bi bi-person-circle"></i> <span data-key="t-dashboard">App Configuration</span> </a>
						</li>
						<li class="nav-item">
							<a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarPages">
								<i class="bi bi-journal-medical"></i> <span data-key="t-pages">Support</span>
							</a>
							<div class="collapse menu-dropdown" id="sidebarPages">
								<ul class="nav nav-sm flex-column">
									<li class="nav-item">
										<a href="#" class="nav-link" data-key="t-starter"> Starter </a>
									</li>
								</ul>
							</div>
						</li>
					</ul> --}}

                    <ul class="navbar-nav" id="navbar-nav">
                        @foreach ($pages as $categoryName => $menuItems)
                            <li class="menu-title"><span>{{ $categoryName }}</span></li>

                            @php
                                $parents = $menuItems->where('is_submenu', 0);
                            @endphp

                            @foreach ($parents as $parent)
                                @php
                                    $children = $menuItems->where('is_submenu', $parent->page_id);
                                    $collapseId = 'collapse_'.$parent->page_id;
                                @endphp

                                <li class="nav-item @if($children->isNotEmpty()) has-submenu @endif">
                                    @if ($children->isNotEmpty())
                                        <a href="#{{ $collapseId }}" class="nav-link menu-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="{{ $collapseId }}">
                                            <i class="{{ $parent->icon }}"></i>
                                            <span>{{ $parent->pagename }}</span>
                                        </a>
                                        <div class="collapse menu-dropdown" id="{{ $collapseId }}">
                                            <ul class="nav nav-sm flex-column">
                                                @foreach ($children as $child)
                                                    <li class="nav-item child_menu">
                                                        <a href="{{ url($child->filename) }}" class="nav-link">
                                                            <i class="{{ $child->icon }}"></i>
                                                            <span>{{ $child->pagename }}</span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <a href="{{ $parent->filename !== '#' ? url($parent->filename) : '#' }}" class="nav-link menu-link">
                                            <i class="{{ $parent->icon }}"></i>
                                            <span>{{ $parent->pagename }}</span>
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        @endforeach
                    </ul>




				</div>
				<!-- Sidebar -->
			</div>

			<div class="sidebar-background"></div>
		</div>
		<!-- Left Sidebar End -->
		<!-- Vertical Overlay-->
		<div class="vertical-overlay"></div>
