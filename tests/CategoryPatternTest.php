<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use \App\Model\Category;
use \App\Model\Transaction;
use \OfxParser\Ofx;

class CategoryPatternTest extends TestCase
{
   
    public function testMatch()
    {
        //echo "\ntestMatch";
        $patterns = Category::all();
        $p1 = Category::testPattern('Posto');
        $p2 = Category::testPattern('Teste');
        $p3 = Category::testPattern('WEUY');
        $p4 = Category::testPattern('Entrada',112);
        
        $this->assertNotNull($p1);
        $this->assertEquals($p2->id_category, 8);//outros
        $this->assertEquals($p3->id_category, 8);//outros
        $this->assertEquals($p4->id_category, 9);//entrada
    }

    public function testTransporte()
    {
        $p1 = Category::testPattern('Auto Posto ASIU');
        $this->assertNotNull($p1);
        //echo "\ntestTransporte";
        //echo " ".$p1->id_category." ";
        $this->assertEquals($p1->id_category, 3);
    }

    public function testSaude()
    {
        $p1 = Category::testPattern('Qualicorp');
        $this->assertNotNull($p1);
        //echo "\ntestSaude";
        //echo " ".$p1->id_category." ";
        $this->assertEquals($p1->id_category, 2);
    }

    public function testMercado()
    {
        $p1 = Category::testPattern('Extra');
        $this->assertNotNull($p1);
        //echo "\ntestMercado";
        //echo " ".$p1->id_category." ";
        $this->assertEquals($p1->id_category, 4);
    }

    
}
