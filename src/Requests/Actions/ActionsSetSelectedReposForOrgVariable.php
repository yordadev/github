<?php

namespace Tonning\Github\Requests\Actions;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * actions/set-selected-repos-for-org-variable
 *
 * Replaces all repositories for an organization variable that is available
 * to selected repositories.
 * Organization variables that are available to selected
 * repositories have their `visibility` field set
 * to `selected`.
 *
 * You must authenticate using an access token with the `admin:org` scope to use this
 * endpoint.
 * If the repository is private, you must use an access token with the `repo` scope.
 * GitHub
 * Apps must have the `organization_actions_variables:write` organization permission to use
 * this
 * endpoint.
 * Authenticated users must have collaborator access to a repository to create, update,
 * or read variables.
 */
class ActionsSetSelectedReposForOrgVariable extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/actions/variables/{$this->name}/repositories";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param string $name The name of the variable.
	 */
	public function __construct(
		protected string $org,
		protected string $name,
	) {
	}
}
