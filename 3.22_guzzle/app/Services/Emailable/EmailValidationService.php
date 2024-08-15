<?php

declare(strict_types=1);

namespace App\Services\Emailable;

use App\Contracts\EmailValidationInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class EmailValidationService implements EmailValidationInterface
{
    private string $baseUrl = "https://api.emailable.com/v1/";

    public function __construct(private string $apiKey) {}

    public function verify(string $email): array
    {
        $stack = HandlerStack::create();

        $maxRetry = 3;

        $stack->push($this->getRetryMiddleware($maxRetry));

        $client = new Client(
            [
                'base_uri' => $this->baseUrl,
                'timeout'  => 5,
                'handler'  => $stack,
            ]
        );

        $params = [
            'api_key' => $this->apiKey,
            'email'   => $email,
        ];

        $response = $client->get('verify', ['query' => $params]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getRetryMiddleware(int $maxRetry)
    {
        return Middleware::retry(
            function (
                int $retries,
                RequestInterface $request,
                ?ResponseInterface $response = null,
                ?\RuntimeException $e = null
            ) use ($maxRetry) {
                // If the amount of retries is maxed out
                if ($retries >= $maxRetry) {
                    return false;
                }

                // If the status code is any of the numbers in the array, 
                // retry the request
                if ($response && in_array($response->getStatusCode(), [249, 429, 503])) {
                    // echo "Retrying [$retries], Status: {$response->getStatusCode()}<br>";
                    return true;
                }

                // No response
                if ($e instanceof ConnectException) {
                    // echo "Retrying [{$retries}], Connection Error<br>";
                    return true;
                }

                // echo "Not Retrying<br>";
                return false;
            }
        );
    }
}
