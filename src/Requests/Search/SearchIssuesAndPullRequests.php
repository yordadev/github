<?php

namespace Tonning\Github\Requests\Search;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * search/issues-and-pull-requests
 *
 * Find issues by state and keyword. This method returns up to 100 results [per
 * page](https://docs.github.com/rest/guides/using-pagination-in-the-rest-api).
 *
 * When searching for
 * issues, you can get text match metadata for the issue **title**, issue **body**, and issue **comment
 * body** fields when you pass the `text-match` media type. For more details about how to receive
 * highlighted
 * search results, see [Text match
 * metadata](https://docs.github.com/rest/search/search#text-match-metadata).
 *
 * For example, if you want
 * to find the oldest unresolved Python bugs on Windows. Your query might look something like
 * this.
 *
 * `q=windows+label:bug+language:python+state:open&sort=created&order=asc`
 *
 * This query searches
 * for the keyword `windows`, within any open issue that is labeled as `bug`. The search runs across
 * repositories whose primary language is Python. The results are sorted by creation date in ascending
 * order, which means the oldest issues appear first in the search results.
 *
 * **Note:** For requests
 * made by GitHub Apps with a user access token, you can't retrieve a combination of issues and pull
 * requests in a single query. Requests that don't include the `is:issue` or `is:pull-request`
 * qualifier will receive an HTTP `422 Unprocessable Entity` response. To get results for both issues
 * and pull requests, you must send separate queries for issues and pull requests. For more information
 * about the `is` qualifier, see "[Searching only issues or pull
 * requests](https://docs.github.com/github/searching-for-information-on-github/searching-issues-and-pull-requests#search-only-issues-or-pull-requests)."
 */
class SearchIssuesAndPullRequests extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/search/issues';
    }

    /**
     * @param  string  $q The query contains one or more search keywords and qualifiers. Qualifiers allow you to limit your search to specific areas of GitHub. The REST API supports the same qualifiers as the web interface for GitHub. To learn more about the format of the query, see [Constructing a search query](https://docs.github.com/rest/search/search#constructing-a-search-query). See "[Searching issues and pull requests](https://docs.github.com/search-github/searching-on-github/searching-issues-and-pull-requests)" for a detailed list of qualifiers.
     * @param  null|string  $sort Sorts the results of your query by the number of `comments`, `reactions`, `reactions-+1`, `reactions--1`, `reactions-smile`, `reactions-thinking_face`, `reactions-heart`, `reactions-tada`, or `interactions`. You can also sort results by how recently the items were `created` or `updated`, Default: [best match](https://docs.github.com/rest/search/search#ranking-search-results)
     * @param  null|string  $order Determines whether the first search result returned is the highest number of matches (`desc`) or lowest number of matches (`asc`). This parameter is ignored unless you provide `sort`.
     * @param  null|int  $page Page number of the results to fetch.
     */
    public function __construct(
        protected string $q,
        protected ?string $sort = null,
        protected ?string $order = null,
        protected ?int $page = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['q' => $this->q, 'sort' => $this->sort, 'order' => $this->order, 'page' => $this->page]);
    }
}
