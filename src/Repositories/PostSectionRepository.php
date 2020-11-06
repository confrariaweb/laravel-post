<?PHP

namespace ConfrariaWeb\Post\Repositories;

use ConfrariaWeb\Post\Models\PostSection;
use ConfrariaWeb\Post\Contracts\PostSectionContract;
use ConfrariaWeb\Vendor\Traits\RepositoryTrait;

class PostSectionRepository implements PostSectionContract
{
    use RepositoryTrait;

    function __construct(PostSection $section)
    {
        $this->obj = $section;
    }
}
