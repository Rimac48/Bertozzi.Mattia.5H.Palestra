<?php

    include "dbConnection.php";
 
    $sql = " SELECT Abbonamento.idAbbonamento, Abbonamento.idCliente FROM Abbonamento";
    $result = mysqli_query($conn, $sql);
    echo "informazioni da Admin...Vai su phpMyAdmin che è meglio...";
    echo "<table>";
    echo "<td>Id Abbonamento</td>";
    echo "<td>Appartiene a</td>";
    if ($result->num_rows != 0)
				{while($row = $result->fetch_assoc()) 
					{
                    $id=$row['idAbbonamento'];
                    $idC=$row['idCliente'];

					$riga = "<tr>
						<td id=\"id\">".$row['idAbbonamento']."</td>
                        <td id=\"idc\">".$row['idCliente']."</td>
						</tr>";
					echo $riga;
					}
				}
			
			else 
				{echo "Non ci sono testi";} 
		 	echo "</table>";
            
    mysqli_close($conn);
?>