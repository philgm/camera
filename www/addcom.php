<?php
	
	$user="argosappsql";
	$passwd="ilest11h29";
	$host="mysql51-104.perso";
	$nomBase="argosappsql";
	$connexion=mysql_connect($host,$user,$passwd);
	mysql_select_db($nomBase,$connexion);
	
	extract($_POST);
	$sql="INSERT INTO comment_lieu (pseudo, titre, commentaire, fiche_lieu_id) VALUES ('$pseudo', '$titre', '$commentaire', '$fiche_lieu_id')";
	$req=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
	header("Location: voir.php?id=$fiche_lieu_id");

?>

<?php
	
	$user="argosappsql";
	$passwd="ilest11h29";
	$host="mysql51-104.perso";
	$nomBase="argosappsql";
	$connexion=mysql_connect($host,$user,$passwd);
	mysql_select_db($nomBase,$connexion);
	
	$id=$_GET['id'];
		//$sql="SELECT * FROM fiche_lieu WHERE id=$id";
	$sql="SELECT * FROM fiche_lieu"; //à modifier
	$req=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

	// on fait une boucle qui va faire un tour pour chaque enregistrement
	while($row = mysql_fetch_array($req))
    {
		// on affiche les informations de l'enregistrement en cours
		echo ('<h1>'.$row['titre'].'</h1>');
		echo (' <p>description : '.$row['contenu'].'</p>');
    } 
	
	//nouvelle requete
	$sql="SELECT * FROM comment_lieu"; //à modifier
	$req=mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

	// on fait une boucle qui va faire un tour pour chaque enregistrement
	while($row2 = mysql_fetch_array($req))
    {
		// on affiche les informations de l'enregistrement en cours
		echo"--------------------------------";
		echo ('<p>'.$row2['pseudo'].'</p>');
		echo ('<h3>'.$row2['titre'].'</h3>');
		echo (' <p>'.$row2['commentaire'].'</p>');
		echo"--------------------------------";
    } 

?>
