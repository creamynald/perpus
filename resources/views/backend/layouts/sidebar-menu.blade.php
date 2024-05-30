@hasrole(['admin', 'super admin'])
<li class="nav-main-heading">Menu</li>
<li class="nav-main-item">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
        href="#">
        <i class="nav-main-link-icon far fa-note-sticky"></i>
        <span class="nav-main-link-name">Administrasi</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link" href="javascript:void(0)">
                <span class="nav-main-link-name">Peminjaman Buku</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="javascript:void(0)">
                <span class="nav-main-link-name">Pengembalian Buku</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="javascript:void(0)">
                <span class="nav-main-link-name">Data Pustaka</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="javascript:void(0)">
                <span class="nav-main-link-name">Data Anggota</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="javascript:void(0)">
                <span class="nav-main-link-name">Pengaturan</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-main-item">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
        href="#">
        <i class="nav-main-link-icon far fa-note-sticky"></i>
        <span class="nav-main-link-name">Laporan</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link" href="javascript:void(0)">
                <span class="nav-main-link-name">Lap. Peminjaman Buku</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link" href="javascript:void(0)">
                <span class="nav-main-link-name">Lap. Pengembalian Buku</span>
            </a>
        </li>
    </ul>
</li>
@endhasrole
@hasrole('super admin')
<li class="nav-main-heading">Administrator</li>
<li class="nav-main-item {{ request()->segment(2) == 'role-and-permission' ? 'open' : '' }}">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
        href="#">
        <i class="nav-main-link-icon fa fa-road-lock"></i>
        <span class="nav-main-link-name">Role & Permission</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'roles' ? 'active' : '' }}"
                href="{{ route('roles.index') }}">
                <span class="nav-main-link-name">Roles</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'permissions' ? 'active' : '' }}"
                href="{{ route('permissions.index') }}">
                <span class="nav-main-link-name">Permissions</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'assignable' ? 'active' : '' }}"
                href="{{ route('assignable.index') }}">
                <span class="nav-main-link-name">Assign Permission</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'assign' ? 'active' : '' }}"
                href="{{ route('user.index') }}">
                <span class="nav-main-link-name">Permission to Users</span>
            </a>
        </li>
    </ul>
</li>
@endhasrole