

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
 function show_hint($value,$id) {
    var element=document.getElementById("txthint");
    if ($value.length==0) {
      
     element.innerHTML=" too sort ";
     return;
    }
    else{
        var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       element.innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "ajax_test2.php?value="+$value+"&id="+$id, true);
    xmlhttp.send();
  }
    }

     
 

</script>
</head>
<body>
    <form action="" method="post">
        <p>Name: </p>
<input type="text" id="name" onkeyup="show_hint(this.value,this.id)">
<p id="txthint"></p>
<p>password: </p>
<input type="text" id="password" onkeyup="show_hint(this.value,this.id)">
<p id="txthint"></p>
    </form>

  
</body>
</html>
