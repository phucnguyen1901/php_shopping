<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function loadDoc() {
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("demo").innerHTML =
              this.responseText;
            }
          };
          xhttp.open("POST", "index.php", true);
          xhttp.send();
        }
    </script>
</head>
<body>
    
        <div id="demo">
        <h2>The XMLHttpRequest Object</h2>
        <button type="button" onclick="loadDoc()">Change Content</button>
        </div>


</body>
</html>