<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @SWG\Definition(definition="action_type",
     *     title="Action Type",
     *     type="string",
     *     enum={"conversation","closes","opens","resolves"},
     *     default="conversation"
     * )
     *
     * @SWG\Definition(definition="collectionLinks",
     *     type="object",
     *     @SWG\Property(property="first", type="string"),
     *     @SWG\Property(property="last", type="string"),
     *     @SWG\Property(property="prev", type="string"),
     *     @SWG\Property(property="next", type="string")
     * )
     *
     * @SWG\Definition(definition="collectionMeta",
     *     type="object",
     *     @SWG\Property(property="current_page", type="integer", format="int32"),
     *     @SWG\Property(property="from", type="integer", format="int32"),
     *     @SWG\Property(property="last_page", type="integer", format="int32"),
     *     @SWG\Property(property="path", type="string"),
     *     @SWG\Property(property="per_page", type="integer", format="int32"),
     *     @SWG\Property(property="to", type="integer", format="int32"),
     *     @SWG\Property(property="total", type="integer", format="int32")
     * )
     *
     */
}
