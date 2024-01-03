<?php

namespace Tonning\Github\Requests\Packages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * packages/get-all-package-versions-for-package-owned-by-authenticated-user
 *
 * Lists package versions for a package owned by the authenticated user.
 *
 * To use this endpoint, you
 * must authenticate using an access token with the `read:packages` scope. If the `package_type`
 * belongs to a GitHub Packages registry that only supports repository-scoped permissions, your token
 * must also include the `repo` scope. For the list of GitHub Packages registries that only support
 * repository-scoped permissions, see "[About permissions for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#permissions-for-repository-scoped-packages)."
 */
class PackagesGetAllPackageVersionsForPackageOwnedByAuthenticatedUser extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/user/packages/{$this->packageType}/{$this->packageName}/versions";
    }

    /**
     * @param  string  $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName The name of the package.
     * @param  null|int  $page Page number of the results to fetch.
     * @param  null|string  $state The state of the package, either active or deleted.
     */
    public function __construct(
        protected string $packageType,
        protected string $packageName,
        protected ?int $page = null,
        protected ?string $state = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['page' => $this->page, 'state' => $this->state]);
    }
}
