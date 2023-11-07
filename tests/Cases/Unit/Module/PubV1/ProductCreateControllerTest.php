<?php declare(strict_types = 1);

namespace Tests\Cases\Unit\Module\PubV1;

use App\Bootstrap;
use Contributte\Tester\Toolkit;
use Tester\Assert;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Exception\Api\ServerErrorException;
use App\Module\PubV1\ProductCreateController;
use Tester\TestCase;

require_once __DIR__ . '/../../../../bootstrap.php';

Toolkit::test(function (): void {
    /*$container = Bootstrap::boot()->createContainer();
    $controller = $container->getByType(ProductCreateController::class);

    $request = new ApiRequest();
    $request->withMethod('POST');
    $request->withHeader('Content-Type', 'application/json');
    $request->withQueryParams([
        'name' => '//foo///bar/////test/asd',
        'price' => 1337,
    ]);

    try {
        $controller->create($request);

        Assert::fail('Expected exception was not thrown');
    } catch (ServerErrorException $e) {
        Assert::equal('Cannot create product', $e->getMessage());
    }*/
});