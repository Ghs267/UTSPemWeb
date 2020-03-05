<?php 
				//Ini adalah lokasi dari mysql berada
				$host = "localhost";

				//Ini adalah user yang digunakan untuk login ke dalam module mysql / mariadb
				$username = "root";

				//Ini adalah nama database yang digunakan dalam praktikum ini 
				$dbname = "sosmed";

				//Ini adalah password yang untuk autentikasi user
				$password = "";

				//Object database
                $db = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
?>