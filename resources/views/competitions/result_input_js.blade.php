<script>
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
    if($("#player-name").val() != ''){
        $("#player-score-0").focus();
    }
    else{
        var tip = $("#alertTip");
        tip.addClass("alert-danger");
        tip.html("未找到该选手");
    }
}

function nextResultInput(thisInput){
    // console.log($(thisInput).val());
    // var r = /^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$/;
    var r = /^(([0-9]*)|(:)|(\.))*$/;
    if(!r.test($(thisInput).val()) || $(thisInput).val() == ''){
        // tip.addClass("alert-danger");
        // tip.html("请按正确格式输入成绩！");
        // alert();
        return;
    }
    for(var i = 0; i < {{ $event->format->expected_solve_count }} - 1; i++){
        // console.log($(thisInput).attr('id') == $("#player-score-" + i).attr('id'));
        if($(thisInput).attr('id') == $("#player-score-" + i).attr('id')){
            $("#player-score-" + (i+1)).focus();
            
        }   
    }

    if($(thisInput).attr('id') == $("#player-score-" + ({{ $event->format->expected_solve_count }} - 1) ).attr('id')){
        scoring(); 
    }   
}
function scoring(){
    var scores = $(".player-scores");
    var maxScore = parseFloat($(scores[0]).val());
    var minScore = parseFloat($(scores[0]).val());
    var avgScore;
    var meanScore;
    var sumScore = 0;
    for(var i = 0; i < {{ $event->format->expected_solve_count }}; i++){
        // console.log($(scores[i]).val());
        if(parseFloat($(scores[i]).val()) > maxScore){
            maxScore = parseFloat($(scores[i]).val());
        }
        if(parseFloat($(scores[i]).val()) < minScore){
            minScore = parseFloat($(scores[i]).val());
        }
        sumScore += parseFloat($(scores[i]).val());
    }
    meanScore = sumScore / {{ $event->format->expected_solve_count }};
    avgScore = (sumScore - maxScore - minScore) / ({{ $event->format->expected_solve_count }} - 2);
    console.log("sum:" + sumScore);
    console.log("mean:" + meanScore);
    console.log("avg:" + avgScore);
}
$("document").ready(function(){
        // for(var i = 0; i < 50; i++){
        //     var newRow = "<tr><td></td><td>" + (i+1) +"</td><td>" + Math.random().toString(36).substr(2) + "</td><td></td></tr>";
        //     $("#result-body").append(newRow);
        // }
        $("#player-name").attr("readonly", "readonly");
        $("#player-id").focus();                        //聚焦在编号框



         // $("#clearform").bind("click",function(){
         //    $("#player-name").val('');
         //    $("#player-score").val('');
         // });
         // $("#submit").bind("click",function(){
         //    var tip = $("#alertTip");
         //    var name_val = $("#player-name").val();
         //    var score_val = $("#player-score").val();
         //    tip.css("display","block");
         //    if(tip.hasClass("alert-success"))
         //        tip.removeClass("alert-success");
         //    if(tip.hasClass("alert-danger"))
         //        tip.removeClass("alert-danger");
         //    if(name_val=='' || score_val==''){
         //        tip.addClass("alert-danger")
         //        tip.html("请将信息填写完整");
         //        return;
         //    }
         //    // var r = /^(([0-9]+\.[0-9]*[1-9][0-9]*)|([0-9]*[1-9][0-9]*\.[0-9]+)|([0-9]*[1-9][0-9]*))$/;
         //    // if(!r.test(score_val)){
         //    //     tip.addClass("alert-danger");
         //    //     tip.html("请按正确格式输入成绩！");
         //    //     return;
         //    // }
         //    //alert(name_val+score_val);
         //    var newRow = "<tr><td></td><td>"+name_val+"</td><td>"+score_val+"</td><td></td></tr>";
         //    $("#result-body").append(newRow);
         //    //newRow.appendTo("#result-body");
         //    $("#player-name").val('');
         //    $("#player-score").val('');
         //    tip.addClass("alert-success")
         //    tip.html("提交成功！");
         //    sortTable();
         // });
            //console.log("this");
});

</script>