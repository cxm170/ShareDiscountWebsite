$(document).ready(function()
{

var cnt
var cap
var imgvar
var idvar
var vimglinks
vimglinks= $("#id_link").val()
cap = 10
cnt = cap
    $("#search").click(function(){
		/*cap = $("#imgcnt").val()*/
		cap = cap -1
        $.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?",
        {
          tags: $("#searchterm").val(),
          tagmode: "any",
          format: "json",
           id: "94923549@N02"
        },
        function(data) {
          $.each(data.items, function(i,item){   
			$("<img/>").prependTo("#results").attr({
			id: "imgid" + cnt,
			src: item.media.m,
			alt: "" 
			});		
			cnt=cnt-1;
		
            if ( i == cap ) return false;
          })
		  
		// $(imgvar).click(function () {alert(document.getElementById("imgid1").src);});
		//  idvar = $(this).attr("id");
		 //idvar = "#"+"imgid1";//
		 //document.getElementById("imgid1").src
		 ,$("img").click(function () 
		 {

		 	//Jiwei commented out the following line
		 	// alert(document.getElementById(this.id).src);
			/*vimglinks=vimglinks+";"+document.getElementById(this.id).src;*/
			vimglinks=document.getElementById(this.id).src;
		 $("#id_link").val(vimglinks);
		 }),
		  $("#id_reset").click( function ()  {$("#id_link").val("");});
		  
        });

    });
	
 
});

function showhideflickrimg() {
	var targetdiv = document.getElementById("results");
	var togglebutton = document.getElementById("displayText");
 
	if(targetdiv.style.display == "block") {
    		targetdiv.style.display = "none";
		togglebutton.innerHTML = "show";
  	}
	else {
		targetdiv.style.display = "block";
		togglebutton.innerHTML = "hide";
	}
} 