@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Projects</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add User</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                    <tr>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->contact_no }}</td>
                        <td>
                            <a href="{{route('users.edit',encryptor('encrypt',$d->id))}}" class="btn btn-info">Edit</a>
                            <button onclick="$('#c{{$d->id}}').submit()" class="btn btn-danger">Delete</button>

                            <form id="c{{$d->id}}" method="post" action="{{route('users.destroy',$d->id)}}">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   
</div>
@endsection
