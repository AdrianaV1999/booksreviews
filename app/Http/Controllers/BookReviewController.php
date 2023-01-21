<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class BookReviewController extends Controller
{
    public function index($book_id)
    {
        $reviews = Review::get()->where('book_id', $book_id);
        if (is_null($reviews))
            return response()->json('Data not found', 404);
        return response()->json($reviews);
    }
}
