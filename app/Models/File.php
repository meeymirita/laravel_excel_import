<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    protected $guarded = [];
    protected $table = 'files';


    public static function putAndCreated($dataFile)
    {
        $path = Storage::disk('public')->put('files/', $dataFile);
        return self::create([
            'path' => $path,
            'mime_type' => $dataFile->getClientMimeType(),
            'title' => $dataFile->getClientOriginalName(),
        ]);

    }
}
