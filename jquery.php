<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
 $("img").click(function(){
  //alert($(this).attr('id'));
  var m=$(this).attr('id');
  window.location.href="imagedetails.php?pid="+m;
 });
});

</script>