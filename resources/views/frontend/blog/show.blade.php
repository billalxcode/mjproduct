@extends('layouts.frontend.app')
@section('css')
    <style>
        .category_link {
            text-transform: capitalize;
        }
    </style>
@endsection
@section('content')
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <x-app.blog.breadcrumbs />
        <!-- End Breadcrumbs -->
        
        <!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-8 entries">
                        <x-app.blog.article-single :blog="$blog" />

                        <x-app.blog.article-author :user="$blog->user" />
                        <!-- End blog author bio -->
                        
                        {{-- <x-app.blog.article-comment /> --}}
                        <!-- End blog comments -->

                    </div><!-- End blog entries list -->

                    <div class="col-lg-4">
                        <x-app.blog.sidebar :recentPosts="$recentPosts" :categories="$categories" />
                        <!-- End sidebar -->
                    </div><!-- End blog sidebar -->

                </div>

            </div>
        </section><!-- End Blog Single Section -->
    </main>
@endsection
