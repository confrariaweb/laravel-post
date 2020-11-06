<?PHP

namespace ConfrariaWeb\Post\Repositories;

use ConfrariaWeb\Post\Models\Post;
use ConfrariaWeb\Post\Contracts\PostContract;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class PostRepository implements PostContract
{
    use RepositoryTrait;

    function __construct(Post $post)
    {
        $this->obj = $post;
    }

    public function sync($obj, array $data)
    {
        if (isset($data['sections'])) {
            $obj->sections()->sync($data['sections']);
        }
        if (isset($data['categories'])) {
            $obj->categories()->sync($data['categories']);
        }
    }

}
