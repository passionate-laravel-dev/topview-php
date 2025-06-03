<?php

namespace Passionatelaraveldev\Topview;

use Passionatelaraveldev\Topview\API\AvatarMarketingVideo;
use Passionatelaraveldev\Topview\API\BaseApiClient;
use Passionatelaraveldev\Topview\API\GeneralQuery;
use Passionatelaraveldev\Topview\API\ProductAvatar;
use Passionatelaraveldev\Topview\API\Scraper;
use Passionatelaraveldev\Topview\API\Upload;
use Passionatelaraveldev\Topview\API\VideoAvatar;

class Topview
{
    protected BaseApiClient $client;

    public function __construct(
        string $topview_uid,
        string $topwview_api_key,
        ?string $baseUrl = 'https://api.topview.ai'
    ) {
        $this->client = new BaseApiClient($topview_uid, $topwview_api_key, $baseUrl);
    }

    /**
     * avatar marketing video
     */
    public function avatarMarketingVideo(): AvatarMarketingVideo {
        return new AvatarMarketingVideo($this->client);
    }

    /**
     * general querys
     */
    public function generalQuery(): GeneralQuery {
        return new GeneralQuery($this->client);
    }

    /**
     * product avatar
     */
    public function productAvatar(): ProductAvatar {
        return new ProductAvatar($this->client);
    }

    /**
     * scraper
     */
    public function scraper(): Scraper {
        return new Scraper($this->client);
    }

    /**
     * upload
     */
    public function upload(): Upload {
        return new Upload($this->client);
    }

    /**
     * video avatar
     */
    public function videoAvatar() : VideoAvatar {
        return new videoAvatar($this->client);
    }
}
