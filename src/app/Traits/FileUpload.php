<?php

namespace App\Traits;


trait FileUpload
{
    /**
     * 画像をアップロードし格納したフォルダのパスを返す
     *
     * @param object $fileData
     * @param string $dir
     * @return void
     */
    public function imagesUpload(object $fileData, string $dir)
    {
        $imageName = date('Y-m-d_H-i-s') . $fileData->getClientOriginalName();

        // 画像アップロード処理
        \Storage::putFileAs(
            'public/' . $dir,
            $fileData,
            $imageName
        );

        $path = $dir . '/' . $imageName;

        return $path;
    }
}
