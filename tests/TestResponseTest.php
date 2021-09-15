<?php

declare(strict_types=1);

namespace Tests;

use Fig\Http\Message\StatusCodeInterface;

final class TestResponseTest extends TestCase
{
    /**
     * @testdox Send a get request and receive text in response
     */
    public function testSendAGetRequestAndReceiveTextInResponse(): void
    {
        $this->get('/text/plain')
            ->assertOk()
            ->assertSee('hello, world')
            ->assertDontSee('see, not');
    }

    /**
     * @testdox Send a post request and receive text in response
     */
    public function testSendAPostRequestAndReceiveTextInResponse(): void
    {
        $this->post('/text/plain')
            ->assertOk()
            ->assertSee('hello, world');
    }

    /**
     * @testdox Send a put request and receive text in response
     */
    public function testSendAPutRequestAndReceiveTextInResponse(): void
    {
        $this->put('/text/plain')
            ->assertOk()
            ->assertSee('hello, world');
    }

    /**
     * @testdox Send a patch request and receive text in response
     */
    public function testSendAPatchRequestAndReceiveTextInResponse(): void
    {
        $this->patch('/text/plain')
            ->assertOk()
            ->assertSee('hello, world');
    }

    /**
     * @testdox Send a delete request and receive text in response
     */
    public function testSendADeleteRequestAndReceiveTextInResponse(): void
    {
        $this->delete('/text/plain')
            ->assertOk()
            ->assertSee('hello, world');
    }

    /**
     * @testdox Send an options request and receive text in response
     */
    public function testSendAnOptionsRequestAndReceiveTextInResponse(): void
    {
        $this->options('/text/plain')
            ->assertOk()
            ->assertSee('hello, world');
    }

    /**
     * @testdox Send a get request with json data and receive json in response
     */
    public function testSendAGetRequestWithJsonDataAndReceiveJsonInResponse(): void
    {
        $this->getJson('/json/one')
            ->assertOk()
            ->assertJson(['hello' => 'world']);
    }

    /**
     * @testdox Send a post request with json data and receive json in response
     */
    public function testSendAPostRequestWithJsonDataAndReceiveJsonInResponse(): void
    {
        $this->postJson('/json/one')
            ->assertOk()
            ->assertJson(['hello' => 'world']);
    }

    /**
     * @testdox Send a put request with json data and receive json in response
     */
    public function testSendAPutRequestWithJsonDataAndReceiveJsonInResponse(): void
    {
        $this->putJson('/json/one')
            ->assertOk()
            ->assertJson(['hello' => 'world']);
    }

    /**
     * @testdox Send a patch request with json data and receive json in response
     */
    public function testSendAPatchRequestWithJsonDataAndReceiveJsonInResponse(): void
    {
        $this->patchJson('/json/one')
            ->assertOk()
            ->assertJson(['hello' => 'world']);
    }

    /**
     * @testdox Send a delete request with json data and receive json in response
     */
    public function testSendADeleteRequestWithJsonDataAndReceiveJsonInResponse(): void
    {
        $this->deleteJson('/json/one')
            ->assertOk()
            ->assertJson(['hello' => 'world']);
    }

    /**
     * @testdox Send an options request with json data and receive json in response
     */
    public function testSendAnOptionsRequestWithJsonDataAndReceiveJsonInResponse(): void
    {
        $this->optionsJson('/json/one')
            ->assertOk()
            ->assertJson(['hello' => 'world']);
    }

    /**
     * @testdox Send a request with header and get response headers
     */
    public function testRequestWithHeaderAndGetResponseHeaders(): void
    {
        $this->withHeader('X-Test', 'Test')
            ->get('/head/test')
            ->assertOk()
            ->assertHeader('X-Test', 'Test');
    }

    /**
     * @testdox Send a request with multiple headers at once
     */
    public function testSendARequestWithMultipleHeadersAtOnce(): void
    {
        $this->withHeaders(['X-Test' => 'Test'])
            ->get('/head/test')
            ->assertOk()
            ->assertHeader('X-Test', 'Test');
    }

    /**
     * @testdox Send a request with authorization token in the headers
     */
    public function testSendARequestWithAuthorizationTokenInTheHeaders(): void
    {
        $this->withToken(base64_encode('test:123456'), 'Basic')
            ->get('/head/auth')
            ->assertOk()
            ->assertHeaderMissing('X-Test')
            ->assertHeader('Authorization', 'Basic ' . base64_encode('test:123456'));
    }

    /**
     * @testdox Send a post request with json data and assert value and type exists at the given path in the response
     */
    public function testT(): void
    {
        $this->getJson('/json/one')
            ->assertOk()
            ->assertJsonPath('hello', 'world');
    }
}
