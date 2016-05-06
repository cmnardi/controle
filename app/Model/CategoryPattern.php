<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryPattern extends Model
{
    //
    protected $table = 'category_pattern';

    public static function testPattern($str)
    {
    	$patterns = self::all();
        foreach($patterns as $p) {
            if ( !is_null($p->pattern) && $p->pattern != "" ) {
                $res = preg_match($p->pattern, $str, $matches);
                if ($res == 1) {
                	return $p;
                }
            }
        }
        return false;
    }
}
