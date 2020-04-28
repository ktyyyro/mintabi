<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login_id',
        'name',
        'coments',
        'icon_image_paths',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * 自身「を」フォローしているユーザーを取得
     *
     * @return BelongsToMany
     */
    public function followings(): BelongsToMany
    {
        return $this->belongsToMany('\App\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
    }

    /**
     * 自身「が」フォローしているユーザーを取得
     *
     * @return BelongsToMany
     */
    public function followers(): BelongsToMany
    {
        return $this->belongsToMany('\App\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    /**
     * 自身(モデル)が別のユーザー(パラメータ)をフォローしているかの判定
     *
     * @param User $user
     * @return boolean
     */
    public function isFollowedBy(User $user): bool
    {
        return $user
            ? (bool) $this->followers->where('id', $user->id)->count()
            : false;
    }

    /**
     * ユーザー検索機能
     *
     * @param [type] $name
     * @return void
     */
    public function search($login_id)
    {
        return self::where('login_id', 'LIKE', $login_id . '%')
            ->get();
    }

    /**
     * ログインIDで検索する
     *
     * @param [type] $login_id
     * @return void
     */
    public static function seek($login_id)
    {
        return self::where('login_id', $login_id)->first();
    }
}
