<?php declare(strict_types = 1);

namespace App\Domain\Api\Request;

use Symfony\Component\Validator\Constraints as Assert;

final class CreateProductReqDto
{

	/**
	 * @Assert\NotBlank
	 * @Assert\Name
	 */
	public string $name;

	/** @Assert\NotBlank */
	public float $price;

}
