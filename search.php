<? include_once('template/header.php'); ?>
<script>
function showPoll(str){
  var xmlhttp;
  if (str.length==0){
    document.getElementById("pollName").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest){
    xmlhttp=new XMLHttpRequest();
  }
  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200){
      document.getElementById("pollName").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","getpoll.php?q="+str,true);
  xmlhttp.send();
}
</script>

<? include_once('template/nav.php'); ?>
<div id="search_form">
  <form action="">
    <br>Poll Name: <input type="text" id="poll_name"  onkeyup="showPoll(this.value)" ><br>
  </form>
</div>
<div id="results">
  <p>Results:<br><span id="pollName"></span></p>
</div>


<? include_once('template/footer.php'); ?>
