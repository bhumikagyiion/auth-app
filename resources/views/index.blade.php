<!DOCTYPE html>
<html lang="en">

<head>
    @include('Layouts.meta')
</head>

<body>
    <!-- ======= Header ======= -->
    @include('Layouts.header')
    <!-- End Header -->
    <!-- ======= Sidebar ======= -->
    @include('Layouts.sidebar')
    <!-- End Sidebar-->

    <!-- Start #main -->
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
            @yield('content')
            </div>
        </section>

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('Layouts.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('Layouts.script')

</body>

</html>
