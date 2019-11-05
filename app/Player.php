<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model
{
    //
    use SoftDeletes;
    //
    protected  $fillable = [
        'name', 'age', 'position', 'team_id'
    ];

    public function team() {
        return $this->belongsTo('App\Team', 'team_id');
    }

}
