<?php declare(strict_types = 1);

namespace App\Module\PubV1;

use Apitte\Core\Annotation\Controller as Apitte;
use Apitte\Core\Exception\Api\ServerErrorException;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Domain\Api\Facade\ProductsFacade;
use App\Domain\Api\Request\UpdateProductReqDto;
use App\Model\Utils\Caster;
use Doctrine\DBAL\Exception\DriverException;
use Nette\Http\IResponse;

/**
 * @Apitte\Path("/products")
 * @Apitte\Tag("Products")
 */
class ProductUpdateController extends BasePubV1Controller
{

	private ProductsFacade $productsFacade;

	public function __construct(ProductsFacade $productsFacade)
	{
		$this->productsFacade = $productsFacade;
	}

	/**
	 * @Apitte\OpenApi("
	 *   summary: Update an existing product by ID
	 * ")
	 * @Apitte\Path("/update/{id}")
	 * @Apitte\Method("PUT")
	 * @Apitte\RequestBody(entity="App\Domain\Api\Request\UpdateProductReqDto")
     * @Apitte\RequestParameters({
     *      @Apitte\RequestParameter(name="id", in="path", type="int", description="Product ID")
     * })
	 */
	public function update(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		/** @var UpdateProductReqDto $dto */
		$dto = $request->getParsedBody();

        try {
            $this->productsFacade->update(Caster::toInt($request->getParameter('id')), $dto);

            return $response->withStatus(IResponse::S200_OK)
                ->withHeader('Content-Type', 'application/json')
                ->writeJsonBody(['status' => 'ok', 'code' => IResponse::S200_OK, 'message' => 'Product was edited successfully']);
        } catch (DriverException $e) {
            throw ServerErrorException::create()
                ->withMessage('Cannot edit product')
                ->withPrevious($e);
        }
	}

}
