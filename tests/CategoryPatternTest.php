<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryPatternTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInicial()
    {
    	$c = new \App\Model\Category();
    	$c->name = 'Teste';
    	$c->save();

        $categoryPattern = new \App\Model\CategoryPattern();
        $categoryPattern->description = 'Teste';
        $categoryPattern->id_category = $c->id;
        $categoryPattern->save();
    }
}
