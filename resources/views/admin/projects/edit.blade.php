@extends('layouts.main')

@section('title', 'Edit ' . $project->name)
    
@section('content')

<div class="container py-5 text-center">
    <h1 class="mb-5">EDIT PROJECT</h1>
    @if ($errors->any())
        <div class="col-12 alert mb-3 container p-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="mb-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="card bg-secondary text-light p-5" action="{{ route('admin.projects.update', $project->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row mb-5">
            <div class="col-6 px-5 d-flex flex-column mb-3">
                <label class="text-start mb-2" for="name">Project Name</label>
                <input type="text" id="name" name="name" placeholder="Insert project name" value="{{ old('name', $project->name) }}">
            </div>
            <div class="col-6 px-5 d-flex flex-column mb-3">
                <label class="text-start mb-2" for="project_url">Project Url</label>
                <input type="text" id="project_url" name="project_url" placeholder="Insert project url" value="{{ old('project_url', $project->project_url) }}">
            </div>
            <div class="col-12 px-5 d-flex flex-column mb-3">
                <label class="text-start mb-2" for="description">Project Description</label>
                <textarea class="p-2" name="description" id="description" cols="30" rows="10" placeholder="Insert project description">{{ old('description', $project->description) }}</textarea>
            </div>
            <div class="col-6 offset-3 px-5 d-flex flex-column">
                <label class="text-start mb-2" for="image_url">Image Url</label>
                <input type="text" id="image_url" name="image_url" placeholder="Insert image url" value="{{ old('image_url', $project->image_url) }}">
            </div>
        </div>
        <hr>
        <div class="buttons d-flex justify-content-end px-5">
            <a class="btn btn-small btn-primary me-3" href="{{ route('admin.projects.index') }}">Back</a>
            <button type="submit" class="btn btn-small btn-success"><i class="fa-regular fa-floppy-disk"></i> Save</button>
        </div>
    </form>
</div>

@endsection