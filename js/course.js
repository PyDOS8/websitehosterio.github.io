function search(){
  var courseNameValue = document.getElementById("courseUrl").value;
  var xhttp = new XMLHttpRequest();
  xttp.onChangeState = function(){ // Function to be executed every time the status of the xhttp request changes
    if(this.readyState == 4 && this.status == 200){  //Check if response state is ready and exists
      document.getElementById("student-courses").innerHTML = "<h1>" + xhttp.responseText + "</h1>"; // Output the result
    }
  xhttp.open("GET", "course.txt"); //Student courses (Send request to API to retrieve information)
  xhttp.send(); // send request
  }

  //Run studentCourse.js to save course result
  var script= document.createElement("script");
  script.src = "js/studentCourse.js";
  document.body.appendChild(script);
}
