<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/set-github-actions-permissions-organization
 *
 * Sets the GitHub Actions permissions policy for repositories and allowed actions and reusable
 * workflows in an organization.
 *
 * You must authenticate using an access token with the `admin:org`
 * scope to use this endpoint. GitHub Apps must have the `administration` organization permission to
 * use this API.
 */
class ActionsSetGithubActionsPermissionsOrganization extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/actions/permissions";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $org,
	) {
	}
}
