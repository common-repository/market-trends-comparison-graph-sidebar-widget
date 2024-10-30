 // Start form functions 
    function lmt_writeText (form) {
      var input_first_name = form.lmt_first_name.value;
      var input_second_name = form.lmt_second_name.value;
      var range = form.lmt_drop_down_range.value;
      var geo = form.lmt_drop_down_geo.value;

      var img_url ="http://trends.google.com/trends/viz?q="
          + input_first_name +','
          + input_second_name +
            "&date="
              + range +
                "&geo="
                  + geo +
                    "&graph=weekly_img&sort=0&sa=N";
      var img_link ="http://trends.google.com/trends/?q="
          + input_first_name +','
          + input_second_name +
            "&date="
              + range +
                "&geo="
                  + geo +
                  "&graph=weekly_img&sort=0&sa=N";

      var link_first_name ="http://trends.google.com/trends/?q="
          + input_first_name +
            "&date="
              + range +
                "&geo="
                  + geo +
                  "&graph=weekly_img&sort=0&sa=N";
      var link_second_name ="http://trends.google.com/trends/?q="
          + input_second_name +
            "&date="
              + range +
                "&geo="
                  + geo +
                  "&graph=weekly_img&sort=0&sa=N";
      document.getElementById("lmt_Gadget-Img").innerHTML="<a target='_blank' href=\""+img_link+"\" ... ><img src=\""+img_url+"\" ... ></a><br/ ><div id=\"lmt_Color-Index\"><a id=\"lmt_graph_line\" target='_blank' href=\""+img_link+"\" ... >Enlarge Image</a><a id =\"lmt_firstname\" target='_blank' href=\""+link_first_name+"\" ... >\""+input_first_name+"\"</a><a id=\"lmt_secondname\" target='_blank' href=\""+ link_second_name +"\" ... >\""+input_second_name+"\"</a></div>";

	return false;

  }
function settime() {
    var curtime = new Date();
    var curhour = curtime.getHours();
    var curmin = curtime.getMinutes();
    var cursec = curtime.getSeconds();
    var time = "";
    if(curhour == 0) curhour = 12;
    time = (curhour > 12 ? curhour - 12 : curhour) + ":" +
         (curmin < 10 ? "0" : "") + curmin + ":" +
         (cursec < 10 ? "0" : "") + cursec + " " +
         (curhour > 12 ? "PM" : "AM");

  document.lmt_myform.clock.value = time;
}