@extends('layouts.app')

@section('content')
<div class="container">
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    <h2>Book a Private Cooking Lesson</h2>
    <form id="contact-form" onsubmit="return validateForm()">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required><br><br>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required><br><br>
        </div>

        <div class="form-group">
            <label for="confirm-email">Confirm Email:</label>
            <input type="email" class="form-control" id="confirm-email" name="confirm-email" required><br><br>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="tel" class="form-control" id="phone" name="phone"><br><br>
        </div>

        <div class="form-group">
            <label for="contact-method">Preferred Contact Method:</label>
            <select class="form-control" name="contact-method" id="contact-method">
                <option value="phone">Phone</option>
                <option value="email">Email</option>
            </select><br><br>
        </div>

        <div class="form-group">
            <label for="date">Preferred Date:</label>
            <input type="date" class="form-control" id="date" name="date" required><br><br>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection