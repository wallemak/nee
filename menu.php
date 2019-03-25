<?php

$appid = "wx2ca1b4d674248dbd";
$appsecret = "b7cfe3b30a50baa9564900fbf297aedd";
$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";

$output = https_request($url);
$jsoninfo = json_decode($output, true);

$access_token = $jsoninfo["access_token"];


$jsonmenu = '{
      "button":[
      {
            "name":"功能",
           "sub_button":[
            {
               "type":"view",
               "name":"百度",
               "url":"http://www.baidu.com"
            },
            {
               "type":"view",
               "name":"网易",
               "url":"http://www.163.com"
            },
            {
               "type":"view",
               "name":"获取地理位置",
               "url":"http://wd1700273.pro.wdcase.com/mak/address.php"
            },
            {
                "type":"view",
                "name":"本地天气",
                "url":"http://m.hao123.com/a/tianqi"
            }]
      

       },
       {
           "name":"关于我",
           "sub_button":[
            {
               "type":"view",
               "name":"烤天下",
               "url":"https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2ca1b4d674248dbd&redirect_uri=http://wd1700273.pro.wdcase.com/mak/bbq/index.php/bbq/index&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect"
            },
            {
               "type":"click",
               "name":"趣味游戏",
               "key":"游戏"
            },
            {
                "type":"click",
                "name":"讲个笑话",
                "key":"笑话"
            }]
       }]
 }';


$url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
$result = https_request($url, $jsonmenu);
var_dump($result);

function https_request($url,$data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}

?>