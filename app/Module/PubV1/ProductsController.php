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

/**
 * @Apitte\Path("/products")
 * @Apitte\Tag("Products")
 */
class ProductsController extends BasePubV1Controller
{

    private ProductsFacade $productsFacade;

    public function __construct(ProductsFacade $productsFacade)
    {
        $this->productsFacade = $productsFacade;
    }

    /**
     * @Apitte\OpenApi("
     *   summary: Products list.
     * ")
     * @Apitte\Path("/")
     * @Apitte\Method("GET")
     */
    public function index(ApiRequest $request, ApiResponse $response): ApiResponse
    {
        //endpoint is http://example.com/api/public/v1/products/

        $response = $response->writeBody(Json::encode([
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
        ]));

        return $response;
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
