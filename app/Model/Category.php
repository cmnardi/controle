<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';

    public static function testPattern($str)
    {
    	$patterns = self::
                orderBy('order', 'asc')
                ->get();
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
