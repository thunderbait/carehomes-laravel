<?php

namespace App\Http\Controllers;

use App\Carehome;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Location;

class CarehomeController extends Controller
{
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
        $venue = Carehome::findOrFail($id);
        return view('carehomes.show', compact('carehome'));
    }

    public function filter(Request $request)
    {

        $local_authorities = DB::table('local_authorities')->get();

        // discover the unique local_authority from the locations
        // $authorities = Location::distinct('local_authority')
        //     ->orderBy('local_authority')
        //     ->get(['local_authority'])
        //     ->map(function ($a) {
        //         return $a;
        //     });

        // $authority = $request->get('location_authority');
        // $carehomesQuery = Carehome::query();

        // return $authorities;

        return view('carehomes.filter', ['local_authorities' => $local_authorities]);
    }

    public function search(Request $request)
    {
        $local_auth = $request->get('local_authority');
        $number_beds = $request->get('number_beds');

        /// $local_auth_id =  Query - From local_authorities table get the id of the entry with name $local_auth 
        $local_auth_id = DB::table('local_authorities')
            ->where('name', 'LIKE', "%{$local_auth}")
            ->get(['id']);  
        /// $local_auth_locations = [From locations table get the id's of all carehomes with local_auhority_id = $local_auth_id]
        $local_auth_locations =  DB::table('locations')
            ->orderBy('name')
            ->where('local_auhority_id', 'LIKE', "%{local_auth_id}")
            ->map(function ($a) {
                return $a;
            });
        /// Query the carehomes table
        /// SELECT * FROM `carehomes-db`.carehomes where number_beds>$number_beds AND location_id is in $local_auth_locations;
        $carehomes_query = DB::table('carehomes')
            ->where('number_beds', '>', "%{number_beds}")
            ->


    }

}
