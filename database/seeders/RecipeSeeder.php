<?php

namespace Database\Seeders;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        // Get the first user as recipe owner
        $user = User::firstOrCreate([
            'username' => 'testchef',
            'email' => 'chef@example.com',
            'password' => bcrypt('password123')
        ]);

        $recipes = [
            [
                'name' => 'Hilsa Curry',
                'description' => 'Traditional Bengali dish made with hilsa fish, best enjoyed with steamed rice.',
                'type' => 'Bangladeshi',
                'cookingtime' => 30, // 10 + 20 mins
                'ingredients' => implode("\n", [
                    '4-5 pieces of Hilsa fish',
                    '3-4 tbsp Mustard oil',
                    '2 tbsp Mustard paste',
                    '1 tbsp Turmeric powder',
                    'Salt - to taste',
                    '3-4 (slit) Green chilies',
                    'Water - as needed',
                ]),
                'instructions' => implode("\n", [
                    'Rub hilsa pieces with turmeric powder and salt. Let them sit for 10-15 minutes.',
                    'In a pan, heat mustard oil until smoking point, then reduce heat.',
                    'Lightly fry fish pieces 1-2 minutes per side, set aside.',
                    'Add green chilies and mustard paste to pan, cook 1 minute.',
                    'Add water, salt, and turmeric. Bring to boil.',
                    'Add fish pieces, simmer 5-7 minutes.',
                    'Drizzle raw mustard oil before serving.'
                ]),
                'image' => 'aee5b4da0fe97c42ebe01850005827d5.jpg',
                'uid' => $user->uid
            ],
            [
                'name' => 'Fuchka',
                'description' => 'Popular Bengali street snack with crispy puris filled with spicy potatoes and tangy tamarind water.',
                'type' => 'Bangladeshi',
                'cookingtime' => 10,
                'ingredients' => implode("\n", [
                    'Filling:',
                    '2-3 boiled potatoes (mashed)',
                    '1/2 tsp Black salt',
                    '1/2 tsp Roasted cumin powder',
                    '1/2 tsp Red chili powder',
                    '1-2 Chopped green chilies',
                    '2 tbsp Chopped coriander leaves',

                    'Tamarind Water:',
                    '1/4 cup Tamarind pulp',
                    '2-3 cups Water',
                    '1 tsp Black salt',
                    '1 tsp Roasted cumin powder',
                    '1-2 Crushed green chilies',
                    '2 tbsp Chopped coriander leaves'
                ]),
                'instructions' => implode("\n", [
                    'Potato Filling:',
                    '1. Mash boiled potatoes',
                    '2. Add all filling ingredients, mix well',

                    'Tamarind Water:',
                    '1. Mix tamarind pulp with water',
                    '2. Add remaining ingredients, stir well',
                    '3. Let rest 10-15 minutes',

                    'Assembly:',
                    '1. Crack puri tops',
                    '2. Fill with potato mixture',
                    '3. Add tamarind water and serve'
                ]),
                'image' => 'download.jpeg',
                'uid' => $user->uid
            ],
            [
                'name' => 'Kacchi Biryani',
                'description' => 'Traditional Bangladeshi dish with marinated mutton and fragrant basmati rice.',
                'type' => 'Bangladeshi',
                'cookingtime' => 150, // 30 + 120 mins
                'ingredients' => implode("\n", [
                    'Marinade:',
                    '1 kg Mutton (bone-in)',
                    '1 cup Yogurt',
                    '2 tbsp Ginger-garlic paste',
                    '1 cup Fried onions',
                    '1 tsp Red chili powder',
                    '1/2 tsp Turmeric powder',
                    '1 tsp Cumin powder',
                    '1 tsp Coriander powder',
                    '1 tsp Garam masala',
                    'Salt to taste',
                    '2 tbsp Lemon juice',
                    '3-4 Chopped green chilies',
                    '1/4 cup Saffron milk',
                    '1/4 cup Ghee',

                    'Rice:',
                    '4 cups Basmati rice',
                    '2 Bay leaves',
                    '4-5 Cloves',
                    '3-4 Green cardamoms',
                    '2 Cinnamon sticks',
                    'Salt to taste'
                ]),
                'instructions' => implode("\n", [
                    'Marinate mutton with all marinade ingredients for 4-6 hours',
                    'Soak rice for 30 minutes',
                    'Parboil rice with spices until 70% cooked',
                    'Layer mutton and rice in heavy pot',
                    'Add fried onions, ghee, saffron milk, kewra and rose water',
                    'Seal pot and cook on low heat for 1.5-2 hours',
                    'Mix layers gently before serving'
                ]),
                'image' => 'download (1).jpeg',
                'uid' => $user->uid
            ]
        ];

        foreach ($recipes as $recipeData) {
            Recipe::create($recipeData);
        }
    }
}
