<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Inertia\Inertia;

class BookController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Books/BooksIndex', [
            'books' => Book::with('stores')->get()
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
        $this->stores($sets, $request);
        return responseJSON([
            'result' => $sets
        ]);
    }


    public function show($id)
    {
        return Inertia::render('Books/BooksForm', [
            'book' => Book::with('stores')->find($id)
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
            $this->stores($sets, $request);
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


    private function stores(Book &$sets, $request)
    {
        if ($sets) {
            if (isset($request->stores)) {
                $sets->sync = $sets->stores()->sync($request->stores);
            }
            $sets->stores = $sets->stores()->latest()->get();
            return $sets;
        }
    }
}
