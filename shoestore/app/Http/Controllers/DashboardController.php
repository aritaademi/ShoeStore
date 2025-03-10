<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shoe;
use App\Models\Brand;
use App\Models\Category;

class DashboardController extends Controller
{
   //Retrieves all Shoe records from the database using Shoe::all(). 
    //This assumes the Shoe model exists and interacts with the shoes database table.
    public function index()
    {
        // Fetch data for the dashboard (e.g., shoes, or user-related info)
        $shoes = Shoe::all(); // You can adjust the data as per your needs
        return view('dashboard', compact('shoes')); // Pass the data to the view
    }

   
}
