<?php


namespace App\Client;


class QuoteRestClient
{
    private const ENDPOINT = 'http://quotes.rest/qod.json?category=%s';

    public function retrieveQuote(string $category): array
    {
        $url = sprintf(self::ENDPOINT, $category);

        $content = file_get_contents($url);

        if (false === $content) {
            throw new \RuntimeException('Could not retrieve a quote');
        }

        $response = json_decode($content, true);

        return $response['contents']['quotes'][0];
    }
}