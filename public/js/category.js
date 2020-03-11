$(document).ready(function(){
    var categories=["Mshop","Partneragenturen","PVG"];

    $.each(categories,function(index,value){
        var checkbox="<div style='display: inline-block !important;'><label style='display: inline-block; vertical-align: middle;' for="+value+">"+value+"</label><input style='width: 200% !important;' type='checkbox' id="+value+" value="+value+" name="+value+"></div>";
        $(".checkBoxContainer").append($(checkbox));
    })

});
