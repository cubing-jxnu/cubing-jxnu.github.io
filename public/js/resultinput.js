function deleteTr(nowTr){
        $(nowTr).parent().parent().remove();
        sortTable();
         // console.log($(nowTr));
        }
function mySort(arr){  
             
    for(var i=0; i<arr.length; i++){
        for(var j=i+1; j<arr.length; j++){
            if(parseFloat(arr[i].cells[2].innerHTML)>parseFloat(arr[j].cells[2].innerHTML)){
                var temp = arr[i];
                arr[i] = arr[j];
                arr[j] = temp;
            }
        }
        arr[i].cells[0].innerHTML=i+1;   
    }
}
function sortTable(){
    var countTr =  $("#result-body tr").length;
    //console.log(countTr);
    var allTr =$("#result-body tr");
    var trArr = [];
    for(var i=0; i<countTr; i++){ 
        trArr[i] = allTr[i];
    }
    //console.log("this");
    mySort(trArr);
    for(var i = 0; i < countTr; i++){
        console.log(trArr[i]);
        $("#result-body").append(trArr[i]);
    }
}
    function playerIdInput(thisInput){ 
        console.log($("#player-id").val());
        var havePlayer = false;
        var players = $("#result-body").children();
        for(var i = 0; i < players.length; i++){
            if(players[i].cells[1].innerHTML == $("#player-id").val()){
                havePlayer = true;
                $("#player-name").val(players.cells[2].innerHTML);
            }
        }
        if(havePlayer){
            $("#player-score").focus();
        }
        else{
            alert("not found!");
        }
    }
$("document").ready(function(){
        for(var i = 0; i < 10; i++){
            var newRow = "<tr><td></td><td>" + (i+1) +"</td><td>" + Math.random().toString(36).substr(2) + "</td><td></td></tr>";
            $("#result-body").append(newRow);
        }
        $("#player-name").attr("readonly", "readonly");




         $("#clearform").bind("click",function(){
            $("#player-name").val('');
            $("#player-score").val('');
         });
         $("#submit").bind("click",function(){
            var tip = $("#alertTip");
            var name_val = $("#player-name").val();
            var score_val = $("#player-score").val();
            tip.css("display","block");
            if(tip.hasClass("alert-success"))
                tip.removeClass("alert-success");
            if(tip.hasClass("alert-danger"))
                tip.removeClass("alert-danger");
            if(name_val=='' || score_val==''){
                tip.addClass("alert-danger")
                tip.html("请将信息填写完整");
                return;
            }
            var r = /^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$/;
            if(!r.test(score_val)){
                tip.addClass("alert-danger")
                tip.html("请按正确格式输入成绩！");
                return;
            }
            //alert(name_val+score_val);
            var newRow = "<tr><td></td><td>"+name_val+"</td><td>"+score_val+"</td><td><input type='button' class='btn btn-xs btn-danger' onclick='deleteTr(this)' value='delete'></td></tr>";
            $("#result-body").append(newRow);
            //newRow.appendTo("#result-body");
            $("#player-name").val('');
            $("#player-score").val('');
            tip.addClass("alert-success")
            tip.html("提交成功！");
            sortTable();
         });
            //console.log("this");
});
