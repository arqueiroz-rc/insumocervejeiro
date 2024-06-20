<?php		
			//$conexao = mysqli_connect('localhost:3306', 'root', '', 'insumodb');
			//mysqli_set_charset($conexao, 'utf8');
			
			$conexao = new mysqli('localhost:3306', 'root', '', 'cafeimetrodb');
			$conexao->set_charset('utf8');