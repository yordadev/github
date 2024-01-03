<?php

namespace Tonning\Github\Requests\Orgs;

use DateTime;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * orgs/update-webhook-config-for-org
 *
 * Updates the webhook configuration for an organization. To update more information about the webhook,
 * including the `active` state and `events`, use "[Update an organization webhook
 * ](/rest/orgs/webhooks#update-an-organization-webhook)."
 *
 * Access tokens must have the
 * `admin:org_hook` scope, and GitHub Apps must have the `organization_hooks:write` permission.
 */
class OrgsUpdateWebhookConfigForOrg extends Request implements HasBody
{
	use HasJsonBody;

	protected Method $method = Method::PATCH;


	public function resolveEndpoint(): string
	{
		return "/orgs/{$this->org}/hooks/{$this->hookId}/config";
	}


	/**
	 * @param string $org The organization name. The name is not case-sensitive.
	 * @param int $hookId The unique identifier of the hook. You can find this value in the `X-GitHub-Hook-ID` header of a webhook delivery.
	 */
	public function __construct(
		protected string $org,
		protected int $hookId,
	) {
	}
}
