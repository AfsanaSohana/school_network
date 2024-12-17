@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Students</h1>

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
                            @if($d->status != 1)
                            <a href="{{route('student_user.approve',encryptor('encrypt',$d->id))}}" class="btn btn-info">Approve now</a>
                            @else
                                Approved
                            @endif
                            <!-- <button onclick="$('#c{{$d->id}}').submit()" class="btn btn-danger">Delete</button>

                            <form id="c{{$d->id}}" method="post" action="{{route('users.destroy',$d->id)}}">
                                @csrf
                                @method('DELETE')
                            </form> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   
</div>
@endsection
