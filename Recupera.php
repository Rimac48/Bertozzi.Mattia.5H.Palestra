<?php
    $filename="regdata.csv";
    $EmailLogin = $_POST['Email'];
    
    $file = file_get_contents($filename, true);
    $Righe = explode("\n", $file);

    //*echo $file;

    //trova sempre una riga aggiuntiva perchè metto \n dopo ogni record
    $nRighe=count($Righe)-1;

    // echo $Righe[0];
    // echo "\n";
    // echo $Righe[1];
    // echo "\n";
    // echo $Righe[2];
    // echo "\n";
    // echo $Righe[3];
    // echo "\n";
    // echo $Righe[4];
    // echo "\n";

    $trovata=false;
    //parto da 0 quindi tolgo 1
    for($i=0;$i<=$nRighe-1;$i++)
    {
        $Categoria = explode(";", $Righe[$i]);
        $email = explode(":", $Categoria[2]);
        $EmailRegistrazione=$email[1];

        if($EmailLogin==$EmailRegistrazione)
        {
            echo "Email di Recupero Password mandata!(per finta)";
            $trovata=true;
            break;
        }
    }
    if($trovata==false)
        echo "Email non presente nel Database";


    // echo $EmailLogin;
    // echo $EmailRegistrazione;

?>