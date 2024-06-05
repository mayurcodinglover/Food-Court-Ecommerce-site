/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidebar").style.width = "200px";
    document.getElementById("footer").style.float = "right";
    document.getElementById("body-sec").style.float="right";
    document.getElementById("main").style.marginLeft = "200px";
    document.getElementById("openbtn1").style.display="none";
    document.getElementById("body-sec").style.width = "80%";
    document.getElementById("footer").style.width = "80%";
    document.getElementById("title").style.marginLeft="225px";
    
  }
  
  /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.getElementById("openbtn1").style.display="block";
    document.getElementById("footer").style.float = "left";
    document.getElementById("footer").style.width = "95%";
    document.getElementById("body-sec").style.float="left";
    document.getElementById("body-sec").style.width = "95%";
    document.getElementById("title").style.marginLeft="35px";
    

  }