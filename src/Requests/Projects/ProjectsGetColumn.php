<?php

namespace Tonning\Github\Requests\Projects;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * projects/get-column
 *
 * Gets information about a project column.
 */
class ProjectsGetColumn extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/projects/columns/{$this->columnId}";
	}


	/**
	 * @param int $columnId The unique identifier of the column.
	 */
	public function __construct(
		protected int $columnId,
	) {
	}
}