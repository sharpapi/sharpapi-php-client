<?php

namespace SharpAPITest\SharpApiService\Tests\Feature\Enums;

use PHPUnit\Framework\TestCase;
use SharpAPI\SharpApiService\Enums\SharpApiLanguages;

class SharpApiLanguagesTest extends TestCase
{
    public function testEnglish(): void
    {
        $this->assertEquals('English', SharpApiLanguages::ENGLISH);
    }
}
