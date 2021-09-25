<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Nekofar\Slim\Test\Traits;

use Illuminate\Testing\AssertableJsonString;
use PHPUnit\Framework\Assert;
use Throwable;

trait HttpResponseJsonAssertsTrait
{
    /**
     * Assert that the response is a superset of the given JSON.
     *
     * @param array<int|string, mixed> $value
     *
     * @throws Throwable
     */
    public function assertJson(array $value = [], bool $strict = false): self
    {
        $this->decodeResponseJson()->assertSubset($value, $strict);

        return $this;
    }

    /**
     * Assert that the expected value and type exists at the given path in the response.
     *
     * @param mixed $expect
     *
     * @throws Throwable
     */
    public function assertJsonPath(string $path, $expect): self
    {
        $this->decodeResponseJson()->assertPath($path, $expect);

        return $this;
    }

    /**
     * Assert that the response has the exact given JSON.
     *
     * @param array<int|string, mixed> $data
     *
     * @throws Throwable
     */
    public function assertExactJson(array $data): self
    {
        $this->decodeResponseJson()->assertExact($data);

        return $this;
    }

    /**
     * Assert that the response has the similar JSON as given.
     *
     * @param array<int|string, mixed> $data
     *
     * @throws Throwable
     */
    public function assertSimilarJson(array $data): self
    {
        $this->decodeResponseJson()->assertSimilar($data);

        return $this;
    }

    /**
     * Assert that the response contains the given JSON fragment.
     *
     * @param array<int|string, mixed> $data
     *
     * @throws Throwable
     */
    public function assertJsonFragment(array $data): self
    {
        $this->decodeResponseJson()->assertFragment($data);

        return $this;
    }

    /**
     * Assert that the response JSON has the expected count of items at the given key.
     *
     * @throws Throwable
     */
    public function assertJsonCount(int $count, string $key = ''): self
    {
        $this->decodeResponseJson()->assertCount($count, $key !== '' ? $key : null);

        return $this;
    }

    /**
     * Validate and return the decoded response JSON.
     *
     * @throws Throwable
     */
    public function decodeResponseJson(): AssertableJsonString
    {
        $testJson = new AssertableJsonString((string) $this->getBody());

        $decodedResponse = $testJson->json();

        if ($decodedResponse === false || is_null($decodedResponse)) {
            Assert::fail('Invalid JSON was returned from the route.');
        }

        return $testJson;
    }
}
