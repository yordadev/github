<?php

namespace Tonning\Github\Requests\Issues;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * issues/update-milestone
 */
class IssuesUpdateMilestone extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/milestones/{$this->milestoneNumber}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $milestoneNumber The number that identifies the milestone.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $milestoneNumber,
	) {
	}
}
