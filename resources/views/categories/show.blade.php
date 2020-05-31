
@extends('layouts.app')

@section('content')
<!--Main layout-->
<main class="mt-5 pt-5">
    <div class="container">
        <!--Section: Jumbotron-->
        <section class="mt-2">
            <div class="row">
                <!-- Content -->
                <div class="col-md-7 mb-4">

                    <div class="view overlay z-depth-1-half">
                        <img src="{{asset('category-image-single/'.$category->id.'/1000')}}" class="card-img-top" alt="">
                        <div class="mask rgba-white-light"></div>
                    </div>

                </div>
                <div class="col-md-5 mb-4">

                    <h2>Kiełbasy parzone</h2>
                    <hr>
                    testtestestetsettesttestestetsettesttestestetsettesttestestetsettest
                    testestetsettesttestestetsettesttestestetsettesttestestetset

                </div>
            </div>
        <div class="row">
            <!-- Content -->

                <!--Grid column-->
                @foreach($posts as $post)
                    <hr class="mb-5">

                    <!--Grid row-->
                    <div class="row wow fadeIn">

                        <!--Grid column-->
                        <div class="col-lg-5 col-xl-4 mb-4">
                            <!--Featured image-->
                            <div class="view overlay rounded z-depth-1">
                                <img src="{{asset('post-image-single/'.$post->id.'/1000')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
                            <h3 class="mb-3 font-weight-bold dark-grey-text">
                                <strong>{{ $post->title }}</strong>
                            </h3>
                            <p class="grey-text">Push messaging provides a simple and effective way to re-engage with your users and in
                                this tutorial
                                you'll learn how to add push notifications to your web app</p>
                            <a href="{{asset(url('posts/'.$post->id))}}" class="btn btn-primary btn-md">Zobacz
                                <i class="fas fa-play ml-2"></i>
                            </a>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->
                    @endforeach




            <hr class="mb-5">

            <!--Pagination-->
            <nav class="d-flex justify-content-center wow fadeIn mb-3">
                {{ $posts->links() }}
            </nav>
            <!--Pagination-->
        </div>
        </section>
        <!--Section: Cards-->

    </div>
</main>
<!--Main layout-->

@endsection
