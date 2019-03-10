@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>New Question</h2>
                        <div class="ml-auto">
                            <a class="btn btn-outline-secondary" href="{{ route('questions.index') }}">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('questions.store')}}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="question-title">Question Title: </label>
                            <input type="text" name="title" id="question-title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" place-holder="Title">
                            @if($errors->has('title'))
                                <div class="invadid-feedback">
                                    <strong>{{$errors->first('title')}}</strong>
                                </div> 
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="question-body">Explain About Question: </label>
                            <textarea name="body" id="question-body" cols="30" rows="10" class="form-control"></textarea>
                            @if($errors->has('body'))
                                <div class="invadid-feedback">
                                    <strong>{{$errors->first('body')}}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-lg">Ask Question</button>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection