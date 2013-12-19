<?php
	
	$user="argosappsql";
	$passwd="ilest11h29";
	$host="mysql51-104.perso";
	$nomBase="argosappsql";
	$connexion=mysql_connect($host,$user,$passwd);
	mysql_select_db($nomBase,$connexion);
	
	
	$sql="SELECT * FROM fiche_lieu";
	$req=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());


	// on fait une boucle qui va faire un tour pour chaque enregistrement
	while($row = mysql_fetch_array($req))
    {
		// on affiche les informations de l'enregistrement en cours
		echo ('<a href = \"voir.php?id=' .$row['id'].'\"> ' .$row['titre']. '</a>' );
		//$sql="SELECT id FROM comment_lieu WHERE fiche_lieu_id=".$row['id'];
		$sql="SELECT id FROM comment_lieu";
		$req2=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		echo "(".mysql_num_rows($req2).")<br/>";
    } 
	

		
	//}
?>