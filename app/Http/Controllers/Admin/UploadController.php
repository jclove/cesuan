<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\JsonException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * @param Request $request
     * @throws JsonException
     */
    public function image(Request $request)
    {
        $file = $request->file('upload_img');
        // 文件是否上传成功
        if (empty($file->isValid())) {
            throw new JsonException(10001);
        }
        // 扩展名
        $ext = strtolower($file->getClientOriginalExtension());
        // 判断扩展名
        $images_ext = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($ext, $images_ext)) {
            throw new JsonException(10002);
        }
        //获取文件的绝对路径
        $path = $file->getRealPath();

        // 文件名
        $file_name = '/uploads/' . date('Ymd') . '/' . uniqid(mt_rand()) . '.' . $ext;
        // 七牛上传
        try {
            $disk = Storage::disk(config('filesystems.default'));
            $res = $disk->put($file_name, file_get_contents($path));
            if (empty($res)) {
                throw new JsonException(10001);
            }
            return $this->jsonFormat('/upload_img/'.$file_name);
        } catch (\Exception $exception) {
            throw new JsonException(10001);
        }
    }

    /**
     * @param Request $request
     * @return array
     * @throws JsonException
     */
    public function audioVideo(Request $request)
    {
        $file = $request->file('upload_audio-video');
        // 文件是否上传成功
        if (empty($file->isValid())) {
            throw new JsonException(10001);
        }
        // 扩展名
        $ext = strtolower($file->getClientOriginalExtension());
        // 判断扩展名
        $images_ext = ['mp3', 'wav'];
        if (!in_array($ext, $images_ext)) {
            throw new JsonException(10002);
        }
        $fileHash = str_replace('.' . $file->extension(), '', $file->hashName());
        $file_name = $fileHash . '.' . $ext;

        $disk = Storage::disk(config('filesystems.default'));
        $path = $disk->putFileAs('kouhong', $file, $file_name);
        if (empty($path)) {
            throw new JsonException(10001);
        }
        $url = $disk->url($path);
        return $this->jsonFormat($url);
    }
}