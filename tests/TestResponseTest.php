<?php

/*
 * (c) Milad Nekofar <milad@nekofar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Tests;

use Fig\Http\Message\StatusCodeInterface;
use PHPUnit\Framework\AssertionFailedError;

final class TestResponseTest extends TestCase
{
    public function testHead(): void
    {
        $this->head('/text/plain')
            ->assertOk();
    }

    public function testGet(): void
    {
        $this->get('/text/plain')
            ->assertSee('hello, world');
    }

    public function testPost(): void
    {
        $this->post('/text/plain')
            ->assertSee('hello, world');
    }

    public function testPut(): void
    {
        $this->put('/text/plain')
            ->assertSee('hello, world');
    }

    public function testPatch(): void
    {
        $this->patch('/text/plain')
            ->assertSee('hello, world');
    }

    public function testDelete(): void
    {
        $this->delete('/text/plain')
            ->assertSee('hello, world');
    }

    public function testOptions(): void
    {
        $this->options('/text/plain')
            ->assertSee('hello, world');
    }

    /**
     * @throws \Throwable
     */
    public function testGetJson(): void
    {
        $this->getJson('/json/one')
            ->assertJson(['hello' => 'world']);
    }

    /**
     * @throws \Throwable
     */
    public function testPostJson(): void
    {
        $this->postJson('/json/one')
            ->assertJson(['hello' => 'world']);
    }

    /**
     * @throws \Throwable
     */
    public function testPutJson(): void
    {
        $this->putJson('/json/one')
            ->assertJson(['hello' => 'world']);
    }

    /**
     * @throws \Throwable
     */
    public function testPatchJson(): void
    {
        $this->patchJson('/json/one')
            ->assertJson(['hello' => 'world']);
    }

    /**
     * @throws \Throwable
     */
    public function testDeleteJson(): void
    {
        $this->deleteJson('/json/one')
            ->assertJson(['hello' => 'world']);
    }

    /**
     * @throws \Throwable
     */
    public function testOptionsJson(): void
    {
        $this->optionsJson('/json/one')
            ->assertJson(['hello' => 'world']);
    }

    public function testWithHeaders(): void
    {
        $this->withHeaders(['X-Test' => 'Test'])
            ->get('/head/test')
            ->assertHeader('X-Test', 'Test');
    }

    public function testAssertOk(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 500 matches expected 200.');

        $this->get('/status/500')
            ->assertOk();
    }

    public function testAssertCreated(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 500 matches expected 201.');

        $this->post('/status/500')
            ->assertCreated();
    }

    public function testAssertNotFound(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 500 matches expected 404.');

        $this->post('/status/500')
            ->assertNotFound();
    }

    public function testAssertForbidden(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 500 matches expected 403.');

        $this->post('/status/500')
            ->assertForbidden();
    }

    public function testAssertUnauthorized(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 500 matches expected 401.');

        $this->post('/status/500')
            ->assertUnauthorized();
    }

    public function testAssertUnprocessable(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 500 matches expected 422.');

        $this->post('/status/500')
            ->assertUnprocessable();
    }

    public function testAssertBadRequest(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 500 matches expected 400.');

        $this->post('/status/500')
            ->assertBadRequest();
    }

    public function testAssertMethodNotAllowed(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 500 matches expected 405.');

        $this->post('/status/500')
            ->assertMethodNotAllowed();
    }

    public function testAssertGone(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 500 matches expected 410.');

        $this->post('/status/500')
            ->assertGone();
    }

    public function testAssertInternalServerError(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 404 matches expected 500.');

        $this->get('/status/404')
            ->assertInternalServerError();
    }

    public function testAssertNotImplemented(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 500 matches expected 501.');

        $this->get('/status/500')
            ->assertNotImplemented();
    }

    public function testAssertNoContentAsserts204StatusCodeByDefault(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 500 matches expected 204.');

        $this->post('/status/500')
            ->assertNoContent();
    }

    public function testAssertNoContentAssertsExpectedStatusCode(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 500 matches expected 418.');

        $this->post('/status/500')
            ->assertNoContent(StatusCodeInterface::STATUS_IM_A_TEAPOT);
    }

    public function testAssertNoContentAssertsEmptyContent(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Response content is not empty');

        $this->get('/text/plain')
            ->assertNoContent(StatusCodeInterface::STATUS_OK);
    }

    public function testAssertStatus(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Failed asserting that 200 matches expected 500.');

        $this->post('/status/200')
            ->assertNoContent(StatusCodeInterface::STATUS_OK)
            ->assertStatus(StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR);
    }

    /**
     * @throws \Throwable
     */
    public function testAssertJsonStrict(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->getJson('/json/four')
            ->assertJson(['one' => '1'], true);
    }

    /**
     * @throws \Throwable
     */
    public function testAssertJsonCanFail(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->getJson('/json/two')
            ->assertJson(['foo' => 'baz']);
    }

    /**
     * @throws \Throwable
     */
    public function testAssertJsonWithArray(): void
    {
        $this->deleteJson('/json/two')
            ->assertJson(['foo' => 'bar']);
    }

    /**
     * @throws \Throwable
     */
    public function testAssertJsonWithNull(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Invalid JSON was returned from the route.');

        $this->get('/text/plain')
            ->assertJson();
    }

    /**
     * @throws \Throwable
     */
    public function testAssertSimilarJsonCanFail(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->get('/json/two')
            ->assertSimilarJson(['bar' => 'qux', 'foo' => 'baz']);
    }

    /**
     * @throws \Throwable
     */
    public function testAssertSimilarJsonWithMixed(): void
    {
        $this->get('/json/two')
            ->assertSimilarJson(['baz' => 'qux', 'foo' => 'bar']);
    }

    /**
     * @throws \Throwable
     */
    public function testAssertExactJsonWithMixedWhenDataIsExactlySame(): void
    {
        $this->postJson('/json/two')
            ->assertSimilarJson(['foo' => 'bar', 'baz' => 'qux']);
    }

    /**
     * @throws \Throwable
     */
    public function testAssertExactJsonWithMixedWhenDataIsSimilar(): void
    {
        $this->getJson('/json/two')
            ->assertExactJson(['foo' => 'bar', 'baz' => 'qux']);
    }

    /**
     * @throws \Throwable
     */
    public function testAssertExactJsonCanFail(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->getJson('/json/two')
            ->assertExactJson(['foo' => 'baz', 'bar' => 'qux']);
    }

    /**
     * @throws \Throwable
     */
    public function testAssertJsonPath(): void
    {
        $this->get('/json/one')
            ->assertJsonPath('hello', 'world');

        $this->post('/json/three')
            ->assertJsonPath('0.foo', 'bar');
    }

    /**
     * @throws \Throwable
     */
    public function testAssertJsonPathCanFail(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->get('/json/one')
            ->assertJsonPath('hello', 'earth');
    }

    /**
     * @throws \Throwable
     */
    public function testAssertJsonFragment(): void
    {
        $this->getJson('/json/two')
            ->assertJsonFragment(['foo' => 'bar']);

        $this->patchJson('/json/two')
            ->assertJsonFragment(['baz' => 'qux']);
    }

    /**
     * @throws \Throwable
     */
    public function testAssertJsonFragmentCanFail(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->getJson('/json/two')
            ->assertJsonFragment(['foo' => 'baz']);
    }

    /**
     * @throws \Throwable
     */
    public function testAssertJsonCount(): void
    {
        $this->getJson('/json/one')
            ->assertJsonCount(1);

        $this->getJson('/json/two')
            ->assertJsonCount(2);

        $this->getJson('/json/three')
            ->assertJsonCount(2, '0');
    }

    /**
     * @throws \Throwable
     */
    public function testAssertJsonCountCanFail(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->getJson('/json/one')
            ->assertJsonCount(10);
    }

    public function testAssertSee(): void
    {
        $this->get('/text/plain')
            ->assertSee('hello, world');
    }

    public function testAssertSeeCanFail(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->get('/text/plain')
            ->assertSee('hello, earth');
    }

    public function testAssertDontSee(): void
    {
        $this->get('/text/plain')
            ->assertDontSee('see, not');
    }

    public function testAssertDontSeeCanFail(): void
    {
        $this->expectException(AssertionFailedError::class);

        $this->get('/text/plain')
            ->assertDontSee('hello, world');
    }

    public function testAssertHeader(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Header [X-Wrong] not present on response.');

        $this->withHeader('X-Test', 'Test')
            ->get('/head/test')
            ->assertHeader('X-Wrong');
    }

    public function testAssertHeaderWithValue(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Header [X-Test] was found, but value [Test] does not match [Wrong].');

        $this->withHeader('X-Test', 'Test')
            ->get('/head/test')
            ->assertHeader('X-Test', 'Wrong');
    }

    public function testAssertHeaderMissing(): void
    {
        $this->expectException(AssertionFailedError::class);
        $this->expectExceptionMessage('Unexpected header [Authorization] is present on response.');

        $this->withToken(base64_encode('test:123456'), 'Basic')
            ->get('/head/auth')
            ->assertHeaderMissing('Authorization')
            ->assertHeader('Authorization', 'Basic ' . base64_encode('test:123456'));
    }

    public function testFlushHeaders(): void
    {
        $this->withHeader('X-Test', 'Test')
            ->get('/head/test')
            ->assertHeader('X-Test')
            ->assertHeader('X-Test', 'Test');

        $this->withHeader('X-Test', 'Test')
            ->flushHeaders()
            ->get('/head/test')
            ->assertHeaderMissing('X-Test');
    }
}
