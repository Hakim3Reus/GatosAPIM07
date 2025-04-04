@extends('layouts.app')

@section('head')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endsection

@section('content')

<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    padding: 30px 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

h1 {
    font-size: 36px;
    color: #333;
    margin-bottom: 30px;
    text-align: center;
}

.card {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.card-img-top {
    width: 100%;
    max-height: 300px;
    object-fit: cover;
    border-bottom: 2px solid #ddd;
}

.card-body {
    padding: 20px;
}

.card-body p {
    color: #555;
    font-size: 14px;
    margin-bottom: 10px;
}

.card-body .badge {
    font-size: 12px;
    margin: 2px;
}

.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.col-md-4 {
    flex: 0 0 calc(33.333% - 20px);
    box-sizing: border-box;
}

.badge {
    background-color: #007bff;
    color: white;
    padding: 5px 10px;
    border-radius: 15px;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.badge:hover {
    background-color: #0056b3;
}

.pagination {
    display: flex; 
    justify-content: center; 
    margin-top: 20px;
    list-style: none; 
}

.pagination li {
    margin: 0 5px; 
}

.pagination li a {
    display: inline-block;
    border-radius: 50%; 
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease; 
}

.pagination li a:hover {
    background-color: #0056b3;
}

.pagination li.active a {
    background-color: #28a745;
    color: white;
}

.pagination li.disabled a {
    background-color: #e9ecef;
    color: #6c757d;
    cursor: not-allowed;
}





</style>
<div class="container">
    <h1 class="mb-4">Galeria de Gats</h1>
    <div class="row">
        @foreach($cats as $cat)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://cataas.com/cat/{{ $cat->_id }}" class="card-img-top" alt="Cat">
                    <div class="card-body">
                        <p><strong>Mimetype:</strong> {{ $cat->mimetype }}</p>
                        <p><strong>Size:</strong> {{ $cat->size }}</p>
                        <p><strong>Tags:</strong> 
                            @php
                                $tags = json_decode($cat->tags); // Convertimos el campo JSON a un array
                            @endphp
                            @if(is_array($tags)) 
                                @foreach($tags as $tag)
                                    <a href="{{ url('/tag/' . $tag) }}" class="badge bg-primary">{{ $tag }}</a>
                                @endforeach
                            @else
                                <span>No tags available</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="container mt-4">
    {{ $cats->links('pagination::bootstrap-4') }}
</div>

</div>
@endsection
