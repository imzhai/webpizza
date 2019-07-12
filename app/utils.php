<?php
/**
 * Fichier de chargement automatique des scripts du répertoire "utils"
 */
// TEST si la constante UTILS_PATH n'est pas définie


if (!defined('UTILS_PATH'))
{
    define('UTILS_PATH',null);
}

 // Si UTILS_PATH n'est pas null
 // On scan le répertoire "utils" (fonction "scandir") si celui_ci existe
 // (fonction "exists" ) ou "is_dir")
 // On liste / parcour les fichier du répertoire
 // on filtre les fichiers pour conserver uniquement les fichiers en ".php"
 // On inclus les fichiers !

 // et on test la fonction dump();


  // Si UTILS_PATH n'est pas Null, il aura bien été définit en amont.
 if (UTILS_PATH != null)
 {   // Est ce que UTILS_PATH ( ../utils/) est un répertoire
     if ( is_dir(UTILS_PATH)){
        //Scanner le répertoire UTILS_PATH et intégrer ce scann dans  $scan_dir
         $scan_dir = scandir(UTILS_PATH);
        //On boucle sur les entrées de $utils_scan
            foreach ($scan_dir as $file ){
                // $ se met à la fin et indique se termine par
                if (preg_match( "/\.php$/", $file) == 1){
                include_once UTILS_PATH.$file;
           } 
         }
     }
 }
 






