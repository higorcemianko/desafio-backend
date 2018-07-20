<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >

    <title>Tickets - NeoAssist</title>
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              
              <li class="nav-item">
                <a style="font-size: 25px" class="nav-link" href="" onclick="return classificaTickets();" ><b>Classificar Tickets</b></a>
              </li>
              <li class="nav-item">
                <a style="font-size: 25px" class="nav-link" href="consulta.html"><b>Consultar Tickets</b></a>
              </li>
              
            </ul>
          </div>
        </nav>
      </div>
   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script>
      function classificaTickets() {
        /*$.ajax({
           url:'classifica.php',
           complete: function (response) {
              alert(response.responseText);
           },
           error: function () {
               alert('Erro');
           }
        });  
        return false;*/
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;

                alert(this.responseText);
            }
        };
        xmlhttp.open("GET", "classifica.php", true);
        xmlhttp.send();
      }
    </script>
    <script src="bootstrap/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>