<?php

// app/Http/Controllers/WelcomeController.php

namespace App\Http\Controllers;

use App\Models\AnimalList;
use Illuminate\Http\Request;
use App\Models\YourModel;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        // Fetch data from the model
        $data = AnimalList::where('isActive',1)->get;  // Modify this query as needed
        
        // Pass data to the view
        return view('welcome', compact('data'));
    }
}
