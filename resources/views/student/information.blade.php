@extends("layouts.app")
@section('content')
 <div class="container-fluid pt-4 px-4">
    @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <div class="row g-4">
        <div class="col-12">
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs" id="student" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="student" data-bs-toggle="tab" data-bs-target="#student" type="button" role="tab" aria-controls="student" aria-selected="true">Personal Info</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#project" type="button" role="tab" aria-controls="project" aria-selected="false">Projects</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reading" type="button" role="tab" aria-controls="reading" aria-selected="false">Readings</button>
            </li>
            </ul>
            
            <!-- Tabs Content -->
            <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="p-3">
            <h2>Personal Info</h2>
           <form method="POST" action="{{ route('student.information.store', $student->id) }}">
    @csrf
    <div style="display: flex; flex-direction: column; gap: 15px;">

        <!-- Name -->
        <div class="form-group" style="display: flex; gap: 10px;">
            <label for="name" style="width: 150px; text-align: right;">Name:</label>
            <input type="text" id="name" name="name" class="form-control" 
                value="{{ old('name', $student->name) }}" required 
                style="flex: 1; background-color: #e0e0e0;">
        </div>

        <!-- Address -->
        <div class="form-group" style="display: flex; gap: 10px;">
            <label for="address" style="width: 150px; text-align: right;">Address:</label>
            <input type="text" id="address" name="address" class="form-control" 
                value="{{ old('address', $student->address) }}" required 
                style="flex: 1; background-color: #e0e0e0;">
        </div>

        <!-- Date of Birth -->
        <div class="form-group" style="display: flex; gap: 10px;">
            <label for="dob" style="width: 150px; text-align: right;">DOB:</label>
            <input type="date" id="dob" name="dob" class="form-control" 
                value="{{ old('dob', $student->dob) }}" required 
                style="flex: 1; background-color: #e0e0e0;">
        </div>

        <!-- Phone -->
        <div class="form-group" style="display: flex; gap: 10px;">
            <label for="phone" style="width: 150px; text-align: right;">Phone:</label>
            <input type="text" id="phone" name="phone" class="form-control" 
                value="{{ old('phone', $student->phone) }}" required 
                style="flex: 1; background-color: #e0e0e0;">
        </div>

        <!-- Gender -->
        <div class="form-group" style="display: flex; gap: 10px; align-items: center;">
            <label for="gender" style="width: 150px; text-align: right;">Gender:</label>
            <div style="display: flex; gap: 20px;">
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
        <div class="form-group" style="display: flex; gap: 10px;">
            <label for="password" style="width: 150px; text-align: right;">Password:</label>
            <input type="password" id="password" name="password" class="form-control" 
                style="flex: 1; background-color: #e0e0e0;">
        </div>

        <!-- Country -->
        <div class="form-group" style="display: flex; gap: 10px;">
            <label for="country" style="width: 150px; text-align: right;">Country:</label>
            <select id="country" name="country" class="form-control" required 
                style="flex: 1; background-color: #e0e0e0;">
                <option value="us" {{ old('country') == 'us' ? 'selected' : '' }}>United States</option>
                <option value="uk" {{ old('country') == 'uk' ? 'selected' : '' }}>United Kingdom</option>
                <option value="bd" {{ old('country') == 'bd' ? 'selected' : '' }}>Bangladesh</option>
                <option value="in" {{ old('country') == 'in' ? 'selected' : '' }}>India</option>
                <option value="ca" {{ old('country') == 'ca' ? 'selected' : '' }}>Canada</option>
            </select>
        </div>

        <!-- Email -->
        <div class="form-group" style="display: flex; gap: 10px;">
            <label for="email" style="width: 150px; text-align: right;">Email:</label>
            <input type="email" id="email" name="email" class="form-control" 
                value="{{ old('email', $student->email) }}" required 
                style="flex: 1; background-color: #e0e0e0;">
        </div>

        <!-- Submit Button -->
        <div class="form-group" style="text-align: center; margin-top: 15px;">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
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
                        <td>{{ $project->End_date }}</td>
                        <td>{{ ucfirst($project->status) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
         <form method="POST" action="{{ route('student.information.project_store') }}" enctype="multipart/form-data" style="padding: 20px;">
    @csrf
    <div style="display: flex; flex-direction: column; gap: 15px;">

        <!-- Title -->
        <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
            <label for="title" style="width: 150px;">Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required 
                   style="flex: 1; background-color: #e0e0e0; border: 1px solid #ccc; padding: 6px;">
        </div>

        <!-- Start Date -->
        <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
            <label for="start_date" style="width: 150px;">Start Date:</label>
            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date') }}" required 
                   style="flex: 1; background-color: #e0e0e0; border: 1px solid #ccc; padding: 6px;">
        </div>

        <!-- End Date -->
        <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
            <label for="End_date" style="width: 150px;">End Date:</label>
            <input type="date" id="End_date" name="End_date" class="form-control" value="{{ old('End_date') }}" required 
                   style="flex: 1; background-color: #e0e0e0; border: 1px solid #ccc; padding: 6px;">
        </div>

        <!-- Status -->
        <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
            <label for="status" style="width: 150px;">Status:</label>
            <select id="status" name="status" class="form-control" 
                    style="flex: 1; background-color: #e0e0e0; border: 1px solid #ccc; padding: 6px;">
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="in-progress" {{ old('status') == 'in-progress' ? 'selected' : '' }}>In Progress</option>
            </select>
        </div>

        <!-- Files -->
        <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
            <label for="files" style="width: 150px;">Upload Files:</label>
            <input type="file" id="files" name="files[]" class="form-control" multiple 
                   style="flex: 1; background-color: #e0e0e0; border: 1px solid #ccc; padding: 6px;">
        </div>

        <!-- Members -->
        <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
            <label for="members" style="width: 150px;">Add Members:</label>
            <select id="member" name="member[]" class="form-control" multiple 
                    style="flex: 1; background-color: #e0e0e0; border: 1px solid #ccc; padding: 6px;">
                @foreach($members as $m)
                <option value="{{ $m->id }}" {{ in_array($m->id, old('members', [])) ? 'selected' : '' }}>
                    {{ $m->name }}
                </option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <div class="form-group" style="text-align: right;">
            <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #fff; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">
                Submit
            </button>
        </div>
    </div>
</form>



        
        </div>
    </div>
                <!--reading  -->
    <div class="tab-pane fade" id="reading" role="tabpanel" aria-labelledby="contact-tab">
        <div class="p-3">
            <h2>Readings</h2>
            <table class="table">
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
           <form method="POST" action="{{ route('student.information.reading_store') }}" style="padding: 20px;">
    @csrf
    <div style="display: flex; flex-direction: column; gap: 15px;">

        <!-- Title -->
        <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
            <label for="title" style="width: 150px;">Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required 
                   style="flex: 1; background-color: #e0e0e0; border: 1px solid #ccc; padding: 6px;">
        </div>

        <!-- DOI -->
        <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
            <label for="doi" style="width: 150px;">DOI:</label>
            <input type="date" id="doi" name="doi" class="form-control" value="{{ old('doi') }}" required 
                   style="flex: 1; background-color: #e0e0e0; border: 1px solid #ccc; padding: 6px;">
        </div>

        <!-- Year -->
        <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
            <label for="year" style="width: 150px;">Year:</label>
            <input type="number" id="year" name="year" min="1900" max="2100" class="form-control" value="{{ old('year') }}" required 
                   style="flex: 1; background-color: #e0e0e0; border: 1px solid #ccc; padding: 6px;">
        </div>

        <!-- Type -->
        <div class="form-group" style="display: flex; align-items: center; gap: 10px;">
            <label for="type" style="width: 150px;">Type:</label>
            <select id="type" name="type" class="form-control" 
                    style="flex: 1; background-color: #e0e0e0; border: 1px solid #ccc; padding: 6px;">
                <option value="book">Book</option>
                <option value="magazine">Magazine</option>
                <option value="journal">Journal</option>
            </select>
        </div>

        <!-- Submit Button -->
        <div class="form-group" style="text-align: right;">
            <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #fff; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">
                Submit
            </button>
        </div>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection