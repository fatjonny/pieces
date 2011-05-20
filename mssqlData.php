<?php
	class MssqlData {
		
		public function __construct( $uid, $pwd, $database, $server = "(local)" ) {
			// Specify the server and connection string attributes.

			$connectionInfo = array( "UID"=>$uid,
			                         "PWD"=>$pwd,
			                         "Database"=>$database);

			// Connect using SQL Server Authentication.
			$this->connection = sqlsrv_connect( $server, $connectionInfo);
			if( $this->connection === false )
			{
				die( print_r( sqlsrv_errors(), true));
			}
		}
		
		public function SelectAll( $table, $extra = "", $columns = "*" ) {
			$tsql = "SELECT $columns FROM " . $table . $extra;
			$stmt = $this->ExecuteDontFreeQuery( $tsql );
			
			$results = array();
			
			// Retrieve the results of the query.
			$i = 0;
			while( $row = sqlsrv_fetch_array($stmt) )
			{
				$results[ $i ] = $row;
				$i++;
			}
			
			// Free statement and connection resources.	
			sqlsrv_free_stmt( $stmt);
			
			return $results;
		}

		public function SelectAllWhere( $table, $where, $extra = "", $columns = "*" ) {
			$tsql = "SELECT $columns FROM " . $table . " WHERE " . $where . $extra;
			$stmt = $this->ExecuteDontFreeQuery( $tsql );
			
			$results = array();
			
			// Retrieve the results of the query.
			$i = 0;
			while( $row = sqlsrv_fetch_array($stmt) )
			{
				$results[ $i ] = $row;
				$i++;
			}
			
			// Free statement and connection resources.	
			sqlsrv_free_stmt( $stmt);
			
			return $results;
		}
		
		public function InsertArray( $table, $valuesArray ) {
			$keys = "";
			$values = "";
			$count = count( $valuesArray );
			$i = 0;
			
			foreach( $valuesArray as $key => $value ) {
				$i++;
				$keys .= "$key";
				$values .= "'$value'";
				if( $i != $count ) {
					$keys .= ", ";
					$values .= ", ";
				}
			}
			
			$tsql = "INSERT INTO $table ( $keys ) VALUES ( $values )";

			$this->ExecuteQueryNoResult( $tsql );
		}
		
		public function Update( $table, $values, $where ) {
			$tsql = "UPDATE $table SET $values WHERE $where";

			$this->ExecuteQueryNoResult( $tsql );
		}
		
		public function Delete( $table, $where ) {
			$tsql = "DELETE FROM $table WHERE $where";
			
			$this->ExecuteQueryNoResult( $tsql );
		}
		
		public function __destruct() {
			sqlsrv_close( $this->connection );
		}
		
		private $connection;
		
		private function ExecuteDontFreeQuery( $tsql )
		{
			$stmt = sqlsrv_query( $this->connection, $tsql );
			if( $stmt == false )
			{
				die( print_r(sqlsrv_errors(), true));
			}
			return $stmt;
		}
		
		private function ExecuteQuery( $tsql )
		{
			$stmt = sqlsrv_query( $this->connection, $tsql );
			if( $stmt == false )
			{
				die( print_r(sqlsrv_errors(), true));
			}
		
			// Retrieve the results of the query.
			$row = sqlsrv_fetch_array($stmt);
		
			// Free statement and connection resources.
			sqlsrv_free_stmt( $stmt);
			
			return $row;
		}
		
		private function ExecuteQueryNoResult( $tsql )
		{
			$stmt = sqlsrv_query( $this->connection, $tsql );
			if( $stmt == false )
			{
				die( print_r(sqlsrv_errors(), true));
			}
		}
	}
?>