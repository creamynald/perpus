<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Form @yield('subTitle')</h3>
        <div class="block-options">
            <button type="submit" class="btn-block-option">
                <i class="fa fa-fw fa-check opacity-50"></i> {{ $submit }}
            </button>
            <a href="{{ route('daftar-anggota.index') }}" class="btn-block-option">Back</a>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="name">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $user->name) }}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="email">Surel</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ old('email') ?? $user->email }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @if (request()->routeIs('daftar-anggota.edit'))
                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah password</small>
                    @endif
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="L"
                            {{ old('jenis_kelamin') == 'L' ? 'selected' : ($user->jenis_kelamin == 'L' ? 'selected' : '') }}>
                            Laki-laki</option>
                        <option value="P"
                            {{ old('jenis_kelamin') == 'P' ? 'selected' : ($user->jenis_kelamin == 'P' ? 'selected' : '') }}>
                            Perempuan</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="status">Status Akun</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="aktif"
                            {{ old('status') == 'aktif' ? 'selected' : ($user->status == 'aktif' ? 'selected' : '') }}>
                            Aktif</option>
                        <option value="nonaktif"
                            {{ old('status') == 'nonaktif' ? 'selected' : ($user->status == 'nonaktif' ? 'selected' : '') }}>
                            Non-Aktif</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="kelas">Kelas</label>
                    <select class="form-select" id="kelas" name="kelas" required>
                        @for ($i = 1; $i <= 6; $i++)
                            <option value="{{ $i }}"
                                {{ old('kelas') == $i ? 'selected' : ($user->kelas == $i ? 'selected' : '') }}>
                                {{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                        value="{{ old('tempat_lahir') ?? $user->tempat_lahir }}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="no_telp">No. Telp</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                        value="{{ old('no_telp') ?? $user->no_telp }}" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat') ?? $user->alamat }}</textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                        value="{{ old('tgl_lahir') ?? $user->tgl_lahir }}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="agama">Agama</label>
                    <select class="form-select" id="agama" name="agama" required>
                        <option value="islam"
                            {{ old('agama') == 'islam' ? 'selected' : ($user->agama == 'islam' ? 'selected' : '') }}>
                            Islam</option>
                        <option value="kristen"
                            {{ old('agama') == 'kristen' ? 'selected' : ($user->agama == 'kristen' ? 'selected' : '') }}>
                            Kristen</option>
                        <option value="katolik"
                            {{ old('agama') == 'katolik' ? 'selected' : ($user->agama == 'katolik' ? 'selected' : '') }}>
                            Katolik</option>
                        <option value="hindu"
                            {{ old('agama') == 'hindu' ? 'selected' : ($user->agama == 'hindu' ? 'selected' : '') }}>
                            Hindu</option>
                        <option value="buddha"
                            {{ old('agama') == 'buddha' ? 'selected' : ($user->agama == 'buddha' ? 'selected' : '') }}>
                            Buddha</option>
                        <option value="konghucu"
                            {{ old('agama') == 'konghucu' ? 'selected' : ($user->agama == 'konghucu' ? 'selected' : '') }}>
                            Konghucu</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="foto">Foto</label>
                    <input class="form-control" type="file" id="foto" name="foto"
                        {{ request()->routeIs('anggota.create') ? 'required' : '' }}>
                    <div class="form-text text-danger">* kurang dari 2MB</div>
                    @if ($user->foto)
                        <img src="{{ asset('storage/' . $user->foto) }}" alt="Current Photo"
                            class="img-thumbnail mt-2" width="150">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
