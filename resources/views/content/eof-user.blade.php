@extends("layout.eof")

@section("title")
    User {!! "&mdash;" !!} E-Office
@endsection

@section("content")
    <section class="section">
        <div class="section-header">
            <h1>Pengguna</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ url("eof/dashboard") }}"><i class="fas fa-rocket"></i> E-Office</a></div>
                <div class="breadcrumb-item"><a href="{{ url("eof/maintenance") }}"><i class="fas fa-wrench"></i> Maintenance</a></div>
                <div class="breadcrumb-item"><a href="{{ url("eof/maintenance/account") }}"><i class="fas fa-user-shield"></i> Akun</a></div>
                <div class="breadcrumb-item active"><i class="fas fa-users"></i> Pengguna</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pengguna Aplikasi</h4>
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
                                <button class="btn btn-primary ml-2" data-target="#addUserModal" data-toggle="modal">Tambah Data</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-border text-center table-hover">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nomor Pegawai</th>
                                            <th>Email</th>
                                            <th>Divisi</th>
                                            <th>Bagian</th>
                                            <th>Jabatan</th>
                                            <th colspan="2">Action</th>
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

    <!-- Modal Tambah User -->
    <div aria-hidden="true" aria-labelledby="addUserModalLabel" class="modal fade" id="addUserModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Tambah Data Pengguna</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" id="username" name="username" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" id="password" name="password" required type="password">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" id="nama" name="nama" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="no_pegawai">Nomor Pegawai</label>
                            <input class="form-control" id="no_pegawai" name="no_pegawai" required type="text">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" id="email" name="email" type="email">
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

    <!-- Modal Edit User -->
    <div aria-hidden="true" aria-labelledby="editUserModalLabel" class="modal fade" id="editUserModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit Data Pengguna</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" id="editUserForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input id="edit_user_id" name="id" type="hidden">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" id="edit_username" name="username" required type="text">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" name="password" placeholder="Kosongkan jika tidak ingin mengubah password" type="password">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" id="edit_nama" name="nama" required type="text">
                        </div>
                        <div class="form-group">
                            <label>No Pegawai</label>
                            <input class="form-control" id="edit_no_pegawai" name="no_pegawai" required type="text">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" id="edit_email" name="email" type="email">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" type="button">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- Delete Form --}}
        <form id="deleteForm" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
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
            $('.btn-edit-user').on('click', function() {
                var id = $(this).data('id');
                var username = $(this).data('username');
                var email = $(this).data('email');
                var nama = $(this).data('nama');
                var no_pegawai = $(this).data('no_pegawai');
                var divisi_id = $(this).data('divisi_id');
                var bagian_id = $(this).data('bagian_id');
                var jabatan_id = $(this).data('jabatan_id');
                $('#edit_user_id').val(id);
                $('#edit_username').val(username);
                $('#edit_email').val(email);
                $('#edit_nama').val(nama);
                $('#edit_no_pegawai').val(no_pegawai);
                $('#edit_divisi_id').val(divisi_id);
                $('#edit_bagian_id').val(bagian_id);
                $('#edit_jabatan_id').val(jabatan_id);
                $('#editUserModal').modal('show');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.btn-delete-user').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var username = $(this).data('username');

                swal({
                    title: 'Apakah Anda Yakin?',
                    text: "Akan menghapus user " + username,
                    icon: 'warning',
                    buttons: {
                        cancel: {
                            text: "Batal",
                            value: null,
                            visible: true
                        },
                        confirm: {
                            text: "Hapus",
                            value: true,
                            visible: true
                        }
                    },
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var form = $('#deleteForm');
                        form.attr('action', '/maintenance/user/delete/' + id);
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
