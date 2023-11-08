<?php declare(strict_types = 1);

namespace App\Module\V1;

use Apitte\Core\Annotation\Controller as Apitte;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Domain\Api\Facade\ProductsFacade;
use App\Model\Utils\Caster;
use Psr\Log\LoggerInterface;

/**
 * @Apitte\Path("/products")
 * @Apitte\Tag("Secured products")
 */
class ProductsController extends BaseV1Controller
{

	private ProductsFacade $productsFacade;
    private LoggerInterface $logger;

	public function __construct(ProductsFacade $productsFacade, LoggerInterface $logger)
	{
		$this->productsFacade = $productsFacade;
        $this->logger = $logger;
	}

	/**
	 * @Apitte\OpenApi("
	 *   summary: Return list of products
	 * ")
	 * @Apitte\Path("/")
	 * @Apitte\Method("GET")
     * @Apitte\RequestParameters({
     *      @Apitte\RequestParameter(name="limit", type="int", in="query", required=false, description="Data limit"),
     *      @Apitte\RequestParameter(name="offset", type="int", in="query", required=false, description="Data offset"),
     *      @Apitte\RequestParameter(name="name", type="string", in="query", required=false, description="Product name filter"),
     *      @Apitte\RequestParameter(name="minPrice", type="float", in="query", required=false, description="Min price filter"),
     *      @Apitte\RequestParameter(name="maxPrice", type="float", in="query", required=false, description="Max price filter")
     *  })
	 */
    public function index(ApiRequest $request, ApiResponse $response): ApiResponse
	{
        try {
            $limit = Caster::toInt($request->getParameter('limit', 10));
            $offset = Caster::toInt($request->getParameter('offset', 0));
            $name = $request->getParameter('name');
            $minPricePom = $request->getParameter('minPrice', 0);
            $minPrice = $minPricePom ? Caster::toFloat($minPricePom) : null;
            $maxPricePom = $request->getParameter('maxPrice', 0);
            $maxPrice = $maxPricePom ? Caster::toFloat($maxPricePom) : null;

            if ($name === null && $minPrice === null && $maxPrice === null) {
                $getProducts = $this->productsFacade->findAll($limit, $offset);
            } else {
                $getProducts = $this->productsFacade->findFilteredProducts($limit, $offset, $name, $minPrice, $maxPrice);
            }

            return $response
                ->withStatus(200)
                ->writeJsonBody($getProducts);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            $response->withStatus(500);
            $response->writeJsonBody(['status' => 'error', 'code' => 500, 'message' => 'An unexpected error occurred.']);
        }
	}

}
