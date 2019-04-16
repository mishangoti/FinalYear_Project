<div class="stick">
	<div>
		<center><h3 style="color: #999"><!-- Here You Will Get Result --></h3></center>
	</div>
</div>
<!-- <script>
	$(document).ready(function() {

	  $('#submit').click(function(e) {
	    e.preventDefault();
	    var file = $('#file').val();

	    $(".error").remove();

	    if (file == '') {
	      $('#message').after('<span class="error" style="color: red">This field is required</span>');
	    }else{

	    }

	  });

	});
</script> -->
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>