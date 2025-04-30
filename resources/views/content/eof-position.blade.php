@extends("layout.eof")

@section("title")
    Jabatan {!! "&mdash;" !!} E-Office
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Jabatan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("eof/dashboard") }}"><i class="fas fa-rocket"></i> E-Office</a></div>
                <div class="breadcrumb-item"><a href="{{ url("eof/maintenance") }}"><i class="fas fa-wrench"></i> Maintenance</a></div>
                <div class="breadcrumb-item"><a href="{{ url("eof/maintenance/organization") }}"><i class="fas fa-people-group"></i> Organization</a></div>
                <div class="breadcrumb-item active"><i class="fas fa-briefcase"></i> Jabatan</div>
            </div>
        </div>

        <div class="section-body">
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
                            <div>
                                <button class="btn btn-primary ml-2" data-target="#addJabatanModal" data-toggle="modal">Tambah Data</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-border text-center table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jabatan</th>
                                            <th>Kelola</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- Pagination --}}
                        <div class="card-body">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-center">

                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah Jabatan -->
    <div aria-hidden="true" aria-labelledby="addJabatanModalLabel" class="modal fade" id="addJabatanModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addJabatanModalLabel">Tambah Data Jabatan</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_jabatan">Nama Jabatan</label>
                            <input class="form-control" id="nama_jabatan" name="nama_jabatan" required type="text">
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

    <!-- Modal Edit Jabatan -->
    <div aria-hidden="true" aria-labelledby="editJabatanModalLabel" class="modal fade" id="editJabatanModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editJabatanModalLabel">Edit Data Jabatan</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input id="edit_jabatan_id" name="id" type="hidden">
                        <div class="form-group">
                            <label for="edit_nama_jabatan">Nama Jabatan</label>
                            <input class="form-control" id="edit_nama_jabatan" name="nama_jabatan" required type="text">
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
        $(document).ready(function() {
            $('.btn-edit-jabatan').on('click', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                $('#edit_jabatan_id').val(id);
                $('#edit_nama_jabatan').val(name);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-delete-jabatan').on('click', function() {
                var id = $(this).data('id');
                var name = $(this).data('name');

                swal({
                    title: "Apakah Anda Yakin?",
                    text: "Data Jabatan " + name + " akan dihapus",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "Batal",
                            value: null,
                            visible: true,
                            className: "btn btn-secondary",
                            closeModal: true
                        },
                        confirm: {
                            text: "Hapus",
                            value: true,
                            visible: true,
                            className: "btn btn-primary",
                            closeModal: true
                        }
                    },
                    dangerMode: true
                }).then((willDelete) => {
                    if (willDelete) {
                        var form = $('#deleteForm');
                        form.attr('action', '/maintenance/jabatan/delete/' + id);
                        form.submit();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle success message
            @if (session("success"))
                swal({
                    icon: "success",
                    title: "Berhasil!",
                    text: "{{ session("success") }}",
                    type: "success",
                    timer: 1500,
                    button: false
                });
            @endif

            // Handle validation errors
            @if ($errors->any())
                swal({
                    icon: "error",
                    title: "Gagal!",
                    text: "{!! implode('\n', $errors->all()) !!}",
                    type: "error",
                    timer: 1500,
                    buttons: false
                });
            @endif

            // Handle error message
            @if (session("error"))
                swal({
                    icon: "error",
                    title: "Sistem Gagal!",
                    text: "{{ session("error") }}",
                    type: "error",
                    timer: 1500,
                    buttons: false
                });
            @endif
        });
    </script>
@endsection
