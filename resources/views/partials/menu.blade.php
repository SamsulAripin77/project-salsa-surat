<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
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
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_alert_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userAlert.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('master_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/unit-kerjas*") ? "c-show" : "" }} {{ request()->is("admin/jabatans*") ? "c-show" : "" }} {{ request()->is("admin/keterangans*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-arrow-alt-circle-right c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.master.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('unit_kerja_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.unit-kerjas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/unit-kerjas") || request()->is("admin/unit-kerjas/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.unitKerja.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('jabatan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.jabatans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/jabatans") || request()->is("admin/jabatans/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-sign-language c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.jabatan.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('keterangan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.keterangans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/keterangans") || request()->is("admin/keterangans/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-sticky-note c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.keterangan.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan

        @can('laporan_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/laporan-harians*") ? "c-show" : "" }} {{ request()->is("admin/laporan-poto-harians*") ? "c-show" : "" }} {{ request()->is("admin/laporan-harian-keterlambatans*") ? "c-show" : "" }} {{ request()->is("admin/laporan-bulanans*") ? "c-show" : "" }} {{ request()->is("admin/laporan-bulan-pegawais*") ? "c-show" : "" }} {{ request()->is("admin/laporan-periodiks*") ? "c-show" : "" }} {{ request()->is("admin/laporan-resume-bulanans*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-sticky-note c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.laporan.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('laporan_harian_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.laporan-harians.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/laporan-harians") || request()->is("admin/laporan-harians/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-tasks c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.laporanHarian.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('laporan_poto_harian_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.laporan-poto-harians.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/laporan-poto-harians") || request()->is("admin/laporan-poto-harians/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-camera-retro c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.laporanPotoHarian.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('laporan_harian_keterlambatan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.laporan-harian-keterlambatans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/laporan-harian-keterlambatans") || request()->is("admin/laporan-harian-keterlambatans/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-clock c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.laporanHarianKeterlambatan.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('laporan_bulanan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.laporan-bulanans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/laporan-bulanans") || request()->is("admin/laporan-bulanans/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-reply-all c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.laporanBulanan.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('laporan_bulan_pegawai_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.laporan-bulan-pegawais.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/laporan-bulan-pegawais") || request()->is("admin/laporan-bulan-pegawais/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.laporanBulanPegawai.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('laporan_periodik_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.laporan-periodiks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/laporan-periodiks") || request()->is("admin/laporan-periodiks/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.laporanPeriodik.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('laporan_resume_bulanan_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.laporan-resume-bulanans.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/laporan-resume-bulanans") || request()->is("admin/laporan-resume-bulanans/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-percent c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.laporanResumeBulanan.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
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