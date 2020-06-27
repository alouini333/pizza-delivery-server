<?php

namespace App\Http\Controllers;

use App\Category;
use App\Utils\Utils;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        try {
            $products = Category::with(['products', 'products.ingredients'])->orderBy('priority')->get();
            return Utils::returnData($products);
        } catch (\Exception $e) {
            return Utils::handleException($e);
        }
    }
}
