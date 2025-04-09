<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;


class TodoShowRequest extends FormRequest
{
    public function authorize()
    {
        // Retrieve the Todo item by ID from the route parameters
        $todo = Todo::findOrFail($this->route('id'));

        // Return true if the authenticated user owns the Todo, otherwise false
        return $todo &&  Auth::user()->id === $todo->user_id;
    }

    public function rules()
    {
        return [

            
        ];
    }


}
