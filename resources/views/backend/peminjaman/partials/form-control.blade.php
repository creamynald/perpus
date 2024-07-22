<div class="block block-rounded">
    <div class="block-header block-header-default">
        <h3 class="block-title">Table @yield('subTitle')</h3>
        <div class="block-options">
            <button type="submit" class="btn-block-option">
                <i class="fa fa-fw fa-check opacity-50"></i> {{ $submit }}
            </button>
            <a href="{{ route('pinjam-buku.index') }}" class="btn-block-option">Kembali</a>
        </div>
    </div>
    <div class="block-content">
        <div class="row">
            @php
                $currentUser = auth()->user();
                $isSiswa = $currentUser->hasRole('siswa');
            @endphp

            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="user_id">Nama Siswa</label>
                    <select class="form-select" id="user_id" name="user_id" {{ $isSiswa ? 'disabled' : '' }}>
                        <option value="" disabled>Pilih Siswa</option>
                        @foreach ($dataSiswa as $row)
                            <option value="{{ $row->id }}"
                                {{ ($isSiswa && $currentUser->id == $row->id) || (isset($model) && $model->user_id == $row->id) ? 'selected' : '' }}>
                                {{ $row->name }}
                            </option>
                        @endforeach
                    </select>
                    @if ($isSiswa)
                        <input type="hidden" name="user_id" value="{{ $currentUser->id }}">
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="pustaka_id">Buku</label>
                    <select class="form-select" id="pustaka_id" name="pustaka_id">
                        <option value="" disabled>Pilih Buku</option>
                        @foreach ($dataBuku as $row)
                            <option value="{{ $row->id }}"
                                {{ isset($model) && $model->pustaka_id == $row->id ? 'selected' : '' }}>
                                {{ $row->judul_pustaka }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="tanggal_pinjam">Tanggal Pinjam</label>
                    <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"
                        value="{{ isset($model) ? $model->tanggal_pinjam : '' }}">
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-4">
                    <label class="form-label" for="tanggal_kembali">Tanggal Kembali</label>
                    <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali"
                        value="{{ isset($model) ? $model->tanggal_kembali : '' }}">
                </div>
            </div>
        </div>
    </div>
</div>
