@extends('layouts.frontend.app')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <x-app.blog.breadcrumbs />
    <!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-8 entries">
                    @foreach ($blogs as $blog)
                        <x-app.blog.article :blog="$blog" />
                    @endforeach
                    {{ $blogs->links('layouts.frontend.paginator') }}

                </div><!-- End blog entries list -->

                <div class="col-lg-4">
                    <x-app.blog.sidebar />
                    <!-- End sidebar -->

                </div><!-- End blog sidebar -->

            </div>

        </div>
    </section><!-- End Blog Section -->
@endsection
