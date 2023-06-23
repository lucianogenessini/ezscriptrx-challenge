<?php

namespace App\Http\Controllers;

use App\Http\Requests\Member\MemberStoreRequest;
use App\Http\Requests\Member\MemberUpdateRequest;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Returns a list with all members
     * 
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $books = Member::select('*')
        ->paginate(15);
        return view('member.index', ['members' => $books]);
    }
    /**
     * Return view to create a new member
     * 
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        return view('member.create');
    }

    /**
     * Create a new member
     * 
     * @param MemberStoreRequest $request
     * 
     * @return RedirectResponse
     */
    public function store(MemberStoreRequest $request): RedirectResponse
    {
        Member::store($request->name, $request->lastName, $request->phone, $request->borrowedBooksLimit, $request->active);
        return redirect('/member');
    }

    /**
     * Returns the view to edit a member
     * 
     * @param Member $member
     * 
     * @return \Illuminate\View\View
     */
    public function edit(Member $member): \Illuminate\View\View
    {
        return view('member.update', ['member' => $member]);   
    }

    /**
     * Update an author
     * 
     * @param MemberUpdateRequest $request
     * @param Member $member
     * 
     * @return RedirectResponse
     */
    public function update(MemberUpdateRequest $request, Member $member): RedirectResponse
    {
        $member->update([
            'name' => $request->name,
            'last_name' => $request->lastName,
            'phone' => $request->phone,
            'borrowed_books_limit' => $request->borrowedBooksLimit,
            'active' => $request->active,
        ]);

        return redirect('/member');
    }

    /**
     * delete a member
     * 
     * @param Member $member
     * 
     * @return RedirectResponse
     */
    public function destroy(Member $member): RedirectResponse
    {
        $member->delete();
        return redirect('/member');
    }
}
