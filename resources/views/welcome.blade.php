@extends('layouts.app')

@section('content')
<!--Main Navigation-->

<!--Main Navigation-->

<!--Main layout-->
<main class="mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <!--Section: Jumbotron-->
                <section class="card wow fadeIn">
                    <img src="https://dobrowolscy.pl/wp-content/uploads/D_blog_3_luty-1110x500.jpg" alt="" class="img-fluid">
                    <!-- Content -->
{{--                    <div class="card-body text-white text-center py-5 px-5 my-5">--}}


{{--                    </div>--}}
                    <!-- Content -->
                </section>
                <!--Section: Jumbotron-->

                <hr class="my-5">

                <!--Section: Cards-->
                <section class="text-center">

                    <!--Grid row-->
                    <div class="row mb-4 wow fadeIn">

                        <!--Grid column-->
                    {{--                <div class="col-lg-4 col-md-12 mb-4">--}}

                    <!--Card-->
                    {{--                    <div class="card">--}}

                    {{--                        <!--Card image-->--}}
                    {{--                        <div class="view overlay">--}}
                    {{--                            <div class="embed-responsive embed-responsive-16by9 rounded-top">--}}
                    {{--                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cXTThxoywNQ" allowfullscreen></iframe>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                        <!--Card content-->--}}
                    {{--                        <div class="card-body">--}}
                    {{--                            <!--Title-->--}}
                    {{--                            <h4 class="card-title">MDB Quick Start</h4>--}}
                    {{--                            <!--Text-->--}}
                    {{--                            <p class="card-text">Get started with MDBootstrap, the world's most popular Material Design framework--}}
                    {{--                                for building--}}
                    {{--                                responsive, mobile-first sites.</p>--}}
                    {{--                            <p class="card-text">--}}
                    {{--                                <strong>5 minutes, a few clicks and... done. You will be surprised at how easy it is.</strong>--}}
                    {{--                            </p>--}}
                    {{--                        </div>--}}

                    {{--                    </div>--}}
                    {{--                    <!--/.Card-->--}}

                    {{--                </div>--}}
                    <!--Grid column-->
                    @foreach($posts as $post)
                        <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-4">

                                <!--Card-->
                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        @if( $post->image == 'default.jpg' )
                                            <img src="storage/posts/default.jpg" class="card-img-top"
                                                 alt="">
                                        @else
                                            <img src="{{ url('post-image/'.$post->id.'/350') }}" alt="" class="img-fluid img-thumbnail">
                                        @endif
                                    </div>

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title">{{ $post->title }}</h4>
                                        <!--Text-->
                                        <p class="card-text">{!! Str::limit($post->trailer, 100) !!}</p>
                                        <a href="{{ url('/posts/'.$post->id) }}"
                                           class="btn btn-primary btn-md">Czytaj dalej
                                            <i class="fas fa-play ml-2"></i>
                                        </a>
                                    </div>

                                </div>
                                <!--/.Card-->

                            </div>
                            <!--Grid column-->
                        @endforeach

                    </div>
                    <!--Grid row-->

                    <!--Pagination-->
                    <nav class="d-flex justify-content-center wow fadeIn">
                        {{ $posts->links() }}
                    </nav>
                    <!--Pagination-->
                </section>
                <!--Section: Cards-->

            </div>
            <!--Grid column-->
{{--            <div class="col-md-4 mb-4">--}}

{{--                <!--Card: Jumbotron-->--}}
{{--                <div class="card blue-gradient mb-4 wow fadeIn">--}}

{{--                    <!-- Content -->--}}
{{--                    <div class="card-body text-white text-center">--}}

{{--                        <h4 class="mb-4">--}}
{{--                            <strong>Learn Bootstrap 4 with MDB</strong>--}}
{{--                        </h4>--}}
{{--                        <p>--}}
{{--                            <strong>Best & free guide of responsive web design</strong>--}}
{{--                        </p>--}}
{{--                        <p class="mb-4">--}}
{{--                            <strong>The most comprehensive tutorial for the Bootstrap 4. Loved by over 500 000 users. Video--}}
{{--                                and written versions available. Create your own, stunning website.</strong>--}}
{{--                        </p>--}}
{{--                        <a target="_blank" href="https://mdbootstrap.com/education/bootstrap/" class="btn btn-outline-white btn-md">Start--}}
{{--                            free tutorial--}}
{{--                            <i class="fas fa-graduation-cap ml-2"></i>--}}
{{--                        </a>--}}

{{--                    </div>--}}
{{--                    <!-- Content -->--}}
{{--                </div>--}}
{{--                <!--Card: Jumbotron-->--}}

{{--                <!--Card : Dynamic content wrapper-->--}}
{{--                <div class="card mb-4 text-center wow fadeIn">--}}

{{--                    <div class="card-header">Do you want to get informed about new articles?</div>--}}

{{--                    <!--Card content-->--}}
{{--                    <div class="card-body">--}}

{{--                        <!-- Default form login -->--}}
{{--                        <form>--}}

{{--                            <!-- Default input email -->--}}
{{--                            <label for="defaultFormEmailEx" class="grey-text">Your email</label>--}}
{{--                            <input type="email" id="defaultFormLoginEmailEx" class="form-control">--}}

{{--                            <br>--}}

{{--                            <!-- Default input password -->--}}
{{--                            <label for="defaultFormNameEx" class="grey-text">Your name</label>--}}
{{--                            <input type="text" id="defaultFormNameEx" class="form-control">--}}

{{--                            <div class="text-center mt-4">--}}
{{--                                <button class="btn btn-info btn-md" type="submit">Sign up</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                        <!-- Default form login -->--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--                <!--/.Card : Dynamic content wrapper-->--}}

{{--                <!--Card-->--}}
{{--                <div class="card mb-4 wow fadeIn">--}}

{{--                    <div class="card-header">Related articles</div>--}}

{{--                    <!--Card content-->--}}
{{--                    <div class="card-body">--}}

{{--                        <ul class="list-unstyled">--}}
{{--                            <li class="media">--}}
{{--                                <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder7.jpg" alt="Generic placeholder image">--}}
{{--                                <div class="media-body">--}}
{{--                                    <a href="">--}}
{{--                                        <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>--}}
{{--                                    </a>--}}
{{--                                    Cras sit amet nibh libero, in gravida nulla (...)--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="media my-4">--}}
{{--                                <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder6.jpg" alt="An image">--}}
{{--                                <div class="media-body">--}}
{{--                                    <a href="">--}}
{{--                                        <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>--}}
{{--                                    </a>--}}
{{--                                    Cras sit amet nibh libero, in gravida nulla (...)--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="media">--}}
{{--                                <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder5.jpg" alt="Generic placeholder image">--}}
{{--                                <div class="media-body">--}}
{{--                                    <a href="">--}}
{{--                                        <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>--}}
{{--                                    </a>--}}
{{--                                    Cras sit amet nibh libero, in gravida nulla (...)--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--                <!--/.Card-->--}}

{{--            </div>--}}
            <!--Grid column-->
        </div>
    </div>
</main>
<!--Main layout-->

@endsection
