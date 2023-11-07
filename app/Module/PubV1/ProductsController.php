<?php declare(strict_types = 1);

namespace App\Module\PubV1;

use Apitte\Core\Annotation\Controller as Apitte;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use Apitte\OpenApi\ISchemaBuilder;
use App\Domain\Api\Facade\ProductsFacade;
use App\Domain\Api\Response\ProductResDto;
use App\Model\Utils\Caster;
use Psr\Http\Message\ResponseInterface;
use Nette\Utils\Json;
use Psr\Log\LoggerInterface;

/**
 * @Apitte\Path("/products")
 * @Apitte\Tag("Products")
 */
class ProductsController extends BasePubV1Controller
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
     *   summary: Returns list of products
     * ")
     * @Apitte\Path("/")
     * @Apitte\Method("GET")
     * @Apitte\RequestParameters({
     *      @Apitte\RequestParameter(name="limit", type="int", in="query", required=false, description="Data limit"),
     *      @Apitte\RequestParameter(name="offset", type="int", in="query", required=false, description="Data offset"),
     *      @Apitte\RequestParameter(name="name", type="string", in="query", required=false, description="Product name filter")
     *  })
     */
    public function index(ApiRequest $request, ApiResponse $response): ApiResponse
    {
        //endpoint is http://example.com/api/public/v1/products/
        //echo "<pre>";var_dump("test");exit;
        try {
            $limit = Caster::toInt($request->getParameter('limit', 10));
            $offset = Caster::toInt($request->getParameter('offset', 0));
            $name = $request->getParameter('name');

            if ($name === null) {
                $getProducts = $this->productsFacade->findAll($limit, $offset);
            } else {
                $getProducts = $this->productsFacade->findFilteredProducts($limit, $offset, $name);
            }

            return $response
                ->withStatus(200)
                ->writeJsonBody($getProducts);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            $response->withStatus(500);
            $response->writeJsonBody(['status' => 'error', 'code' => 500, 'message' => 'An unexpected error occurred.']);
            //return [];
        }
    }

}
