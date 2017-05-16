<?php

namespace App\Http\Controllers;

use App\Types;
use App\Http\Requests\TypesRequest;
use Illuminate\Http\Request;
use DB;

class TypesController extends Controller
{
    public function create()
    {
        $this->authorize('action', Types::class);
        $type = new Types();
        return view('layouts.types.create', [
            'entity' => $type
        ]);
    }

    public function store(TypesRequest $request)
    {
        $attributes = $request->only(['name']);
        Types::create($attributes);
        return redirect(route('types.index'));
    }

    public function edit($id)
    {
        $this->authorize('action', Types::class);
        $type = Types::findOrFail($id);
        return view('layouts.types.edit', [
            'entity' => $type
        ]);
    }

    public function update(Request $request, $id)
    {
        $type = Types::findOrFail($id);
        $attributes = $request->only(['name']);
        $type->update($attributes);
        return redirect(route('types.index'));
    }

    public function delete($id)
    {
        $this->authorize('action', Types::class);
        $type = Types::findOrFail($id);
        return view('layouts.types.delete', [
            'entity' => $type
        ]);
    }

    public function destroy($id)
    {
        $type = Types::findOrFail($id);
        $type->delete($id);
        return redirect(route('types.index'));
    }

    public function index()
    {
        $types = DB::table('types')->orderBy('name', 'ASC')->paginate(10);
        return view('layouts.types.index', [
            'types' => $types
        ]);
    }
}
