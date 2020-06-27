<?php

use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Pizzas
         */
        $category = new Category;
        $category->name = 'Pizza';
        $category->priority = 1;
        $category->save();
        $category->refresh();

        $product = new Product;
        $product->name = 'Salmone';
        $product->description = 'like the song of a mermaid this pizza will charm the taste buds of seafood lovers and those whose palettes claim to be refined.';
        $product->price = 25;
        $product->picture = 'https://i.ibb.co/DkSCkWN/salmone-pizza.png';
        $product->category_id = $category->id;
        $product->save();

        $product = new Product;
        $product->name = 'Cinque Fromaggi';
        $product->description = 'This work brings together, as its name suggests, an amalgamation of taste of cheese ranging from salty to unami through to the pronounced.';
        $product->price = 30;
        $product->picture = 'https://i.ibb.co/FHWpt4L/cinqua-fromagi-pizza.png';
        $product->category_id = $category->id;
        $product->save();
        
        $product = new Product;
        $product->name = 'Sette';
        $product->description = 'People reading the name of our pizza, think about the quantity of the cheese that might be found. Then they realize that the quality of the cheese matters not the quantity.';
        $product->price = 30;
        $product->picture = 'https://i.ibb.co/ss1MKTZ/sette-pizza.png';
        $product->category_id = $category->id;
        $product->save();
        
        $product = new Product;
        $product->name = 'Torino';
        $product->description = 'Italian cuisine draws its uniqueness from the variety of products used but above all from a great regional diversity which is mainly based on the Mediterranean diet. This pizza reflected this and more to remind the quintessential Italian antipasti.';
        $product->price = 20;
        $product->picture = 'https://i.ibb.co/kGVNgF9/torino-pizza.png';
        $product->category_id = $category->id;
        $product->save();
        
        $product = new Product;
        $product->name = 'Bresaola Bocconchini';
        $product->description = 'This creation is made to seduce. Of all this is the one we present to the uncertain, the curious and those who want to get to know our art.';
        $product->price = 22;
        $product->picture = 'https://i.ibb.co/LkSb7Hy/bresaola-bocconcini-pizza.png';
        $product->category_id = $category->id;
        $product->save();


        $product = new Product;
        $product->name = 'Vegetariana';
        $product->description = 'As the name suggests, this pizza is dedicated to our vegetarian friends or those of us who try to keep an eye on their line. Its garnish is made entirely of fresh vegetables such as eggplant or sun-dried tomatoes.';
        $product->price = 18;
        $product->picture = 'https://i.ibb.co/WtdXvtX/vegetarina-piiza.png';
        $product->category_id = $category->id;
        $product->save();

        $product = new Product;
        $product->name = 'Vesuve';
        $product->description = 'Made of first choice ingredient, it would be a simplification to qualify it as ‘’ ’marguerita’ ’premium. We will therefore call it an eruption, an eruption of taste, flavor and pleasure.';
        $product->price = 19;
        $product->picture = 'https://i.ibb.co/JRR58ff/vesuve-pizza.png';
        $product->category_id = $category->id;
        $product->save();
        
        
        $product = new Product;
        $product->name = 'Burger Pizza';
        $product->description = 'This creation was made with meat lovers in mind. Filling with nature, it will satisfy you amply like a good old Burger.';
        $product->price = 28;
        $product->picture = 'https://i.ibb.co/tDJsYrR/burger-pizza.png';
        $product->category_id = $category->id;
        $product->save();

        /**
         * Pasta
         */
        $category = new Category;
        $category->name = 'Pasta';
        $category->priority = 2;
        $category->save();

        $product = new Product;
        $product->name = 'Rock N Roll';
        $product->description = 'Filled with cheesy cream and high quality chicken meat to feed your appetite';
        $product->price = 16;
        $product->picture = 'https://i.ibb.co/T4tz7xy/rock-n-roll-pasta.jpg';
        $product->category_id = $category->id;
        $product->save();

        $product = new Product;
        $product->name = 'Marry the Mushroom';
        $product->description = 'An italian pasta for mushroom lovers. You\'ll ask for it next time your visit us';
        $product->price = 14;
        $product->picture = 'https://i.ibb.co/W07vwNB/marry-mushroom-pasta.jpg';
        $product->category_id = $category->id;
        $product->save();

        $product = new Product;
        $product->name = 'G FINDER';
        $product->description = 'If you can\'t find it anywhere. You\'ll find it in our restaurant. ';
        $product->price = 15;
        $product->picture = 'https://i.ibb.co/ZxCXSLf/g-finder-pasta.jpg';
        $product->category_id = $category->id;
        $product->save();

        $product = new Product;
        $product->name = 'Pesto Pasta';
        $product->description = 'Just pesto';
        $product->price = 20;
        $product->picture = 'https://i.ibb.co/PGhG9PQ/pesto-pasta.jpg';
        $product->category_id = $category->id;
        $product->save();


        /**
         * Drinks
         */
        $category = new Category;
        $category->name = 'Drinks';
        $category->priority = 3;
        $category->save();

        $product = new Product;
        $product->name = 'Cola';
        $product->description = 'A cold can of cola';
        $product->price = 3;
        $product->picture = 'https://i.ibb.co/3W1XhYY/cola-drink.jpg';
        $product->category_id = $category->id;
        $product->save();

        $product = new Product;
        $product->name = 'Beer';
        $product->description = 'A cold can of beer';
        $product->price = 5;
        $product->picture = 'https://i.ibb.co/FngbzXB/beer-drink.jpg';
        $product->category_id = $category->id;
        $product->save();

        $product = new Product;
        $product->name = 'Water';
        $product->description = 'A cold bootle of water';
        $product->price = 7;
        $product->picture = 'https://i.ibb.co/M76p9dv/water-drink.jpg';
        $product->category_id = $category->id;
        $product->save();
    }
}
