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
        $query = Carehome::with('group')->orderBy('name', 'asc');

        if ($searchTerm = $request->query('q')) {
            $query->where('name', 'LIKE', "%{$searchTerm}%");
        }

        $this->filter($request, $query);

        $carehomes = $query->paginate(25);

        $local_authorities = LocalAuthority::orderBy('name', 'asc')->get();
        $groups = Group::orderBy('name', 'asc')->get();
        $types = Type::orderBy('name', 'asc')->get();
        $specialisms = Specialism::orderBy('name', 'asc')->get();

        return view('carehomes.index', compact('carehomes', 'local_authorities', 'groups', 'types', 'specialisms'));
    }

    public function show($id)
    {
        $carehome = Carehome::findOrFail($id);
        $return = (($carehome->number_beds * 365) * (92.5 / 100)) * (65 / 100);
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

        if ($localAuthority && $group && $minBeds && $type1 && $type2 && $type3 && $specialism1 && $specialism2 && $specialism3) {
            return $query->where('number_beds', '>=', $minBeds)
                ->where('group_id', $group)
                ->whereHas('location', function ($query) use ($localAuthority) {
                    $query->where('local_authority_id', $localAuthority);
                })
                ->whereHas('types', function ($query) use ($type1, $type2, $type3) {
                    $query->where('type_id', $type1)
                        ->orWhere('type_id', $type2)
                        ->orWhere('type_id', $type3);
                })
                ->orWhereHas('specialisms', function ($query) use ($specialism1, $specialism2, $specialism3) {
                    $query->where('specialism_id', $specialism1)
                        ->orWhere('specialism_id', $specialism2)
                        ->orWhere('specialism_id', $specialism3);
                });
        }
    }
}
