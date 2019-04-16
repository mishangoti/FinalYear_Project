<?php
	include_once 'Database.php';
	
	/** Here Is Functions Structure
	 *  1. Sanitize
	 *  2. Auth
	 *  3. Store
	 *  4. Delete
	 *  5. List
	 *  6. View
	 *  7. Get data
	 */
	class Functions extends Database
	{
		// cliner function for remove space and perform validation
		/*public function Sanitize($var){
			try{
				$return = mysqli_real_escape_string($this->Connect_db(), $var);
				return $return;
			}catch(Exception $Exception_Sanitize){
				return $Exception_Sanitize;
			}
		}

		// Check userid for login
		public function Auth($email, $password){
			try {
				$UserSqlAuth = "SELECT * FROM user where email = '".$email."' AND password = '".$password."'";
				$Res_UserAuth = mysqli_query($this->Connect_db(), $UserSqlAuth);
				// Associative array
				$Row_UserAuth=mysqli_fetch_array($Res_UserAuth,MYSQLI_ASSOC);
				// print_r($row);exit;
				if(!$Row_UserAuth){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}

				if($Row_UserAuth){
					// $this->SetSession();
					return $Row_UserAuth['id'];
				}else{
					return 0; 
	 			}
			} catch (Exception $Exception_Auth) {
				echo 'Exception Caught ', $Exception_Auth->getMessage();
			}
		}*/

		// For update user data and insert image
		public function StoreCsvData($Data){
			try {
				foreach ($Data as $value) {

					$StoreCsvData = "INSERT INTO data3 (temp,humidity,rainfall,cases,date) VALUES ('$value[1]','$value[2]','$value[3]','$value[4]','$value[5]')";					
					$Result = mysqli_query($this->Connect_db(), $StoreCsvData);
				
				}
				if($Result){
			 		return true;
				}else{
					return false;
				}
			} catch (Exception $Exception_StoreCsv) {
				echo 'Exception Caught ', $Exception_StoreCsv->getMessage();
			}	
		}

		
		// for delete user business
		public function DeleteUserBusiness($Delete_Id){
			try {
				$DeleteSqlUserBusiness = "DELETE FROM multyple_business WHERE business_id='$Delete_Id'";
				// echo $DeleteSqlUserBusiness; exit();
				$Res_DeleteUserBusiness = mysqli_query($this->Connect_db(), $DeleteSqlUserBusiness);
				if(!$Res_DeleteUserBusiness){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}
				if($Res_DeleteUserBusiness){
			 		return true;
				}else{
					return false;
				}
			} catch (Exception $Exception_DeleteUserBusiness) {
				echo 'Exception Caught ', $Exception_DeleteUserBusiness->getMessage();
			}			
		}

		// for show user business
		public function ListUserBusiness($Id){
			try {
				$BusinessSqlUser = "SELECT mb.id,mb.business_id,mb.user_id,business.name as business_name 
									FROM `multyple_business` 
									as mb LEFT JOIN business ON business.`id` = mb.`business_id` where user_id = '".$Id."'";
				$Res_UserBusiness = mysqli_query($this->Connect_db(), $BusinessSqlUser);
				if(!$Res_UserBusiness){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}
				// making associative array
				while($Row_UserBusiness = mysqli_fetch_assoc($Res_UserBusiness)){
				    $ArrUserBusiness[] = $Row_UserBusiness; // Inside while loop
				}
				// echo '<pre>'; 			
				// print_r($ArrUserBusiness); exit;
				if(!empty($ArrUserBusiness)){
					return $ArrUserBusiness;
				}else{
					return 0; 
	 			}	
			} catch (Exception $Exception_ListUserBusiness) {
				echo 'Exception Caught ', $Exception_ListUserBusiness->getMessage();
			}
			
		}

		// for show user profile 
		public function ViewUserBusImages($Business_id, $Id){
			try {	
				// this is example query
				//SELECT mb.*,u.*, b.name as business_name FROM multyple_business mb INNER JOIN user u ON u.id = mb.user_id INNER JOIN business b ON mb.business_id = b.id WHERE mb.user_id = 41

				// SELECT u.id,i.user_id, i.business_id, i.image FROM images i INNER JOIN user u ON u.id = i.user_id WHERE i.user_id = 41

	 			$SqlViewBusImage = "SELECT u.id,i.user_id, i.business_id, i.image FROM images i INNER JOIN user u ON u.id = i.user_id WHERE i.user_id = '$Id' AND i.business_id = '$Business_id'";

	 			// echo $SqlViewBusImage; exit();

				$Res_ViewBusImage = mysqli_query($this->Connect_db(), $SqlViewBusImage);

				if(!$Res_ViewBusImage){
					$error = "Error description: " . mysqli_error($this->Connect_db());
					throw new Exception($error);
				}					
				// makking arry
				while ($Row_ViewBusImage = mysqli_fetch_assoc($Res_ViewBusImage)) {
					$ArrViewBusImage[] = $Row_ViewBusImage;
				}
				// echo '<pre>'; 	
				// print_r($ArrViewBusImage); exit;
				if(!empty($ArrViewBusImage)){
					return $ArrViewBusImage;
				}
			} catch (Exception $Exception_ViewBusImage){
				echo 'Exception Caught ', $Exception_ViewBusImage->getMessage();
			}
		}

	}
	$functions = new Functions();
?>