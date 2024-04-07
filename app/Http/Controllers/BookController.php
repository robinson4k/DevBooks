<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Book\BookRequest;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $sets = Book::all();
        return responseJSON([
            'result' => $sets
        ]);
    }


    public function store(BookRequest $request)
    {
        $sets = Book::firstOrCreate([
            'name' => $request->name,
            'isbn' => $request->isbn,
        ], [
            'value' => $request->value
        ]);
        return responseJSON([
            'result' => $sets
        ]);
    }


    public function show($id)
    {
        return responseJSON([
            'result' => Book::find($id)
        ]);
    }


    public function update(BookRequest $request, $id)
    {
        $sets = Book::find($id);
        if ($sets) {
            $sets->update([
                'name' => $request->name,
                'isbn' => $request->isbn,
                'value' => $request->value
            ]);
        }
        return responseJSON([
            'result' => $sets
        ]);
    }

    public function destroy($id)
    {
        $sets = Book::find($id);
        return responseJSON([
            'result' => $sets ? $sets->delete() : null
        ]);
    }
}
