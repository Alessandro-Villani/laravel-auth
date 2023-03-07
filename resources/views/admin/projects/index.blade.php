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
              <td> <a class="btn btn-small btn-warning" href="{{ route('admin.projects.show', $project->id) }}">Edit</a> </td>
            </tr> 
            @empty
                
            @endforelse
          
        </tbody>
      </table>

</div>
    
@endsection