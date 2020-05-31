@extends('layouts.app')

@section('content')

    <!--Main layout-->
    <main class="mt-5 pt-5">
        <div class="container">

            <!--Section: Post-->
            <section class="mt-4">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-7 mb-4">

                        <div class="view overlay z-depth-1-half">
                            <img src="{{asset('post-image-single/'.$post->id.'/1000')}}" class="card-img-top" alt="">
                            <div class="mask rgba-white-light"></div>
                        </div>

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-5 mb-4">

                        <h2>{{$post->title}}</h2>
                        <hr>
                            <p>{{$post->trailer}}</p>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-8 mb-4">


                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <!--Card content-->
                            <div class="card-body">

                                <p class="h5 my-4">Przygotowanie </p>
                                {!! $post->content !!}
                            </div>

                        </div>
                        <!--/.Card-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <div class="card-header font-weight-bold">
                                <span>O mnie</span>
                            </div>

                            <!--Card content-->
                            <div class="card-body">

                                <div class="media d-block d-md-flex mt-3">
                                    <img class="d-flex mb-3 mx-auto z-depth-1" src="{{ url('storage/users/'.$user->id.'/avatar/'.$user->avatar) }}"
                                         alt="Generic placeholder image" style="width: 100px;">
                                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                        <h5 class="mt-0 font-weight-bold">{{$user->name}}</h5>
                                        {!! $user->about !!}
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!--/.Card-->

                        <!--Reply-->
                        @if (session('comment_add'))
                            <div class="alert alert-success">
                                {{ session('comment_add') }}
                            </div>
                        @endif
                        <div class="card mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">Zostaw komentarz :)</div>
                            <div class="card-body">

                                <!-- Default form reply -->
                                <form action="{{url('/comments')}}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                    <!-- Comment -->
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <div class="form-group">
                                        <label for="replyFormComment">Twój komentarz</label>
                                        <textarea name="content" class="form-control" id="replyFormComment" rows="5"></textarea>
                                    </div>

                                    <!-- Name -->
                                    <label for="replyFormName">Twoje imię/nick</label>
                                    <input name="author" type="text" id="replyFormName" class="form-control">

                                    <br>

                                    <!-- Email -->
                                    <label for="replyFormEmail">Twój e-mail</label>
                                    <input name="email" type="email" id="replyFormEmail" class="form-control">


                                    <div class="text-center mt-4">
                                        <button class="btn btn-info btn-md" type="submit">Wyślij</button>
                                    </div>
                                </form>
                                <!-- Default form reply -->
                            </div>
                        </div>
                        <!--/.Reply-->
                        <!--Comments-->
                        <div class="card card-comments mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">3 comments</div>
                            <div class="card-body">
                                @forelse($comments as $comment)
                                    <div class="media d-block d-md-flex mt-4">
                                        {{--                                    <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (20).jpg" alt="Generic placeholder image">--}}
                                        <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                            <div class="row">
                                                <div class="col-md-9 small">Dodany przez <strong>{{$comment->author}}</strong></div>
                                                <div class="col-md-3 small"> {{$comment->created_at}}</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">{{$comment->content}}</div>

                                            </div>

                                        </div>
                                    </div>
                                    <hr>
                                @empty
                                    <p>Nikt jeszcze nie skomentował tego wpisu</p>
                                @endforelse
                            </div>
                        </div>
                        <!--/.Comments-->
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-4">

                        <!--Card: Jumbotron-->
                        <div class="card blue-gradient mb-4 wow fadeIn">

                            <!-- Content -->
                            <div class="card-body text-white">

                                <h4 class="mb-4">
                                    <strong>Składniki</strong>
                                </h4>
                                {!! $post->recipe !!}

                            </div>
                            <!-- Content -->
                        </div>
                        <!--Card: Jumbotron-->

                        <!--Card : Dynamic content wrapper-->
                        <div class="card mb-4 text-center wow fadeIn">

                            <div class="card-header">Chcesz być informowany o nowych przepisach?</div>

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Default form login -->
                                <form>

                                    <!-- Default input email -->
                                    <label for="defaultFormEmailEx" class="grey-text">Your email</label>
                                    <input type="email" id="defaultFormLoginEmailEx" class="form-control">

                                    <br>

                                    <!-- Default input password -->
                                    <label for="defaultFormNameEx" class="grey-text">Your name</label>
                                    <input type="text" id="defaultFormNameEx" class="form-control">

                                    <div class="text-center mt-4">
                                        <button class="btn btn-info btn-md" type="submit">Sign up</button>
                                    </div>
                                </form>
                                <!-- Default form login -->

                            </div>

                        </div>
                        <!--/.Card : Dynamic content wrapper-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <div class="card-header">Podobne wpisy</div>

                            <!--Card content-->
                            <div class="card-body">

                                <ul class="list-unstyled">
                                    @forelse($posts as $post)
                                    <li class="media my-4">
                                        <img class="d-flex mr-3" src="{{asset('post-image-single/'.$post->id.'/120')}}" alt="">
                                        <div class="media-body">
                                            <a href="">
                                                <h5 class="mt-0 mb-1 font-weight-bold">{{$post->title}}</h5>
                                            </a>
                                            {{Str::limit($post->trailer, 40)}}
                                        </div>
                                    </li>
                                        @empty
                                        <p>Brak wpisów</p>
                                    @endforelse
                                </ul>

                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Post-->

        </div>
    </main>
    <!--Main layout-->

@endsection
