<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/remove-all-custom-labels-from-self-hosted-runner-for-org
 *
 * Remove all custom labels from a self-hosted runner configured in an
 * organization. Returns the
 * remaining read-only labels from the runner.
 *
 * You must authenticate using an access token with the
 * `admin:org` scope to use this endpoint.
 * If the repository is private, you must use an access token
 * with the `repo` scope.
 * GitHub Apps must have the `administration` permission for repositories and
 * the `organization_self_hosted_runners` permission for organizations.
 * Authenticated users must have
 * admin access to repositories or organizations, or the `manage_runners:enterprise` scope for
 * enterprises, to use these endpoints.
 */
class ActionsRemoveAllCustomLabelsFromSelfHostedRunnerForOrg extends Request
{
	protected Method $method = Method::DELETE;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/actions/runners/{$this->runnerId}/labels";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $runnerId Unique identifier of the self-hosted runner.
	 */
	public function __construct(
		protected string $org,
		protected int $runnerId,
	) {
	}
}