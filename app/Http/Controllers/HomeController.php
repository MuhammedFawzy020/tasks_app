<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tasks;
class HomeController extends Controller
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
        $no_of_users = User::where('is_admin', false)->count();
        $no_of_admins = User::where('is_admin', true)->count();
        $no_of_tasks = Tasks::count();
        return view('home' , compact('no_of_users' ,'no_of_admins','no_of_tasks'));
    }
    
    public function search(Request $request)
    {
        $query = $request->input('q');
        
        $users = User::where('is_admin', false)
            ->where('name', 'LIKE', "%{$query}%")
            ->limit(10) // Limit the number of results for performance
            ->get();
        
        return response()->json($users);
    }
}
