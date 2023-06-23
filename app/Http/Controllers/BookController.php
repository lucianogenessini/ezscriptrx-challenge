<?php

namespace App\Http\Controllers;

use App\Http\Requests\Book\BookStoreRequest;
use App\Http\Requests\Book\BookUpdateRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Returns a list with all books
     * 
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $books = Book::select('*')->with(['author'])
        ->paginate(15);
        return view('book.index', ['books' => $books]);
    }
    /**
     * Return view to create a new book
     * 
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $authors = Author::all();
        return view('book.create', ['authors' => $authors]);
    }

    /**
     * Create a new book
     * 
     * @param BookStoreRequest $request
     * 
     * @return RedirectResponse
     */
    public function store(BookStoreRequest $request): RedirectResponse
    {
        Book::storeOrUpdate($request->title, $request->authorId, $request->totalCopies, $request->availableCopies);
        return redirect('/book');
    }

    /**
     * Returns the view to edit a book
     * 
     * @param Book $book
     * 
     * @return \Illuminate\View\View
     */
    public function edit(Book $book): \Illuminate\View\View
    {
        $authors = Author::all();
        return view('book.update', ['book' => $book->load('author'), 'authors' => $authors]);   
    }

    /**
     * Update a book
     * 
     * @param MemberUpdateRequest $request
     * @param Member $member
     * 
     * @return RedirectResponse
     */
    public function update(BookUpdateRequest $request, Book $book): RedirectResponse
    {
        $book->update([
            'title' => $request->title,
            'author_id' => $request->authorId,
            'total_copies' => $request->totalCopies,
            'available_copies' => $request->availableCopies,
        ]);

        return redirect('/book');
    }

    /**
     * delete a book
     * 
     * @param Book $book
     * 
     * @return RedirectResponse
     */
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();
        return redirect('/book');
    }
}
