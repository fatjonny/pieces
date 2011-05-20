<?php

	$helper->IncludeLib('phpass-0.2/PasswordHash');

	class DataStore {
		
		public function __construct( $dataConnection ) {
			$this->connection = $dataConnection;
			$this->pwdHasher = new PasswordHash(8, FALSE);
		}
		
		public function emailExists( $email, $table="people" ) {
			$result = $this->connection->SelectAllWhere( $table, "email='$email'" );
			if( count( $result ) ) {
				return $result[ 0 ];
			}
			return 0;
		}
		
		public function usernameExists( $username, $table="people" ) {
			$result = $this->connection->SelectAllWhere( $table, "user_name='$username'" );
			if( count( $result ) ) {
				return $result[ 0 ];
			}
			return false;
		}
		
		public function addUser( $userData, $table="people" ) {

			// hash the password
			$userData[ 'password' ] = $this->pwdHasher->HashPassword( $userData[ 'password' ] );

			// create the user
			$this->connection->InsertArray( $table, $userData );
		}
		
		public function checkPassword( $username, $password, $table="people" ) {
			// get password hash for user
			$hash = $this->connection->SelectAllWhere( $table, "user_name='$username'" );
			
			if( count( $hash ) ) {
				$hash = $hash[0][ "password" ];
			}
			else {
				return false;
			}
			
			// $hash would be the $hashed stored in your database for this user
			$checked = $this->pwdHasher->CheckPassword($password, $hash);
			return $checked;
		}
		
		private $connection;
		private $pwdHasher;
	}
?>