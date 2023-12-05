<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use App\Models\Multipic;
use App\Models\Slider;
use Carbon\Carbon;

class AboutController extends Controller
{
    public function HomeAbout(){
        $homeabouts = HomeAbout::latest()->get();
        return view('admin.about.index', compact('homeabouts'));
    }

    public function AddAbout(){
        return view('admin.about.create');
    }

    public function StoreAbout(Request $request) {

        HomeAbout::insert([
            'title' => $request->title,
            'short_dis' => $request->short_dis,
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now(),
        ]);
        
        return Redirect()->route('home.about')->with('success', 'Slider Insertes Successfully');   
    }

    public function Edit($id){
        $abouts = HomeAbout::find($id);
        return view('admin.about.edit', compact('abouts'));
    }

    public function Update(Request $request, $id){
        $validatedData = $request->validate([
            'title' => 'required|min:5',
        ],
        [
            'title.required' => 'Please Input Brand Name',
            'title.min' => 'Title Longer Then 5 Characters', 
        ]);
        
        
        HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_dis'=> $request->short_dis, 
            'long_dis' => $request->long_dis,
            'created_at' => Carbon::now()
        ]);

        return Redirect()->route('home.about')->with('success', 'About Updated Successfullt');
            
        }

    public function Delete($id){
            HomeAbout::find($id)->delete();
            return Redirect()->back()->with('success', 'About Delete Successfully');
    }

    public function Portfolio(){
        $images = Multipic::all();
        return view('pages.portfolio', compact('images'));
    }
    
    
}
    