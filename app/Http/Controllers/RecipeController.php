<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;

class RecipeController extends Controller
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

    public function index()
    {
        $recipes = Recipe::all();

        return view('recipe.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipe.create');
    }

    public function createStore(Request $request)
    {
        // $user = User::where('id', Auth::user()->id)->first();
        $recipe = new Recipe;
        $user = User::where('id', Auth::user()->id)->first();

        // ubah nama name biar unique
        $imageName = time().'.'.$request->imageDetail->extension();  
        $request->imageDetail->move(public_path('img/recipe'), $imageName);

        // ubah nama name biar unique
        $imageNamePhoto = time().'.'.$request->image->extension();  
        $request->image->move(public_path('img/recipe'), $imageNamePhoto);

        libxml_use_internal_errors(true);
        // Save Description for Sumernote
        if (!empty($request->content )) 
        {
            $content = $request->content; // ambil dari form blade

            $dom = new \DomDocument(); // gunakan dom document untuk ngambil tag img summernote
            $dom->loadHtml( mb_convert_encoding($content, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getElementsByTagName('img'); // ambil aja semua yg tag img
            foreach($images as $img)
            {
                $src = $img->getAttribute('src'); // ambil src dari img
                if(preg_match('/data:image/', $src)){ // check data apa bentuknya data:image
                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups); // pecah-pecah data
                    $mimetype = $groups['mime'];

                    $filename = uniqid(); // buat nama file upload
                    $filepath = "/img/recipe/$filename.$mimetype"; // path folder gambar
                    // disini buat gambar lalu simpan pada folder yang diinginkan
                    $image = Image::make($src)
                        ->encode($mimetype, 100)  // encode file to the specified mimetype
                        ->save(public_path($filepath));

                    $new_src = asset($filepath); // convert menjadi tag img html biasa
                    $img->removeAttribute('src'); // hapus tag img bawaan si summernote
                    $img->setAttribute('src', $new_src); // ganti dengan yang baru.
                }
            }
            $description = $dom->saveHTML();
        }
        $recipe->content = $description;

        // data yg di request masukin ke kolom pada table
        $recipe->imageDetail = $imageName;
        $recipe->image = $imageNamePhoto;
        $recipe->name = $request->name;
        $recipe->category = $request->category;
        $recipe->ingredient = $request->ingredient;
        $recipe->user_id = $user->id;
        $recipe->save();
        
        Alert::success('Success', 'New recipe has been Realese!');
        return redirect('recipe');
    }
    
    public function delete($id) 
    {
        $recipe = Recipe::where('id', $id )->first();
        $recipe->delete();

        Alert::warning('Success', 'Recipe has been deleted!');
        return redirect('recipe');
    }
    
    public function edit($id)
    {
        $recipe = Recipe::where('id', $id)->first();
        $ingredients = nl2br(str_replace(",", "<br>", $recipe->ingredient));

        return view('recipe.edit', compact('recipe', 'ingredients'));
    }

    public function editStore(Request $request)
    {
        $recipe = Recipe::where('id',$request->id)->first();
        $user = User::where('id', Auth::user()->id)->first();

        // kalo photo nya kosong ga error
        if (!empty($request->imageDetail)) { //foto detail
            $imageName = time().'.'.$request->imageDetail->extension();  
            $request->imageDetail->move(public_path('img/recipe'), $imageName);
            
            $recipe->imageDetail = $imageName;
        }
        if (!empty($request->image)) { // foto preview recipe
            $imageNamePhoto = time().'.'.$request->image->extension();  
            $request->image->move(public_path('img/recipe'), $imageNamePhoto);
            
            $recipe->image = $imageNamePhoto;
        }

        $recipe->name = $request->name;
        $recipe->content = $request->content;
        $recipe->category = $request->category;
        $recipe->ingredient = $request->ingredient;
        $recipe->user_id = $user->id;
        $recipe->update();

        Alert::info('Success', 'Recipe has been Updated!');
        return redirect('recipe');
    }
}
