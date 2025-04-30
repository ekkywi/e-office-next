@extends("layout.eof")
@section("title")
    Maintenance - Organization {!! "&mdash;" !!} E-Office
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
                        <a class="card-body text-center" href="{{ url("eof/maintenance/organization/division") }}">
                            <i class="fas fa-sitemap custom-icon-size mb-3"></i>
                            <h5 class="card-title">Divisi</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("eof/maintenance/bagian") }}">
                            <i class="fas fa-building custom-icon-size mb-3"></i>
                            <h5 class="card-title">Bagian</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("eof/maintenance/jabatan") }}">
                            <i class="fas fa-briefcase custom-icon-size mb-3"></i>
                            <h5 class="card-title">Jabatan</h5>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section("script")
@endsection
