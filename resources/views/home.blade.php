@extends('base')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Mon Agence Immo</h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia dolor harum quis soluta molestiae vel ducimus, ipsam, sequi at quos odit repudiandae debitis corporis porro rem deleniti natus? Distinctio, cum.</p>
        </div>
    </div>
    
    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property) 
            <div class="col">
                @include('property.card')
            </div>
            @endforeach
        </div>
    </div>
@endsection