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
    @include('includes.projects.form')
</div>
@endsection