<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use \App\Model\CategoryPattern;
use \App\Model\Category;
use \App\Model\Transaction;
use \OfxParser\Ofx;

class CategoryPatternTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInicial()
    {
    	$c = new Category();
    	$c->name = 'Teste';
//    	$c->save();

        $categoryPattern = new CategoryPattern();
        $categoryPattern->description = 'Gasolina';
        $categoryPattern->pattern = '/Posto.*/';
        $categoryPattern->id_category = 28;
        //$categoryPattern->save();
    }

    public function testMatch()
    {
        $patterns = CategoryPattern::all();
        $p1 = CategoryPattern::testPattern('Posto');
        $p2 = CategoryPattern::testPattern('Teste');
        $p3 = CategoryPattern::testPattern('WEUY');

        $this->assertNotNull($p1);
        $this->assertNotNull($p2);
        $this->assertFalse($p3);
    }

    public function testTransporte()
    {
        $p1 = CategoryPattern::testPattern('Auto Posto ASIU');
        $this->assertNotNull($p1);
        $this->assertEquals($p1->id_category, 28);
    }

    public function testSaude()
    {
        $p1 = CategoryPattern::testPattern('Qualicorp');
        $this->assertNotNull($p1);
        $this->assertEquals($p1->id_category, 27);
    }

    public function testMercado()
    {
        $p1 = CategoryPattern::testPattern('Extra');
        $this->assertNotNull($p1);
        $this->assertEquals($p1->id_category, 26);
    }

    public function testOfx()
    {
        echo "\n";
        $ofxFile = 'tests/ofxdata-xml.ofx';
        if (!file_exists($ofxFile)){
            $this->markTestSkipped('Could not find data file, cannot test Ofx Class');
        }
        $ofxdata = simplexml_load_string( file_get_contents($ofxFile) );
        $Ofx = new Ofx($ofxdata);
        $Account = $Ofx->BankAccount;
        $Statement = $Account->Statement;
        $Transactions = $Statement->transactions;
        foreach( $Transactions as $i => $transaction ){
            echo "\n[".$transaction->type."]\t".$transaction->name." ".$transaction->amount;
            $p1 = CategoryPattern::testPattern($transaction->memo);
            if ($p1){
                echo "\t#".$p1->id_category."[".$p1->description."]";
                $t = new Transaction();
                $t->description = $transaction->memo;
                $t->id_category = $p1->id_category;
                $t->value = $transaction->amount;
                $t->save();
            }
        }
        echo "\n";
    }
}
