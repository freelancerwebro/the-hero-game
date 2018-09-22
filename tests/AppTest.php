<?php

require "vendor/autoload.php";

use Game\App;

class AppTest extends PHPUnit_Framework_TestCase
{
  public function setUp(){ }
  public function tearDown(){ }

  public function testIsSingle()
  {
    $hero = new App();
    $this->assertTrue($hero->isSingle() !== false);
  }
}