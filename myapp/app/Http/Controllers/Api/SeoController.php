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
            'title_meta' => [
                'Title_Template' => $this->setting('title-meta.Title_template'),
                'meta_keywords' => $this->setting('home.meta_keywords'),
                'Title_Separator' => $this->setting('title-meta.Title_Separator'),
                'Meta_Description_Template' => $this->setting('title-meta.meta_description_template')
            ],
            'Social' => [
                'Facebook_Page_URL' => $this->setting('social.Facebook_page_uRL'),
                'Twitter_Username' => $this->setting('social.Twitter_username'),
                'Instagram_URL' => $this->setting('social.Instagram_uRL'),
                'LinkedIn_URL' => $this->setting('social.LinkedIn_uRL'),
                'YouTube_URL' => $this->setting('social.YouTube_uRL')
            ],
            'open_graph' => [
                'title' => $this->setting('open-graph.title'),
                'description' => $this->setting('open-graph.description'),
                'url' => $this->setting('open-graph.url'),
                'image' =>  str_replace("\\", "/",url('storage/'.$this->setting('open-graph.image')) ),
                'image:secure_url' => $this->setting('open-graph.image:secure_url')

            ],

            'twitter' => [
                'card' => $this->setting('twitter.cart'),
                'title' => $this->setting('twitter.title'),
                'description' => $this->setting('twitter.description'),
                'site' => $this->setting('twitter.site'),
                'image' => str_replace("\\", "/",url('storage/'.$this->setting('twitter.image')) ),

            ]
        ];
        return response()->json(compact(['SEO']), 200);

    }
    function setting($key)
    {
        $Setting = SiteSetting::where('key',"like","%". $key."%")->first();
        return isset($Setting->value)?$Setting->value:"";
    }

}
