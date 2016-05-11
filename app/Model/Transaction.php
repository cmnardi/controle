<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transaction';

    public static function findByUniqueId($uniqueId)
    {
    	$t = self::where('fitid', $uniqueId)->first();
    	return (is_null($t))?new Transaction():$t;
    }
}
