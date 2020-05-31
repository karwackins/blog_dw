@extends('layouts.admin.app')

<div class="container-for-admin">

@section('content')

    <!--Main layout-->
        <main class="pt-5 mx-lg-5">
            <div class="container-fluid mt-5">
                <!-- Heading -->
                <div class="card mb-4 wow fadeIn">

                    <!--Card content-->
                    <div class="card-body d-sm-flex justify-content-between">

                        <h4 class="mb-2 mb-sm-0 pt-1">
                            <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
                            <span>/</span>
                            <span>Dashboard</span>
                        </h4>

                        <form class="d-flex justify-content-center">
                            <!-- Default input -->
                            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
                            <button class="btn btn-primary btn-sm my-0 p" type="submit">
                                <i class="fa fa-search"></i>
                            </button>

                        </form>

                    </div>

                </div>
                <!-- Heading -->
                <form action="{{ url('/panel/posts/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{method_field('PATCH')}}
                <!--Grid row-->
                <div class="row wow fadeIn">


                    <div class="col-md-9 mb-4">
                            <input class="form-control" type="text" name="title" id="" placeholder="Tytuł wpisu" value="{{ $post->title }}">
                            <br>
                            <input class="form-control" type="text" name="trailer" id="" placeholder="Krótka zajawka" value="{{ $post->trailer }}">
                            <br>
                        <div class="row">
                            <div class="col-md-7">
                                <label for=""><strong>Opis</strong></label>
                                <textarea id="content" name="content">{{$post->content}}</textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'content' );
                                </script>
                            </div>
                            <div class="col-md-5">
                                <label for=""><strong>Przepis</strong></label>
                                <textarea id="recipe" name="recipe">{{$post->recipe}}</textarea>
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'recipe' );
                                </script>
                            </div>
                        </div>

                            <button type="submit" class="btn btn-success">Dodaj wpis</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSm">
                            Launch demo modal
                        </button>

                        <div id="centralModalSm" class="modal fade text-center">
                            <div class="modal-dialog">
                                <div class="modal-content"> </div>
                            </div>
                        </div>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-md-3 mb-4">

                        <!--Card-->
                        <div class="card mb-4">

                            <!-- Card header -->
                            <div class="card-header text-center">
                                Opcje dot. wpisu
                            </div>

                            <!--Card content-->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="sel1">Kategoria</label>
                                    <select class="form-control" id="sel1" name="category_id">
                                        @foreach($categories as $category)
                                            {
                                                @if($category->id == $post->category_id)
                                                    <option value="{{ $category->id }}" selected>{{$category->name}}</option>
                                                @else
                                                    <option value="{{ $category->id }}">{{$category->name}}</option>
                                                @endif
                                            }
                                            @endforeach
                                    </select>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    @if($post->publish == 1)
                                        <input type="checkbox" checked class="custom-control-input" id="defaultUnchecked" name="publish">
                                    @else
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked" name="publish">
                                    @endif
                                    <label class="custom-control-label" for="defaultUnchecked">Publikować</label>
                                </div>


                            </div>

                        </div>
                        <!--/.Card-->

                        <!--Card-->
                        <div class="card mb-4">
                                <!--Card content-->
                                <div class="card-body">
                                    <label for="">Zdjęcie wyróżniające</label>
                                    @if($post->image == 'default.jpg')
                                        <img src="{{ asset('storage/posts/default.jpg') }}" alt="" class="img-fluid">
                                    @else
                                        <img src="{{ url('post-image/'.$post->id.'/400') }}" alt="" class="img-fluid img-thumbnail">
                                    @endif
                                    <input type="file" name="image" class="form-control">
                                </div>
                        </div>
                        <!--/.Card-->

                    </div>

                    <!--Grid column-->

                </div>
                    @if(!empty($gallery))
                    <div class="row">
                            @foreach($gallery as $item)
                                <div class="col-md-3">
                                    <img alt="picture" style="height: 200px" src="{{asset('storage/posts/'.$post->id.'/gallery/'.$item->name)}}" class="img-fluid img-thumbnail">
                                </div>
                            @endforeach
                    </div>
                    @endif
                </form>
                <!--Grid row-->

            </div>
        </main>
        <!--Main layout-->

        <!--Footer-->
        <footer class="page-footer text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

            <!--Call to action-->
            <div class="pt-4">
                <a class="btn btn-outline-white" href="https://mdbootstrap.com/docs/jquery/getting-started/download/" target="_blank"
                   role="button">Download
                    MDB
                    <i class="fa fa-download ml-2"></i>
                </a>
                <a class="btn btn-outline-white" href="https://mdbootstrap.com/education/bootstrap/" target="_blank" role="button">Start
                    free tutorial
                    <i class="fa fa-graduation-cap ml-2"></i>
                </a>
            </div>
            <!--/.Call to action-->

            <hr class="my-4">

            <!-- Social icons -->
            <div class="pb-4">
                <a href="https://www.facebook.com/mdbootstrap" target="_blank">
                    <i class="fab fa-facebook-f mr-3"></i>
                </a>

                <a href="https://twitter.com/MDBootstrap" target="_blank">
                    <i class="fab fa-twitter mr-3"></i>
                </a>

                <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
                    <i class="fab fa-youtube mr-3"></i>
                </a>

                <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
                    <i class="fab fa-google-plus mr-3"></i>
                </a>

                <a href="https://dribbble.com/mdbootstrap" target="_blank">
                    <i class="fab fa-dribbble mr-3"></i>
                </a>

                <a href="https://pinterest.com/mdbootstrap" target="_blank">
                    <i class="fab fa-pinterest mr-3"></i>
                </a>

                <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
                    <i class="fab fa-github mr-3"></i>
                </a>

                <a href="http://codepen.io/mdbootstrap/" target="_blank">
                    <i class="fab fa-codepen mr-3"></i>
                </a>
            </div>
            <!-- Social icons -->

            <!--Copyright-->
            <div class="footer-copyright py-3">
                © 2018 Copyright:
                <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> MDBootstrap.com </a>
            </div>
            <!--/.Copyright-->

        </footer>
        <!--/.Footer-->
</div>

<script>
    $.ajax({
        url: '{{ asset(url('galleryModal.html')) }}',
        dataType: 'text',
        success: function(data) {
            alert(data);
            // todo:  add the html to the dom...
        }
    });
</script>

@endsection


