var preId;
var nextId;
var globalNodeArray = new Array();
function goto(id, t, con, nodesList){	
	globalNodeArray=nodesList.split('-');
	if(preId=='undefined')
	 preId = globalNodeArray[0];	
	if(con!=''){
	  index = globalNodeArray.indexOf(preId);
	  len = globalNodeArray.length;
		if(con=='pre'){
		   if(index!=0)	
		      id = globalNodeArray[index-1];
		   else
		      id = globalNodeArray[index];	 	
		}else{
	           if(index>=len-1) 
                      id = globalNodeArray[index];
                   else 
                     id =  globalNodeArray[index+1];
		}
	 preId = id;
	}
	//animate to the div id.
	$(".contentbox-wrapper").animate({"left": -($(id).position().left)}, 600);
	
	// remove "active" class from all links inside #nav
   	 $('#nav a').removeClass('active');
		
	// add active class to the current link
	 $(t).addClass('active');	
	 if(con==''){
	//Saving the current active id 
	preId = $(t).attr('cid');
	}
}
