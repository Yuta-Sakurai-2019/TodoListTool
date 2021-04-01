<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\String_;

class Task extends Model
{
    use HasFactory;
    /**
     * 状態定義
     */
    const STATUS = [
      1 => ['label' => '未着手', 'class' => 'label-danger'],
      2 => ['label' => '着手中', 'class' => 'label-info'],
      3 => ['label' => '完了', 'class' => ''],
    ];

    /**
     * 状態のラベル
     * @return String
     */
    public function  getStatusLabelAttribute(): string
    {
        //状態値
        $status = $this->attributes['status'];

        //定義されていなｋれば空文字を返す
        if(!isset(self::STATUS[$status])){
            return '';
        }

        return self::STATUS[$status]['label'];
    }

    /*
     * 整形した期限日
     * @return string
     */
    public function  getFormattedDueDateAttribute():string
    {
        return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])
            ->format('Y/m/d');
    }
}
