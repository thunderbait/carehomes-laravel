<?php

namespace App\Http\Controllers;
use App\Group;
use App\Carehome;

use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only([
            'apiIndex',
        ]);
    }

    public function index(Request $request)
    {

        $query = Group::sortable();

        if ($searchTerm = $request->query('q'))
        {
            $query->where('name', 'LIKE', "%{$searchTerm}%")
                ->orWhereHas('user', function (Builder $subquery) use ($searchTerm) {
                $subquery->where('name', 'LIKE', "%{$searchTerm}%");
            });
        }

        $input = $request->all();
        $groups = $query->paginate(25);
        return view('groups.index', compact('groups', 'input'));
    }

    public function apiIndex()
    {
        return Group::all()->map(function (Group $group) {
            return $group->only([
                'id',
                'name'
            ]);
        });
    }

    public function show($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::findOrFail($id);
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
      * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $group->name = $request->name;

        $group->update();

        return redirect()->route('groups.show',compact('group'))->with('success','Group updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();

        return redirect()->route('groups.index')->with('success', 'Group deleted successfully');
    }
}
