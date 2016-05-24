<?php

namespace App\Model;


use DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';

    public static function testPattern($str, $value = null)
    {
    	$patternsCons = DB::table('category')
                ->orderBy('order', 'asc')
                ;
        if (!is_null($value) ){
            $compare = ($value < 0 )?true:false;
            $patternsCons->where('debit', $compare);
        }
        $patterns = $patternsCons->get();

        foreach($patterns as $p) {
            
            if ( !is_null($p->pattern) && $p->pattern != "" ) {
                $res = preg_match($p->pattern, $str);
                if ($res == 1) {
                	return $p;
                }
            }
        }
        return false;
    }
}
