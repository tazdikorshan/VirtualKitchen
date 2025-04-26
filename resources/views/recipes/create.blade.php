@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Recipe</h2>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Recipe Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror"
                id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                id="description" rows="3" required>{{ old('description') }}</textarea>
            @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Category</label>
            <select name="type" class="form-select @error('type') is-invalid @enderror" id="type" required>
                <option value="">Select a type</option>
                @foreach(['French', 'Italian', 'Chinese', 'Indian', 'Mexican', 'Others'] as $cuisine)
                <option value="{{ $cuisine }}" {{ old('type') == $cuisine ? 'selected' : '' }}>
                    {{ $cuisine }}
                </option>
                @endforeach
            </select>
            @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cookingtime" class="form-label">Cooking Time (minutes)</label>
            <input type="number" class="form-control @error('cookingtime') is-invalid @enderror"
                id="cookingtime" name="cookingtime" min="1" value="{{ old('cookingtime') }}" required>
            @error('cookingtime')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients (one per line)</label>
            <textarea name="ingredients" class="form-control @error('ingredients') is-invalid @enderror"
                id="ingredients" rows="5" required>{{ old('ingredients') }}</textarea>
            @error('ingredients')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="instructions" class="form-label">Instructions (one per line)</label>
            <textarea name="instructions" class="form-control @error('instructions') is-invalid @enderror"
                id="instructions" rows="5" required>{{ old('instructions') }}</textarea>
            @error('instructions')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Recipe Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror"
                id="image" name="image" accept="image/jpeg,image/png,image/jpg,image/gif">
            @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Recipe</button>
    </form>
</div>
@endsection