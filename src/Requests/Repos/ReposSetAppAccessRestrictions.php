<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/set-app-access-restrictions
 *
 * Protected branches are available in public repositories with GitHub Free and GitHub Free for
 * organizations, and in public and private repositories with GitHub Pro, GitHub Team, GitHub
 * Enterprise Cloud, and GitHub Enterprise Server. For more information, see [GitHub's
 * products](https://docs.github.com/github/getting-started-with-github/githubs-products) in the GitHub
 * Help documentation.
 *
 * Replaces the list of apps that have push access to this branch. This removes
 * all apps that previously had push access and grants push access to the new list of apps. Only
 * installed GitHub Apps with `write` access to the `contents` permission can be added as authorized
 * actors on a protected branch.
 */
class ReposSetAppAccessRestrictions extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/branches/{$this->branch}/protection/restrictions/apps";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 * @param string $branch The name of the branch. Cannot contain wildcard characters. To use wildcard characters in branch names, use [the GraphQL API](https://docs.github.com/graphql).
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
		protected string $branch,
	) {
	}
}
