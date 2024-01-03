<?php

namespace Tonning\Github\Requests\Activity;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * activity/list-public-events-for-user
 */
class ActivityListPublicEventsForUser extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/users/{$this->username}/events/public";
	}


	/**
	 * @param string $username The handle for the GitHub user account.
	 * @param null|int $page Page number of the results to fetch.
	 */
	public function __construct(
		protected string $username,
		protected ?int $page = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['page' => $this->page]);
	}
}
