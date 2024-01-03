<?php

namespace Tonning\Github\Requests\Repos;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * repos/create-pages-site
 *
 * Configures a GitHub Pages site. For more information, see "[About GitHub
 * Pages](/github/working-with-github-pages/about-github-pages)."
 *
 * To use this endpoint, you must be a
 * repository administrator, maintainer, or have the 'manage GitHub Pages settings' permission. A token
 * with the `repo` scope or Pages write permission is required. GitHub Apps must have the
 * `administration:write` and `pages:write` permissions.
 */
class ReposCreatePagesSite extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/repos/{$this->owner}/{$this->repo}/pages";
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