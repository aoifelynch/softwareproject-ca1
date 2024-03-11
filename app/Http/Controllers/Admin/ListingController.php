<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Category;
use Auth;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Auth::user()->authorizeRoles('admin'); 

        if(!Auth::user()->hasRole('admin'))
        {
            return to_route('user.home.index');
        }

        $listings = Listing::all();
        $categories = Category::all();

        return view('admin.home.index',[
            'listing' => $listings,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $rules = [
            'title' => 'required|string|unique:animes,title|min:2|max:150', //Checks that the title isnt the same as another title
            
        ];


        $request->validate($rules);
        // dd($request);


        // $anime_image = $request->file('anime_image');
        // $extension = $anime_image->getClientOriginalExtension();
        // $filename = date('y-m-d-His') . '_' .  str_replace(' ', '_', $request->title) . '.' . $extension;


        // $anime_image->storeAs('public/images', $filename);


        $listing = Listing::create([
            'title' => $request->title,
 
        ]);

        // $anime->genres()->attach($request->genres);

        // return to_route('admin.animes.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
 

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $listing = Listing::findOrFail($id);

        $listing->delete();

        return redirect()->route('admin.home.index')->with('status', 'Listing deleted successfully');
    }
}