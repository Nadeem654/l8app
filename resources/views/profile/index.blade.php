@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Profile</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

   
   <?php foreach ($profile as $key => $value) {?>
    @if ($profile)
  
            <p><strong> Name:</strong> {{ $value->name }}</p>
            <p><strong>Email:</strong> {{ $value->email }}</p>
            <!-- Display other profile fields here -->
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
        @else
            <p>No profile found. <a href="{{ route('profile.create') }}">Create Profile</a></p>
        @endif
    <?php } ?> 
     
    </div>
@endsection
