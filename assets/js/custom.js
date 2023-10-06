 /*

Author: MH RONY
CompunyName: Code Camp BD
Facebook Profile: https://www.facebook.com/mh.rony.dhanvi
GitHub Link: https://github.com/dev-mhrony
Youtube Channel: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
Personal Website: https://developerrony.com
Video Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw


*/   function htmlbodyHeightUpdate(){
		var height3 = $( window ).height()
		var height1 = $('.nav').height()+50
		height2 = $('.main').height()
		if(height2 > height3){
			$('html').height(Math.max(height1,height3,height2)+10);
			$('body').height(Math.max(height1,height3,height2)+10);
		}
		else
		{
			$('html').height(Math.max(height1,height3,height2));
			$('body').height(Math.max(height1,height3,height2));
		}
		
	}/*

Author: MH RONY
CompunyName: Code Camp BD
Facebook Profile: https://www.facebook.com/mh.rony.dhanvi
GitHub Link: https://github.com/dev-mhrony
Youtube Channel: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
Personal Website: https://developerrony.com
Video Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw


*/
	$(document).ready(function () {
		htmlbodyHeightUpdate()
		$( window ).resize(function() {
			htmlbodyHeightUpdate()
		});
		$( window ).scroll(function() {
			height2 = $('.main').height()
  			htmlbodyHeightUpdate()
		});
	});


// Get the <datalist> and <input> elements.
var dataList = document.getElementById('json-datalist');
var input = document.getElementById('ajax');

// Create a new XMLHttpRequest.
var request = new XMLHttpRequest();
/*

Author: MH RONY
CompunyName: Code Camp BD
Facebook Profile: https://www.facebook.com/mh.rony.dhanvi
GitHub Link: https://github.com/dev-mhrony
Youtube Channel: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
Personal Website: https://developerrony.com
Video Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw


*/
// Handle state changes for the request.
request.onreadystatechange = function(response) {
  if (request.readyState === 4) {
    if (request.status === 200) {
      // Parse the JSON
      var jsonOptions = JSON.parse(request.responseText);
  
      // Loop over the JSON array.
      jsonOptions.forEach(function(item) {
        // Create a new <option> element.
        var option = document.createElement('option');
        // Set the value using the item in the JSON array.
        option.value = item;
        // Add the <option> element to the <datalist>.
        dataList.appendChild(option);
      });
      
      // Update the placeholder text.
      input.placeholder = "e.g. datalist";
    } else {
      // An error occured :(
      input.placeholder = "Couldn't load datalist options :(";
    }
  }
};/*

Author: MH RONY
CompunyName: Code Camp BD
Facebook Profile: https://www.facebook.com/mh.rony.dhanvi
GitHub Link: https://github.com/dev-mhrony
Youtube Channel: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
Personal Website: https://developerrony.com
Video Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw


*/