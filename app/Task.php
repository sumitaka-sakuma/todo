<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //期限日を整形する
    public function getFormattedDueDateAttribute(){
        return Carbon::createFromFormat('Y-m-d' , $this->attributes['due_date'])
            ->format('Y-m-d');
    }

    const STATUS = [
        1 => [ 'label' => '未着手' , 'class' => 'label-danger' ],
        2 => [ 'label' => '着手' , 'class' => 'lavel-info' ],
        3 => [ 'label' => '完了' , 'class' => '' ],
    ];

    public function getStatusLabelAttribute()
    {
        //状態値
        $status = $this->attributes['status'];

        //定義されていなければから文字を返す
        if(!isset(self::STATUS[$status])){
            return '';
        }

        return self::STATUS[$status]['class'];
    }
}
