@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h3>Edit Project</h3>
    <form action="{{ route('project.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        @include('project.form')

        <button class="btn btn-warning mt-3">Update</button>
    </form>
</div>
@endsection
