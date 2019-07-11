<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Counterpart extends Model
{
    protected $table = 'counterparts';

    public function contactFaces()
    {
        return $this->belongsToMany('App\Models\ContactFace', 'counterparts_contact_faces', 'counterparts_id', 'contact_faces_id');
    }
}
