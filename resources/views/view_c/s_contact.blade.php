@if ($contact->isEmpty())
    <h6>Siswa Belum memiliki kontak</h6>
@else
    @foreach ($contact as $item)
        <div class="card">
            <div class="card-header">
                <strong>{{ $item->contact  }}</strong>
            </div>
            <div class="card-body">
                <strong>Tanggal Projek :</strong>
                <p>{{ $item->tanggal }}</p>
                <strong>Deskripsi Projek :</strong>
                <p>{{ $item->deskripsi }}</p>
            </div>

            <div class="card-footer d-flex justify-content-end">
                <a href="{{ route('master_project.edit', $item->id) }}" class="btn btn-sm btn-warning "><i class="fas fa-edit"></i></a>
                <a href="{{ route('master_project.hapus', $item->id) }}" class="btn btn-sm btn-danger "><i class="fas fa-trash"></i></a>
            </div>
        </div>
        <br>
    @endforeach
@endif
