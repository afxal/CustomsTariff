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

}