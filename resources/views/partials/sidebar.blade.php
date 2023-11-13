<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="{{ route('admin.dashboard.index') }}"><img src="{{ asset('back/srtdash-admin-dashboard-master/srtdash/assets/images/icon/logo.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    <li><a href="{{ route('admin.dashboard.index') }}"><i class="ti-dashboard"></i><span>Dashboard</span></a></li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-car"></i><span>Data Mobil</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('admin.mobil.index') }}">Tabel Data</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" aria-expanded="true"><i class="ti-email"></i><span>Data Pesan</span></a>
                        <ul class="collapse">
                            <li><a href="{{ route('admin.message.index') }}">Tabel Data</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>