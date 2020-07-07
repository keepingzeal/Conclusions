<?php
$url = 'https://www.youtube.com/watch?v=Y3JoefWFXis';
echo getUrlParam($url, 'v');
/**
 * 获取Url中的指定参数，仅支持?&类型得地址
 * @param string $url
 * @param string $param
 * @return boolean|mixed
 */
function getUrlParam($url = '', $param = '') {
    $url_path = parse_url($url);
    if (empty($url_path) || !isset($url_path['query']) || !$url_path['query']) {
        return false;
    }
    $data = [];
    foreach (explode('&', $url_path['query']) as $row) {
        $row = explode('=', $row);
        if (!is_array($row) || count($row) != 2) {
            continue;
        }
        $data[$row[0]] = $row[1];
    }
    if (!isset($data[$param])) {
        return false;
    }
    return $data[$param];
}