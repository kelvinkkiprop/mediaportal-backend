<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\Main\MediaCategory;

class MediaCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MediaCategory::orderBy('created_at', 'desc')->paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
        ]);

        $item = MediaCategory::create([
            'name' => $fields['name'],
        ]);

        $response =[
            'status' => 'success',
            'message' => 'Category created successfully',
            'item' => $item
        ];
        return response($response, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return MediaCategory::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $fields = $request->validate([
            'name' => 'required|string',
        ]);

        $item = MediaCategory::where('id', $id)->update([
            'name' => $fields['name'],
        ]);

        return response([
            'status' => 'success',
            'message' => 'Category updated successfully',
            'data' => $item
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = MediaCategory::find($id);
        $item->delete();

        $response =[
            'message' => 'Category removed successfully',
            'item' => $item
        ];
        return response($response, 201);
    }


    /**
     * searchItems
     */
    public function searchItems(Request $request)
    {
        $fields = $request->validate([
            'search_term' => 'required|string'
        ]);

        $term = $fields['search_term'];
        $items = MediaCategory::where(function($query) use($term){
            $query->where('name','LIKE','%'.$term.'%');
            $query->orWhere('alias','LIKE','%'.$term.'%');
        })->get();

        $response =[
            'status' => 'success',
            'message' => 'Category search complete',
            'data' => $items
        ];
        return response($response, 201);
    }

}
