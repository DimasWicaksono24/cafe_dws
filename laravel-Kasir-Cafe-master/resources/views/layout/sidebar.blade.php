<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.html"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        @if (auth()->user()->role =="admin")
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('indexadmin')}}"
                                aria-expanded="false">
                                <i class="fa-solid fa-user-bounty-hunter"></i>
                                <span class="hide-menu">Data User</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('createadmin')}}"
                                aria-expanded="false">
                                <i class="fa-solid fa-user-bounty-hunter"></i>
                                <span class="hide-menu">Tambah Data</span>
                            </a>
                        </li>
                        @endif
                        @if (auth()->user()->role =="manager")
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('indexmanager')}}"
                                aria-expanded="false">
                                <i class="fa-solid fa-user-bounty-hunter"></i>
                                <span class="hide-menu">Data Menu</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('laporanmanager')}}"
                                aria-expanded="false">
                                <i class="fa-solid fa-user-bounty-hunter"></i>
                                <span class="hide-menu">Laporan</span>
                            </a>
                        </li>
                        @endif

                        @if (auth()->user()->role=="kasir")
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('indexkasir')}}"
                                aria-expanded="false">
                                <i class="fa-solid fa-user-bounty-hunter"></i>
                                <span class="hide-menu">Data Transaksi</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('createkasir')}}"
                                aria-expanded="false">
                                <i class="fa-solid fa-user-bounty-hunter"></i>
                                <span class="hide-menu">Pesan</span>
                            </a>
                        </li>
                        @endif


                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('logout')}}"
                                aria-expanded="false">
                                <i class="fa-solid fa-user-bounty-hunter"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                       
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>