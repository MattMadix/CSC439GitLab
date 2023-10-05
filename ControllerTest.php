<?php
require_once 'Main.php';

use PHPUnit\Framework\TestCase;

class ControllerTest extends TestCase
{
    private $model;
    private $view;
    private $sut;
    
    public function SetUp():void {
        $d = new YahtzeeDice();
        $this->model = new Yahtzee($d);
        $this->view = $this->createStub(YahtzeeView::class);
        $this->sut = new YahtzeeController($this->model, $this-> view);
    }
    
    public function test_get_model() {
        $result = $this->sut->get_model();
        $this->assertNotNull($result);
    }
    public function test_possible_catagories(){
        $result = $this->sut->get_possible_categories();
        $this->assertIsArray($result);
    }
    public function test_score_input(){
        $result = $this->sut->process_score_input("q");
        $this->assertEquals(-1, $result);
        $result = $this->sut->process_score_input("z");
        $this->assertEquals(-2, $result);
        $result = $this->sut->process_score_input("ones");
        $this->assertEquals(0, $result);
    }
}

?>