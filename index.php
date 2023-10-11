<!--
This is a website that will tell users about overdue work, get teacher feedback, and allow users to submit work as a file or a link
-->

<!DOCTYPE HTML>
<html>
  <head>
    <title>WebsiteHosterIO</title>
    <link rel="stylsheet" href="css/nav.css"/>
  </head> 
  <body>
   <noscript>This website uses JavaScript to read user input, change into file/link, and submit link/file</noscript>

    <!-- Navigation Bar -->
    <nav class="nav">
      <ul>
	      <?php 
		if(!$_COOKIE["username"]){
			echo '<li><a href="login.php">Login to your school account</a></li>';
		}else{
			echo '<h1>Welcome ' .$_COOKIE["username"] . "</h1>";
			echo '<li><a href="logout.php">Logout of your school account</a></li>';
		}
	      ?>
	      <li><a href="mailto:emullall9603@hwdsb.on.ca">Contact Me (Work)</a></li>
       	      <li><a href="mailto:eTmullall@outlook.com">Contact Me (Home)</a></li>
              <li><a href="https://github.com/WebsiteHosterio/websitehosterio.github.io/">View Source Code</a></li>
     	      <li><a href="javascript:window.location.reload()">Reload Page</a></li>
       </ul>
      
    	 <!-- Upload Section -->
     	<div class="upload">
		<h1>Upload Files here</h1>
       		<h2>Choose File and course URL:</h2>
       		<form action="upload.php">
        	<input type="file" id="fileChosen"></input>
         	<br/>
         	<input type="url" placeholder="Enter course URL > " value="" id="courseUrl"></input>
         	<!-- Upload Type and submission -->
         	<h2>Upload Type:</h2>
         	<p>Upload as:</p>
         	<input type="checkbox" id="uploadFile">File</input>
         	<input type="checkbox" id="uploadLink">Link</input>
         	<br/>
         	<input type="submit" value="Submit Work"></input>
      	</form>
    </div>

    <!-- Div to search for courses -->
    <div class="search-nav">
	    <form action="javascript:search();">
          	<input type="search" value="" placeholder="Enter a course name" id="courseName" class="searchCourseURL"> 
          	<input type="submit" value="Search for course" class="searchCourseURLButton">
        	</form>
    </div>
    
    <!-- Div for course info -->
    <div class="course-info" id="course-info">
	    <!-- Courses -->
      	    <div class="student-courses" id="student-courses">
        	<h1>Your Courses</h1>
        	<p>The courses you chose will go here</p>
        	<p>To get a specific course enter the course name in the search bar above</p>
	    </div>
	    <!-- Feedback Section -->
	    <div class="course-feedback" id="course-feedback">
		    <!-- Div for marks -->
        	    <div class="marks" id="marks">                                                                                
					<p>Marks will go here</p>
		    </div>

        	    <!-- Feedback -->
		    <div class="feedback" id="feedback">
			    <p>Teacher feedback will go here</p>
        	    </div>
      	    </div>
    	</div>
    </nav>
	  
    <!-- 
	  JavaScript and PHP code for school stuff(APIs, Course Info, Marks, Notifications etc) 
    -->
    <script src="js/feedback.js"></script> <!-- JavaScript code to get feedback -->
    <script src="js/course.js"></script>   <!-- JavaScript code to get course info -->
    <?php include("overdue.php")?>         <!-- PHP code to output overdue work -->
    <script src="js/overdue.js"></script>  <!-- JavaScript code to send request to server to get info about overdue work -->
    <?php include("notify.php")?>          <!-- PHP code to notify student -->
    <script src="studentCourse.js"></script> <!-- JavaScript code to store students courses -->
    <script src="js/storeAccount.js"></script> <!-- JavaScript code to store students account -->
    <script src="js/searchCourses.js"></script> <!-- JavaScript code to search for courses -->

    <!-- JavaScript code to check if cookies are enabled -->
    <script>
	    if(!navigator.cookiesEnabled){
		    var notCookieEnabled = document.createElement("p");
		    notCookieEnabled.innerText = "To ensure that information is proerply saved please enable cookies!";
	    	    notCookieEnabled.style.position = "absolute";
		    notCookieEnabled.style.left = "50%";
		    notCookieEnabled.style.top = "100%";
	    	    document.body.appendChild(notCookieEnabled);
	    }else{
		    var cookieEnabledMes = document.createElement("p");
		    cookieEnabledMes.innerText = "This website uses cookies to store information";
		    cookiesEnabled.style.position = "absolute";
		    cookiesEnabled.style.left = "50%";
		    cookiesEnabled.style.top = "100%";
	    }
    </script>
	  
    <!-- PHP and JavaScript code for non-school stuff -->
    <?php include("404.php")?>    <!-- 404 code -->
 </body>
</html>
