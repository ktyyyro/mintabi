<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TravelBrochureRequest;
use App\TravelBrochure;
use Illuminate\Support\Facades\Auth;
use App\Traits\FileUpload;
use App\User;
use App\TravelMember;

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
    public function create(User $user)
    {
        // 日付のダミーデータ
        $date = [
            'date_Y' => ['2020', '2021', '2022', '2023', '2024'],
            'date_M' => ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
            'date_D' => ['1', '15', '30'],
        ];

        // 相互フォローしているユーザー
        $mutualFollowUsers = array();
        $user_id = ['user_id' => Auth::id()];

        $mutualFollowUsersNo = \DB::select('SELECT s1.followee_id FROM ( SELECT  follower_id, followee_id FROM  follows) s1 INNER JOIN ( SELECT  follower_id, followee_id FROM  follows) s2 ON  s1.follower_id = s2.followee_id AND s1.followee_id = s2.follower_id where s1.follower_id = :user_id', $user_id);

        foreach ($mutualFollowUsersNo as $person) {
            array_push($mutualFollowUsers, $user::find($person->followee_id));
        }

        return view('travel_brochure.create', [
            'date' => $date,
            'users' => $mutualFollowUsers
        ]);
    }

    /**
     * 新規登録処理
     *
     * @return void
     */
    // public function store(TravelBrochureRequest $request, TravelBrochure $travel_brochure)
    public function store(Request $request, TravelBrochure $travel_brochure)
    {
        // dd($request->members);
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

        // しおり作成処理
        if ($travel_brochure->save()) {

            // 参加メンバーの追加処理
            if (isset($data['members'])) {
                foreach ($data['members'] as $user) {
                    $travel_brochure->members()->attach($travel_brochure->id, ['user_id' => $user]);
                }
            }

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
            'travel_brochure' => $travel_brochure,
            'members' => $travel_brochure->members
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
