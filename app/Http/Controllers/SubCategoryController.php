<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $category = SubCategory::query();
        $categoryId = $request->query('course_category_id');

        $category->when($categoryId, function($query) use ($categoryId) {
            return $query->where('course_id', '=', $categoryId);
        });

        return response()->json([
            'status' => 'success',
            'data' => $category->get()
        ]);
    }

    public function show($id)
    {
        $subCategory = SubCategory::where('course_category_id', '=', $id)->get()->toArray();

        if (!$subCategory) {
            return response()->json([
                'status' => 'error',
                'message' => 'sub category not found'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => $subCategory
        ]);
    }

    public function create(Request $request)
    {
        $rules = [
            'title' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'string|url',
            'course_category_id' => 'required|integer'
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $subCategory = SubCategory::create($data);
        return response()->json([
            'status' => 'success',
            'message' => 'creating category success',
            'data' => $subCategory
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|string',
            'description' => 'required|string',
            'thumbnail' => 'string|url',
            'course_category_id' => 'required|integer'
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()){
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], 400);
        }

        $subCategory = SubCategory::find($id);
        if (!$subCategory) {
            return response()->json([
                'status' => 'error',
                'message' => 'sub category not found'
            ], 404);
        }


        $subCategory->fill($data);
        $subCategory->save();

        return response()->json([
            'status' => 'success',
            'data' => $subCategory
        ]);
    }

    public function destroy($id)
    {
        $category = SubCategory::find($id);

        if (!$category) {
            return response()->json([
                'status' => 'error',
                'message' => 'sub category not found'
            ]);
        }

        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'sub category deleted'
        ]);
    }
}
