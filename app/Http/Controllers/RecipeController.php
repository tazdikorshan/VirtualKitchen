<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $type = $request->input('type');

        $recipes = Recipe::with('user')
            ->when($search, function ($query) use ($search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('type', 'LIKE', "%{$search}%")
                        ->orWhere('description', 'LIKE', "%{$search}%")
                        ->orWhere('ingredients', 'LIKE', "%{$search}%");
                });
            })
            ->when($type, function ($query) use ($type) {
                return $query->where('type', $type);
            })
            ->orderBy('rid', 'desc')
            ->paginate(10);

        $types = ['French', 'Italian', 'Chinese', 'Indian', 'Mexican', 'Others'];

        return view('recipes.index', compact('recipes', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'type' => 'required|in:French,Italian,Chinese,Indian,Mexican,Others',
            'cookingtime' => 'required|integer|min:1',
            'ingredients' => 'required',
            'instructions' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['uid'] = Auth::id();

        Recipe::create($validated);

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        $recipe->load('user');
        return view('recipes.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        if ($recipe->uid !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('recipes.edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        if ($recipe->uid !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'type' => 'required|in:French,Italian,Chinese,Indian,Mexican,Others',
            'cookingtime' => 'required|integer|min:1',
            'ingredients' => 'required',
            'instructions' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($recipe->image) {
                Storage::disk('public')->delete($recipe->image);
            }
            $validated['image'] = $request->file('image')->store('recipe_images', 'public');
        }

        $recipe->update($validated);

        return redirect()->route('recipes.show', $recipe)->with('success', 'Recipe updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        if ($recipe->uid !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($recipe->image) {
            Storage::disk('public')->delete($recipe->image);
        }

        $recipe->delete();

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe deleted successfully!');
    }
}
