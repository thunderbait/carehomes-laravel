<?php

namespace App\Http\Controllers;

use App\Carehome;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Location;
use App\Contact;

class CarehomeController extends Controller
{
	public function index(Request $request)
	{
        $query = Carehome::orderBy('name', 'asc');
        
        if ($searchTerm = $request->query('q'))
        {
            $query->where('name', 'LIKE', "%{$searchTerm}%");
        }

        $carehomes = $query->paginate(25);
        return view('carehomes.index', compact('carehomes'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Carehome  $carehome
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carehome = Carehome::findOrFail($id);
        $return = (($carehome->number_beds * 365)*(92.5/100))*(65/100);
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
    //     $local_auth = $request->get('local_authority');
    //     $number_beds = $request->get('number_beds');

    //     /// From the local authorities table I want to get the id for the entry
    //     /// that has a name = $local_auth
    //     /// Expected to return only 1 value (interger)
    //     $local_auth_id = DB::table('local_authorities')
    //         ->where('name', 'LIKE', "%{$local_auth}")
    //         ->get(['id']);


    //     /// From the locations table, find all the locations with local_authority_id = $local_auth_id.
    //     /// Since the relationship between local_authorities and locations is One-to-Many
    //     /// i want to input the results into an array called $local_auth_locations
    //     $local_auth_locations =  DB::table('locations')
    //         ->orderBy('name')
    //         ->where('local_auhority_id', 'LIKE', "%{$local_auth_id}")
    //         ->map(function ($a) {
    //             return $a;
    //         });

    //     /// Query the carehomes table, to find all carehomes with a location_id that is in $local_auth_locations 
    //     /// I was thinking i could use the if(in_array) method
    //     /// Then, filter out all the carehomes with less than ($number_beds) beds
    //     /// SELECT * FROM `carehomes-db`.carehomes where number_beds>$number_beds AND location_id is in $local_auth_locations;
    //     $carehomes_query = DB::table('carehomes')
    //         ->where('number_beds', '>', "%{$number_beds}")
    //         ->

    //     /// At the end, I want to display the results in a view with the same layout as /carehomes/index.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carehome  $carehome
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carehome = Carehome::findOrFail($id);
        return view('carehomes.edit', compact('carehome'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carehome  $carehome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carehome $carehome)
    {
        $this->validate($request, [
            'name' => 'required',
            'number_beds' => 'required',
            'location_id' => 'required',
            'group_id' => 'required',
            'notes' => 'required',
        ]);

        $carehome->name = $request->name;
        $carehome->number_beds = $request->number_beds;
        $carehome->location_id = $request->location_id;
        $carehome->group_id = $request->group_id;
        $carehome->notes = $request->notes;

        $carehome->update();

        return redirect()->route('carehomes.index')->with('success','Carehome updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carehome  $carehome
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carehome $carehome)
    {
        //
    }

}
