<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TravelBrochure;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(TravelBrochure $travel_brochure)
    {
        // 自身の作成したしおりを取得する
        $books = $travel_brochure::where('user_id', Auth::id())
            ->get();

        return view('users.index', [
            'books' => $books
        ]);
    }
}
