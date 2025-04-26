@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Recipe</h2>
    <form method="POST" action="{{ route('recipes.update', $recipe->rid) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Recipe Name</label>
            <input type="text" name="name" class="form-control" id="name"
                value="{{ old('name', $recipe->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description"
                required>{{ old('description', $recipe->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Category</label>
            <select name="type" class="form-select" id="type" required>
                <option value="">Select a type</option>
                @foreach(['French', 'Italian', 'Chinese', 'Indian', 'Mexican', 'Others'] as $cuisine)
                <option value="{{ $cuisine }}" {{ old('type', $recipe->type) == $cuisine ? 'selected' : '' }}>
                    {{ $cuisine }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cookingtime" class="form-label">Cooking Time (minutes)</label>
            <input type="number" name="cookingtime" class="form-control" id="cookingtime"
                value="{{ old('cookingtime', $recipe->cookingtime) }}" required>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients (one per line)</label>
            <textarea name="ingredients" class="form-control" id="ingredients" rows="5" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="instructions" class="form-label">Instructions (one per line)</label>
            <textarea name="instructions" class="form-control" id="instructions" rows="5" required>{{ old('instructions', $recipe->instructions) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Recipe Image</label>
            @if($recipe->image)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="Current recipe image" class="img-thumbnail" width="200">
                <p class="text-muted">Current image</p>
            </div>
            @endif
            <input type="file" name="image" class="form-control" id="image">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update Recipe</button>
        </div>
    </form>

    <!-- Delete Form (Outside the main form) -->
    <form method="POST" action="{{ route('recipes.destroy', $recipe->rid) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this recipe?')">
            Delete Recipe
        </button>
    </form>
</div>
@endsection