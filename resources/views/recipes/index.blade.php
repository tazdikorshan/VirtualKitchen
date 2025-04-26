@extends('layouts.app')

@section('content')
<main>
    <div class="search-container">
        <form action="{{ route('recipes.index') }}" method="GET">
            <input type="text" name="search" placeholder="Search by name..."
                value="{{ request('search') }}">

            <select name="type">
                <option value="">All Categories</option>
                @foreach($types as $category)
                <option value="{{ $category }}"
                    {{ request('type') == $category ? 'selected' : '' }}>
                    {{ $category }}
                </option>
                @endforeach
            </select>

            <button type="submit">Search</button>
        </form>
    </div>

    @forelse($recipes as $recipe)
    <section class="recipe">
        <h2>
            <a href="{{ route('recipes.show', $recipe->rid) }}">
                {{ $recipe->name }}
            </a>
        </h2>
        <p class="type"><strong>Category:</strong> {{ $recipe->type }}</p>
        <p class="description">{{ $recipe->description }}</p>
        <p class="time"><strong>Total Time:</strong> {{ $recipe->cookingtime }} minutes</p>
        <hr>
    </section>
    @empty
    <p class="no-results">No recipes found matching your criteria.</p>
    @endforelse
</main>
@endsection