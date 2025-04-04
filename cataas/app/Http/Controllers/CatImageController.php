<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatImage;

class CatImageController extends Controller {
    public function index() {
        $cats = CatImage::paginate(20);
        return view('cats.index', compact('cats'));
    }

    public function filter($tag) {
        $cats = CatImage::whereJsonContains('tags', $tag)->paginate(20);
        return view('cats.index', compact('cats'));
    }
}
