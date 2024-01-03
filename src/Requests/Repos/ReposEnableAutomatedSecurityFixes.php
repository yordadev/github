<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/enable-automated-security-fixes
 *
 * Enables automated security fixes for a repository. The authenticated user must have admin access to
 * the repository. For more information, see "[Configuring automated security
 * fixes](https://docs.github.com/articles/configuring-automated-security-fixes)".
 */
class ReposEnableAutomatedSecurityFixes extends Request
{
	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/automated-security-fixes";
	}


	/**
	 * @param string $owner The account owner of the repository. The name is not case-sensitive.
	 * @param string $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
	 */
	public function __construct(
		protected string $owner,
		protected string $repo,
	) {
	}
}