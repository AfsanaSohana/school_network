@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Project</h1>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="student_id" class="form-label">student</label>
            <textarea name="student_id" class="form-control" id="student_id" required></textarea>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" class="form-control" id="start_date" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" name="end_date" class="form-control" id="end_date" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" id="status" required>
                <option value="ongoing">Ongoing</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="files" class="form-label">Files</label>
            <input type="file" name="files" class="form-control" id="files">
        </div>
        <div class="mb-3">
            <label for="member_id" class="form-label">Mambers</label>
            <textarea name="student_id" class="form-control" id="student_id" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">submit</button>
    </form>
</div>
@endsection
