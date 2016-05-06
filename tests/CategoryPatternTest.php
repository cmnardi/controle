<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use \App\Model\CategoryPattern;
use \App\Model\Category;

class CategoryPatternTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInicial()
    {
        echo "\nini";
    	$c = new Category();
    	$c->name = 'Teste';
    	$c->save();

        $categoryPattern = new CategoryPattern();
        $categoryPattern->description = 'Teste';
        $categoryPattern->pattern = '/^Teste.*/';
        $categoryPattern->id_category = $c->id;
        //$categoryPattern->save();
    }

    public function testMatch()
    {
        echo "\nlist";
        $patterns = CategoryPattern::all();
        $p1 = CategoryPattern::testPattern('TesteX');
        $p2 = CategoryPattern::testPattern('Teste');
        $p3 = CategoryPattern::testPattern('WEUY');

        $this->assertNotNull($p1);
        $this->assertNotNull($p2);
        $this->assertFalse($p3);
    }
}
