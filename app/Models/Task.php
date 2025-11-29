<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    protected $table = 'tasks';


    const STATUS_PROCESS = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_ERROR = 3;

    public static function getStatuses()
    {
        return [
          self::STATUS_PROCESS => 'Импорт в процессе',
          self::STATUS_SUCCESS => 'Импорт данных успешен',
          self::STATUS_ERROR => 'Ошибка во время импорта . валидации',
        ];
    }


    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id', 'id');
    }

    public function failedRows()
    {
        return $this->HasMany(FailedRow::class, 'task_id', 'id');
    }
}
