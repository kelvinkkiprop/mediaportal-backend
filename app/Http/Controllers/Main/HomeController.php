<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add
use App\Models\Main\Media;

class HomeController extends Controller
{

    /**
    * index
    */
    public function index()
    {
        // $mCurrentUser = auth()->user();
        $media = Media::get();
        $data = [
            'media' => $media,
        ];
        return response([
            'status'  => 'success',
            'message' => 'Data retrieved successfully',
            'data' => $data
        ],201);
    }

    /**
    * show
    */
    public function show(string $id)
    {
        // $mCurrentUser = auth()->user();
        $item = Media::find($id);
        return $item;
    }

}
