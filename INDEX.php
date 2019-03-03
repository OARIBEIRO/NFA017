<?php
  if (isset($_POST['envoyerMessage']) ) {
    // code...
    $nom = htmlentities($_POST['nom'], ENT_QUOTES);
    $mail = htmlentities($_POST['mail'], ENT_QUOTES);
    $objet = htmlentities($_POST['objet'], ENT_QUOTES);
    $message = htmlentities($_POST['message'], ENT_QUOTES);

    $erreurs  = array();

    if (empty($nom)) {
      // code...
      $erreurs['nom'] = "Le nom est vide";
    }
    if (empty($mail)) {
      // code...
      $erreurs['mail'] = "Le mail est vide";
    }
    if (empty($objet)) {
      // code...
      $erreurs['objet'] = "L'objet de votre message est vide";
    }
    if (empty($message)) {
      // code...
      $erreurs['message'] = "Le message est vide";
    } // ok
    if (empty($erreurs)) {
      $to = "ribeirooscaralex@gmail.com";
      $header = "From : " .$mail;
      mail($to, $objet, $message, $header);
    }
  }

?>

     <form action="" method="post">
        <fieldset>
            <legend>Contactez-moi</legend>
            <?php
              if (isset($erreurs) && array_key_exists('nom', $erreurs)) {
                echo $erreurs['nom'];

              }
             ?> <br/>
            <label name="nom">Nom</label>
            <input type="text" name="nom" value="<?php if (isset($nom)) {echo $nom;} ?>">
            <br/>
            <label name="mail">Adresse mail</label>
            <input type="mail" name="mail" value="<?php if (isset($mail)) {echo $mail;} ?>">>
            <?php
              if (isset($erreurs) && array_key_exists('mail', $erreurs)) {
                echo $erreurs['mail'];

              }
              if (preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#i', $mail)) {
                echo 'Cet email est correct.';
              } else {
                  echo 'Cet email a un format non adapté.';
              }
             ?>
            <br/>
            <label name="objet">Objet</label>
            <input type="text" name="objet" value="<?php if (isset($objet)) {echo $objet;} ?>">
            <?php
              if (isset($erreurs) && array_key_exists('objet', $erreurs)) {
                echo $erreurs['objet'];

              }

             ?>
            <br/>
            <label name="message">Message</label>
            <textarea name="message" rows="10" cols="20"></textarea>
            <?php
              if (isset($erreurs) && array_key_exists('message', $erreurs)) {
                echo $erreurs['message'];

              }
             ?>
            <br/>
            <input type="submit" value="Envoyer" name="envoyerMessage"></input>

        </fieldset>
     </form>
