<?php
	class Helpers {
		public function __construct( $path = "." ) {
			$this->basePath = $path;
			include( "$this->basePath/config.php" );
		}
		
		public function CheckSession( $mustBeLoggedIn = false ) {
			global $piecesSessionName;
			
			// create a session if one doesn't exist
			session_name( $piecesSessionName );
			session_start();
			if( !isset($_SESSION['loggedIn']) ) {
				$_SESSION['loggedIn'] = false;
			}
			
			if( $mustBeLoggedIn && $_SESSION['loggedIn'] == false ) {
				$_SESSION['notice'] = "You must be logged in.";
				$file = $_SERVER["SCRIPT_NAME"];
				$break = explode('/', $file);
				$pfile = $break[count($break) - 1];
				if( $pfile != "index.php" ) {
					header("Location: index.php");
				}
			}
		}
		
		public function DisplaySessionMessages() {
			$messages = "";
			if( isset( $_SESSION['error'] ) ) {
				 $messages .= $_SESSION['error'];
				unset( $_SESSION['error'] );
			}
			if( isset( $_SESSION['notice'] ) ) {
				$messages .= $_SESSION['notice'];
				unset( $_SESSION['notice'] );
			}
			return $messages;
		}
		
		public function ForceSSL() {
			if($_SERVER["HTTPS"] != "on") {
				$newurl = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
				header("Location: $newurl");
				exit();
			}	
		}
		
		public function IncludeHTML( $file ) {
			readfile( "$this->basePath/includes/$file.html" );	
		}
		
		public function IncludePHP( $file ) {
			include( "$this->basePath/includes/$file.php" );
		}
		
		public function IncludePiece( $file ) {
			$helper = $this;
			include( "$this->basePath/pieces/$file.php" );	
		}
		
		public function IncludeLib( $file ) {
			$helper = $this;
			include( "$this->basePath/libs/$file.php" );	
		}
		
		public function ConvertForDisplay( $string ) {
			return nl2br( $string );
		}
		
		public function DisplayTemplate( $variableArray = array() ) {
			$message = Helpers::DisplaySessionMessages();
			$helper = $this;
			extract( $variableArray, EXTR_REFS );
			ob_start();
			include( "./templates/$template.php" );
			return ob_get_clean();
		}
		
		private $basePath;
	}
?>