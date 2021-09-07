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
        $this->get('/text')
            ->assertOk()
            ->assertSee('hello, world')
            ->assertDontSee('see, not');
    }

    /**
     * @testdox Send a post request and receive text in response
     */
    public function testSendAPostRequestAndReceiveTextInResponse(): void
    {
        $this->post('/text')
            ->assertOk()
            ->assertSee('hello, world');
    }

    /**
     * @testdox Send a put request and receive text in response
     */
    public function testSendAPutRequestAndReceiveTextInResponse(): void
    {
        $this->put('/text')
            ->assertOk()
            ->assertSee('hello, world');
    }

    /**
     * @testdox Send a patch request and receive text in response
     */
    public function testSendAPatchRequestAndReceiveTextInResponse(): void
    {
        $this->patch('/text')
            ->assertOk()
            ->assertSee('hello, world');
    }

    /**
     * @testdox Send a delete request and receive text in response
     */
    public function testSendADeleteRequestAndReceiveTextInResponse(): void
    {
        $this->delete('/text')
            ->assertOk()
            ->assertSee('hello, world');
    }

    /**
     * @testdox Send an options request and receive text in response
     */
    public function testSendAnOptionsRequestAndReceiveTextInResponse(): void
    {
        $this->options('/text')
            ->assertOk()
            ->assertSee('hello, world');
    }

    /**
     * @testdox Send a get request with json data and receive json in response
     */
    public function testSendAGetRequestWithJsonDataAndReceiveJsonInResponse(): void
    {
        $response = $this->getJson('/json')
            ->assertOk()
            ->assertJson();

        $responseData = json_decode((string) $response->getBody());
        self::assertObjectHasAttribute('hello', $responseData);
        self::assertEquals('world', $responseData->hello);
    }

    /**
     * @testdox Send a post request with json data and receive json in response
     */
    public function testSendAPostRequestWithJsonDataAndReceiveJsonInResponse(): void
    {
        $response = $this->postJson('/json')
            ->assertOk()
            ->assertJson();

        $responseData = json_decode((string) $response->getBody());
        self::assertObjectHasAttribute('hello', $responseData);
        self::assertEquals('world', $responseData->hello);
    }

    /**
     * @testdox Send a put request with json data and receive json in response
     */
    public function testSendAPutRequestWithJsonDataAndReceiveJsonInResponse(): void
    {
        $response = $this->putJson('/json')
            ->assertOk()
            ->assertJson();

        $responseData = json_decode((string) $response->getBody());
        self::assertObjectHasAttribute('hello', $responseData);
        self::assertEquals('world', $responseData->hello);
    }

    /**
     * @testdox Send a patch request with json data and receive json in response
     */
    public function testSendAPatchRequestWithJsonDataAndReceiveJsonInResponse(): void
    {
        $response = $this->patchJson('/json')
            ->assertOk()
            ->assertJson();

        $responseData = json_decode((string) $response->getBody());
        self::assertObjectHasAttribute('hello', $responseData);
        self::assertEquals('world', $responseData->hello);
    }

    /**
     * @testdox Send a delete request with json data and receive json in response
     */
    public function testSendADeleteRequestWithJsonDataAndReceiveJsonInResponse(): void
    {
        $response = $this->deleteJson('/json')
            ->assertOk()
            ->assertJson();

        $responseData = json_decode((string) $response->getBody());
        self::assertObjectHasAttribute('hello', $responseData);
        self::assertEquals('world', $responseData->hello);
    }

    /**
     * @testdox Send an options request with json data and receive json in response
     */
    public function testSendAnOptionsRequestWithJsonDataAndReceiveJsonInResponse(): void
    {
        $response = $this->optionsJson('/json')
            ->assertOk()
            ->assertJson();

        $responseData = json_decode((string) $response->getBody());
        self::assertObjectHasAttribute('hello', $responseData);
        self::assertEquals('world', $responseData->hello);
    }

    /**
     * @testdox Send a request and receive not found status in response
     */
    public function testSendARequestAndReceiveNotFoundStatusInResponse(): void
    {
        $this->post('/')->assertNotFound();
    }

    /**
     * @testdox Send a request and receive created status in response
     */
    public function testSendARequestAndReceiveCreatedStatusInResponse(): void
    {
        $this->post('/created')
            ->assertCreated()
            ->assertNoContent(StatusCodeInterface::STATUS_CREATED);
    }

    /**
     * @testdox Send a request and receive forbidden status in response
     */
    public function testSendARequestAndReceiveForbiddenStatusInResponse(): void
    {
        $this->post('/forbidden')->assertForbidden();
    }

    /**
     * @testdox Send a request and receive unauthorized status in response
     */
    public function testSendARequestAndReceiveUnauthorizedStatusInResponse(): void
    {
        $this->post('/unauthorized')->assertUnauthorized();
    }

    /**
     * @testdox Send a request and receive unprocessable status in response
     */
    public function testSendARequestAndReceiveUnprocessableStatusInResponse(): void
    {
        $this->post('/unprocessable')->assertUnprocessable();
    }

    /**
     * @testdox Send a request with header and get response headers
     */
    public function testRequestWithHeaderAndGetResponseHeaders(): void
    {
        $this->withHeader('X-Test', 'Test')
            ->get('/header')
            ->assertOk()
            ->assertHeader('X-Test', 'Test');
    }

    /**
     * @testdox Send a request with multiple headers at once
     */
    public function testSendARequestWithMultipleHeadersAtOnce(): void
    {
        $this->withHeaders(['X-Test' => 'Test'])
            ->get('/header')
            ->assertOk()
            ->assertHeader('X-Test', 'Test');
    }

    /**
     * @testdox Send a request with authorization token in the headers
     */
    public function testSendARequestWithAuthorizationTokenInTheHeaders(): void
    {
        $this->withToken(base64_encode('test:123456'), 'Basic')
            ->get('/token')
            ->assertOk()
            ->assertHeaderMissing('X-Test')
            ->assertHeader('Authorization', 'Basic ' . base64_encode('test:123456'));
    }
}
