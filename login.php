<?php
require_once 'config/configuration.php';
require_once 'config/connect.php';
require_once 'form/loginform.php';

?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags test-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="css/login.css" rel="stylesheet" />
    <title>Hello, world!</title>
  </head>
  <body <?= $error !== null ? 'data-error="1"' : ''; ?>>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-cool-blues btn-rounded position-absolute" data-bs-toggle="modal" data-bs-target="#exampleModal">
      LOGIN MODAL
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content border-3 border-info rounded">
          <div class="modal-header">
            <div class="imgcontainer">
              <img src="https://www.w3schools.com/howto/img_avatar2.png" alt="Avatar" class="avatar">
            </div>
              <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <?php
            if ($error !== null && !empty($error)){
                echo '<p class="error">';
                if(is_array($error)){
                    foreach ($error as $values){
                        echo $values.'<br>';
                    }
                } else {
                  echo $error;
                }
            }
            echo '</p>';               
            ?>
            <form method="POST">
            <div class="mb-3">
                <label for="pseudo" class="form-label">Pseudo</label>
                <input type="input" class="form-control" id="Inputpseudo"  name="pseudo" placeholder="MonPseudo" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" value="" required>
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme" >
                <label class="form-check-label" for="rememberme">Se souvenir de moi</label>
              </div>
                <button type="submit" class="btn btn-cool-blues btn-rounded position-absolute bottom-10 start-50 translate-middle-x"> Valider </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
    <script>
      if (typeof($('body').data('error')) != 'undefined') {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
          keyboard: false
        });
        myModal.toggle();
      }
    </script>

  </body>
</html>
