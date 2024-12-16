@extends("layouts.app")
@section('content')
 <div class="container-fluid pt-4 px-4">
    
    <div class="row g-4">
        <div class="col-12">
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs" id="student" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="student" data-bs-toggle="tab" data-bs-target="#student" type="button" role="tab" aria-controls="student" aria-selected="true">Personal Info</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="project" data-bs-toggle="tab" data-bs-target="#project" type="button" role="tab" aria-controls="project" aria-selected="false">Projects</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reading" data-bs-toggle="tab" data-bs-target="#reading" type="button" role="tab" aria-controls="reading" aria-selected="false">Readings</button>
            </li>
            </ul>
            
            <!-- Tabs Content -->
            <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="p-3">
            <h2>Personal Info</h2>
            <form method="POST" action="{{ route('student.update', $student->id) }}">
                @csrf
                @method('PUT') <!-- Use PUT for updates -->

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" 
                        value="{{ old('name', $student->name) }}" required>
                </div>

                <!-- Address -->
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" class="form-control" 
                        value="{{ old('address', $student->address) }}" required>
                </div>

                <!-- Date of Birth -->
                <div class="form-group">
                    <label for="dob">DOB:</label>
                    <input type="date" id="dob" name="dob" class="form-control" 
                        value="{{ old('dob', $student->dob) }}" required>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" class="form-control" 
                        value="{{ old('phone', $student->phone) }}" required>
                </div>

                <!-- Gender -->
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <div class="radio-group">
                        <label>
                            <input type="radio" id="male" name="gender" value="M" 
                                {{ old('gender', $student->gender) == 'M' ? 'checked' : '' }}> Male
                        </label>
                        <label>
                            <input type="radio" id="female" name="gender" value="F" 
                                {{ old('gender', $student->gender) == 'F' ? 'checked' : '' }}> Female
                        </label>
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" 
                        value="{{ old('password') }}" required>
                </div>
                <!-- Country -->
                        <div class="form-group">
                            <label for="country">Country:</label>
                            <select id="country" name="country" class="form-control" required>
                                <option value="us" {{ old('country') == 'us' ? 'selected' : '' }}>United States</option>
                                <option value="uk" {{ old('country') == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                                <option value="bd" {{ old('country') == 'bd' ? 'selected' : '' }}>Bangladesh</option>
                                <option value="in" {{ old('country') == 'in' ? 'selected' : '' }}>India</option>
                                <option value="ca" {{ old('country') == 'ca' ? 'selected' : '' }}>Canada</option>
                            </select>
                        </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email',$student->email) }}" required>
                </div>
                <div class="submit-btn">
                    <button type="submit">Submit</button>
                </div>
            </form>

        </div>
    </div>
    <!-- project -->
    <div class="tab-pane fade" id="project" role="tabpanel" aria-labelledby="profile-tab">
        <div class="p-3">
            <h3>Project</h3>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->end_date }}</td>
                        <td>{{ ucfirst($project->status) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $project->title) }}"required>
                </div>
                <div class="form-group">
                    <label for="start-date">Start Date:</label>
                    <input type="date" id="start-date" name="start-date" class="form-control" value="{{ old('start-date', $project->start-date) }}"required>
                </div>
                <div class="form-group">
                    <label for="end-date">End Date:</label>
                    <input type="date" id="end-date" name="end-date" class="form-control" value="{{ old('end-date', $project->end-date) }}"required>
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status">
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="in-progress" {{ old('status') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                    </select>
                </div>
                <!-- files -->
                <div class="form-group">
                    <label for="files" class="form-label">Upload Files:</label>
                    <input type="file"id="files"  name="files[]" class="form-control @error('files') is-invalid @enderror"  multiple  value="{{ old('files', $project->files) }}" >
                </div>
                <!-- member -->
                <div class="form-group">
                <label for="members" class="form-label">Add Members:</label>
                    <select 
                        id="member" name="member[]" class="form-select @error('member') is-invalid @enderror" multiple >
                        @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ in_array($student->id, old('members', [])) ? 'selected' : '' }}>
                            {{ $student->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="submit-btn">
                    <button type="submit">Submit</button>
                </div>
            </form>
        
        </div>
    </div>
                <!--reading  -->
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="p-3">
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
                            @foreach($readings as $reading)
                    <tr>
                        <td>{{ $reading->title }}</td>
                        <td>{{ $reading->doi }}</td>
                        <td>{{ $reading->year }}</td>
                        <td>{{ ucfirst($reading->type) }}</td>
                    </tr>
                    @endforeach
                            </tbody>
                        </table>
                        <form method="POST" action="{{ route('readings.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $reading->title) }}"required>
                            </div>
                            <div class="form-group">
                                <label for="doi">DOI:</label>
                                <input type="date" id="doi" name="doi" class="form-control" value="{{ old('doi', $reading->doi) }}"required>
                            </div>
                            <div class="form-group">
                                <label for="year">Year:</label>
                                <input type="number" id="year" name="year" min="1900" max="2100" class="form-control" value="{{ old('year', $reading->year) }}"required>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection