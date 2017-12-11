<?php

include 'dbhinc.php';
session_start();

if (isset($_POST ['submit']))
{
	$uid = mysqli_real_escape_string($conn, $_POST['email']);
	$pwd = mysqli_real_escape_string($conn, $_POST['user_password']);
	$check = password_hash($pwd, PASSWORD_DEFAULT);

/*	//Controleerd of velden leeg zijn, zo ja ga terug naar login scherm*/
	if (empty($uid) || empty($pwd))
		{
			header("Location: ../index.php?login=empty");
			exit();
		}
	else
		{
			$sql = "SELECT * FROM naw WHERE naw_email='$uid'";//SQL opdracht zoeken e-mail in tabel
			$result = mysqli_query($conn, $sql);//Voert Query uit en zet resultaat in variabele $result
			$resultcheck = mysqli_num_rows($result);//Controleerd of gebruiker bestaat
			$row = mysqli_fetch_assoc($result);//Zet gevonden rij in variabele $row
			$hash = $row['naw_wachtwoord'];//Zet gehashed wachtwoord van gevonden gebruiker uit DB in variabele $hash


/* ----------------Indien er geen gebruiker is gevonden------------------ */
		if ($resultcheck == 0)
			{
				echo "Gebruiker zit er niet in";
				exit();
				header("Location: ../index.php?login=error");

			}
		else
/* xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */
			{

				if ($row = $result)

					{
/* xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */
						//De-hashing the password
						$hashedPwdCheck = password_verify($pwd, $hash);

						if ($hashedPwdCheck == false)
							{
								header("Location: ../index.php?login=error");
								exit();
							}
						else if ($hashedPwdCheck == true)

							{
								echo "Ingelogd!";
								$_SESSION['u_id']=$uid;
								header("Location:../user.php");
								/*Log in the user here
								$_SESSION['u_id'] = $row['user_id'];
								$_SESSION['u_first'] = $row['user_first'];
								$_SESSION['u_last'] = $row['user_last'];
								$_SESSION['u_email'] = $row['user_email'];
								$_SESSION['u_uid'] = $row['user_uid'];
								header("Location: ../index.php?login=loggedin");*/
						exit();
							}
/* xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */
					}
				}
	}
}
else
{
	header("Location: ../index.php?login=error");

}
?>
