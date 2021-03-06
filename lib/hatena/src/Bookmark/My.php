<?php

namespace Revolution\Hatena\Bookmark;

use Revolution\Hatena\HatenaClient;

class My
{
    use HatenaClient;

    /**
     * @see http://developer.hatena.ne.jp/ja/documents/bookmark/apis/rest/my#get_my
     *
     * @param string $endpoint
     *
     * @return string
     */
    public function my(string $endpoint = 'http://api.b.hatena.ne.jp/1/my'): string
    {
        $res = $this->request($endpoint);

        return (string)$res->getBody();
    }
}
