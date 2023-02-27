<?php
error_reporting(0);
 ?>   
<style>
.collapsible {
  background-color: #b3e7ff;
  color: #ff8080;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  
}

.active, .collapsible:hover {
  background-color: #ffffff;
}

.content {
  padding: 0 18px;
  display: none;
  overflow: hidden;
  background-color: #ffffff;
}
</style>
<div id="content">

<div class="row">


<article class="col-sm-12">


<button type="button" class="collapsible">PAK</button>
<div class="content">
 <?=$doc_pak;?>
 <?=$f_pak;?>
</div>

<button type="button" class="collapsible">SK JFA</button>
<div class="content">
<?=$doc_jfa;?>
 <?=$f_jfa;?>
</div>

<button type="button" class="collapsible">SK Inpassing</button>
<div class="content">
<?=$doc_inp;?>
 <?=$f_inp;?>
</div>
												
</article> 


</div>
								


</div><!-- /.row -->      

<script>
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
</script>
