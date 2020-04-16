<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TravelBrochureController extends Controller
{
    /**
     * 一覧画面
     *
     * @return void
     */
    public function index()
    {
        return view('travel_brochure.index');
    }

    /**
     * 作成画面
     *
     * @return void
     */
    public function create()
    {
        return view('travel_brochure.create');
    }

    // public function store()
    // {
    //     return view('travel_brochure.create');
    // }

    // public function edit()
    // {
    //     return view('travel_brochure.create');
    // }

    // public function update()
    // {
    //     return view('travel_brochure.create');
    // }

    // public function destroy()
    // {
    //     return view('travel_brochure.create');
    // }

    // public function show()
    // {
    //     return view('travel_brochure.create');
    // }
}
