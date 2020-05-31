@extends('layouts.admin.app')

@section('content')
    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Użytkownik
                        @if($user->id === Auth::id())
                            <a  href="{{ url('panel/users/'. $user->id .'/edit') }}" class="float-right">Edytuj</a>
                        @endif
                    </div>

                    <div class="card-body text-center">
                        <div class="form-group">
            {{--            @if(!$user->avatar)--}}
            {{--                    <img src="{{ url('/user-avatar/'.$user->id.'/250') }}" alt="" class="img-responsive img-thumbnail">--}}
            {{--            @else--}}
                            <img src="{{ url('storage/users/'.$user->id.'/avatar/'.$user->avatar) }}" alt="" class="img-responsive img-thumbnail">
            {{--            @endif--}}
                        </div>
                        <h2><a href="{{ url('/users/' .$user->id) }}">{{ $user->name }}</a></h2>
                        <p>
            {{--                @if($user->sex == 'm')--}}
            {{--                    Mężczyzna--}}
            {{--                @else--}}
            {{--                    Kobieta--}}
            {{--                @endif--}}
                        </p>
                        <p>{{ $user->email }}</p>
                        <div class="form-group">
                            <p>{!! $user->about !!}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
