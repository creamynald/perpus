<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Table @yield('subTitle')</h3>
        <div class="block-options">
            @include('backend.pengaturan.anggota.partials.button', [
                'submit' => 'tambah',
                'back' => 'kembali',
            ])
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-sm-7">
                <div class="mb-4">
                    <label class="form-label" for="email">Surel</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
            </div>
            <div class="col-sm">
                <div class="mb-4">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="col-sm">
                <div class="mb-4">
                    <label class="form-label" for="status">Status Akun</label>
                    <select class="form-select" id="status" name="status">
                        <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="nonaktif" {{ old('status') == 'nonaktif' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                </div>
            </div>
            <div class="col-sm">
                <div class="mb-4">
                    <label class="form-label" for="kelas">Kelas</label>
                    <select class="form-select" id="kelas" name="kelas">
                        <option value="1" {{ old('kelas') == '1' ? 'selected' : '' }}>1</option>
                        <option value="2" {{ old('kelas') == '2' ? 'selected' : '' }}>2</option>
                        <option value="3" {{ old('kelas') == '3' ? 'selected' : '' }}>3</option>
                        <option value="4" {{ old('kelas') == '4' ? 'selected' : '' }}>4</option>
                        <option value="5" {{ old('kelas') == '5' ? 'selected' : '' }}>5</option>
                        <option value="6" {{ old('kelas') == '6' ? 'selected' : '' }}>6</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <div class="mb-4">
                        <label class="form-label" for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                    </div>
                </div>
                <div class="col-sm">
                    <div class="mb-4">
                        <label class="form-label" for="no_telp">No. Telp</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-4">
                        <label class="form-label" for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat') }}</textarea>
                    </div>
                </div>
                <div class="col-sm mb">
                    <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                </div>
                <div class="col-sm">
                    <div class="mb-4">
                        <label class="form-label require" for="foto">Foto</label>
                        <input class="form-control" type="file" id="foto" name="foto">
                        <div class="form-text text-danger">* kurang dari 2MB</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>