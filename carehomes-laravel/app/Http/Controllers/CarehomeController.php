<?php

namespace App\Http\Controllers;

use App\Carehome;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarehomeController extends Controller
{
	/// Authentication Middleware
	public function __construct()
    {
        $this->middleware('auth');
    }

    /// List of all carehomes in the DB, sorted by ascending order on their Name
    public function index(Request $request)
	{
        $query = Carehome::orderBy('name', 'asc');

        
        if ($searchTerm = $request->query('q'))
        {
            $query->where('name', 'LIKE', "%{$searchTerm}%")->orWhereHas('user', function (Builder $subquery) use ($searchTerm) {
                $subquery->where('name', 'LIKE', "%{$searchTerm}%");
            });
        }

        $carehomes = $query->paginate(25);

        return view('carehomes.index', compact('carehomes'));
	}
    
    public function show($id)
    {
        $carehome = Carehome::findOrFail($id);
        return view('carehomes.show', compact('carehome'));
    }

}
