<?php

namespace App\Http\Controllers;

use App\Devices;
use App\Http\Requests\DevicesRequest;
use Illuminate\Http\Request;

class DevicesController extends Controller
{
    public function create()
    {
        $device = new Devices();
        
        return view('layouts.devices.create', [
            'entity' => $device
        ]);
    }

    public function store(DevicesRequest $request)
    {
        $attributes = $request->only(['company_name', 'model_name']);
        Devices::create($attributes);
        return redirect(route('devices.index'));
    }

    public function edit($id)
    {
        $device = Devices::findOrFail($id);
        return view('layouts.devices.edit', [
            'entity' => $device
        ]);
    }

    public function update(Request $request, $id)
    {
        $device = Devices::findOrFail($id);
        $attributes = $request->only(['company_name', 'model_name']);
        $device->update($attributes);
        return redirect(route('devices.index'));
    }

    public function delete($id)
    {
        $device = Devices::findOrFail($id);
        return view('layouts.devices.delete', [
            'entity' => $device
        ]);
    }

    public function destroy($id)
    {
        $device = Devices::findOrFail($id);
        $device->delete($id);
        return redirect(route('devices.index'));
    }

    public function index()
    {
        return view('layouts.devices.index', [
            'devices' => Devices::orderBy('company_name', 'ASC')
                                 ->get()
        ]);
    }
}
