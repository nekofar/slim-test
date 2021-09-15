<?php

declare(strict_types=1);

namespace Nekofar\Slim\Test;

use Fig\Http\Message\StatusCodeInterface;
use Illuminate\Testing\AssertableJsonString;
use PHPUnit\Framework\Assert;
use Slim\Psr7\Response;
use Throwable;

/**
 * @mixin Response
 */
final class TestResponse
{
    /**
     * The response to delegate to.
     *
     * @var Response
     */
    public $baseResponse;

    /**
     * Create a new test response instance.
     *
     * @return void
     */
    public function __construct(Response $response)
    {
        $this->baseResponse = $response;
    }

    /**
     * Create a new TestResponse from another response.
     *
     * @return static
     */
    public static function fromBaseResponse(Response $response): self
    {
        return new static($response);
    }

    /**
     * Assert that the response has a 200 status code.
     */
    public function assertOk(): self
    {
        $this->assertStatus(StatusCodeInterface::STATUS_OK);

        return $this;
    }

    /**
     * Assert that the response has a 201 status code.
     */
    public function assertCreated(): self
    {
        return $this->assertStatus(StatusCodeInterface::STATUS_CREATED);
    }

    /**
     * Assert that the response has the given status code and no content.
     */
    public function assertNoContent(int $status = StatusCodeInterface::STATUS_NO_CONTENT): self
    {
        $this->assertStatus($status);

        Assert::assertEmpty((string) $this->getBody(), 'Response content is not empty.');

        return $this;
    }

    /**
     * Assert that the response has a not found status code.
     */
    public function assertNotFound(): self
    {
        return $this->assertStatus(StatusCodeInterface::STATUS_NOT_FOUND);
    }

    /**
     * Assert that the response has a forbidden status code.
     */
    public function assertForbidden(): self
    {
        return $this->assertStatus(StatusCodeInterface::STATUS_FORBIDDEN);
    }

    /**
     * Assert that the response has an unauthorized status code.
     */
    public function assertUnauthorized(): self
    {
        return $this->assertStatus(StatusCodeInterface::STATUS_UNAUTHORIZED);
    }

    /**
     * Assert that the response has a 422 status code.
     */
    public function assertUnprocessable(): self
    {
        return $this->assertStatus(StatusCodeInterface::STATUS_UNPROCESSABLE_ENTITY);
    }

    /**
     * Assert that the response has the given status code.
     */
    public function assertStatus(int $status): self
    {
        Assert::assertEquals($status, $this->getStatusCode());

        return $this;
    }

    /**
     * Asserts that the response contains the given header and equals the optional value.
     */
    public function assertHeader(string $headerName, string $value = ''): self
    {
        Assert::assertTrue(
            $this->hasHeader($headerName), "Header [{$headerName}] not present on response."
        );

        $actual = $this->getHeaderLine($headerName);

        if ($value !== '') {
            Assert::assertEquals(
                $value, $this->getHeaderLine($headerName),
                "Header [{$headerName}] was found, but value [{$actual}] does not match [{$value}]."
            );
        }

        return $this;
    }

    /**
     * Asserts that the response does not contain the given header.
     */
    public function assertHeaderMissing(string $headerName): self
    {
        Assert::assertFalse(
            $this->hasHeader($headerName), "Unexpected header [{$headerName}] is present on response."
        );

        return $this;
    }

    /**
     * Assert that the given string is contained within the response.
     */
    public function assertSee(string $value): self
    {
        Assert::assertStringContainsString($value, (string) $this->getBody());

        return $this;
    }

    /**
     * Assert that the given string is not contained within the response.
     */
    public function assertDontSee(string $value): self
    {
        Assert::assertStringNotContainsString($value, (string) $this->getBody());

        return $this;
    }

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

    /**
     * Dynamically access base response parameters.
     *
     * @return mixed
     */
    public function __get(string $key)
    {
        /* @phpstan-ignore-next-line */
        return $this->baseResponse->{$key};
    }

    /**
     * Proxy isset() checks to the underlying base response.
     *
     * @return bool
     */
    public function __isset(string $key)
    {
        /* @phpstan-ignore-next-line */
        return isset($this->baseResponse->{$key});
    }

    /**
     * Handle dynamic calls into macros or pass missing methods to the base response.
     *
     * @param array<string,mixed> $args
     *
     * @return mixed
     */
    public function __call(string $method, array $args)
    {
        /* @phpstan-ignore-next-line */
        return $this->baseResponse->{$method}(...$args);
    }
}
