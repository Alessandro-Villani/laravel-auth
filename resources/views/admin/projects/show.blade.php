@extends('layouts.main')

@section('title', $project->name)
    
@section('content')

<div class="container py-5 text-center">
    <h1 class="mb-5">PROJECT OVERVIEW</h1>
    <div class="card bg-dark text-light p-5 mb-5">
        <h3 class="mb-3">{{ ucfirst($project->name) }}</h3>
        <div class="card-top clearfix text-start mb-5">
            <img class="float-start d-block me-3" src="{{ $project->image_url }}" alt="{{ $project->name }}">
            <p>{{ $project->description }}</p>
        </div>
        <hr>
        <div class="card-bottom text-start">
            <p><i class="fa-brands fa-github"></i> <a href="{{ $project->project_url }}">{{ ucfirst($project->name) }}</a></p>
        </div>
    </div>
    <div class="buttons d-flex justify-content-end">
        <a class="btn btn-secondary me-2" href="{{ route('admin.projects.index') }}">INDIETRO</a>
    </div>
</div>

@endsection