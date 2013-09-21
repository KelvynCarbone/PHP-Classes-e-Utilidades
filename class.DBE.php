<?php
/**
 * 
 * Classe de manipulação PDO: 
 *
 * @example $DB= new DBE(); $DB->Query("query");
 * @desc Uso Básico
 *
 * @type PHP/Postgresql
 *
 * @name DBE
 * @author Kelvyn Indicatti Carbone (http://kelvyncarbone.tumblr.com)
 * @Email: kelvyn.carbone@gmail.com
 */

date_default_timezone_set('America/Sao_Paulo');

    class DBE
	{
	private $dbh;
	private $error;
	private $result;

	//Construct da classe para poder instanciar	 
	public function __construct()
		{
		// Set DSN
		$dsn = "pgsql:host=localhost;port=5432;dbname=nomedabase;user=usuario_postgres;password=senha;";
		
		//Instancia o PDO
		try
			{
			$this->dbh = new PDO($dsn);
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		catch(PDOException $e)
			{
			$this->error = $e->getMessage();
			$this->error = str_replace("\n","",$this->error);
			$this->error = str_replace('"',"'",$this->error);
			print "<script> alert(\"".$this->error."\"); </script>";
			//print "<script> alert('Ocorreu um erro ao conectar no banco de dados'); </script>";
			exit;
			}
		}
	//Função que executa as query
	public function Query($query)
		{
		//Verifica o tipo transição, de acordo com a mesma ele escolhe o tipo de ação
		if(strpos(strtolower($query),"select")!==false)
			{
			try
				{
				//Quando a query é select ele executa essa açao, isto por causa do fetch
				//que precisa de um tratamento diferenciado
				$this->result=$this->dbh->prepare($query);
				$this->result->execute();
				}
			catch(PDOException $e)
				{
				//O código comentado é um print para não exibir o erro interno, é só comentar
				//o linhas abaixo e descontar o return print.
				$this->error = $e->getMessage();
				$this->error = str_replace("\n","",$this->error);
				$this->error = str_replace('"',"'",$this->error);
				print "<script> alert(\"".$this->error."\"); </script>";
				//return print "Ocorreu um erro ao executar a query!";
				exit;
				}
			}
		else
			{
			try
				{
				//Se alguém parar com tempo e analisar deve haver um forma
				//mais prática de fazer as querys
				$this->result=$this->dbh->prepare($query);
				$this->result=$this->result->execute();
				}
			// Catch any errors - como é insert se não fez, faz um rollback
			catch(PDOException $e)
				{
				//O código comentado é um print para não exibir o erro interno, é só comentar
				//o linhas abaixo e descontar o return print.
				$this->error = $e->getMessage();
				$this->error = str_replace("\n","",$this->error);
				$this->error = str_replace('"',"'",$this->error);
				print "<script> alert(\"".$this->error."\"); </script>";
				//return print "Ocorreu um erro ao executar a query!";
				exit;
				}
			}
		}

	//Função que executa as query
	public function Rows()
		{
		try
			{
			//Pega a query prepare e faz o num_rows
			return $this->result->rowCount();
			}
		catch(PDOException $e)
			{
			//O código comentado é um print para não exibir o erro interno, é só comentar
			//o linhas abaixo e descontar o return print.
			$this->error = $e->getMessage();
			$this->error = str_replace("\n","",$this->error);
			$this->error = str_replace('"',"'",$this->error);
			print "<script> alert(\"".$this->error."\"); </script>";
			//print "<script> alert('Ocorreu um erro ao executar o Fetch[1]'); </script>";
			exit;
			}
		}
		
	//Faz um fetch obj
	public function Fetch($tipo=null)
		{
		//Voce pode definir um tipo de fetch ou por padrao fetch_obj
		if(isset($tipo))
			{
			try
				{
				return $this->result->fetch($tipo);
				}
			catch(PDOException $e)
				{
				//O código comentado é um print para não exibir o erro interno, é só comentar
				//o linhas abaixo e descontar o return print.
				$this->error = $e->getMessage();
				$this->error = str_replace("\n","",$this->error);
				$this->error = str_replace('"',"'",$this->error);
				print "<script> alert(\"".$this->error."\"); </script>";
				//print "<script> alert('Ocorreu um erro ao executar o Fetch[1]'); </script>";
				exit;
				}
			}
		else
			{
			try
				{
				return $this->result->fetch(PDO::FETCH_OBJ);
				}
			catch(PDOException $e)
				{
				//O código comentado é um print para não exibir o erro interno, é só comentar
				//o linhas abaixo e descontar o return print.
				$this->error = $e->getMessage();
				$this->error = str_replace("\n","",$this->error);
				$this->error = str_replace('"',"'",$this->error);
				print "<script> alert(\"".$this->error."\"); </script>";
				//print "<script> alert('Ocorreu um erro ao executar o Fetch[1]'); </script>";
				exit;
				}
			}
		}
		
	//Retorna o ultimo id inserido após query	
	public function LastId()
		{
		try
			{
			return $this->dbh->lastInsertId();
			}
		catch(PDOException $e)
			{
			//O código comentado é um print para não exibir o erro interno, é só comentar
			//o linhas abaixo e descontar o return print.
			$this->error = $e->getMessage();
			$this->error = str_replace("\n","",$this->error);
			$this->error = str_replace('"',"'",$this->error);
			print "<script> alert(\"".$this->error."\"); </script>";
			//print "<script> alert('Ocorreu um erro ao executar o LastId'); </script>";
			exit;
			}
		}
		
	//Faz o rollback em caso de problema	
	public function RollBack()
		{
		try
			{
			return $this->dbh->rollback();
			}
		// Catch any errors
		catch(PDOException $e)
			{
			$this->error = $e->getMessage();
			$this->error = str_replace("\n","",$this->error);
			$this->error = str_replace('"',"'",$this->error);
			print "<script> alert(\"".$this->error."\"); </script>";
			//print "<script> alert('Ocorreu um erro ao executar o Rollback'); </script>";
			exit;
			}
		}

	}
?>