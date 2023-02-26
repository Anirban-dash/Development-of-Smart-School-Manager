function saveDaata(){
    var name=document.getElementById("name").value;
    var class=document.getElementById("class").value;
    if(name=='' || name==" "){
        document.getElementById("name").focus();
        document.getElementById("name").style.border="red";
    }
}