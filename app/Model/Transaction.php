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

    public static function testTransaction($transaction) 
    {

        $p1 = Category::testPattern($transaction->memo);
        if ($p1){
            //echo "\t#".$p1->id_category."[".$p1->description."]";
            $uniqueId = $transaction->uniqueId;
            //print_r($transaction);
            $t = self::findByUniqueId($uniqueId);
            $t->description = $transaction->memo;
            $t->fitid = $transaction->uniqueId;
            $t->id_category = $p1->id;
            $t->value = $transaction->amount;
            $t->date = $transaction->date;
            $t->save();
        }
    }
}
