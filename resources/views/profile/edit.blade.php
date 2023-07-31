@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>
        <form action="{{ route('profile.update') }}" method="post">
            @csrf
            @method('put')
            <?php foreach ($profile as $key => $value) {?>
            <div class="form-group">
                <label for="name"> Name</label>
                <input type="text" name="name" id="name" value="{{ $value->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="last_name">Email</label>
                <input type="text" name="email" id="email" value="{{ $value->email }}" class="form-control">
            </div>
        <?php }?>
            <!-- Add other profile fields here -->
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection
