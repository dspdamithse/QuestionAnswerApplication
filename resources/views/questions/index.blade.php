@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>All Questions</h2>
                        <div class="ml-auto">
                            <a class="btn btn-outline-secondary" href="{{ route('questions.create') }}">Ask Auestions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts._messages')
                    @foreach($questions as $question)
                        <div class="media">
                        <div class="d-flex flex-column counter">
                            <div class="vote">
                                <strong>{{ $question->votes }}</strong> {{str_plural('vote', $question->votes)}}
                            </div>
                            <div class="status {{$question->status}}">
                                <strong>{{ $question->answers }}</strong> {{str_plural('answer', $question->answers)}}
                            </div>
                            <div class="view">
                               {{ $question->views ." ".str_plural('view', $question->views)}}
                            </div>
                        </div>
                            <div class="media-body">
                                <div class="d-flex align-items-center">
                                    <h3 class="mt-0"><a href="{{route('questions.show', $question->id)}}">{{$question->title}}</a></h3>
                                    <div class="ml-auto">
                                        <a class="btn btn-xs btn-outline-info" href="{{route('questions.edit', $question->id)}}">Edit</a>
                                        <form class="form-delete" method="post" action="{{route('questions.destroy', $question->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-sm btn-outline-danger" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </div>
                                </div>                               
                                <p class="lead">
                                    Asked by
                                    <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                    <small class="text-muted">{{$question->created_date}}</small>
                                </p>
                                {{str_limit($question->body, 250)}}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                    {{$questions->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection