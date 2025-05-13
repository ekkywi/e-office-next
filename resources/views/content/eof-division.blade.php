@extends("layout.eof
")
@section("title")
    Divisi {!! "&mdash;" !!} E-Office
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Divisi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("eof/dashboard") }}"><i class="fas fa-rocket"></i> E-Office</a></div>
                <div class="breadcrumb-item"><a href="{{ url("eof/maintenance") }}"><i class="fas fa-wrench"></i> Maintenance</a></div>
                <div class="breadcrumb-item"><a href="{{ url("eof/maintenance/organization") }}"><i class="fas fa-people-group"></i> Organisasi</a></div>
                <div class="breadcrumb-item active"><i class="fas fa-sitemap"></i> Divisi</div>
            </div>
        </div>

        <div class="section-body">
            @if (session("success"))
                <div class="alert alert-success">
                    {{ session("success") }}
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Divisi</h4>
                            <div class="card-header-form">
                                <form>
                                    <div class="input-group">
                                        <input class="form-control" placeholder="Search" type="text">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <button class="btn btn-primary ml-2" data-target="#addDivisionModal" data-toggle="modal">Tambah Data</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-border text-center table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Tag</th>
                                            <th>Warna Tag</th>
                                            <th>Jumlah Pegawai</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($divisions as $division)
                                            <tr>
                                                <td>{{ $division->name }}</td>
                                                <td>{{ $division->tag }}</td>
                                                <td>
                                                    <span class="badge" style="color: {{ $division->color }};">{{ $division->tag }}</span>
                                                </td>
                                                </td>
                                                <td>{{ $division->users_count }}</td>
                                                <td>
                                                    <button class="btn btn-info btn-sm" data-color="{{ $division->color }}" data-id="{{ $division->id }}" data-name="{{ $division->name }}" data-tag="{{ $division->tag }}" data-target="#editDivisionModal" data-toggle="modal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Divisi -->
    <div aria-hidden="true" aria-labelledby="addDivisionModalLabel" class="modal fade" id="addDivisionModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDivisionModalLabel">Tambah Data Divisi</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("eofmaintenance.organization.division.store") }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Divisi</label>
                            <input class="form-control" id="name" name="name" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="tag">Tag Divisi</label>
                            <input class="form-control" id="tag" name="tag" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="color">Warna Divisi</label>
                            <input class="form-control" id="color" name="color" type="color" value="#000000">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Divisi -->
    <div aria-hidden="true" aria-labelledby="editDivisionModalLabel" class="modal fade" id="editDivisionModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDivisionModalLabel">Edit Data Divisi</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("eofmaintenance.organization.division.update", ["id" => ""]) }}" id="editDivisionForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input id="editDivisionId" name="id" type="hidden">
                        <div class="form-group">
                            <label for="editName">Nama Divisi</label>
                            <input class="form-control" id="editName" name="name" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="editTag">Tag Divisi</label>
                            <input class="form-control" id="editTag" name="tag" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="editColor">Warna Divisi</label>
                            <input class="form-control" id="editColor" name="color" type="color" value="#000000">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Form -->
    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
    </form>
@endsection

@section("script")
    {{-- JS Libraies --}}
    <script src="{{ asset("modules/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("modules/popper/popper.js") }}"></script>
    <script src="{{ asset("modules/tooltip/tooltip.js") }}"></script>
    <script src="{{ asset("modules/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("modules/nicescroll/jquery.nicescroll.min.js") }}"></script>
    <script src="{{ asset("modules/moment/moment.min.js") }}"></script>
    <script src="{{ asset("modules/sweetalert/sweetalert.min.js") }}"></script>

    {{-- Template JS File --}}
    <script src="{{ asset("js/scripts.js") }}"></script>
    <script src="{{ asset("js/custom.js") }}"></script>
    <script src="{{ asset("js/stisla.js") }}"></script>

    {{-- Function Script --}}
    <script>
        $(document).on('click', '.btn-info', function() {
            // Ambil data dari tombol edit
            const id = $(this).data('id');
            const name = $(this).data('name');
            const tag = $(this).data('tag');
            const color = $(this).data('color');

            // Isi data ke dalam form
            $('#editDivisionId').val(id);
            $('#editName').val(name);
            $('#editTag').val(tag);
            $('#editColor').val(color);

            // Update action URL pada form
            const formAction = "{{ route("division.update", ["id" => ":id"]) }}".replace(':id', id);
            $('#editDivisionForm').attr('action', formAction);

            // Tampilkan modal
            $('#editDivisionModal').modal('show');
        });
    </script>
@endsection
