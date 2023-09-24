<?php

namespace Tests\Unit;

use Magic\Client\ArticleResource;
use PHPUnit\Framework\TestCase;

class ArticleApiTest extends TestCase
{
    public function testArticle() {
        $service = new ArticleResource();
        $result = $service->articlelists->get();
        echo $result;
        $this->assertTrue(true);
    }
}