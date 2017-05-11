<?php

namespace App\Http\Controllers;

use App\Components;
use App\Specifics;
use App\Devices;
use DB;
use App\Types;
use App\Http\Requests\SpecificsRequest;
use Illuminate\Http\Request;

class SpecificsController extends Controller
{
    public function create()
    {
        $specific = new Specifics();
        $components = Components::orderBy('name')->pluck('name','id');
        return view('layouts.specifics.create', [
            'entity' => $specific,
            'components' => $components,
        ]);
    }

    public function store(SpecificsRequest $request)
    {
        $attributes = $request->only(['name', 'component_id', 'component_other__id']);
        Specifics::create($attributes);
        return redirect(route('specifics.index'));
    }

    public function edit($id)
    {
        $specific = Specifics::findOrFail($id);
        $components = Components::orderBy('name')->pluck('name','id');
        return view('layouts.specifics.edit', [
            'entity' => $specific,
            'components' => $components
        ]);
    }

    public function update(Request $request, $id)
    {
        $specific = Specifics::findOrFail($id);
        $attributes = $request->only(['name', 'component_id', 'component_other__id']);
        $specific->update($attributes);
        return redirect(route('specifics.edit', [
            'id' => $specific->id,
        ]));
    }

    public function delete($id)
    {
        $specific = Specifics::findOrFail($id);
        return view('layouts.specifics.delete', [
            'entity' => $specific
        ]);
    }

    public function destroy($id)
    {
        $specific = Specifics::findOrFail($id);
        $specific->delete($id);
        return redirect(route('specifics.index'));
    }

    public function index()
    {
        return view('layouts.specifics.index', [
            'specifics' => Specifics::orderBy('name', 'ASC')
                ->with('component')
                ->with('component_other')
                ->get()
        ]);
    }
}
