<?php

use App\Ingredient;
use App\Product;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mincedMeat = new Ingredient();
        $mincedMeat->name = 'minced meat';
        $mincedMeat->save();
        $mincedMeat->refresh();

        $totmato = new Ingredient();
        $totmato->name = 'tomato';
        $totmato->save();
        $totmato->refresh();

        $mozzarella = new Ingredient();
        $mozzarella->name = 'mozarella';
        $mozzarella->save();
        $mozzarella->refresh();

        $onions = new Ingredient();
        $onions->name = 'onions';
        $onions->save();
        $onions->refresh();

        $pastrami = new Ingredient();
        $pastrami->name = 'pastrami';
        $pastrami->save();
        $pastrami->refresh();

        $scamorza = new Ingredient();
        $scamorza->name = 'scamorza';
        $scamorza->save();
        $scamorza->refresh();

        $driedTomato = new Ingredient();
        $driedTomato->name = 'Dried tomato';
        $driedTomato->save();
        $driedTomato->refresh();

        $arugula = new Ingredient();
        $arugula->name = 'Arugula';
        $arugula->save();
        $arugula->refresh();

        $cream = new Ingredient();
        $cream->name = 'cream';
        $cream->save();
        $cream->refresh();

        $salmon = new Ingredient();
        $salmon->name = 'salmon';
        $salmon->save();
        $salmon->refresh();

        $ricotta = new Ingredient();
        $ricotta->name = 'ricotta';
        $ricotta->save();
        $ricotta->refresh();

        $gorgonzola = new Ingredient();
        $gorgonzola->name = 'Gorgonzola';
        $gorgonzola->save();
        $gorgonzola->refresh();

        $mascarpone = new Ingredient();
        $mascarpone->name = 'Mascarpone';
        $mascarpone->save();
        $mascarpone->refresh();

        $granaPadano = new Ingredient();
        $granaPadano->name = 'Grana padano';
        $granaPadano->save();
        $granaPadano->refresh();

        $bocconccini = new Ingredient();
        $bocconccini->name = 'Bocconccini';
        $bocconccini->save();
        $bocconccini->refresh();

        $ham = new Ingredient();
        $ham->name = 'Ham';
        $ham->save();
        $ham->refresh();

        $cherryTomato = new Ingredient();
        $cherryTomato->name = 'Cherry tomato';
        $cherryTomato->save();
        $cherryTomato->refresh();

        $parmiggiano = new Ingredient();
        $parmiggiano->name = 'parmiggiano';
        $parmiggiano->save();
        $parmiggiano->refresh();

        $basil = new Ingredient();
        $basil->name = 'Basil';
        $basil->save();
        $basil->refresh();

        $oliveOil = new Ingredient();
        $oliveOil->name = 'Olive oil';
        $oliveOil->save();
        $oliveOil->refresh();

        $salmonePizza = Product::where('name', 'Salmone')->first();
        $salmonePizza->ingredients()->attach([
            $cream->id,
            $mozzarella->id,
            $salmon->id,
            $ricotta->id,
            $arugula->id
        ]);
        
        $cinqueFromaggi = Product::where('name', 'Cinque Fromaggi')->first();
        $cinqueFromaggi->ingredients()->attach([
            $cream->id,
            $mozzarella->id,
            $gorgonzola->id,
            $scamorza->id,
            $ricotta->id,
            $mascarpone->id
        ]);
        
        $settePizza = Product::where('name', 'sette')->first();
        $settePizza->ingredients()->attach([
            $cream->id,
            $mozzarella->id,
            $gorgonzola->id,
            $scamorza->id,
            $ricotta->id,
            $mascarpone->id,
            $granaPadano->id,
            $bocconccini->id
        ]);

        $torinoPizza = Product::where('name', 'Torino')->first();
        $torinoPizza->ingredients()->attach([
            $cream->id,
            $mozzarella->id,
            $gorgonzola->id,
            $ham->id
        ]);

        $burgerPizza = Product::where('name', 'Burger Pizza')->first();
        $burgerPizza->ingredients()->attach([
            $mincedMeat->id,
            $totmato->id,
            $mozzarella->id,
            $onions->id,
            $pastrami->id,
            $scamorza->id,
            $driedTomato->id,
            $arugula->id
        ]);

        $bresaolaBocconchini = Product::where('name', 'Bresaola Bocconchini')->first();
        $bresaolaBocconchini->ingredients()->attach([
            $mozzarella->id,
            $arugula->id,
            $ham->id,
            $parmiggiano->id,
            $cherryTomato->id,
            $driedTomato->id
        ]);

        $vesuvePizza = Product::where('name', 'Vesuve')->first();
        $vesuvePizza->ingredients()->attach([
            $mozzarella->id,
            $parmiggiano->id,
            $basil->id,
            $oliveOil->id
        ]);

        $vegetarianaPizza = Product::where('name', 'Vegetariana')->first();
        $vegetarianaPizza->ingredients()->attach([
            $mozzarella->id,
            $parmiggiano->id,
            $basil->id,
            $oliveOil->id,
            $driedTomato->id,
            $cherryTomato->id
        ]);
    }
}
