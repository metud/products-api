<?php declare(strict_types = 1);

namespace App\Module\PubV1;

use Apitte\Core\Annotation\Controller as Apitte;
use Apitte\Core\Exception\Api\ClientErrorException;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Domain\Api\Facade\ProductsFacade;
use App\Domain\Api\Response\ProductResDto;
use App\Model\Exception\Runtime\Database\EntityNotFoundException;
use App\Model\Utils\Caster;
use Nette\Http\IResponse;
use Nette\Utils\Json;

/**
 * @Apitte\Path("/products")
 * @Apitte\Tag("Products")
 */
class ProductsOneController extends BasePubV1Controller
{

	private ProductsFacade $productsFacade;

	public function __construct(ProductsFacade $productsFacade)
	{
		$this->productsFacade = $productsFacade;
	}

	/**
	 * @Apitte\OpenApi("
	 *   summary: Get product by ID
	 * ")
	 * @Apitte\Path("/{id}")
	 * @Apitte\Method("GET")
	 * @Apitte\RequestParameters({
	 *      @Apitte\RequestParameter(name="id", in="path", type="int", description="Product ID")
	 * })
	 */
	public function byId(ApiRequest $request): ProductResDto //, ApiResponse $response): ApiResponse
	{
		try {
            //$getProduct = $this->productsFacade->findOne(Caster::toInt($request->getParameter('id')));

            //return $response->writeBody(Json::encode($getProduct));

			return $this->productsFacade->findOne(Caster::toInt($request->getParameter('id')));
		} catch (EntityNotFoundException $e) {
			throw ClientErrorException::create()
				->withMessage('Product not found')
				->withCode(IResponse::S404_NotFound);
		}
	}

}
