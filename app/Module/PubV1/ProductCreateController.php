<?php declare(strict_types = 1);

namespace App\Module\PubV1;

use Apitte\Core\Annotation\Controller as Apitte;
use Apitte\Core\Exception\Api\ServerErrorException;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Domain\Api\Facade\ProductsFacade;
use App\Domain\Api\Request\CreateProductReqDto;
use Doctrine\DBAL\Exception\DriverException;
use Nette\Http\IResponse;

/**
 * @Apitte\Path("/products")
 * @Apitte\Tag("Products")
 */
class ProductCreateController extends BasePubV1Controller
{

	private ProductsFacade $productsFacade;

	public function __construct(ProductsFacade $productsFacade)
	{
		$this->productsFacade = $productsFacade;
	}

	/**
	 * @Apitte\OpenApi("
	 *   summary: Create a new product
	 * ")
	 * @Apitte\Path("/create")
	 * @Apitte\Method("POST")
	 * @Apitte\RequestBody(entity="App\Domain\Api\Request\CreateProductReqDto")
	 */
	public function create(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		/** @var CreateProductReqDto $dto */
		$dto = $request->getParsedBody();

        //curl -X POST -d '{"name": "Nový produkt", "price": 1337}' http://localhost/api/public/v1/products/create

		try {
			$this->productsFacade->create($dto);

			return $response->withStatus(IResponse::S201_Created)
				->withHeader('Content-Type', 'application/json')
                ->writeJsonBody(['status' => 'ok', 'code' => IResponse::S201_Created, 'message' => 'Product was created successfully']);
		} catch (DriverException $e) {
			throw ServerErrorException::create()
				->withMessage('Cannot create product')
				->withPrevious($e);
		}
	}

}
