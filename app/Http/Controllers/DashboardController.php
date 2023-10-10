<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        $recipe = Recipe::all();
        $recipe_hot = Recipe::where('category', '1')->count();
        $recipe_ice = Recipe::where('category', '2')->count();

        return view('dashboard.index', compact('user', 'recipe', 'recipe_ice', 'recipe_hot'));
    }
}
