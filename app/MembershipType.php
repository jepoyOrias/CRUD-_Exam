<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MembershipType extends Model
{

    protected $fillable = ['membershiptype_title','membershiptype_description','membershiptype_price','membershiptype_date'];
}
