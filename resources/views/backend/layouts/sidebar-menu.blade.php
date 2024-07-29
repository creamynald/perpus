<li class="nav-main-heading">Menu</li>

<li class="nav-main-item">
    <a class="nav-main-link {{ request()->segment(3) == 'pinjam-buku' ? 'active' : '' }}"
        href="{{ route('pinjam-buku.index') }}">
        <i class="nav-main-link-icon fa fa-list"></i>
        <span class="nav-main-link-name">Peminjaman</span>
    </a>
</li>
<li class="nav-main-item {{ request()->segment(2) == 'pustaka' ? 'open' : '' }}">
    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
        href="#">
        <i class="nav-main-link-icon fa fa-book"></i>
        <span class="nav-main-link-name">Pustaka</span>
    </a>
    <ul class="nav-main-submenu">
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'kategori' ? 'active' : '' }}"
                href="{{ route('kategori.index') }}">
                <span class="nav-main-link-name">Data Kategori</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'penulis' ? 'active' : '' }}"
                href="{{ route('penulis.index') }}">
                <span class="nav-main-link-name">Data Penulis</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'penerbit' ? 'active' : '' }}"
                href="{{ route('penerbit.index') }}">
                <span class="nav-main-link-name">Data Penerbit</span>
            </a>
        </li>
        <li class="nav-main-item">
            <a class="nav-main-link {{ request()->segment(3) == 'buku' ? 'active' : '' }}"
                href="{{ route('buku.index') }}">
                <span class="nav-main-link-name">Data Pustaka</span>
            </a>
        </li>
    </ul>
</li>
@role(['admin', 'super admin'])
    <li class="nav-main-item {{ request()->segment(2) == 'laporan' ? 'open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
            href="#">
            <i class="nav-main-link-icon fa fa-file-pdf"></i>
            <span class="nav-main-link-name">Laporan</span>
        </a>
        <ul class="nav-main-submenu">
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->segment(3) == 'peminjaman' ? 'active' : '' }}"
                    href="{{ route('lap-peminjaman.index') }}">
                    <span class="nav-main-link-name">Lap. Peminjaman</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->segment(3) == 'pustaka' ? 'active' : '' }}"
                    href="{{ route('lap-pustaka.index') }}">
                    <span class="nav-main-link-name">Lap. Pustaka</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->segment(3) == 'anggota' ? 'active' : '' }}"
                    href="{{ route('lap-anggota.index') }}">
                    <span class="nav-main-link-name">Lap. Anggota</span>
                </a>
            </li>
        </ul>
    </li>
@endrole
<li class="nav-main-item">
    <a class="nav-main-link" href="{{ route('anggota.index') }}">
        <i class="nav-main-link-icon fa fa-users"></i>
        <span class="nav-main-link-name">Pengguna</span>
    </a>
</li>
<li class="nav-main-item">
    <a class="nav-main-link" href="#">
        <i class="nav-main-link-icon fa fa-gear"></i>
        <span class="nav-main-link-name">Pengaturan</span>
    </a>
</li>
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
