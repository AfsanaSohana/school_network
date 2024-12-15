@extends("layouts.app")
@section('content')
 <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <!-- Tabs Navigation -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Personal Info</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Projects</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Readings</button>
            </li>
            </ul>
            
            <!-- Tabs Content -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="p-3">
                        <h2>Personal Info</h2>
                        <form>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" value="{{old('name',$student->name)}}">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" id="address" name="address">
                            </div>
                            <div class="form-group">
                            <label for="dob">DOB:</label>
                            <input type="date" id="dob" name="dob">
                            </div>
                            <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                            <label for="gender">Gender:</label>
                            <div class="radio-group">
                                <label><input type="radio" id="male" name="gender" value="M"> Male</label>
                                <label><input type="radio" id="female" name="gender" value="F"> Female</label>
                            </div>
                            </div>
                            <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password">
                            </div>
                            <div class="form-group">
                            <label for="country">Country:</label>
                            <select id="country" name="country">
                                <option value="us">United States</option>
                                <option value="uk">United Kingdom</option>
                                <option value="bd">Bangladesh</option>
                                <option value="in">India</option>
                                <option value="ca">Canada</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email">
                            </div>
                            <div class="submit-btn">
                            <button type="submit">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="p-3">
                    <h3>Profile Content</h3>
                    <p>This is the profile tab. You can place information about the user profile here.</p>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="p-3">
                    <h3>Contact Content</h3>
                    <p>Here is the contact tab. Add your contact details or form in this section.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection