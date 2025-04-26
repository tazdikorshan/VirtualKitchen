@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section class="recipe-details">
                    <h1>{{ e($recipe->name) }}</h1>
                    <div class="meta-info">
                        <p><strong>Category:</strong> {{ e($recipe->type) }}</p>
                        <p><strong>Cooking Time:</strong> {{ e($recipe->cookingtime) }} minutes</p>
                        <p class="text-muted"><strong>Posted by:</strong> {{ e($recipe->user->username) }}</p>
                    </div>

                    @if($recipe->image)
                    <img src="{{ asset('storage/' . $recipe->image) }}"
                        class="img-fluid mb-4"
                        alt="{{ e($recipe->name) }}">
                    @endif

                    <h3>Description</h3>
                    <p>{{ e($recipe->description) }}</p>

                    <div class="recipe-content">
                        <h3>Ingredients</h3>
                        <div class="ingredients">{!! nl2br(e($recipe->ingredients)) !!}</div>

                        <h3>Instructions</h3>
                        <div class="instructions">{!! nl2br(e($recipe->instructions)) !!}</div>
                    </div><br>

                    <div class="navigation mt-4">
                        <a href="{{ route('recipes.index') }}" class="btn btn-secondary">
                            ← Back to Recipes
                        </a>
                    </div>
                </section>
            </div>

            <div class="col-md-4">
                @auth
                @if(Auth::id() === $recipe->uid)
                <div class="card management-card">
                    <div class="card-body">
                        <h4 class="card-title">Manage Recipe</h4>
                        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-warning btn-block">
                            Edit Recipe
                        </a>
                        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block mt-2"
                                onclick="return confirm('Are you sure you want to delete this recipe?')">
                                Delete Recipe
                            </button>
                        </form>
                    </div>
                </div>
                @endif
                @endauth
            </div>
        </div>
    </div>
</main>
@endsection