function openPage(evt, name) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(name).style.display = "block";
  evt.currentTarget.className += " active"}


  var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
} 

  var URL = window.URL || window.webkitURL;

  var input = document.getDocumentById("input")
  var preview = document.getDocumentById("preview");
  
  // When the file input changes, create a object URL around the file.
  input.addEventListener('change', function () {
      preview.src = URL.createObjectURL(this.files[0]);
  });
  
  // When the image loads, release object URL
  preview.addEventListener('load', function () {
      URL.revokeObjectURL(this.src);
      
      alert('jQuery code here. W: ' + this.width + ', H: ' + this.height);
  });
