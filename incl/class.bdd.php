<?php
/*
	Mise en page g�n�rale de EdicomCMS
	Cod� par Mourad Kejji le xx/xx/xxxx
			-	mkejji@gmail.com
	
	T�ches du script :
			- Cr�ation de la classe BDD (Base de donn�es) qui permettra de 
			se connecter � une base de donn�es, de g�n�rer des requ�tes, de les
			executer et d'en extraire les r�sultats de la fa�on la plus param�trable
			possible.
*/

class Bdd
{
	public $config = array(),
		$error,
		$requete,
		$histo_requetes = array(),
		$link,
		$result;
		
	function __construct($host=DB_HOST, $user=DB_USER, $pass=DB_PASS, $name=DB_NAME)
	{
		if ($host)
			$this->config['host'] = $host;
		if ($user)
			$this->config['user'] = $user;
		if ($name)
			$this->config['name'] = $name;
		$this->config['pass'] = $pass;
		$this->link = $this->connect();
	}
	
	function connect()
	{
		$id = mysqli_connect($this->config['host'], $this->config['user'], $this->config['pass']);
		if (!$id)
		{
			$this->error = "Connexion impossible";
			return false;
		}
		$sel = mysqli_select_db($id, $this->config['name']);
		if (!$sel)
		{
			$this->error = "Base de donn�es introuvable";
			return false;
		}
		mysqli_set_charset($id, 'utf8');
		return $id;
	}
	
	function query($sql)
	{
		$this->requete[] = $sql;
		$query = mysqli_query($this->link, $sql);
		if (!$query)
		{
			$this->error = mysqli_error($this->link);
			return false;
		}
		if (preg_match("`^select`i", $sql))
		{
			$recordset = array();
			while ($data = mysqli_fetch_assoc($query))
			{
				$recordline = array();
				foreach($data as $key => $value)
				{
					$recordline[$key] = $value;
				}
				$recordset[] = $recordline;
			}
			$this->result = $recordset;
			return $recordset;
		}
		if (preg_match("`^insert`i", $sql))
		{
			return mysqli_insert_id($this->link);
		}
	}

	function escape($input) {
		if (is_array($input)) {
			$output = array();
			foreach($input as $k=>$v) {
				$output[$k] = $this->escape($v);
			}
			return $output;
		} else {
			return mysqli_real_escape_string($this->link, $input);
		}
	}
}
?>