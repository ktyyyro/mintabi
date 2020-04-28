<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TravelBrochure;
use App\User;

class UserController extends Controller
{
    /**
     * 一覧表示
     *
     * @return void
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * 検索処理
     *
     * @return void
     */
    public function search(Request $request, User $user)
    {
        return view('users.index', [
            'users' => $user->search($request->login_id)
        ]);
    }

    /**
     * ユーザー詳細表示（ユーザーページ, マイページ）
     *
     * @return void
     */
    public function show(TravelBrochure $travel_brochure, $id)
    {
        $user = User::seek($id);

        $books = $travel_brochure::where('user_id', $user->id)
            ->get()
            ->sortByDesc('created_at');

        return view('users.show', [
            'books' => $books,
            'user' => $user
        ]);
    }

    /**
     * 編集画面
     *
     * @return void
     */
    public function edit($id)
    {
        $user = User::where('login_id', $id)->first();
        return view('users.edit', ['user' => $user]);
    }

    /**
     * 更新処理
     *
     * @return void
     */
    public function update(Request $request)
    {
        $data = $request->only([
            'name',
            'coments',
            'icon_data'
        ]);
        $login_id = \Auth::user()->login_id;

        if (isset($data['icon_data'])) {
            $dir = 'images/users/' . $login_id;
            $imageName = date('Y-m-d_H-i-s') . $data['icon_data']->getClientOriginalName();

            // 画像アップロード処理
            \Storage::putFileAs(
                'public/' . $dir,
                $data['icon_data'],
                $imageName
            );
            $data['icon_image_paths'] = $dir . '/' . $imageName;
        }

        // 更新処理 TODO:これもモデルをこの関数内で受け取った方が良いのでは？
        User::where('login_id', $login_id)->first()->update($data);

        return redirect()->route('user.show', $login_id);
    }

    /**
     * フォロー処理
     *
     * @param Request $request
     * @param string $name
     * @return void
     */
    public function follow(Request $request, string $login_id)
    {
        $user = User::where('login_id', $login_id)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['login_id' => $login_id];
    }

    /**
     * フォロー解除
     *
     * @param Request $request
     * @param string $name
     * @return void
     */
    public function unfollow(Request $request, string $login_id)
    {
        $user = User::where('login_id', $login_id)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['login_id' => $login_id];
    }

    /**
     * フォローリスト表示
     *
     * @param string $login_id
     * @return void
     */
    public function followingList(string $login_id, User $user)
    {
        $followings = $user->where('login_id', $login_id)
            ->first()
            ->followings;

        return view('users.list', ['list' => $followings]);
    }

    /**
     * フォロワーリスト表示
     *
     * @param string $login_id
     * @return void
     */
    public function followersList(string $login_id, User $user)
    {
        $followers = $user->where('login_id', $login_id)
            ->first()
            ->followers;

        return view('users.list', ['list' => $followers]);
    }
}
