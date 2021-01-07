var flag = false;
var haveplay = false;
var pos=-1;
var timer;
var canRow=new Array();
function changename(){
	var text = $("#players").val();
	var Arr = text.split("\n");
	for(var i=0; i<Arr.length; i++)
		if(Arr[canRow[i]]==''){
		 	canRow.splice(i,1);
			i--;
		}
	pos=Math.floor(Math.random()*10)%canRow.length;
	//console.log(Arr.length);
	//console.log(Arr[0]);
	//console.log(Arr[1]);
	if(Arr.length == 0 || canRow.length == 0 ){
		clearInterval(timer);
		flag=false;
	}
	else{
		$("#winner-name").html(Arr[canRow[pos]]);
	}
}
function delRows(therow){
	canRow.splice(therow,1);
	
}
function roll(){
	if(haveplay == false){
		if($("#players").val()=='')
			return;
		haveplay = true;
		$("#onplayer").val($("#players").val());
		$("#players").attr("readonly","readonly");
		//$("#players").css("border:solid 1px red;");
		//$("#players").css("display","none");
		//$("#onplayer").css("display","block");
		//console.log(initPlayers);
		canRow.splice(0,canRow.length);
		var text = $("#players").val();
		var Arr = text.split("\n");
		for(var i=0; i<Arr.length; i++){
			canRow.push(i);
			//console.log(canRow[i]);
		}
	}
	//changename();
	 	if(flag==false){
	 		flag=true;
	 		timer=setInterval(changename,50);
	 	}
	 	else{
	 		flag=false;
	 		clearInterval(timer);
	 		if($("#winner-name").html()!='' && canRow.length != 0){
	 			delRows(pos);
				var winnertext = $("#winning").val();
				$("#winning").val(winnertext+$("#winner-name").html()+'\n');
	 		}
	 	}
}
function resetLuckyDraw(){
	clearInterval(timer);
	$("#winner-name").html("点击下方按钮抽奖");
	$("#players").removeAttr("readonly");
	//$("#players").css("background:transparent;");
	//$("#players").css("display","block");
	//$("#onplayer").css("display","none");
	$("#winning").val('');
	haveplay=false;
}





