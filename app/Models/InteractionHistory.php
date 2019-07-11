<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InteractionHistory extends Model
{
    protected $table = 'interaction_history';

    public function interactionsHistory()
    {
        return $this->belongsToMany('App\Models\ContactFace', 'interaction_history_contact_faces', 'interaction_history_id', 'contact_faces_id');
    }
}
