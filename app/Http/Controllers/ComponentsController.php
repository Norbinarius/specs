<?php

namespace App\Http\Controllers;

use App\Components;
use App\Devices;
use DB;
use App\Types;
use App\Http\Requests\ComponentsRequest;
use Illuminate\Http\Request;

class ComponentsController extends Controller
{
    public function create()
    {
        $this->authorize('action', Components::class);
        $component = new Components();
        $type = Types::orderBy('name')->pluck('name','id');
        $device = Devices::select(DB::raw('CONCAT(company_name, " ", model_name) AS full_name'), 'id')->pluck('full_name','id');
        return view('layouts.components.create', [
            'entity' => $component,
            'type' => $type,
            'device' => $device
        ]);
    }

    public function store(ComponentsRequest $request)
    {
        $attributes = $request->only(['name', 'type_id', 'device_id']);
        Components::create($attributes);
        return redirect(route('components.index'));
    }

    public function edit($id)
    {
        $this->authorize('action', Components::class);
        $component = Components::findOrFail($id);
        $type = Types::orderBy('name')->pluck('name','id');
        $device = Devices::select(DB::raw('CONCAT(company_name, " ", model_name) AS full_name'), 'id')->pluck('full_name','id');
        return view('layouts.components.edit', [
            'entity' => $component,
            'type' => $type,
            'device' => $device
        ]);
    }

    public function update(Request $request, $id)
    {
        $component = Components::findOrFail($id);
        $attributes = $request->only(['name', 'type_id', 'device_id']);
        $component->update($attributes);
        return redirect(route('components.index'));
    }

    public function delete($id)
    {
        $this->authorize('action', Components::class);
        $component = Components::findOrFail($id);
        return view('layouts.components.delete', [
            'entity' => $component
        ]);
    }

    public function destroy($id)
    {
        $component = Components::findOrFail($id);
        $component->delete($id);
        return redirect(route('components.index'));
    }

    public function index()
    {
        return view('layouts.components.index', [
            'components' => Components::orderBy('name', 'ASC')
                ->with('type')
                ->with('device')
                ->paginate(10)
        ]);
    }
}
