@extends('layouts.frontend.app')
@section('title', config('app.name') . '|' . ' Homepage')
@section('content')
    <!-- ======= Hero Section ======= -->
    <x-app.hero-section />

    <main id="main">
        <!-- ======= About Section ======= -->
        <x-app.about-section />
        <!-- End About Section -->

        <!-- ======= Values Section ======= -->
        <x-app.values-section />
        <!-- End Values Section -->

        <!-- ======= Counts Section ======= -->
        <x-app.counts-section />
        <!-- End Counts Section -->

        <!-- ======= Features Section ======= -->
        <x-app.features-section />
        <!-- End Features Section -->

        <!-- ======= Services Section ======= -->
        <x-app.services-section />
        <!-- End Services Section -->

        {{-- <!-- ======= Portfolio Section ======= -->
        <x-app.portfolio-section />
        <!-- End Portfolio Section --> --}}

        <!-- ======= Testimonials Section ======= -->
        <x-app.testimonials-section />
        <!-- End Testimonials Section -->

        <!-- ======= Team Section ======= -->
        <x-app.team-section />
        <!-- End Team Section -->

        @if ($recentPosts->count() != 0)
            <!-- ======= Recent Blog Posts Section ======= -->
            <x-app.recent-post-section :posts="$recentPosts" />
            <!-- End Recent Blog Posts Section -->
        @endif
        
        <!-- ======= Contact Section ======= -->
        <x-app.contact-us-section />
        <!-- End Contact Section -->

    </main><!-- End #main -->
@endsection