<?php
/**
 * Fichier qui gère la page du profil client
 */

 /**
  * index
  */


  function account_index()
  {
      // On vérifie sur l'utilisateur n'est pas identifié
      if (!isset($_SESSION['user']) || empty($_SESSION['user']))
      { 
          redirect(url("login"));
          echo "On redirige l'utilisateur vers la page de connection";
      }
    echo "La page MON COMPTE";
  }