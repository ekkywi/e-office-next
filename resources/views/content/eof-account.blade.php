@extends("layout.eof")
@section("title")
    Maintenance - Account {!! "&mdash;" !!} E-Office
@endsection
@section("content")
    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center text-dark" href="{{ url("eof/maintenance") }}">
                            <i class="fas fa-circle-chevron-left custom-icon-size mb-3 text-dark"></i>
                            <h5 class="card-title">Kembali</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("eof/maintenance/account/user") }}">
                            <i class="fas fa-users custom-icon-size mb-3"></i>
                            <h5 class="card-title">Pengguna</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("eof/maintenance/account/aktivasi") }}">
                            <i class="fas fa-person-circle-check custom-icon-size mb-3"></i>
                            <h5 class="card-title">Aktivasi</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("eof/maintenance/account/token") }}">
                            <i class="fas fa-key custom-icon-size mb-3"></i>
                            <h5 class="card-title">Token</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("eof/maintenance/account/role") }}">
                            <i class="fas fa-user-shield custom-icon-size mb-3"></i>
                            <h5 class="card-title">Peran</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("eof/maintenance/account/permission") }}">
                            <i class="fas fa-hands custom-icon-size mb-3"></i>
                            <h5 class="card-title">Izin</h5>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section("script")
@endsection
