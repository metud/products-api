<?php declare(strict_types = 1);

namespace App\Module\PubV1;

use Apitte\Core\Annotation\Controller as Apitte;
use Apitte\Core\Exception\Api\ServerErrorException;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Domain\Api\Facade\ProductsFacade;
use App\Model\Utils\Caster;
use Doctrine\DBAL\Exception\DriverException;
use Nette\Http\IResponse;

/**
 * @Apitte\Path("/products")
 * @Apitte\Tag("Products")
 */
class ProductDeleteController extends BasePubV1Controller
{

	private ProductsFacade $productsFacade;

	public function __construct(ProductsFacade $productsFacade)
	{
		$this->productsFacade = $productsFacade;
	}

	/**
	 * @Apitte\OpenApi("
	 *   summary: Delete a product by ID
	 * ")
	 * @Apitte\Path("/delete/{id}")
	 * @Apitte\Method("DELETE")
     * @Apitte\RequestParameters({
     *      @Apitte\RequestParameter(name="id", in="path", type="int", description="Product ID")
     * })
	 */
	public function delete(ApiRequest $request, ApiResponse $response): ApiResponse
	{

        try {
            $this->productsFacade->delete(Caster::toInt($request->getParameter('id')));

            return $response->withStatus(IResponse::S204_NoContent);

            /*return $response->withStatus(IResponse::S204_NoContent)
                ->withHeader('Content-Type', 'application/json')
                ->writeJsonBody(['status' => 'ok', 'code' => IResponse::S204_NoContent, 'message' => 'Product was deleted successfully']);*/
        } catch (DriverException $e) {
            throw ServerErrorException::create()
                ->withMessage('Cannot delete product')
                ->withPrevious($e);
        }
	}

}
