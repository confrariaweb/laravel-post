<?PHP

namespace ConfrariaWeb\Post\Repositories;

use ConfrariaWeb\Post\Models\PostCategory;
use ConfrariaWeb\Post\Contracts\PostCategoryContract;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class PostCategoryRepository implements PostCategoryContract
{
    use RepositoryTrait;

    function __construct(PostCategory $category)
    {
        $this->obj = $category;
    }
}
