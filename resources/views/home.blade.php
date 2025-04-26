@extends('layouts.app')
@section('content')
<main>
    <section>
        <h2>Welcome to My Virtual Kitchen</h2>
        <p>Discover the flavours of <em>Bangladeshi cuisine</em>, crafted with love and tradition.</p>
        <img src="{{ asset('images/MyCuisine.jpg')}}" alt="Virtual Kitchen" width="100%">
    </section>

    <section>
        <h2>About Us</h2>
        <p><strong>Name:</strong> Virtual Kitchen</p>
        <p><strong>Address:</strong> Gressel Lane, Birmingham, United Kingdom</p>
        <p><strong>History:</strong> Founded in 2024, we bring authentic Bangladeshi dishes to your home.</p>
        <p><strong>Student Info:</strong> Tazdik Wazi Orshan, 240350255@aston.ac.uk, 240350255</p>
    </section>

    <section>
        <h2>Signature Dishes</h2>
        <ul>
            <li>Hilsa Curry</li>
            <li>Kacchi Biryani</li>
            <li>Fuchka</li>
        </ul>


        <div class="recipes-link">
            <!-- change this when recipes page is made -->
            <a href="{{ asset('recipes') }}">Explore Recipes</a>


        </div>
    </section>
</main>
@endsection