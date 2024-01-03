<?php

namespace Tonning\Github\Requests\Repos;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * repos/list-commits
 *
 * **Signature verification object**
 *
 * The response will include a `verification` object that describes
 * the result of verifying the commit's signature. The following fields are included in the
 * `verification` object:
 *
 * | Name | Type | Description |
 * | ---- | ---- | ----------- |
 * | `verified` |
 * `boolean` | Indicates whether GitHub considers the signature in this commit to be verified. |
 * |
 * `reason` | `string` | The reason for verified value. Possible values and their meanings are
 * enumerated in table below. |
 * | `signature` | `string` | The signature that was extracted from the
 * commit. |
 * | `payload` | `string` | The value that was signed. |
 *
 * These are the possible values for
 * `reason` in the `verification` object:
 *
 * | Value | Description |
 * | ----- | ----------- |
 * |
 * `expired_key` | The key that made the signature is expired. |
 * | `not_signing_key` | The "signing"
 * flag is not among the usage flags in the GPG key that made the signature. |
 * | `gpgverify_error` |
 * There was an error communicating with the signature verification service. |
 * |
 * `gpgverify_unavailable` | The signature verification service is currently unavailable. |
 * |
 * `unsigned` | The object does not include a signature. |
 * | `unknown_signature_type` | A non-PGP
 * signature was found in the commit. |
 * | `no_user` | No user was associated with the `committer` email
 * address in the commit. |
 * | `unverified_email` | The `committer` email address in the commit was
 * associated with a user, but the email address is not verified on their account. |
 * | `bad_email` |
 * The `committer` email address in the commit is not included in the identities of the PGP key that
 * made the signature. |
 * | `unknown_key` | The key that made the signature has not been registered with
 * any user's account. |
 * | `malformed_signature` | There was an error parsing the signature. |
 * |
 * `invalid` | The signature could not be cryptographically verified using the key whose key-id was
 * found in the signature. |
 * | `valid` | None of the above errors applied, so the signature is
 * considered to be verified. |
 */
class ReposListCommits extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/repos/{$this->owner}/{$this->repo}/commits";
    }

    /**
     * @param  string  $owner The account owner of the repository. The name is not case-sensitive.
     * @param  string  $repo The name of the repository without the `.git` extension. The name is not case-sensitive.
     * @param  null|string  $sha SHA or branch to start listing commits from. Default: the repository’s default branch (usually `main`).
     * @param  null|string  $path Only commits containing this file path will be returned.
     * @param  null|string  $author GitHub username or email address to use to filter by commit author.
     * @param  null|string  $committer GitHub username or email address to use to filter by commit committer.
     * @param  null|string  $since Only show results that were last updated after the given time. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|string  $until Only commits before this date will be returned. This is a timestamp in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format: `YYYY-MM-DDTHH:MM:SSZ`.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $owner,
        protected string $repo,
        protected ?string $sha = null,
        protected ?string $path = null,
        protected ?string $author = null,
        protected ?string $committer = null,
        protected ?string $since = null,
        protected ?string $until = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'sha' => $this->sha,
            'path' => $this->path,
            'author' => $this->author,
            'committer' => $this->committer,
            'since' => $this->since,
            'until' => $this->until,
            'page' => $this->page,
        ]);
    }
}
