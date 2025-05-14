@extends("layout.eof")

@section("title")
    Jabatan {!! "&mdash;" !!} E-Office
@endsection

@section("content")
    <section class="section">
        <div class="section-body">

            @if (session("success"))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session("success") }}
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar Jabatan</h4>
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
                            <div class="card-header-action ml-3">
                                <button class="btn btn-icon icon-left btn-primary mr-2" data-target="#addPositionModal" data-toggle="modal">
                                    <i class="fas fa-plus"></i> Tambah Divisi
                                </button>
                            </div>
                            <div class="card-header-action ml-2">
                                <a class="btn btn-icon icon-left btn-primary" href="{{ url("eof/organization") }}">
                                    <i class="fas fa-circle-chevron-left"></i> Kembali
                                </a>
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
                                        @foreach ($positions as $position)
                                            <tr>
                                                <td>{{ $position->name }}</td>
                                                <td>{{ $position->tag }}</td>
                                                <td>
                                                    <span class="badge" style="color: {{ $position->color }};">{{ $position->tag }}</span>
                                                </td>
                                                </td>
                                                <td>{{ $position->users_count }}</td>
                                                <td>
                                                    <button class="btn btn-info btn-sm" data-color="{{ $position->color }}" data-id="{{ $position->id }}" data-name="{{ $position->name }}" data-tag="{{ $position->tag }}" data-target="#editPositionModal" data-toggle="modal">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm btn-delete-position" data-id="{{ $position->id }}">
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

    <div aria-hidden="true" aria-labelledby="addPositionModalLabel" class="modal fade" id="addPositionModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPositionModalLabel">Tambah Data Jabatan</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("eof.position.store") }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Jabatan</label>
                            <input class="form-control" id="name" name="name" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="tag">Tag Jabatan</label>
                            <input class="form-control" id="tag" name="tag" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="color">Warna Tag</label>
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

    <div aria-hidden="true" aria-labelledby="editPositionModalLabel" class="modal fade" id="editPositionModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPositionModalLabel">Edit Data Jabatan</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("eof.position.update") }}" method="POST">
                    @csrf
                    @method("PUT")
                    <input id="edit-id" name="id" type="hidden">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-name">Nama Jataban</label>
                            <input class="form-control" id="edit-name" name="name" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="edit-tag">Tag Jabatan</label>
                            <input class="form-control" id="edit-tag" name="tag" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="edit-color">Warna Tag</label>
                            <input class="form-control" id="edit-color" name="color" type="color">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div aria-hidden="true" aria-labelledby="deletePositionModalLabel" class="modal fade" id="deletePositionModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePositionModalLabel">Konfirmasi Hapus</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route("eof.position.destroy") }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input id="delete-id" name="id" type="hidden">
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus jabatan ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script src="{{ asset("modules/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("modules/popper/popper.js") }}"></script>
    <script src="{{ asset("modules/tooltip/tooltip.js") }}"></script>
    <script src="{{ asset("modules/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset("modules/nicescroll/jquery.nicescroll.min.js") }}"></script>
    <script src="{{ asset("modules/moment/moment.min.js") }}"></script>
    <script src="{{ asset("modules/sweetalert/sweetalert.min.js") }}"></script>
    <script src="{{ asset("js/scripts.js") }}"></script>
    <script src="{{ asset("js/custom.js") }}"></script>
    <script src="{{ asset("js/stisla.js") }}"></script>
    <script>
        $('#editPositionModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var name = button.data('name');
            var tag = button.data('tag');
            var color = button.data('color');

            var modal = $(this);
            modal.find('#edit-id').val(id);
            modal.find('#edit-name').val(name);
            modal.find('#edit-tag').val(tag);
            modal.find('#edit-color').val(color);
        });
    </script>
    <script>
        $(document).on('click', '.btn-delete-position', function() {
            var id = $(this).data('id');
            $('#delete-id').val(id);
            $('#deletePositionModal').modal('show');
        });
    </script>
@endsection
