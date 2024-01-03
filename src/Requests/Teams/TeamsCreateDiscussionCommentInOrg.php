<?php

namespace Tonning\Github\Requests\Teams;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * teams/create-discussion-comment-in-org
 *
 * Creates a new comment on a team discussion. OAuth access tokens require the `write:discussion`
 * [scope](https://docs.github.com/apps/building-oauth-apps/understanding-scopes-for-oauth-apps/).
 *
 * This
 * endpoint triggers
 * [notifications](https://docs.github.com/github/managing-subscriptions-and-notifications-on-github/about-notifications).
 * Creating content too quickly using this endpoint may result in secondary rate limiting. For more
 * information, see "[Rate limits for the
 * API](https://docs.github.com/rest/overview/rate-limits-for-the-rest-api#about-secondary-rate-limits)"
 * and "[Best practices for using the REST
 * API](https://docs.github.com/rest/guides/best-practices-for-using-the-rest-api)."
 *
 * **Note:** You can
 * also specify a team by `org_id` and `team_id` using the route `POST
 * /organizations/{org_id}/team/{team_id}/discussions/{discussion_number}/comments`.
 */
class TeamsCreateDiscussionCommentInOrg extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/teams/{$this->teamSlug}/discussions/{$this->discussionNumber}/comments";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $teamSlug The slug of the team name.
	 * @param int $discussionNumber The number that identifies the discussion.
	 */
	public function __construct(
		protected string $org,
		protected string $teamSlug,
		protected int $discussionNumber,
	) {
	}
}
