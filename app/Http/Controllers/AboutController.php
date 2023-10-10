<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AboutController extends Controller
{
    public function index()
    {
        $abouts = About::first();
        // return $abouts;

        return view('about.index', compact('abouts'));
    }

    public function indexStore(Request $request)
    {
        $abouts = new About;

        $abouts->title = $request->title;
        $abouts->content = $request->content;
        $abouts->service_title = $request->service_title;
        $abouts->service_content = $request->service_content;

        // $imageName = time().'.'.$request->brand->extension();  
        // $request->brand->move(public_path('img/about'), $imageName);
        // $abouts->brand = $imageName;

        $abouts->update();

        Alert::success('Congrats', 'About has been updated!');
        return redirect('about');
    }
}
