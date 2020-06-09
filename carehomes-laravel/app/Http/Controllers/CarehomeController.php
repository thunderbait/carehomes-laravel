<?php

namespace App\Http\Controllers;

use App\Carehome;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Location;

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

    public function search(Request $request)
    {
        // discover the unique local_authority from the locations
        $authorities = Location::distinct('local_authority')
            ->orderBy('local_authority')
            ->get(['id','local_authority'])
            ->map(function ($a) {
                return $a->local_authority;
            });

        $authority = $request->get('location_authority');

        

        if ($authority)
        {
            // restrict the search of the carehomes to only include those with a location in the given authority


            // 'with' -> where you are adding a clause to the condition - i.e., search for the location's that have the authority.
        }

       
    }

    public function filter(Request $request)
    {
        // discover the unique local_authority from the locations
        $authorities = Location::distinct('local_authority')
            ->orderBy('local_authority')
            ->get(['local_authority'])
            ->map(function ($a) {
                return $a;
            });

        $authority = $request->get('location_authority');
        $carehomesQuery = Carehome::query();

        return $authorities;

        //return view('carehomes.filter');
    }

}
