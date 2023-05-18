<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nekofar\Slim\Test\Traits;

trait HttpHeadersTestTrait
{
    /**
     * Additional headers for the request.
     *
     * @var array<string, string>
     */
    protected $defaultHeaders = [];

    /**
     * Define additional headers to be sent with the request.
     *
     * @param array<string, string> $headers
     */
    final public function withHeaders(array $headers): self
    {
        $this->defaultHeaders = array_merge($this->defaultHeaders, $headers);

        return $this;
    }

    /**
     * Set the request authentication credentials using Basic Authentication.
     */
    final public function withBasicAuth(string $username, string $password): self
    {
        $token = base64_encode($username . ':' . $password);

        return $this->withToken($token, 'Basic');
    }

    /**
     * Add an authorization token for the request.
     */
    final public function withToken(string $token, string $type = 'Bearer'): self
    {
        return $this->withHeader('Authorization', $type . ' ' . $token);
    }

    /**
     * Add a header to be sent with the request.
     */
    final public function withHeader(string $name, string $value): self
    {
        $this->defaultHeaders[$name] = $value;

        return $this;
    }

    /**
     * Flush all the configured headers.
     */
    final public function flushHeaders(): self
    {
        $this->defaultHeaders = [];

        return $this;
    }
}
