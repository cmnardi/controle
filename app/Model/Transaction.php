<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $table = 'transaction';

    protected $fillable = ['id', 'description','value', 'id_category', 'fitid'];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'id_category');
    }


    public static function findByUniqueId($uniqueId)
    {
    	$t = self::where('fitid', $uniqueId)->first();
    	return (is_null($t))?new Transaction():$t;
    }

    public static function testTransaction($transaction) 
    {
        $p1 = Category::testPattern($transaction->memo, (float)$transaction->amount);
        if ($p1){
            //echo "\t#".$p1->id_category."[".$p1->description."]";
            $uniqueId = $transaction->uniqueId;
            //echo " #".$uniqueId;
            //print_r($transaction);
            try{
                $t = new Transaction();
                $t->description = $transaction->memo;
                $t->fitid = $transaction->uniqueId;
                $t->id_category = $p1->id;
                $t->value = $transaction->amount;
                $t->date = $transaction->date;
                $t->save();
                return $t;
            } catch (\Illuminate\Database\QueryException $ex ) {
                $t2 = self::findByUniqueId($uniqueId);
                $t2->description = $transaction->memo;
                $t2->fitid = $transaction->uniqueId;
                $t2->id_category = $p1->id;
                $t2->value = $transaction->amount;
                $t2->date = $transaction->date;
                $t2->save();
                return $t2;
            }
        }
        return false;
    }

    public static function getAgregateDataBySubCategory($year = null, $month = null)
    {
    	$rows = DB::table('transaction')
            ->join('category', 'transaction.id_category', '=', 'category.id')
            ->join('category AS c2', 'category.id_category', '=', 'c2.id')
            ->groupBy('category.name')
            ->orderBy('c2.name')
            ->orderBy('category.name')
            //->select('category.id', 'category.name','transaction.value')
            ->select(\DB::raw('category.id, SUM(transaction.value) as value, category.name, 
                c2.name as category'))
        ;
        if ( !is_null($year)) {
            $rows->where(DB::raw('year(date)'),$year);
        }
        if ( !is_null($month)) {
            $rows->where(DB::raw('month(date)'),$month);
        }
        return $rows
            ->get();
    }

    public static function getAgregateDataByCategory($year = null, $month = null)
    {

    	$rows = DB::table('transaction')
            ->join('category AS c1', 'transaction.id_category', '=', 'c1.id')
            ->join('category AS c2', 'c1.id_category', '=', 'c2.id')
            ->groupBy('c2.id')
            ->select(\DB::raw('c2.id, SUM(transaction.value) as value, c2.name'))
            ->orderBy('c2.name')
        ;
        if ( !is_null($year)) {
            $rows->where(DB::raw('year(date)'),$year);
        }
        if ( !is_null($month)) {
            $rows->where(DB::raw('month(date)'),$month);
        }
		return $rows
            ->get();
    }

    public static function getAgregateDataByMonth()
    {
        return
            DB::table('transaction')
                ->select(DB::raw('SUM(value) as value, month(date) as month, year(date) as year'))
                ->groupBy(DB::raw('month(date), year(date)'))
                ->orderBy(DB::raw('year(date)'), 'DESC')
                ->orderBy(DB::raw('month(date)'),'DESC')
                ->get()
                //->sum('value')
                ;
    }

    public static function getTotal()
    {
        return DB::table('transaction')

            ->sum('value')

            ;
    }

    public static function getMonthTotal($year, $month, $debt = true)
    {
        if ( $debt ) {
            $compare = '<';
        }else{
            $compare = '>';
        }
        $return =  DB::table('transaction')
            ->where('value',$compare, 0)
            ->whereMonth('date', '=', $month)
            ->whereYear('date', '=', $year)
            ->sum('value');
        return (float)$return;
    }

    public static function getBySubCategory($id_category, $month, $year)
    {
        $rows = DB::table('transaction')
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
            ;
        if ( !is_null($year)) {
            $rows->where(DB::raw('year(date)'),$year);
        }
        if ( !is_null($month)) {
            $rows->where(DB::raw('month(date)'),$month);
        }
        return $rows
            ->orderBy('transaction.date')
            ->get();
    }

    public static function getByCategory($id_category, $month = null, $year = null)
    {
        $rows = DB::table('transaction')
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
            ;
        if ( !is_null($year)) {
            $rows->where(DB::raw('year(date)'),$year);
        }
        if ( !is_null($month)) {
            $rows->where(DB::raw('month(date)'),$month);
        }
        return $rows
            ->orderBy('transaction.date')
            ->get();
    }
}
