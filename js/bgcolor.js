var i=0;

function divchange()
{
var divtag=document.getElementById("div1");
var bgcolor= ["#FE5C5C","#FE3F3F","#FE2323","#C00101"];
divtag.style.backgroundColor=bgcolor[i];
i = (i+1)%bgcolor.length;
}

setInterval(divchange, 5000);
