<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0035)http://stmaryshyd.edu.pk/about.html -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title>Welcome to St.Mary's School</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <link href="css/about.css" rel="stylesheet" type="text/css" media="screen">
		<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen">
    <script type="text/javascript" src="js/linkverifierhelper.js"></script>
	
	</head>
    <body>
		<div id="wrap">
			<div id="header">
				
				<div id="menu">
					<ul>
						<li><a href="index.html"><font color="#FAAF25">Home</font></a></li>
						<li><a href="about.html">About Us</a></li>
						<li><a href="vision.html">Vision</a></li>
                        <li><a href="facilities.html">Facilities</a></li>
                                       
                         <li><a href="gallery.html">Gallery</a></li>
                         
                         <li><a href="activities.html">Activities</a></li>
                        <li><a href="news.html">Latest News </a></li>
						  <li><a href="career.html">Career </a></li>
						    
                      
						
                       
                        <li><a href="contact.html">Contact Us</a></li>
					</ul>
				</div>
			</div>
			</div>
			
			<div id="intro">
           
				<!--<h2> <img src="images/about_banner.jpg">
			</h2>--></div>
			<div class="razd_bor"></div>
			<div class="prew_box prew_bg1">				
				
				<div id="slider-wrapper">        
           
			        
        </div>

<script type="text/javascript" src="js/jquery-1.4.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
				
			</div>
			<div class="prew_bot">

     <script language="JavaScript1.2">

/*
Cross browser Marquee script- © Dynamic Drive (www.dynamicdrive.com)
For full source code, 100's more DHTML scripts, and Terms Of Use, visit http://www.dynamicdrive.com
Credit MUST stay intact
*/

//Specify the marquee's width (in pixels)
var marqueewidth="1000px"
//Specify the marquee's height
var marqueeheight="25px"
//Specify the marquee's marquee speed (larger is faster 1-10)
var marqueespeed=1
//configure background color:
var marqueebgcolor="#"
//Pause marquee onMousever (0=no. 1=yes)?
var pauseit=1

//Specify the marquee's content (don't delete <nobr> tag)
//Keep all content on ONE line, and backslash any single quotations (ie: that\'s great):


var marqueecontent='<nobr><font face="Arial">  <img src="images/new.gif" width="20">&nbsp; <b>School Final Exams Result, 2014 </b> will be announced on Thursday, March 28th, 2014  <a href="upcoming.html">Click Here</a> for details.&nbsp;&nbsp;  <img src="images/st.gif" width="20">&nbsp; Exhibition Photos added in the gallery <a href="exhibition/exhibition.html">Click Here</a> click here to see the photos.&nbsp;&nbsp;  <img src="images/st.gif" width="20">&nbsp; New pictures of Class 11th & 12th added in the Photo Gallery <a href="11_and_12_class/11_and_12_class.html">Click Here</a> to see the pictures.&nbsp;&nbsp; <img src="images/st.gif" width="20">&nbsp; Group photo of teachers uploaded in photo gallery  <a href="teaching_staff/teaching_staff.html">Click Here</a> to see the group photo. <img src="images/st.gif" width="20">&nbsp; Pictures of sports activities have been uploaded <a href="sports/sports.html">Click Here</a> to check the gallery.</font></nobr>'                             
 



////NO NEED TO EDIT BELOW THIS LINE////////////
marqueespeed=(document.all)? marqueespeed : Math.max(1, marqueespeed-1) //slow speed down by 1 for NS
var copyspeed=marqueespeed
var pausespeed=(pauseit==0)? copyspeed: 0
var iedom=document.all||document.getElementById
if (iedom)
document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100px;left:-9000px">'+marqueecontent+'</span>')
var actualwidth=''
var cross_marquee, ns_marquee

function populate(){
if (iedom){
cross_marquee=document.getElementById? document.getElementById("iemarquee") : document.all.iemarquee
cross_marquee.style.left=parseInt(marqueewidth)+8+"px"
cross_marquee.innerHTML=marqueecontent
actualwidth=document.all? temp.offsetWidth : document.getElementById("temp").offsetWidth
}
else if (document.layers){
ns_marquee=document.ns_marquee.document.ns_marquee2
ns_marquee.left=parseInt(marqueewidth)+8
ns_marquee.document.write(marqueecontent)
ns_marquee.document.close()
actualwidth=ns_marquee.document.width
}
lefttime=setInterval("scrollmarquee()",20)
}
window.onload=populate

function scrollmarquee(){
if (iedom){
if (parseInt(cross_marquee.style.left)>(actualwidth*(-1)+8))
cross_marquee.style.left=parseInt(cross_marquee.style.left)-copyspeed+"px"
else
cross_marquee.style.left=parseInt(marqueewidth)+8+"px"

}
else if (document.layers){
if (ns_marquee.left>(actualwidth*(-1)+8))
ns_marquee.left-=copyspeed
else
ns_marquee.left=parseInt(marqueewidth)+8
}
}

if (iedom||document.layers){
with (document){
document.write('<table border="0" cellspacing="0" cellpadding="0"><td>')
if (iedom){
write('<div style="position:relative;width:'+marqueewidth+';height:'+marqueeheight+';overflow:hidden">')
write('<div style="position:absolute;width:'+marqueewidth+';height:'+marqueeheight+';background-color:'+marqueebgcolor+'" onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed">')
write('<div id="iemarquee" style="position:absolute;left:0px;top:0px"></div>')
write('</div></div>')
}
else if (document.layers){
write('<ilayer width='+marqueewidth+' height='+marqueeheight+' name="ns_marquee" bgColor='+marqueebgcolor+'>')
write('<layer name="ns_marquee2" left=0 top=0 onMouseover="copyspeed=pausespeed" onMouseout="copyspeed=marqueespeed"></layer>')
write('</ilayer>')
}
document.write('</td></table>')
}
}
</script><span id="temp" style="visibility:hidden;position:absolute;top:-100px;left:-9000px"><nobr><font face="Arial">  <img src="images/new.gif" width="20">&nbsp; <b>School Final Exams Result, 2014 </b> will be announced on Thursday, March 28th, 2014  <a href="http://stmaryshyd.edu.pk/upcoming.html">Click Here</a> for details.&nbsp;&nbsp;  
<img src="imagess/st.gif" width="20">&nbsp; Exhibition Photos added in the gallery <a href="http://stmaryshyd.edu.pk/exhibition/exhibition.html">Click Here</a> click here to see the photos.&nbsp;&nbsp;  <img src="images/st.gif" width="20">&nbsp; New pictures of Class 11th &amp; 12th added in the Photo Gallery <a href="http://stmaryshyd.edu.pk/11_and_12_class/11_and_12_class.html">Click Here</a> to see the pictures.&nbsp;&nbsp; <img src="images/st.gif" width="20">&nbsp; Group photo of teachers uploaded in photo gallery  <a href="http://stmaryshyd.edu.pk/teaching_staff/teaching_staff.html">Click Here</a> to see the group photo. <img src="images/st.gif" width="20">&nbsp; Pictures of sports activities have been uploaded <a href="http://stmaryshyd.edu.pk/sports/sports.html">Click Here</a> to check the gallery.</font></nobr></span><table border="0" cellspacing="0" cellpadding="0"><tbody><tr><td><div style="position:relative;width:1000px;height:25px;overflow:hidden"><div style="position:absolute;width:1000px;height:25px;background-color:#" onmouseover="copyspeed=pausespeed" onmouseout="copyspeed=marqueespeed"><div id="iemarquee" style="position: absolute; left: 76px; top: 0px;"><nobr><font face="Arial">  <img src="images/new.gif" width="20">&nbsp; <b>School Final Exams Result, 2014 </b> will be announced on Thursday, March 28th, 2014  <a href="http://stmaryshyd.edu.pk/upcoming.html">Click Here</a> for details.&nbsp;&nbsp;  <img src="images/st.gif" width="20">&nbsp; Exhibition Photos added in the gallery <a href="http://stmaryshyd.edu.pk/exhibition/exhibition.html">Click Here</a> click here to see the photos.&nbsp;&nbsp;  <img src="images/st.gif" width="20">&nbsp; New pictures of Class 11th &amp; 12th added in the Photo Gallery <a href="http://stmaryshyd.edu.pk/11_and_12_class/11_and_12_class.html">Click Here</a> to see the pictures.&nbsp;&nbsp; <img src="images/st.gif" width="20">&nbsp; Group photo of teachers uploaded in photo gallery  <a href="http://stmaryshyd.edu.pk/teaching_staff/teaching_staff.html">Click Here</a> to see the group photo. <img src="images/st.gif" width="20">&nbsp; Pictures of sports activities have been uploaded <a href="http://stmaryshyd.edu.pk/sports/sports.html">Click Here</a> to check the gallery.</font></nobr></div></div></div></td></tr></tbody></table>
     
			</div>
            <div id="wrap">
			<div id="content">
				
				<h3><a href="about.html#">A BRIEF HISTORY OF ST. MARY'S</a></h3>
				<div class="box_3col">
					<div class="col1">
						<p align="justify">
                        
<img style="float:left;padding:4px;" src="images/old.jpg" hieght="150px" width="150px">Having been established in 26th April, 1937, our history is quite interesting. Franciscan Sisters came to take over a small primary school with 50 children started by the Franciscan Fathers (ofm) in the Parish hall and two verandas.
It was functioning as St. Bonaventure's co-education. All of these children from the leading families were taken care of by the sisters till class five. In 1944 the number of boys had increased so much, that it was decided to separate them and have a girls' school which was started and named St. Mary's Girls School.<br> There were only 286 Hindu girls and 87 Muslim girls in 1947. At the time of independence in 1947 the number of students was reduced due to mass migration of Hindu families from Hyderabad.

                      </p>
					</div>
					<div class="col2">
						
						<p align="justify"> It was a worry some time for the sisters as in a few days the number of students was reduced from 347 students only 80.<br> In the following years a few Muslim girls came and slowly it came to increase.<br> The enrollment was back to normal. In 1950, the pupils were 450 in St. Mary's High School.<img style="float:left;padding:4px;" src="images/min_banner.jpg" hieght="180px" width="150px">
<br>
                       In 1951, the school was registered as a higher secondary school named Nazareth College and first year classes started. The college classes were                  9th ,10th, 11th &amp; 12th. Mother Teresa Redentore was the Principal who had the courage to meet the needs of the time as girls wanted to stay and study in                St. Mary's only.<br>
                        The building was extended and more classrooms were made.
                        
                        
						  </p>
</div>
					<div class="col3">
						<p align="justify">  The first year, the students in intermediate class were only 20. In 1952 there were 43 admissions and in 1954 there were 56. Over the years building was extended as the number of students increased.<br> St. Mary's school was nationalized in 1972 and remained under the Government till 1992. The Ethos of our school was changed in 20 years of nationalization time. The classes were filled with 90/100 students.<br>It was the tireless struggle of Sr. Philomena Harris to get the school back from the Government. She worked hard, making every effort to provide quality education to our girls as it was before when the sisters were incharge. <br>
            
                        <img style="float:left;padding:4px;" src="images/old1.jpg" hieght="150px" width="150px">
                        After her committed services from 1993 to 2000, she handed over to                       Sr. Catherine Gill, who is continuing to follow the traditions of her predecessors.
                       
                        
                        </p>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="clear"></div>
			</div>
            </div>
			<div id="footer">
				<div class="wid_center" style="padding-bottom: 20px;">
					<div class="foot_column4">
                        <div class="foot_col1">
                            <h4>SiteMap</h4>
                        </div>
                        <div class="foot_col2">
                            <h4>Contact Information</h4>
                        </div>
                        <div class="foot_col3">
                       		<h4>Students' Corner</h4>
                        </div>
                        <div class="foot_col4">
                            <h4>Follow Us</h4>
                        </div>
                        <div style="clear: both"></div>
                    </div>
					
					<div class="foot_column4 foot_bg">
                        <div class="foot_col1">
                            <ul class="ls">
                                <li><a href="message.html">Principal Message</a></li>
                              <li><a href="http://stmaryshyd.edu.pk/principal.html">Sr. Philomena Harris </a></li>
                                <li><a href="http://stmaryshyd.edu.pk/admission.html">Conduct &amp; Discipline</a></li>

                                <li><a href="http://stmaryshyd.edu.pk/hm.html">Head Mistresses</a></li>
                                
                                                                <li><a href="achievers.html">A-1 Achievers</a></li>
								
                            </ul>
                        </div>
                        <div class="foot_col2">
                            	<p>St. Mary's Convent Girls Higher Secondary School </p>
								<p>Hyderabad City</p>
								<p>Phone: 0223-642611</p>
								<p>Fax: 0000000000000</p>
								<p>E-mail:info@stmaryschoolhyd.com</p>
                                <p>Website:www.stmaryschoolhyd.com</p>
                        </div>
                        <div class="foot_col3">
                       		 <ul class="ls">
                                <li><a href="http://stmaryshyd.edu.pk/about.html#">Study Tips for Students</a></li>
                              
                                <li><a href="http://stmaryshyd.edu.pk/about.html#">Educational Software Links</a></li>
                                <li><a href="http://stmaryshyd.edu.pk/about.html#">How to Improve hand writing</a></li>
                                <li><a href="http://stmaryshyd.edu.pk/about.html#">Motivational Quotations</a></li>
                                
								<li><a href="http://stmaryshyd.edu.pk/about.html#">Student of the Year</a></li>
                            </ul>
						</div>
                        <div class="foot_col4">
	                        <div class="link1"><a href="http://stmaryshyd.edu.pk/contact.html">Send us feedback</a></div>
	                        <div class="link2"><a href="http://www.facebook.com/">Be a fan on Facebook</a></div>
	                       
	                        <div class="link4"><a href="http://www.twitter.com/">Follow us on Twitter</a></div>
                             <div class="link3"><a href="http://stmaryshyd.edu.pk/about.html#">Downloads</a></div>
                        </div>
                        <div style="clear: both"></div>
                    </div>
				</div>
				<div id="footer_bot">
					</div></div></div>
</body></html>