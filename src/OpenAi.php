<?php
namespace srcker\openai;
use srcker\openai\utils\Client;


class OpenAi
{


    /**
     * Creates a new Open AI Client with the given API token.
     */
    public static function client(string $apiKey, ?string $organization = null, ?string $project = null)
    {
        return self::factory()
            ->withApiKey($apiKey)
            ->withBaseUrl("https://api.openai.com/v1/engines/davinci-codex/completions")
            ->withHttpHeader('OpenAI-Beta', 'assistants=v2')
            ->make();
    }


    /**
     * Creates a new factory instance to configure a custom Open AI Client
     */
    public static function factory(): Factory
    {
        return new Factory;
    }


}