<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactFace extends Model
{
    protected $table = 'contact_faces';

    public function counterparts()
    {
        return $this->belongsToMany('App\Models\Counterpart', 'counterparts_contact_faces', 'contact_faces_id', 'counterparts_id');
    }

    public function historyContactFaces()
    {
        return $this->belongsToMany('App\Models\InteractionHistory', 'interaction_history_contact_faces', 'contact_faces_id', 'interaction_history_id');
    }

    public function phones()
    {
        return $this->belongsToMany('App\Models\Phone', 'contact_faces_phones', 'contact_faces_id', 'phone_id');
    }

    public function emails()
    {
        return $this->belongsToMany('App\Models\Email', 'contact_faces_emails', 'contact_faces_id', 'email_id');
    }

}
