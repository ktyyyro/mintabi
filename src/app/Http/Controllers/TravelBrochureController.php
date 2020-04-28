<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TravelBrochureRequest;
use App\TravelBrochure;
use Illuminate\Support\Facades\Auth;

class TravelBrochureController extends Controller
{
    /**
     * 一覧画面
     *
     * @return void
     */
    public function index()
    {
        // 自身の作成したしおりを取得する
        $travel_brochure = TravelBrochure::where('user_id', Auth::id())
            ->get();

        return view('travel_brochure.index', [
            'books' => $travel_brochure
        ]);
    }

    /**
     * 作成画面
     *
     * @return void
     */
    public function create()
    {
        // 日付のダミーデータ
        $date = [
            'date_Y' => ['2020', '2021', '2022', '2023', '2024'],
            'date_M' => ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
            'date_D' => ['1', '15', '30'],
        ];
        return view('travel_brochure.create', ['date' => $date]);
    }

    /**
     * 登録処理
     *
     * @return void
     */
    public function store(TravelBrochureRequest $request, TravelBrochure $travel_brochure)
    {
        $travel_brochure->fill($request->all());
        $travel_brochure->user_id = $request->user()->id;
        if ($travel_brochure->save()) {
            return redirect()->route('user.show', Auth::id());
        };

        return view('travel_brochure.create');
    }

    /**
     * 詳細画面
     *
     * @return void
     */
    public function show(TravelBrochure $travel_brochure)
    {
        return view('travel_brochure.show', [
            'travel_brochure' => $travel_brochure
        ]);
    }


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

}
