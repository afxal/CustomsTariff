<?php

use Apo\CustomsTariff;
use PHPUnit\Framework\TestCase;

class CustomsTariffTest extends TestCase
{
    
    public function testSearch()
    {
        $ct =  new CustomsTariff('food');
        $this->assertNotEmpty($ct->getList());
    }


    public function testFindCode()
    {
        $ct =  new CustomsTariff();
        $ct->findCode('0302310000');
        $this->assertNotEmpty($ct->getList());
    }

}