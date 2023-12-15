<?php

namespace SharpAPITest\Feature\Enums;

use PHPUnit\Framework\TestCase;

class SharpApiLanguagesTest extends TestCase
{
    public function testEnglish(): void
    {
        $this->assertEquals('English', SharpApiLanguages::ENGLISH);
    }
}
