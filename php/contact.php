<?php
 
if($_POST) {
    $firstname = "";
    $lastname = "";
    $email = "";
     
    if(isset($_POST['firstname'])) {
    /*String zur Eingabe des Vornames*/
        $first_name = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['lastname'])) {
    /*String zur Eingabe des Nachnames*/
        $last_name = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['email'])) {
    /*Diese strings fordern dazu auf eine E-Mail einzugeben, sollte ein Text ohne "@"-Zeichen eingegeben werden, kommt eine Fehlermeldung*/
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['email']);
        $visitor_email = filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    /*Die E-Mail an welche die Anmeldung des Newsletters weitergeleitet werden soll*/
    $recipient = "david.lehner11@gmail.com";
    
    /*Hier wird hinterlegt wie die E-Mail an die oben eingegeben Mail aussehen soll*/
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    if(mail($firstname, $lastname)) {
    /*Sollten keine Fehler im Newsletter vorhanden sein, erscheint nach dem Klick auf senden dieser Text*/
        echo "<p>Thank you very much for subscribing to our newsletter, $first_name. From now on you will receive regular news about our company.</p>";
    } else {
    /*Bei Fehlern bei der Eingabe erinnert dieser Text die Angaben noch einmal zu kontrollieren*/
        echo '<p>We are sorry but the email did not go through.</p>';
    }
     
} else {
    /*Sollten andere Fehler auftauchen erscheint dieser Text*/
    echo '<p>Something went wrong</p>';
}
 
?>