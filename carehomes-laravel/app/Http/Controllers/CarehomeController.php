<?php

namespace App\Http\Controllers;

use App\Carehome;
use App\Group;
use App\LocalAuthority;
use App\Type;
use App\Specialism;
use Illuminate\Http\Request;

class CarehomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Carehome::with('group')->sortable();

        if ($searchTerm = $request->query('q')) {
            $query->where('name', 'LIKE', "%{$searchTerm}%");
        }

        $input = $request->all();
        $this->filter($request, $query);

        $carehomes = $query->paginate(25);

        $local_authorities = LocalAuthority::orderBy('name', 'asc')->get();
        $groups = Group::orderBy('name', 'asc')->get();
        $types = Type::orderBy('name', 'asc')->get();
        $specialisms = Specialism::orderBy('name', 'asc')->get();

        return view('carehomes.index', compact('carehomes', 'local_authorities', 'groups', 'types', 'specialisms', 'input'));
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
        return view('carehomes.show', compact('carehome'));
    }

    private function filter(Request $request, $query)
    {
        $localAuthority = $request->query('local_authority');
        $group = $request->query('group');
        $minBeds = $request->query('number_beds');
        $type1 = $request->query('type1');
        $type2 = $request->query('type2');
        $type3 = $request->query('type3');
        $specialism1 = $request->query('specialism1');
        $specialism2 = $request->query('specialism2');
        $specialism3 = $request->query('specialism3');

        $query->when($minBeds, function ($query, $minBeds) {
            return $query->where('number_beds', '>=', $minBeds);
        })
            ->when($group, function ($query, $group) {
                return $query->where('group_id', $group);
            })
            ->when($localAuthority, function ($query, $localAuthority) {
                return $query->whereHas('location', function ($query) use ($localAuthority) {
                    $query->where('local_authority_id', $localAuthority);
                });
            })
            ->when($type1, function ($query, $type1) {
                return $query->whereHas('types', function ($query) use ($type1) {
                    $query->where('type_id', $type1);
                });
            })
            ->when($type2, function ($query, $type2) {
                return $query->whereHas('types', function ($query) use ($type2) {
                    $query->where('type_id', $type2);
                });
            })
            ->when($type3, function ($query, $type3) {
                return $query->whereHas('types', function ($query) use ($type3) {
                    $query->where('type_id', $type3);
                });
            })
            ->when($specialism1, function ($query, $specialism1) {
                return $query->whereHas('specialisms', function ($query) use ($specialism1) {
                    $query->where('specialism_id', $specialism1);
                });
            })
            ->when($specialism2, function ($query, $specialism2) {
                return $query->whereHas('specialisms', function ($query) use ($specialism2) {
                    $query->where('specialism_id', $specialism2);
                });
            })
            ->when($specialism3, function ($query, $specialism3) {
                return $query->whereHas('specialisms', function ($query) use ($specialism3) {
                    $query->where('specialism_id', $specialism3);
                });
            });
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
