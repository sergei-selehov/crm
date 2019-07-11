<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableHistory extends Model
{
    protected $table = 'bd_sd_history';
    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo('App\Models\Table', 'company_id');
    }
}
