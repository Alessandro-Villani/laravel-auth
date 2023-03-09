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
            <th scope="col">Publication Status</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
            <tr>
                <th class="align-middle" scope="row">{{ $project->id }}</th>
                <td class="align-middle">{{ $project->name }}</td>
                <td class="align-middle">
                    <form action="{{ route('admin.projects.toggle-status', $project->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <button class="btn">
                            <i class="fa-solid fa-2x fa-toggle-{{$project->is_published ? 'on text-success' : 'off text-danger'}}"></i>
                        </button>
                    </form>
                </td>
                <td class="align-middle">{{ $project->created_at }}</td>
                <td class="align-middle">{{ $project->updated_at }}</td>
                <td class="align-middle"> 
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
                <th scope="row" colspan="6" class="text-center">Non ci sono progetti</th>
            </tr> 
            @endforelse
          
        </tbody>
    </table>

    <div class="buttons d-flex justify-content-end mb-5">
        <a href="{{ route('admin.projects.trash.index') }}" class="btn btn-small btn-secondary me-2"><i class="fa-solid fa-trash-can"></i></a>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-small btn-success"><i class="fa-solid fa-plus"></i></a>
    </div>

    <div class="offset-9 col-3" >{{ $projects->links() }}</div>

    @include('includes.projects.delete-modal')

</div>
    
@endsection