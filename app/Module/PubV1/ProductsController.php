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
     *   summary: Products list.
     * ")
     * @Apitte\Path("/")
     * @Apitte\Method("GET")
     * @Apitte\RequestParameters({
     *  		@Apitte\RequestParameter(name="limit", type="int", in="query", required=false, description="Data limit"),
     *  		@Apitte\RequestParameter(name="offset", type="int", in="query", required=false, description="Data offset")
     *  })
     */
    public function index(ApiRequest $request, ApiResponse $response): ApiResponse
    {
        //endpoint is http://example.com/api/public/v1/products/
        //var_dump("test", $this->productsFacade->findAll());exit;
        try {
            $getProducts = $this->productsFacade->findAll(
                Caster::toInt($request->getParameter('limit', 10)),
                Caster::toInt($request->getParameter('offset', 0))
            );

            return $response->writeJsonBody($getProducts);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            $response->withStatus(500);
            $response->writeJsonBody(['status' => 'error', 'code' => 500, 'message' => 'An unexpected error occurred.']);
            return [];
        }

       // $getProducts = $this->productsFacade->findAll();
        //return $this->productsFacade->findAll(
           // Caster::toInt($request->getParameter('limit', 10)),
         //   Caster::toInt($request->getParameter('offset', 0))
       // );



        //return $response
         //   ->writeJsonBody($getProducts);

        //$response = $response->writeJsonBody($getProducts);

        /*$response = $response->writeBody(Json::encode([
            [
                'id' => 1,
                'product' => 'Blue Jacket',
                'price' => '5 243,00 Kc',
            ],
            [
                'id' => 2,
                'product' => 'Black Hoodie',
                'price' => '2 633,00 Kc',
            ],
            [
                'id' => 3,
                'product' => 'Red T-Shirt',
                'price' => '769,00 Kc',
            ],
        ]));*/

        //return $response;
    }

	/**
	 * @ Apitte\OpenApi("
	 *   summary: Products list.
	 * ")
	 * @ Apitte\Path("/")
	 * @ Apitte\Method("GET")

    public function index(ApiRequest $request, ApiResponse $response): ResponseInterface
    {
        return $response
            ->withAddedHeader('Access-Control-Allow-Origin', '*')
            ->writeJsonBody(
                $this->productsFacade->findAll()
            );
    } */

}
