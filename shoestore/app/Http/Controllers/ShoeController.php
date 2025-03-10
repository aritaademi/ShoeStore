<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Shoe;


class ShoeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shoes = Shoe::with(['brand', 'category'])->get();  //Fetches all shoes with their relationships (brand and category) and return the index view.
        return view('shoes.index', compact('shoes'));  //compact passes the $shoes variable to the view.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();  //Brand::all & Category::all - Retrieve all brands and categories.
        $categories = Category::all();
        return view('shoes.create', compact('brands', 'categories'));  //compact('brands', 'categories') - Passes data to populate dropdowns in the form.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([   //Ensures required fields are provided and valid:
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {  //Checks if an image is uploaded.
            $data['image'] = $request->file('image')->store('images', 'public');  //store('images', 'public'): Saves the image in the public/images directory.
        }

    
        Shoe::create($data);  //Inserts a new record into the database.

        return redirect()->route('shoes.index')->with('success', 'Shoe created successfully.'); //Redirects to the shoes.index route with a success message.
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)  //Displays details of a specific shoe.
    {
        $shoe = Shoe::with(['brand', 'category'])->findOrFail($id); // Fetch shoe with relationships, Fetches the shoe by ID and includes related brand and category, findOrFail throws a 404 error if no record is found.
        return view('shoes.show', compact('shoe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $shoe = Shoe::findOrFail($id);  // Fetches the shoe by ID.
        $brands = Brand::all(); //Retrieve all brands and categories for the dropdowns.
        $categories = Category::all();
        return view('shoes.edit', compact('shoe', 'brands', 'categories'));   //Passes the $shoe, $brands, and $categories variables to the view.

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $shoe = Shoe::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {  
            if ($shoe->image) {
                \Storage::disk('public')->delete($shoe->image);  ////Deletes the old image if a new one is uploaded. Saves the new image and updates the file path.
            }

            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $shoe->update($data);  // Updates the shoe with the validated data.

        return redirect()->route('shoes.index')->with('success', 'Shoe updated successfully.');  //Returns to the shoes.index route with a success message.
    }

    /**
     * Remove the specified resource from storage.
     */
    

    public function destroy(string $id)
    {
    $shoe = Shoe::findOrFail($id); // Fetch the shoe instance by its ID

    if ($shoe->image) {
        // Delete the image file from storage if it exists
        \Storage::disk('public')->delete($shoe->image);
    }

    $shoe->delete(); // Delete the shoe from the database

    return redirect()->route('shoes.index')->with('success', 'Shoe deleted successfully.'); //Redirects to the shoes.index route with a success message.

}

}
