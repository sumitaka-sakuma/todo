<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
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
