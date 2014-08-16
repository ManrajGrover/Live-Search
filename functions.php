<?php 
$task=$_POST['task'];
switch($task)
{
	case "ajax_state":
			if(!isset($_SESSION['states']))
			{
				put_states_in_session();
			}
			$part_state=strToUpper($_POST['partial_state']);
			$foundstate= "";
			foreach($_SESSION['states'] as $state)
			{
				$part_match = substr(strToUpper($state),0,strlen($part_state));
				if($part_match == $part_state) {
					$foundstate .= "<li>" .$state."</li>";
					
				}
			}
			echo $foundstate;
			break;
}

function put_states_in_session()
{
$_SESSION['states']=array("Andaman and Nicobar Islands", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli", "Daman and Diu", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu and Kashmir", "Jharkhand", "Karnataka", "Kerala", "Lakshadweep", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Orissa", "Pondicherry", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Tripura", "Uttaranchal", "Uttar Pradesh", "West Bengal");
}

?>