<?php
	class StateHelper {
		public static function shortenState($state){
			$state = trim( $state );
			if(strlen($state) == 2) {
				$newState = $state;
			} else {
				$state = ucwords(strtolower($state));
				switch($state){
					case "Alaska":
						$newState = "AK";
						break;
					case "Alabama":
						$newState = "AL";
						break;
					case "Arkansas":
						$newState = "AR";
						break;
					case "Arizona":
						$newState = "AZ";
						break;
					case "California":
						$newState = "CA";
						break;
					case "Colorado":
						$newState = "CO";
						break;
					case "Connecticut":
						$newState = "CT";
						break;
					case "Delaware":
						$newState = "DE";
						break;
					case "Florida":
						$newState = "FL";
						break;
					case "Georgia":
						$newState = "GA";
						break;
					case "Hawaii":
						$newState = "HI";
						break;
					case "Iowa":
						$newState = "IA";
						break;
					case "Idaho":
						$newState = "ID";
						break;
					case "Illinois":
						$newState = "IL";
						break;
					case "Indiana":
						$newState = "IN";
						break;
					case "Kansas":
						$newState = "KS";
						break;
					case "Kentucky":
						$newState = "KY";
						break;
					case "Louisiana":
						$newState = "LA";
						break;
					case "Massachusetts":
						$newState = "MA";
						break;
					case "Maryland":
						$newState = "MD";
						break;
					case "Maine":
						$newState = "ME";
						break;
					case "Michigan":
						$newState = "MI";
						break;
					case "Minnesota":
						$newState = "MN";
						break;
					case "Missouri":
						$newState = "MO";
						break;
					case "Mississippi":
						$newState = "MS";
						break;
					case "Montana":
						$newState = "MT";
						break;
					case "North Carolina":
						$newState = "NC";
						break;
					case "North Dakota":
						$newState = "ND";
						break;
					case "Nebraska":
						$newState = "NE";
						break;
					case "New Hampshire":
						$newState = "NH";
						break;
					case "New Jersey":
						$newState = "NJ";
						break;
					case "New Mexico":
						$newState = "NM";
						break;
					case "Nevada":
						$newState = "NV";
						break;
					case "New York":
						$newState = "NY";
						break;
					case "Ohio":
						$newState = "OH";
						break;
					case "Oklahoma":
						$newState = "OK";
						break;
					case "Oregon":
						$newState = "OR";
						break;
					case "Pennsylvania":
						$newState = "PA";
						break;
					case "Rhode Island":
						$newState = "RI";
						break;
					case "South Carolina":
						$newState = "SC";
						break;
					case "South Dakota":
						$newState = "SD";
						break;
					case "Tennessee":
						$newState = "TN";
						break;
					case "Texas":
						$newState = "TX";
						break;
					case "Utah":
						$newState = "UT";
						break;
					case "Virginia":
						$newState = "VA";
						break;
					case "Vermont":
						$newState = "VT";
						break;
					case "Washington":
						$newState = "WA";
						break;
					case "Wisconsin":
						$newState = "WI";
						break;
					case "West Virginia":
						$newState = "WV";
						break;
					case "Wyoming":
						$newState = "WY";
						break;
					default:
						$newState = "";
						break;
				}
			}
			return $newState;
		}
		
		public static function lengthenState($state){
			if(strlen($state) != 2) {
				$newState = $state;
			} else {
				$state = strtoupper($state);
				switch($state) {
					case "AK":
						$newState = "Alaska";
						break;
					case "AL":
						$newState = "Alabama";
						break;
					case "AR":
						$newState = "Arkansas";
						break;
					case "AZ":
						$newState = "Arizona";
						break;
					case "CA":
						$newState = "California";
						break;
					case "CO":
						$newState = "Colorado";
						break;
					case "CT":
						$newState = "Connecticut";
						break;
					case "DE":
						$newState = "Delaware";
						break;
					case "FL":
						$newState = "Florida";
						break;
					case "GA":
						$newState = "Georgia";
						break;
					case "HI":
						$newState = "Hawaii";
						break;
					case "IA":
						$newState = "Iowa";
						break;
					case "ID":
						$newState = "Idaho";
						break;
					case "IL":
						$newState = "Illinois";
						break;
					case "IN":
						$newState = "Indiana";
						break;
					case "KS":
						$newState = "Kansas";
						break;
					case "KY":
						$newState = "Kentucky";
						break;
					case "LA":
						$newState = "Louisiana";
						break;
					case "MA":
						$newState = "Massachusetts";
						break;
					case "MD":
						$newState = "Maryland";
						break;
					case "ME":
						$newState = "Maine";
						break;
					case "MI":
						$newState = "Michigan";
						break;
					case "MN":
						$newState = "Minnesota";
						break;
					case "MO":
						$newState = "Missouri";
						break;
					case "MS":
						$newState = "Mississippi";
						break;
					case "MT":
						$newState = "Montana";
						break;
					case "NC":
						$newState = "North Carolina";
						break;
					case "ND":
						$newState = "North Dakota";
						break;
					case "NE":
						$newState = "Nebraska";
						break;
					case "NH":
						$newState = "New Hampshire";
						break;
					case "NJ":
						$newState = "New Jersey";
						break;
					case "NM":
						$newState = "New Mexico";
						break;
					case "NV":
						$newState = "Nevada";
						break;
					case "NY":
						$newState = "New York";
						break;
					case "OH":
						$newState = "Ohio";
						break;
					case "OK":
						$newState = "Oklahoma";
						break;
					case "OR":
						$newState = "Oregon";
						break;
					case "PA":
						$newState = "Pennsylvania";
						break;
					case "RI":
						$newState = "Rhode Island";
						break;
					case "SC":
						$newState = "South Carolina";
						break;
					case "SD":
						$newState = "South Dakota";
						break;
					case "TN":
						$newState = "Tennessee";
						break;
					case "TX":
						$newState = "Texas";
						break;
					case "UT":
						$newState = "Utah";
						break;
					case "VA":
						$newState = "Virginia";
						break;
					case "VT":
						$newState = "Vermont";
						break;
					case "WA":
						$newState = "Washington";
						break;
					case "WI":
						$newState = "Wisconsin";
						break;
					case "WV":
						$newState = "West Virginia";
						break;
					case "WY":
						$newState = "Wyoming";
						break;
					default:
						$newState = "";
						break;
				}
			}
			return $newState;
		}
	}
?>