<?php declare(strict_types = 1);

namespace App\Domain\Product;

use App\Model\Database\Entity\AbstractEntity;
use App\Model\Database\Entity\TCreatedAt;
use App\Model\Database\Entity\TId;
use App\Model\Database\Entity\TUpdatedAt;
use App\Model\Utils\DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="ProductRepository")
 * @ORM\Table(name="`product`")
 * @ORM\HasLifecycleCallbacks
 */
class Product extends AbstractEntity
{

	use TId;
	use TCreatedAt;
	use TUpdatedAt;

	/** @ORM\Column(type="string", length=100, nullable=FALSE, unique=false) */
	private string $name;

	/** @ORM\Column(type="float", nullable=FALSE, unique=false) */
	private float $price;

	public function __construct(string $name, float $price)
	{
		$this->name = $name;
		$this->price = $price;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function getPrice(): float
	{
		return $this->price;
	}

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

}
