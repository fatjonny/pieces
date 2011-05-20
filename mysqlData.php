<?php
	class MysqlData {
		
		public function __construct( $uid, $pwd, $database, $server = "localhost" ) {

			// Connect using MySQL Server Authentication.
			$this->connection = mysql_connect( $server, $uid, $pwd );
			//$this->connection = mysql_connect(  );
			if( !$this->connection )
			{
			     die( print_r( mysql_error(), true));
			}
			
			$this->database = mysql_select_db( $database, $this->connection );
			
			if( !$this->database )
			{
				die( print_r( mysql_error(), true ));
			}
		}
		
		public function SelectAll( $table, $extra = "", $columns = "*" ) {
			$tsql = "SELECT $columns FROM $table $extra";
			$stmt = $this->ExecuteDontFreeQuery( $tsql );
			
			$results = array();
			
			// Retrieve the results of the query.
			$i = 0;
			while( $row = mysql_fetch_array($stmt) )
			{
				$results[ $i ] = $row;
				$i++;
			}
			
			// Free statement and connection resources.	
			mysql_free_result( $stmt);
			
			return $results;
		}

		public function SelectAllWhere( $table, $where, $extra = "", $columns = "*" ) {
			$tsql = "SELECT $columns FROM $table WHERE $where $extra";
			$stmt = $this->ExecuteDontFreeQuery( $tsql );
			
			$results = array();
			
			// Retrieve the results of the query.
			$i = 0;
			while( $row = mysql_fetch_array($stmt) )
			{
				$results[ $i ] = $row;
				$i++;
			}
			
			// Free statement and connection resources.	
			mysql_free_result( $stmt);
			
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
			mysql_close( $this->connection );
		}
		
		private $connection;
		private $database;
		
		private function ExecuteDontFreeQuery( $tsql )
		{
			$stmt = mysql_query( $tsql, $this->connection );
			if( $stmt == false )
			{
				die( print_r(mysql_error(), true));
			}
			return $stmt;
		}
		
		private function ExecuteQuery( $tsql )
		{
			$stmt = mysql_query( $tsql, $this->connection );
			if( $stmt == false )
			{
				die( print_r(mysql_error(), true));
			}
		
			// Retrieve the results of the query.
			$row = mysql_fetch_array($stmt);
		
			// Free statement and connection resources.
			mysql_free_result( $stmt);
			
			return $row;
		}
		
		private function ExecuteQueryNoResult( $tsql )
		{
			$stmt = mysql_query( $tsql, $this->connection );
			if( $stmt == false )
			{
				die( print_r(mysql_error(), true));
			}
		}
	}
?>