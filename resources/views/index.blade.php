@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    
    <div class="page-header">
        <h1>{{ config('app.name')}}</h1>
    </div>

    <div class="page-actions">
        
        <a class="btn btn-primary" href="{{route('fetch')}}">{{__('index.actions.fetch')}}</a>
        
    </div>

</div>

<div class="row">
    @foreach ($titles as $title)
    
    <div class="card card-movie col-4">
        <img src="{{$title->image}}" class="card-img-top" alt="{{$title->title}}">
        <div class="card-body">
            <a href="https://imdb.com/title/{{$title->imdb_id}}" target="_blank">
                <i class="fa fa-imdb card-movie-button-link" data-toggle="tooltip" data-placement="bottom" title="Link to Imdb"></i>
            </a>

            <h5 class="card-title">{{$title->title}}</h5>
            
            <div class="d-flex justify-content-between">
                <span class="card-movie-info">{{$title->release_year}}</span>
            
                <span class="card-movie-info">{{$title->duration}}</span>
                
                <span class="card-movie-info float-right"><i class="fa fa-star"></i> {{$title->rating}} / 10</span>
            </div>
        </div>
    </div>



@endforeach

</div>

    

@endsection