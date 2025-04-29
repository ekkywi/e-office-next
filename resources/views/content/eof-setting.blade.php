@extends("layout.eof")

@section("title")
    Pengaturan {!! "&mdash;" !!} E-Office
@endsection

@section("content")
    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("setting/profile") }}">
                            <i class="fas fa-id-badge custom-icon-size mb-3"></i>
                            <h5 class="card-title">Profil</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("setting/change-password") }}">
                            <i class="fas fa-key custom-icon-size mb-3"></i>
                            <h5 class="card-title">Ubah Password</h5>
                        </a>
                    </div>
                </div>

            </div>
    </section>
@endsection
