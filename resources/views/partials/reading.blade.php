@extends('layouts.app')

@section('title', 'Readings')

@section('content')
    <h2>Readings</h2>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>DOI</th>
                <th>Year</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Book A</td>
                <td>75623</td>
                <td>2010</td>
                <td>Book</td>
            </tr>
            <tr>
                <td>Magazine A</td>
                <td>94383</td>
                <td>2017</td>
                <td>Magazine</td>
            </tr>
        </tbody>
    </table>
    <form method="POST" action="{{ route('readings.store') }}">
        @csrf
        <div class="form-group">
            <label for="reading-title">Title:</label>
            <input type="text" id="reading-title" name="reading-title">
        </div>
        <div class="form-group">
            <label for="doi">DOI:</label>
            <input type="text" id="doi" name="doi">
        </div>
        <div class="form-group">
            <label for="year">Year:</label>
            <input type="number" id="year" name="year" min="1900" max="2100">
        </div>
        <div class="form-group">
            <label for="type">Type:</label>
            <select id="type" name="type">
                <option value="book">Book</option>
                <option value="magazine">Magazine</option>
                <option value="journal">Journal</option>
            </select>
        </div>
        <div class="submit-btn">
            <button type="submit">Submit</button>
        </div>
    </form>
@endsection
