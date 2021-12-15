<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Premiers tests du CSS</title>
    </head>

    <body>
        <table>
            <!-- boucle creation secteur 1 -->
            <tr>
                <th ROWSPAN="2">Secteur</th>
                <th COLSPAN="4">Liaison</th>
            </tr>
            <tr>
                <td>Code
                    Liaison</td>
                <td>milles marin</td>
                <td>Port de départ</td>
                <td>Port d’arrivée</td>
                
            </tr>
            <!-- boucle creation secteur 2 -->
            <tr>
                <?php
                    $bdd = mysqli_connect('172.28.100.3', 'mviougea', 'elini01', 'mviougea_atlantik');
                    if(!$bdd){
                        die ("error");
                    }
                    else{
                        echo "connexion réussie";
                    }

                    $reponse = 'SELECT sct.libelleSecteur, codeLiaison, pdep.libellePort AS Départ, parr.libellePort AS Arrivé, distanceLiaison FROM liaison INNER JOIN port pdep ON liaison.Départ = pdep.numeroPort INNER JOIN port parr ON liaison.Arrivé = parr.numeroPort INNER JOIN secteur sct ON liaison.numeroSecteur=sct.numeroSecteur';

                    $test = mysqli_query($bdd, $reponse);
                    // On affiche chaque entrée une à une
                    while ($donnees = mysqli_fetch_array($test))
                    {
                        ?>
                        <tr>
                            <td><?php echo $donnees['libelleSecteur'];?></td>
                            <td><?php echo $donnees['codeLiaison'];?></td>
                            <td><?php echo $donnees['distanceLiaison'];?></td>
                            <td><?php echo $donnees['Départ'];?></td>
                            <td><?php echo $donnees['Arrivé'];?></td>
                        </tr>
                    <?php }?>
            </tr>
        </table>
    </body>
</html>

