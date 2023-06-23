<?php

namespace App\Http\Requests\BorrowedBook;

use Illuminate\Foundation\Http\FormRequest;

class BorrowBookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'memberId' => 'required|exists:members,id',
            'bookId' => 'required|exists:books,id',
        ];
    }
}
