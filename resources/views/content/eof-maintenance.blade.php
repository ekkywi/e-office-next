@extends("layout.eof")
@section("title")
    Maintenance {!! "&mdash;" !!} E-Office
@endsection
@section("content")
    <section class="section">
        <div class="section-body">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="{{ url("eof-maintenance/account") }}">
                            <i class="fas fa-user-cog custom-icon-size mb-3"></i>
                            <h5 class="card-title">Akun</h5>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card card-menu">
                        <a class="card-body text-center" href="#">
                            <i class="fas fa-people-group custom-icon-size mb-3"></i>
                            <h5 class="card-title">Organisasi</h5>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section("script")
@endsection
