<?php
require_once "address.class.php";
$jssdk = new JSSDK("wx2ca1b4d674248dbd", "b7cfe3b30a50baa9564900fbf297aedd");
$signPackage = $jssdk->GetSignPackage();
?>

<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
        // 所有要调用的 API 都要加到这个列表中
        'checkJsApi',
        'openLocation',
        'getLocation'
      ]
});

wx.ready(function () {
	wx.checkJsApi({
    jsApiList: [
        'getLocation'
    ],
    success: function (res) {
        // alert(JSON.stringify(res));
        // alert(JSON.stringify(res.checkResult.getLocation));
        if (res.checkResult.getLocation == false) {
            alert('你的微信版本太低，不支持微信JS接口，请升级到最新的微信版本！');
            return;
        }
    }
});

wx.getLocation({
    success: function (res) {
        var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
        var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
        var speed = res.speed; // 速度，以米/每秒计
        var accuracy = res.accuracy; // 位置精度
        alert(res.latitude+"\r\n"+res.longitude+"\r\n"+res.speed+"\r\n"+res.accuracy);
    },

    cancel: function (res) {
        alert('用户拒绝授权获取地理位置');
    }
});

});

</script>