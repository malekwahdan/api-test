<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Requests\DeleteRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\TodoShowRequest;
use App\Http\Requests\UpdateRequest;
class TodoController extends BaseController
{
    public function index(){
        $todos = auth::user()->todos;
        return $this->sendResponse($todos, 'retrived successfully');
    }
    public function store(StoreRequest $request)
    {


        $todo = auth()->user()->todos()->create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'is_completed' => $request->is_completed

            ]
        );
        return response()->json($todo, 201);
    }


    public function update(UpdateRequest $request, $id){

        $todo = Todo::findOrFail($id);
         $todo->update([
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => $request->is_completed

        ]);
        return $this->sendResponse($todo, 'updated successfully');
    }
    public function delete(DeleteRequest $request ,$id){
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return $this->sendResponse(null,"deleted succsefully");

    }

    public function show(TodoShowRequest $request ,$id){

        $todo = Todo::findOrFail($id);

            // return $this->sendResponse($todo,"found");
            return response()->json($todo,200);


    }


}
