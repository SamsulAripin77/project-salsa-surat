<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            SIMMAS
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }} {{ request()->is("admin/user-alerts*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                 
                </ul>
            </li>
        @endcan
        @can('surat_access')
        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/suratmasuks*") ? "c-show" : "" }} {{ request()->is("admin/suratkeluars*") ? "c-show" : "" }}">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-sticky-note c-sidebar-nav-icon">

                </i>
               Pendataan Surat
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a href="{{route('admin.suratmasuks.index')}}" class="c-sidebar-nav-link {{request()->is("admin/suratmasuks") || request()->is("admin/suratmasuks/*") ? "c-active": ""}}">
                        <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                        </i>
                        Surat Masuk
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a href="{{route('admin.suratkeluars.index')}}" class="c-sidebar-nav-link {{request()->is("admin/suratkeluars") || request()->is("admin/suratkeluars/*") ? "c-active": ""}}">
                        <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                        </i>
                        Surat Keluar
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        @can('pengarahan_access')
        @cannot('penerima')
        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/pengarahansuratmasuks*") ? "c-show" : "" }} {{ request()->is("admin/pengarahansuratkeluars*") ? "c-show" : "" }}">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                </i>
                @can('pengarahan_edit_sekertaris')
                Buat Pengarahan Surat
                @endcan
                @cannot('pengarahan_edit_sekertaris')
                Cek Pengarahan Surat
                @endcannot
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a href="{{route('admin.pengarahansuratmasuks.index')}}" class="c-sidebar-nav-link {{request()->is("admin/pengarahansuratmasuks") || request()->is("admin/pengarahansuratmasuks/*") ? "c-active": ""}}">
                        <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                        </i>
                        Surat Masuk
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a href="{{route('admin.pengarahansuratkeluars.index')}}" class="c-sidebar-nav-link {{request()->is("admin/pengarahansuratkeluars") || request()->is("admin/pengarahansuratkeluars/*") ? "c-active": ""}}">
                        <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                        </i>
                        Surat Keluar
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        @endcan
        @can('surat_laporan')
        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/surat-masuks/laporan*") ? "c-show" : "" }} {{ request()->is("admin/surat-keluars/laporan*") ? "c-show" : "" }}">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                </i>
               Laporan Surat
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a href="{{route('admin.suratmasuks-laporan')}}" class="c-sidebar-nav-link {{request()->is("admin/surat-masuks/laporan") || request()->is("admin/surat-masuks/laporan/*") ? "c-active": ""}}">
                        <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                        </i>
                        Surat Masuk
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a href="{{route('admin.suratkeluars-laporan')}}" class="c-sidebar-nav-link {{request()->is("admin/surat-keluars/laporan") || request()->is("admin/surat-keluars/laporan/*") ? "c-active": ""}}">
                        <i class="fa-fw fas fa-file c-sidebar-nav-icon">

                        </i>
                        Surat Keluar
                    </a>
                </li>
            </ul>
        </li>
        @endcan
        @can('kode_surat_access')
        <li class="c-sidebar-nav-item">
            <a href="{{route('admin.kategoris.index')}}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-pen">
                    
                </i>
                Kode Surat
            </a>
        </li>
        @endcan
        @can('penerima')
        <li class="c-sidebar-nav-item">
            <a href="{{route('admin.pengarahansuratmasuks.index')}}" class="c-sidebar-nav-link {{request()->is("admin/pengarahansuratmasuks") || request()->is("admin/pengarahansuratmasuks/*") ? "c-active": ""}}">
                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">
                    
                </i>
                Kotak Masuk
            </a>
        </li>
        @endcan
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>