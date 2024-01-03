<?php

namespace Tonning\Github\Requests\Issues;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * issues/get-event
 *
 * Gets a single event by the event id.
 */
class IssuesGetEvent extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/issues/events/{$this->eventId}";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param int $eventId
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected int $eventId,
	) {
	}
}
