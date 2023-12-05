<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class CategoryController extends Controller
{
    //Fungsi yang digunakan ketika user belum login tetapi mencoba mengakses website lansung akan 
    //lansung di arahkan ke halaman login
    public function __construct(){
        $this->middleware('auth');
    }

    public function AllCat(){
        //$categories = DB::table('categories')
          //  ->join('users', 'categories.user_id', 'users.id')
           // ->select('categories.*', 'users.name')
           // ->latest()->paginate(5);
        
        
        //$categories = Category::all;
        $categories = Category::latest()->paginate(5); 
        $trachCat = Category::onlyTrashed()->latest()->paginate(3);
        // || Ini adalah menampilkan 
                                                                //data yang paling terakhir
        //$categories = DB::table('categories')->latest()->paginate(4);
        return view('admin.category.index', compact('categories', 'trachCat'));
        
    }
    
    public function AddCat(Request $request){
        $validateRequest = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Please Less Than 255Chars',
        ]
    );

        Category::insert([
            'category_name' => $request->category_name,
            //Cara Memasukkan Data Sesuai User yang menginputkan
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now() 
        ]);

                //cara insert yang lain
        $category = New Category;
        //$category->category_name = $request->category_name;
        //$category->user_id = Auth::user()->id;
        //$category->save();
            
            //cara insert yang lain part 2
        //$data = array();
        //$data ['category_name'] = $request->category_name;
        //$data ['user_id'] = Auth::user()->id;
        //$data ['created_at'] = Carbon::now();
        //DB::table('categories')->insert($data);

        return Redirect()->back()->with('success', 'NT Gais');        
    }

    public function Edit($id){
        //$categories = Category::find($id);
        $categories = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit', compact('categories'));
    }

    public function Update(Request $request, $id){
        //$update = Category::find($id)->update([
        //   'category_name' => $request->category_name,
        //   'user_id' => Auth::user()->id
        //]);

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);
        
        return Redirect()->route('all.category')->with('success', 'Update Succes gais'); 
    }

    public function SoftDelete($id){
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category Delete Succesfully');
    }
    
    public function Restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category Restore Succesfully');
    
    }

    public function DeleteP($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category Permanently Deleted');
    
    }

}