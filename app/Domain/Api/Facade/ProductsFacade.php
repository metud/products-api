<?php declare(strict_types = 1);

namespace App\Domain\Api\Facade;

use App\Domain\Api\Request\CreateProductReqDto;
use App\Domain\Api\Request\UpdateProductReqDto;
use App\Domain\Api\Response\ProductResDto;
use App\Domain\Product\Product;
use App\Model\Database\EntityManagerDecorator;
use App\Model\Exception\Runtime\Database\EntityNotFoundException;

final class ProductsFacade
{

	public function __construct(private EntityManagerDecorator $em)
	{
	}

	/**
	 * @param mixed[] $criteria
	 * @param string[] $orderBy
	 * @return ProductResDto[]
	 */
	public function findBy(array $criteria = [], array $orderBy = ['id' => 'ASC'], int $limit = 10, int $offset = 0): array
	{
		$entities = $this->em->getRepository(Product::class)->findBy($criteria, $orderBy, $limit, $offset);
		$result = [];

		foreach ($entities as $entity) {
			$result[] = ProductResDto::from($entity);
		}

		return $result;
	}

	/**
	 * @return ProductResDto[]
	 */
	public function findAll(int $limit = 10, int $offset = 0): array
	{
		return $this->findBy([], ['id' => 'ASC'], $limit, $offset);
	}

	/**
	 * @param mixed[] $criteria
	 * @param string[] $orderBy
	 */
	public function findOneBy(array $criteria, ?array $orderBy = null): ProductResDto
	{
		$entity = $this->em->getRepository(Product::class)->findOneBy($criteria, $orderBy);

		if ($entity === null) {
			throw new EntityNotFoundException();
		}

		return ProductResDto::from($entity);
	}

	public function findOne(int $id): ProductResDto
	{
		return $this->findOneBy(['id' => $id]);
	}

	public function create(CreateProductReqDto $dto): Product
	{
        $product = new Product(
			$dto->name,
			$dto->price,
		);

		$this->em->persist($product);
		$this->em->flush($product);

		return $product;
	}

    public function update(int $id, UpdateProductReqDto $dto): void
    {
        $getProduct = $this->em->find(Product::class, $id);

        if ($getProduct === null) {
            throw new EntityNotFoundException(); // Neexistující produkt
        }

        $getProduct->setName($dto->name);
        $getProduct->setPrice($dto->price);
        $getProduct->setUpdatedAt(new \DateTime());

        $this->em->flush($getProduct);
    }

    public function delete(int $id): void
    {
        $getProduct = $this->em->find(Product::class, $id);

        if ($getProduct !== null) {
            $this->em->remove($getProduct);
            $this->em->flush();
        }
    }

    public function findFilteredProducts(int $limit, int $offset, ?string $name = null): array
    {
        $criteria = [];
        if ($name !== null) {
            $criteria['name'] = $name;
        }
        //pripadne filtrovani dle ceny
        /*if ($minPrice !== null) {
            $criteria['price'] = [
                '$gte' => $minPrice
            ];
        }
        if ($maxPrice !== null) {
            $criteria['price'] = [
                '$lte' => $maxPrice
            ];
        }*/

        return $this->findBy($criteria, ['id' => 'ASC'], $limit, $offset);
    }

}
