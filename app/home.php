<?php
require_once "config.php";
if(empty($_REQUEST['id'])){
  header("Location:index.php");
}
$sql = "SELECT * FROM bus INNER JOIN ligne ON bus.idligne=ligne.idLigne;";
$sql_t = "SELECT ticket.id,ticket.montant,ticket.date,ticket.montant,receveur.prenom,receveur.nom,bus.matricule,bus.idligne FROM ticket INNER JOIN receveur ON ticket.idReceveur=receveur.idReceveur INNER JOIN bus ON ticket.matriculeBus=bus.id WHERE receveur.idReceveur=".$_REQUEST['id']." ORDER BY ticket.date DESC;";
$result = mysqli_query($conn, $sql);
$result_t = mysqli_query($conn, $sql_t);
$status=true;
$class = "active-row";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<link rel="stylesheet" href="assets/css/home.css">
    <title>Home</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Synergie Transport</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Tickets</a>
              </li>
              
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
      <div class="col-md-12 container row">
        <div class="col-md-4 mt-2">
            <form action="create.php" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;border-radius: 10px;" method="post">
                <h4 class="text-center mt-3 m-3">Achat Ticket</h4>
                <div class="col-md-12 text-center m-3">
                    
                    <div class="offset-md-2 col-md-6">
                    <select class="form-select" name="montant" aria-label="Default select example" required>
                        <option value="100">100 Frcs</option>
                        <option value="150">150 Frcs</option>
                        <option value="200">200 Frcs</option>
                        <option value="250">250 Frcs</option>
                      </select>
                    </div>
                    <?php echo "<input type='hidden' name='idReceveur' value='".$_REQUEST['id']."'> "?>
                    
                </div>
                <div class="col-md-12 text-center m-3">
                    
                    <div class="offset-md-2 col-md-6">
                    <select class="form-select" name="matriculeBus" aria-label="Default select example" required>
                        <option value="">Bus --> ligne</option>
                        <?php 
                        if (mysqli_num_rows($result) > 0) {
                          // output data of each row
                          while ($row = mysqli_fetch_assoc($result)) {

                            if($status){
                              
                            }
                            echo "<option value='". $row["id"] ."'>BUS ". $row["matricule"]. " ---> " .$row["idLigne"] ."</option>";
                          }
                        }
                        ?>
                        
                      </select>
                    </div>
                    
                </div>
                <div class="offset-md-4  col-md-8">
                    <button type="submit" class="btn btn-outline-success mb-5">Acheter</button>
                </div>

            </form>
        </div>
        <div class="col-md-8 ">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Nº Ticket</th>
                        <th>Date</th>
                        <th>Receveur</th>
                        <th>Matricule Bus</th>
                        <th>Ligne</th>
                       
                    </tr>
                </thead>
                <tbody>
                  <?php
                    if (mysqli_num_rows($result_t) > 0) {
                      // output data of each row
                      while ($row = mysqli_fetch_assoc($result_t)) {
                        if($status){
                          $class = "active-row";
                        }
                        else{
                          $class = "";
                        }
                        echo "<tr class ='".$class."'><td>Nº ".$row['id']."</td><td>".$row['date']."</td><td>".$row['prenom']." ".$row['nom']."</td><td>M".$row['matricule']."</td><td>".$row['idligne']."</td></tr> ";
                        $status = !$status;
                      }
                    }
                  ?>
                    
                    
                    
                </tbody>
            </table>

        </div>
      </div>
</body>
</html>
<?php
mysqli_close($conn);
?>