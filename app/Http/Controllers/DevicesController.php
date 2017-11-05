<?php

namespace App\Http\Controllers;

use App\Devices;
use App\Http\Requests\DevicesRequest;
use Illuminate\Http\Request;
use App\Image;

class DevicesController extends Controller
{
    public function create()
    {
        $this->authorize('action', Devices::class);
        $device = new Devices();
        return view('layouts.devices.create', [
            'entity' => $device,
            'image' => Image::orderBy('id')->pluck('image_name','id')->toArray()
        ]);
    }

    public function store(DevicesRequest $request)
    {
        $attributes = $request->only(['company_name', 'model_name', 'image_id']);
        Devices::create($attributes);
        return redirect(route('devices.index'));
    }

    public function edit($id)
    {
        $this->authorize('action', Devices::class);
        $device = Devices::findOrFail($id);
        return view('layouts.devices.edit', [
            'entity' => $device,
            'image' => Image::orderBy('id')->pluck('image_name','id')->toArray()
        ]);
    }

    public function update(Request $request, $id)
    {
        $device = Devices::findOrFail($id);
        $attributes = $request->only(['company_name', 'model_name', 'image_id']);
        $device->update($attributes);
        return redirect(route('devices.index'));
    }

    public function delete($id)
    {
        $this->authorize('action', Devices::class);
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
            ->with('image')
            ->paginate(10)
        ]);
    }
}
