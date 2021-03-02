@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between">
    
    <div class="page-header">
        <h1>{{ config('app.name') }}</h1>
    </div>

    <div class="page-actions">
        
        <a class="btn btn-primary" href="{{route('fetch')}}">{{__('index.actions.fetch')}}</a>
        
    </div>

</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
    @foreach ($titles as $title)
    <div class="card card-movie">
        <img src="{{$title->image}}" class="card-img-top" alt="{{$title->title}}">
        <div class="card-body">
          

            <h5 class="card-title"> <a href="https://imdb.com/title/{{$title->imdb_id}}" target="_blank"> {{$title->title}} </a></h5>
            <div class="d-flex justify-content-between">
                <span class="card-movie-info">{{$title->release_year}}</span>
            
                <span class="card-movie-info">{{  __('index.card.duration', ["duration" => $title->duration  ])  }}</span>
                
                <span class="card-movie-info float-right"><i class="fa fa-star"></i> {{  __('index.card.rating', ["rating" => $title->rating  ])  }}</span>
            </div>
            
        </div>
    </div>
@endforeach

</div>

    

@endsection