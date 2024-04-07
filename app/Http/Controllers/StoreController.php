<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Models\Store;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $sets = Store::with('books')->all();
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
        $this->books($sets, $request);
        return responseJSON([
            'result' => $sets
        ]);
    }


    public function show($id)
    {
        return responseJSON([
            'result' => Store::with('books')->find($id)
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
            $this->books($sets, $request);
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


    private function books(Store &$sets, $request)
    {
        if ($sets) {
            if (isset($request->books)) {
                $sets->sync = $sets->books()->sync($request->books);
            }
            $sets->books = $sets->books()->latest()->get();
            return $sets;
        }
    }
}
