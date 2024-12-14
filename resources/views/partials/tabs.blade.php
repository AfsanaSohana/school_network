<div class="tabs">
    <button class="tab-button @if(request()->is(student')) active @endif" data-tab="student">
        <a href="{{ route('personal-info') }}">Personal Info</a>
    </button>
    <button class="tab-button @if(request()->is('project')) active @endif" data-tab="project">
        <a href="{{ route('project') }}">Project</a>
    </button>
    <button class="tab-button @if(request()->is('reading')) active @endif" data-tab="reading">
        <a href="{{ route('reading') }}">Reading</a>
    </button>
</div>
