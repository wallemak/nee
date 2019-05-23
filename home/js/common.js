(function()
{
	$.get("http://192.168.131.1:8090/all_nav",{},function(data,status){
		// console.log(data);
		new Vue({ el:"#mynav",data:{nav:data} });
		// new Vue({ el:'.sin_btn',data:{list:data.class_list} });

	},'jsonp');
	$(".nav_ico").click(function(){
		var name = $(".nav_ico img").eq(0).attr("name");
		switch(true)
		{
			case name=='list':
			$(".nav_ico img").eq(0).attr("src","images/clos.png");
			$(".nav_ico img").eq(0).attr("name","clos");
			$(".middle").css('display','inline-block');
			break;
			case name =='clos':
			$(".nav_ico img").eq(0).attr("src","images/list.png");
			$(".nav_ico img").eq(0).attr("name","list");
			$(".middle").css('display','none');
			break;
		}
	});
	
})();