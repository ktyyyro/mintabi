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
            'users' => $user->search($request->name)
        ]);
    }

    /**
     * ユーザー詳細表示（ユーザーページ, マイページ）
     *
     * @return void
     */
    public function show(TravelBrochure $travel_brochure, $id)
    {
        $books = $travel_brochure::where('user_id', $id)
            ->get()
            ->sortByDesc('created_at');

        return view('users.show', [
            'books' => $books
        ]);
    }

    /**
     * 編集画面
     *
     * @return void
     */
    public function edit()
    {
    }

    /**
     * 更新処理
     *
     * @return void
     */
    public function update()
    {
    }

    /**
     * フォロー処理
     *
     * @param Request $request
     * @param string $name
     * @return void
     */
    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    /**
     * フォロー解除
     *
     * @param Request $request
     * @param string $name
     * @return void
     */
    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id) {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }
}
