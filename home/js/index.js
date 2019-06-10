(function()
{
	$.get("https://www.tianqiapi.com/api/",{version:'v6'},function(data,status)
	{
		console.log(data);
		new Vue({el:"#weather",data:{wea:data} });
		// new Vue({ el:"#mynav",data:{nav:data} });

	});
	// $.post("http://apis.juhe.cn/simpleWeather/query",data:{key:f81789f34e197c6cfd1429a2c3a04aaf,city:})
	// 
	// 
	function mytime()
	{
		var time=document.getElementById('time');
		var mydate=new Date();
	    var y=mydate.getFullYear();
	    var m=(mydate.getMonth()+1)<10? '0'+(mydate.getMonth()+1):mydate.getMonth()+1;
	    var d=mydate.getDate()<10? '0'+mydate.getDate():mydate.getDate();
	    var h=mydate.getHours()<10? '0'+mydate.getHours():mydate.getHours();
	    var min=mydate.getMinutes()<10? '0'+mydate.getMinutes():mydate.getMinutes();
	    var s=mydate.getSeconds()<10? '0'+mydate.getSeconds():mydate.getSeconds();

	    time.innerHTML = y+'/'+m+'/'+d+','+h+':'+min+':'+s;
	    setTimeout(mytime,1000);
    }
    mytime();


})();