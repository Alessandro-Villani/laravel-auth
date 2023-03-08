@extends('layouts.main')

@section('title', 'PROJECTS')
    
@section('content')

<div class="container py-5 text-center">
    <h1>PROJECTS</h1>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Project Name</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <th scope="row">{{ $project->id }}</th>
                <td>{{ $project->name }}</td>
                <td>{{ $project->created_at }}</td>
                <td>{{ $project->updated_at }}</td>
                <td> 
                    <a class="btn btn-small btn-primary" href="{{ route('admin.projects.show', $project->id) }}"><i class="fa-solid fa-eye"></i></a> 
                    <a class="btn btn-small btn-warning" href="{{ route('admin.projects.edit', $project->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                    <form class="d-inline delete-form" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" data-project-name="{{ $project->name }}">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-small btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                    </form>
                </td>
            </tr> 
            @empty
            <tr>
                <th scope="row" colspan="5" class="text-center">Non ci sono progetti</th>
            </tr> 
            @endforelse
          
        </tbody>
    </table>

    <div class="buttons d-flex justify-content-end">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-small btn-success"><i class="fa-solid fa-plus"></i></a>
    </div>

    @include('includes.projects.delete-modal')

</div>
    
@endsection