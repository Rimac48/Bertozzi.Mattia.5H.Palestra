<?php

    include "dbConnection.php";

    session_start();

    $cookie_name = "Utente"; //nome del cookie

    $Dati=explode(";",$_COOKIE[$cookie_name]);
        
    //$_SESSION['idCliente']
 
    $sql = " SELECT * FROM Cliente WHERE idCliente= '".$_SESSION['idCliente']."' ";
    $result = mysqli_query($conn, $sql);
    echo "Cronologia Abbonamenti";
    echo "<table>";
    echo "<td>Id Abbonamento</td>";
    echo "<td>Data Inizio</td>";
    echo "<td>Scadenza</td>";
    echo "<td>CostoTotale</td>";
    if ($result->num_rows != 0)
				{while($row = $result->fetch_assoc()) 
					{
                        echo
                    $idAbb=$row['idAbbonamento'];
                    $Inizio=$row['DataInizio'];
                    $Fine=$row['DataFine'];
                    $Costo=$row['CostoTot'];

					$riga = "<tr>
						<td id=\"idAbb\">".$idAbb."</td>
                        <td id=\"Inizio\">".$Inizio."</td>
                        <td id=\"Fine\">".$Fine."</td>
                        <td id=\"Costo\">".$Costo."</td>
						</tr>";
					echo $riga;
					}
				}
			
			else 
				{echo "Non ci sono testi";} 
		 	echo "</table>";
            
    mysqli_close($conn);
?>