<?php

namespace App\Http\Controllers;

use App\Carehome;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
