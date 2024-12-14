@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <h2>Projects</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Project A</td>
                <td>01/01/2019</td>
                <td>15/08/2019</td>
                <td>Completed</td>
            </tr>
            <tr>
                <td>Project B</td>
                <td>06/06/2019</td>
                <td>06/06/2020</td>
                <td>In progress</td>
            </tr>
        </tbody>
    </table>
    <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="start-date">Start Date:</label>
            <input type="date" id="start-date" name="start-date">
        </div>
        <div class="form-group">
            <label for="end-date">End Date:</label>
            <input type="date" id="end-date" name="end-date">
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status">
                <option value="completed">Completed</option>
                <option value="in-progress">In progress</option>
            </select>
        </div>
        <div class="submit-btn">
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection
