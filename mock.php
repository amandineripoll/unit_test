<?php

$true = $this->createMock(SomeClass::class);
$true->expects($this->any())->method('isValid')->will($this->returnValue(1));

$false = $this->createMock(SomeClass::class);
$false->expects($this->any())->method('isValid')->will($this->returnValue(0));