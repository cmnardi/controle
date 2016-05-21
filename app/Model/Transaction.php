<?php

namespace App\Model;

use DB;
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
            return $t;
        }
        return false;
    }

    public static function getAgregateDataBySubCategory()
    {
    	$rows = DB::table('transaction')
            ->join('category', 'transaction.id_category', '=', 'category.id')
            ->join('category AS c2', 'category.id_category', '=', 'c2.id')
            ->groupBy('category.name')
            ->orderBy('category.name')
            //->select('category.id', 'category.name','transaction.value')
            ->select(\DB::raw('category.id, SUM(transaction.value) as value, category.name, 
                c2.name as category'))
            ->get();
		return $rows;
    }

    public static function getAgregateDataByCategory()
    {
    	$rows = DB::table('transaction')
            ->join('category AS c1', 'transaction.id_category', '=', 'c1.id')
            ->join('category AS c2', 'c1.id_category', '=', 'c2.id')
            ->groupBy('c2.id')
            //->select('c2.id', 'c2.name','transaction.value')
            ->select(\DB::raw('c2.id, SUM(transaction.value) as value, c2.name'))
            ->orderBy('c2.name')
            ->get();
		return $rows;
    }

    public static function getTotal()
    {
        return DB::table('transaction')
            ->sum('value')
            ;
    }

    public static function getMonthTotal($month)
    {
        return DB::table('transaction')
            ->whereMonth('date', '=', $month)
            ->sum('value')
            ;
    }

    public static function getBySubCategory($id_category)
    {
        return DB::table('transaction')
            ->select('transaction.id'
                ,'transaction.value'
                ,'transaction.description'
                , 'transaction.date'
                , 'c2.name as category'
                , 'c1.name as subcategory'

            )
            ->join('category AS c1', 'transaction.id_category', '=', 'c1.id')
            ->join('category AS c2', 'c1.id_category', '=', 'c2.id')
            ->where('transaction.id_category',$id_category)
            ->get();
    }

    public static function getByCategory($id_category)
    {
        return DB::table('transaction')
            ->select('transaction.id'
                ,'transaction.value'
                ,'transaction.description'
                , 'transaction.date'
                , 'c2.name as category'
                , 'c1.name as subcategory'
            )
            ->join('category AS c1', 'transaction.id_category', '=', 'c1.id')
            ->join('category AS c2', 'c1.id_category', '=', 'c2.id')
            ->where('c2.id',$id_category)
            ->get();
    }
}
