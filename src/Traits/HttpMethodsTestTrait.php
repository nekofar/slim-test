<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nekofar\Slim\Test\Traits;

use Fig\Http\Message\RequestMethodInterface;
use Nekofar\Slim\Test\TestResponse;
use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\ServerRequestInterface;

trait HttpMethodsTestTrait
{
    /**
     * @param array<string, array<string>|string> $headers
     */
    private function send(MessageInterface|ServerRequestInterface $request, array $headers): TestResponse
    {
        if (property_exists(static::class, 'defaultHeaders')) {
            $headers = array_merge($this->defaultHeaders, $headers);
        }

        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        /* @phpstan-ignore-next-line */
        return TestResponse::fromBaseResponse($this->app->handle($request));
    }

    /**
     * Visit the given URI with a HEAD request.
     *
     * @param array<string, array<string>|string> $headers
     * @param string $uri
     */
    final public function head(string $uri, array $headers = []): TestResponse
    {
        $request = $this->createRequest(RequestMethodInterface::METHOD_HEAD, $uri);

        return $this->send($request, $headers);
    }

    /**
     * Visit the given URI with a GET request.
     *
     * @param array<string, array<string>|string> $headers
     */
    final public function get(string $uri, array $headers = []): TestResponse
    {
        $request = $this->createRequest(RequestMethodInterface::METHOD_GET, $uri);

        return $this->send($request, $headers);
    }

    /**
     * Visit the given URI with a GET request, expecting a JSON response.
     *
     * @param array<string, array<string>|string> $headers
     */
    final public function getJson(string $uri, array $headers = []): TestResponse
    {
        $request = $this->createJsonRequest(RequestMethodInterface::METHOD_GET, $uri);

        return $this->send($request, $headers);
    }

    /**
     * Visit the given URI with a POST request.
     *
     * @param array<string, mixed>                $data
     * @param array<string, array<string>|string> $headers
     */
    final public function post(string $uri, array $data = [], array $headers = []): TestResponse
    {
        $request = $this->createFormRequest(RequestMethodInterface::METHOD_POST, $uri, $data);

        return $this->send($request, $headers);
    }

    /**
     * Visit the given URI with a POST request, expecting a JSON response.
     *
     * @param array<string, mixed>                $data
     * @param array<string, array<string>|string> $headers
     */
    final public function postJson(string $uri, array $data = [], array $headers = []): TestResponse
    {
        $request = $this->createJsonRequest(RequestMethodInterface::METHOD_POST, $uri, $data);

        return $this->send($request, $headers);
    }

    /**
     * Visit the given URI with a PUT request.
     *
     * @param array<string, mixed>                $data
     * @param array<string, array<string>|string> $headers
     */
    final public function put(string $uri, array $data = [], array $headers = []): TestResponse
    {
        $request = $this->createFormRequest(RequestMethodInterface::METHOD_PUT, $uri, $data);

        return $this->send($request, $headers);
    }

    /**
     * Visit the given URI with a PUT request, expecting a JSON response.
     *
     * @param array<string, mixed>                $data
     * @param array<string, array<string>|string> $headers
     */
    final public function putJson(string $uri, array $data = [], array $headers = []): TestResponse
    {
        $request = $this->createJsonRequest(RequestMethodInterface::METHOD_PUT, $uri, $data);

        return $this->send($request, $headers);
    }

    /**
     * Visit the given URI with a PATCH request.
     *
     * @param array<string, mixed>                $data
     * @param array<string, array<string>|string> $headers
     */
    final public function patch(string $uri, array $data = [], array $headers = []): TestResponse
    {
        $request = $this->createFormRequest(RequestMethodInterface::METHOD_PATCH, $uri, $data);

        return $this->send($request, $headers);
    }

    /**
     * Visit the given URI with a PATCH request, expecting a JSON response.
     *
     * @param array<string, mixed>                $data
     * @param array<string, array<string>|string> $headers
     */
    final public function patchJson(string $uri, array $data = [], array $headers = []): TestResponse
    {
        $request = $this->createJsonRequest(RequestMethodInterface::METHOD_PATCH, $uri, $data);

        return $this->send($request, $headers);
    }

    /**
     * Visit the given URI with a DELETE request.
     *
     * @param array<string, mixed>                $data
     * @param array<string, array<string>|string> $headers
     */
    final public function delete(string $uri, array $data = [], array $headers = []): TestResponse
    {
        $request = $this->createFormRequest(RequestMethodInterface::METHOD_DELETE, $uri, $data);

        return $this->send($request, $headers);
    }

    /**
     * Visit the given URI with a DELETE request, expecting a JSON response.
     *
     * @param array<string, mixed>                $data
     * @param array<string, array<string>|string> $headers
     */
    final public function deleteJson(string $uri, array $data = [], array $headers = []): TestResponse
    {
        $request = $this->createJsonRequest(RequestMethodInterface::METHOD_DELETE, $uri, $data);

        return $this->send($request, $headers);
    }

    /**
     * Visit the given URI with an OPTIONS request.
     *
     * @param array<string, mixed>                $data
     * @param array<string, array<string>|string> $headers
     */
    final public function options(string $uri, array $data = [], array $headers = []): TestResponse
    {
        $request = $this->createFormRequest(RequestMethodInterface::METHOD_OPTIONS, $uri, $data);

        return $this->send($request, $headers);
    }

    /**
     * Visit the given URI with an OPTIONS request, expecting a JSON response.
     *
     * @param array<string, mixed>                $data
     * @param array<string, array<string>|string> $headers
     */
    final public function optionsJson(string $uri, array $data = [], array $headers = []): TestResponse
    {
        $request = $this->createJsonRequest(RequestMethodInterface::METHOD_OPTIONS, $uri, $data);

        return $this->send($request, $headers);
    }
}
