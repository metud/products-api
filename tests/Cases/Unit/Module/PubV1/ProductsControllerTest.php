<?php declare(strict_types = 1);

namespace Tests\Cases\Unit\Module\PubV1;

use App\Bootstrap;
use App\Module\PubV1\ProductsController;
use Tester\Assert;
use Tester\TestCase;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use GuzzleHttp\Psr7\ServerRequest;
use GuzzleHttp\Psr7\Response;

require_once __DIR__ . '/../../../../bootstrap.php';

class ProductsControllerTest extends TestCase
{
    /** @var ProductsController */
    private ProductsController $controller;

    public function setUp(): void
    {
        $container = Bootstrap::boot()->createContainer();
        $this->controller = $container->getByType(ProductsController::class);
    }

    public function testIndex(): void
    {
        $method = 'GET';
        $uri = '/api/public/v1/products';
        $headers = [];
        $body = null;
        $protocolVersion = '1.1';

        $request = new ServerRequest($method, $uri, $headers, $body, $protocolVersion);

        $requestApi = new ApiRequest($request);
        $psr7Response = new Response();

        $response = $this->controller->index($requestApi, new ApiResponse($psr7Response));

        // Assertions based on the response
        Assert::equal(200, $response->getStatusCode());
    }
}
(new ProductsControllerTest())->run();