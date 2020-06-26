<?php

namespace App\Http\Controllers;
use App\Group;
use App\Carehome;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {

        $query = Group::orderBy('id', 'asc');
        
        if ($searchTerm = $request->query('q'))
        {
            $query->where('name', 'LIKE', "%{$searchTerm}%")
                ->orWhereHas('user', function (Builder $subquery) use ($searchTerm) {
                $subquery->where('name', 'LIKE', "%{$searchTerm}%");
            });
        }
            
        $groups = $query->paginate(25);
        return view('groups.index', compact('groups'));
    }
    
    public function show($id)
    {   
        $group = Group::findOrFail($id);
        return view('groups.show', compact('group'));
    }
}
