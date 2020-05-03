<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TravelBrochureRequest;
use App\TravelBrochure;
use Illuminate\Support\Facades\Auth;
use App\Traits\FileUpload;

class TravelBrochureController extends Controller
{
    use FileUpload;

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
     * 新規登録処理
     *
     * @return void
     */
    public function store(TravelBrochureRequest $request, TravelBrochure $travel_brochure)
    {

        $data = $request->except([
            '_method',
            '_token'
        ]);

        $fileData = $request->file('image');
        // ファイルのアップロードがされているか判定
        if (isset($fileData)) {
            // テーブルの最終番号取得
            $lastNo = $travel_brochure->orderByDesc('id')->first()->id;
            $dir = 'images/travel_brochure/' . $lastNo;

            // 画像アップロード処理
            $data['image_paths'] = $this->imagesUpload($fileData, $dir);
        }

        $travel_brochure->fill($data);
        $travel_brochure->user_id = Auth::id();

        if ($travel_brochure->save()) {
            return redirect()->route('user.show', Auth::user()->login_id);
        };
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


    public function edit()
    {
        return view('travel_brochure.edit');
    }

    public function update()
    {
        // TODO:　更新後は詳細ページ？マイページ？
        return view('travel_brochure.create');
    }

    // public function destroy()
    // {
    //     return view('travel_brochure.create');
    // }

}
