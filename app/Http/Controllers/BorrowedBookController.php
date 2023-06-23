<?php

namespace App\Http\Controllers;

use App\Http\Requests\BorrowedBook\BorrowBookStoreRequest;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class BorrowedBookController extends Controller
{
    /**
     * Returns a list with all book borrows
     * 
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $borrowedBooks = BorrowedBook::select('*')->with(['member', 'book'])
        ->paginate(15);
        return view('borrowedBook.index', ['borrowedBooks' => $borrowedBooks]);
    }
    /**
     * Return view to create a new borrow
     * 
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        $books = Book::getBooksAvailableToBorrow();
        $members = Member::getActiveMembers();
        return view('borrowedBook.create', ['books' => $books, 'members' => $members]);
    }

    /**
     * Create a new borrow
     * 
     * @param BookStoreRequest $request
     * 
     * @return RedirectResponse
     */
    public function store(BorrowBookStoreRequest $request): RedirectResponse
    {
        try{
            $member = Member::find($request->memberId);
        
            $member->verifyBorrowOrFail();
    
            BorrowedBook::store($request->bookId, $request->memberId);
            
            return redirect('/borrowed-book');
        }catch(\Exception $e){
            Session::flash('errors', $e->getMessage());
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
}
