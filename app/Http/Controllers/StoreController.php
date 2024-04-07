<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $sets = Store::all();
        return responseJSON([
            'result' => $sets
        ]);
    }


    public function store(StoreRequest $request)
    {
        $sets = Store::firstOrCreate([
            'name' => $request->name,
        ], [
            'address' => $request->address,
            'active' => $request->active
        ]);
        if ($sets) {
            if (isset($request->books)) {
                $sets->sync = $sets->books()->sync($request->books);
            }
            $sets->books = $sets->books()->get();
        }
        return responseJSON([
            'result' => $sets
        ]);
    }


    public function show($id)
    {
        return responseJSON([
            'result' => Store::find($id)
        ]);
    }


    public function update(StoreRequest $request, $id)
    {
        $sets = Store::find($id);
        if ($sets) {
            $sets->update([
                'name' => $request->name,
                'address' => $request->address,
                'active' => $request->active
            ]);
        }
        return responseJSON([
            'result' => $sets
        ]);
    }

    public function destroy($id)
    {
        $sets = Store::find($id);
        return responseJSON([
            'result' => $sets ? $sets->delete() : null
        ]);
    }
}
