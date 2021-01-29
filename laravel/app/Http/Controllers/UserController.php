<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\User;

class UserController extends Controller
{
    private $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        try {
            $model = $this->model->get();

            if (!$model) {
                return response()->json([
                    'message'   => 'Record not found',
                ], 404);
            }
            return response()->json($model);
        } catch (Exception $e) {
            return response()->json([
                'message'   => $e,
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $model = $this->model::find($id);
            
            if (!$model) {
                return response()->json([
                    'message'   => 'Record not found',
                ], 404);
            }

            return response()->json($model);
        } catch (Exception $e) {
            return response()->json([
                'message'   => $e,
            ], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = $request->all();

            $model = $this->model::find($data['id']);

            if (!$model) {
                return response()->json([
                    'message'   => 'Record not found',
                ], 404);
            }
            $model->fill($data);
            $model->save();

            return response()->json($model);
        } catch (Exception $e) {
            return response()->json([
                'message'   => $e,
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $model = $this->model->create($request->all());
            return response()->json($model);
        } catch (Exception $e) {
            return response()->json([
                'message'   => $e,
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $model = $this->model::find($id);

            if (!$model) {
                return response()->json([
                'message'   => 'Record not found',
            ], 404);
            }

            $model->delete();
        } catch (Exception $e) {
            return response()->json([
                'message'   => $e,
            ], 500);
        }
    }
}
