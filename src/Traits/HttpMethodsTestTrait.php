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
use Slim\Psr7\Factory\ServerRequestFactory;
use Slim\Psr7\UploadedFile;

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
     * Visit the given URI with a POST request and upload a file.
     *
     * @param string $uri
     * @param string $file
     * @param string $mime
     * @param string $name
     * @param array<string, mixed>  $data
     * @param array<string, array<string>|string> $headers
     */
    final public function postUpload(string $uri, string $file, string $mime, string $name = 'file', array $data = [], array $headers = []): TestResponse
    {
        // Create a Slim Psr7 Factory to create requests and streams
        $factory       = new ServerRequestFactory();
        $uploadedFiles = [];

        // Copy the original file to the temporary file
        // This is done so that the original image can be kept in place for testing
        // and the temporary file can be used for the upload since more than likely
        // the upload will move the file to a new location and we don't want to
        // lose the original testing file

        $tempFile = tempnam(sys_get_temp_dir(), 'postUpload_');
        if (!copy($file, $tempFile)) {
            throw new \RuntimeException('Failed to copy the file');
        }

        // Create a Slim Psr7 UploadedFile instance
        $uploadedFile = new UploadedFile(
            $tempFile,
            basename($file),
            $mime,
            filesize($tempFile),
            UPLOAD_ERR_OK,
        );
        $uploadedFiles[$name] = $uploadedFile;

        // Create the server request with the method and URI
        $request = $factory->createServerRequest('POST', $uri);

        // Simulate the form data if any
        if (!empty($data)) {
            $request = $request->withParsedBody($data);
        }

        // Add the uploaded files to the request
        $request = $request->withUploadedFiles($uploadedFiles);

        // Add headers to the request, especially the Content-Type
        foreach ($headers as $headerName => $headerValue) {
            $request = $request->withHeader($headerName, $headerValue);
        }
        $request = $request->withHeader('Content-Type', 'multipart/form-data');

        // Assuming $this->send() is a method to dispatch the request and return a TestResponse
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
