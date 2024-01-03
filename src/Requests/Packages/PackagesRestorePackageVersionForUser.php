<?php

namespace Tonning\Github\Requests\Packages;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * packages/restore-package-version-for-user
 *
 * Restores a specific package version for a user.
 *
 * You can restore a deleted package under the
 * following conditions:
 *   - The package was deleted within the last 30 days.
 *   - The same package
 * namespace and version is still available and not reused for a new package. If the same package
 * namespace is not available, you will not be able to restore your package. In this scenario, to
 * restore the deleted package, you must delete the new package that uses the deleted package's
 * namespace first.
 *
 * To use this endpoint, you must authenticate using an access token with the
 * `read:packages` and `write:packages` scopes. In addition:
 * - If the `package_type` belongs to a
 * GitHub Packages registry that only supports repository-scoped permissions, your token must also
 * include the `repo` scope. For the list of these registries, see "[About permissions for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#permissions-for-repository-scoped-packages)."
 * -
 * If the `package_type` belongs to a GitHub Packages registry that supports granular permissions, you
 * must have admin permissions to the package whose version you want to restore. For the list of these
 * registries, see "[About permissions for GitHub
 * Packages](https://docs.github.com/packages/learn-github-packages/about-permissions-for-github-packages#granular-permissions-for-userorganization-scoped-packages)."
 */
class PackagesRestorePackageVersionForUser extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/users/{$this->username}/packages/{$this->packageType}/{$this->packageName}/versions/{$this->packageVersionId}/restore";
    }

    /**
     * @param  string  $packageType The type of supported package. Packages in GitHub's Gradle registry have the type `maven`. Docker images pushed to GitHub's Container registry (`ghcr.io`) have the type `container`. You can use the type `docker` to find images that were pushed to GitHub's Docker registry (`docker.pkg.github.com`), even if these have now been migrated to the Container registry.
     * @param  string  $packageName The name of the package.
     * @param  string  $username The handle for the GitHub user account.
     * @param  int  $packageVersionId Unique identifier of the package version.
     */
    public function __construct(
        protected string $packageType,
        protected string $packageName,
        protected string $username,
        protected int $packageVersionId,
    ) {
    }
}
