<?php

namespace Magic\Client;

class ArticleResource
{
    public $articlelists;

    private $rootUrl;

    public function __construct($rootUrl = null)
    {
        $this->rootUrl = $rootUrl ?: 'https://jsonplaceholder.typicode.com/';

        $this->articlelists = new Articlelists(
            $this,
            'articlelist',
            [
                'get' => [
                    'path' => 'posts',
                    'httpMethod' => 'GET',
                    'parameters' => [
                        'articlelist' => [
                            'location' => 'path',
                            'type' => 'string',
                            'required' => true,
                        ],
                    ],
                ]
            ]);
    }
}