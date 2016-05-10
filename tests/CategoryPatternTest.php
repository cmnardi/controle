<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use \App\Model\Category;
use \App\Model\Transaction;
use \OfxParser\Ofx;

class CategoryTest extends TestCase
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

        $Category = new Category();
        $Category->description = 'Gasolina';
        $Category->pattern = '/Posto.*/';
        $Category->id_category = 28;
        //$Category->save();
    }

    public function testMatch()
    {
        $patterns = Category::all();
        $p1 = Category::testPattern('Posto');
        $p2 = Category::testPattern('Teste');
        $p3 = Category::testPattern('WEUY');

        $this->assertNotNull($p1);
        $this->assertNotNull($p2);
        $this->assertFalse($p3);
    }

    public function testTransporte()
    {
        $p1 = Category::testPattern('Auto Posto ASIU');
        $this->assertNotNull($p1);
        $this->assertEquals($p1->id_category, 28);
    }

    public function testSaude()
    {
        $p1 = Category::testPattern('Qualicorp');
        $this->assertNotNull($p1);
        $this->assertEquals($p1->id_category, 27);
    }

    public function testMercado()
    {
        $p1 = Category::testPattern('Extra');
        $this->assertNotNull($p1);
        $this->assertEquals($p1->id_category, 26);
    }

    public function testOfx()
    {
        echo "\n#OFX";
        
        $ofxdata = 'tests/bra.ofx';
        $OfxParser = new \OfxParser\Parser;
        $Ofx = $OfxParser->loadFromFile($ofxdata);
        //$Ofx = new Ofx($ofxdata);
        $Account = $Ofx->BankAccount;
        $Statement = $Account->Statement;
        $Transactions = $Statement->transactions;
        foreach( $Transactions as $i => $transaction ){
            echo "\n[".$transaction->type."]\t".$transaction->name." ".$transaction->amount;
            echo "\ntest ".$transaction->memo;
            $p1 = Category::testPattern($transaction->memo);
            if ($p1){
                echo "\t#".$p1->id_category."[".$p1->description."]";
                $t = new Transaction();
                $t->description = $transaction->memo;
                $t->id_category = $p1->id;
                $t->value = $transaction->amount;
                $t->save();
            }
        }
        echo "\n";
    }
}
