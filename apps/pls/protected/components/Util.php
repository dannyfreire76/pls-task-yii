<?php

class Util {

    public static function fetchRss($url = '', $limit = null) {
        $items = [];

        if ( $url=='' ) {
            $url = 'latestUpdatesFeedUrl';
        }

        Feed::$userAgent = Yii::app()->params['curlUserAgent'];
        Feed::$cacheDir = Yii::app()->params['latestUpdatesFeedCacheDir'];
        Feed::$cacheExpire = Yii::app()->params['latestUpdatesFeedCacheExp'];
        $feed = Feed::loadRss(Yii::app()->params[$url]);

        if (!empty($feed)) {
            $cnt = 0;
            foreach ($feed->item as $item) {
                $cnt++;

                if ($limit && $cnt>$limit) {
                    break;
                }

                $more = ' <a class="read-more" href="' . $item->link . '" target="_blank">Read more</a>';
                $item->description = trim(str_replace(' [&#8230;]', '...' . $more, $item->description));
                $item->description = Util::stripEmpty(preg_replace('/The post.*appeared first on .*\./', '', $item->description), 'p');

                $items[] = $item;
            }
        }

        return $items;
    }

    public static function stripEmpty($str, $tag) {
        $pattern = "/<".$tag."[^>]*><\\/".$tag."[^>]*>/";
        return preg_replace($pattern, '', $str);
    }
}