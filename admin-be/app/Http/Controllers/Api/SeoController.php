<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\SiteSetting;
use Carbon\Carbon;

class SeoController extends Controller
{
    /**
     * @OA\Get(
     *     operationId="Seo",
     *     path="/api/seo",
     *     tags={"Seo Setting"},
     *     @OA\Parameter(
     *         name="lang",
     *         in="query",
     *         required=true,
     *         description="Lang",
     *         @OA\Schema(
     *              type="string",
     *              example="ar",
     *         )
     *      ),
     *     @OA\Response(
     *     response="200",
     *      description="For Home Data as ['Seo']")
     * )
     */
    function index()
    {
        $SEO = [
            'title-meta' => [
                'Title_Template' => $this->setting('title-meta.Title_template'),
                'Title_Separator' => $this->setting('title-meta.Title_Separator'),
                'Meta_Description Template' => $this->setting('title-meta.meta_description_template')
            ],
            'Social' => [
                'Facebook_Page_URL' => $this->setting('social.Facebook_page_uRL'),
                'Twitter_Username' => $this->setting('social.Twitter_username'),
                'Instagram_URL' => $this->setting('social.Instagram_uRL'),
                'LinkedIn_URL' => $this->setting('social.LinkedIn_uRL'),
                'YouTube_URL' => $this->setting('social.YouTube_uRL')
            ],
            'open-graph' => [
                'title' => $this->setting('open-graph.title'),
                'description' => $this->setting('open-graph.description'),
                'url' => $this->setting('open-graph.url'),
                'image' => $this->setting('open-graph.image'),
                'image:secure_url' => $this->setting('open-graph.image:secure_url')

            ],

            'twitter' => [
                'cart' => $this->setting('twitter.cart'),
                'title' => $this->setting('twitter.title'),
                'description' => $this->setting('twitter.description'),
                'site' => $this->setting('twitter.site'),
                'image' => $this->setting('twitter.image'),

            ]
        ];
        return response()->json(compact(['SEO']), 200);

    }
    function setting($key)
    {
        $Setting = SiteSetting::where('key', $key)->first();
        return $Setting->value;
    }

}
