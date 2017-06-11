<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
		<h3>Registrirajte se</h3>
        <form action="" method="post">
            <label for="ime">Ime: </label>
            <input type="text" name="ime" value="" id="ime"/>
            <br/><br/>
            <label for="prezime">Prezime: </label>
			 <input type="text" name="prezime" value="" id="prezime"/>
            <br/><br/> 
            <label for="email">Email: </label>
            <input type="text" name="email" value="" id="email"/>
            <br/><br/>
            <label for="k_ime">Korisničko ime: </label>
			<input type="text" name="k_ime" value="" id="k_ime"/>
            <br/><br/>
			<label for="lozinka">Lozinka: </label>
			<input type="password" name="lozinka" value="" id="lozinka"/>
            <br/><br/>
            <input type="submit" name="salji" value="Dodaj korisnika"/>
        </form>
    </body>
</html>
<?php
	include 'spoj.0.php';
		if(isset($_POST["salji"])){
			$Rid = NULL;
			if($_POST["ime"]!=null && $_POST["prezime"]!=null && $_POST["email"]!=null && $_POST["k_ime"]!=null && $_POST["lozinka"]!=null){
			$ime=$_POST["ime"];
			$prezime=$_POST["prezime"];
			$email=$_POST["email"];
			$k_ime=$_POST["k_ime"];
			$lozinka=$_POST["lozinka"];
			$sql = "SELECT * FROM korisnici WHERE k_ime='{$k_ime}' AND lozinka='{$lozinka}';";
			try {
				$mid =$conn->prepare($sql);
				$mid->execute();
				$result=$mid->fetchAll();
			}
			catch(PDOException $e)
			{
				echo $sql . "<br>" . $e->getMessage();
			}
			if ($mid->rowCount() > 0) {
				echo "Korisnik već postoji.";	   
			} 
			else {			
				$sql = "INSERT INTO korisnici (id,ime,prezime,email,k_ime,lozinka,uloga) 
				VALUES (NULL,'{$ime}','{$prezime}','{$email}','{$k_ime}','{$lozinka}','kupac');";
				try {
					$conn->exec($sql);
					echo "Uspješno dodan novi korinik.";
				}
				catch(PDOException $e)
				{
					echo $sql . "<br>" . $e->getMessage();
				}
			}
		}
		else echo "Niste unijeli sve podatke za korinika.";
		} 
		echo "<br/><a href='index.php'>Povratak</a>"
?>