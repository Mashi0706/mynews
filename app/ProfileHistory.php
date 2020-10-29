<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileHistory extends Model
{
    //
    protected static $rules = array(
        'profile_id' => 'required',
        'edited_at' => 'required',
        );
}
