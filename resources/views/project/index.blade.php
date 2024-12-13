@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Projects</h1>
    <a href="{{ route('project.create') }}" class="btn btn-primary mb-3">Add Project</a>

    @if($projects->isEmpty())
        <p>No projects found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Files</th>
                    <th>Members</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>
                            @foreach($project->students as $student)
                                {{ $student->student->name }}<br>
                            @endforeach
                        </td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->end_date }}</td>
                        <td>{{ ucfirst($project->status) }}</td>
                        <td>{{ $project->files}}</td>
                        <td>
                            @foreach($project->members as $member)
                                {{ $member->student->name }}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
