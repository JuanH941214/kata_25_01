<?php
/*TO-DO
- Data validation of json file
- Put file by terminal program invocation
- With excel files too?
*/
include('files/activities.php');

function LoadStudents():array {
	$str = file_get_contents('./files/students.json');
	$array = json_decode($str, true);
	return $array['students'];
}

function checkOptionInput(int $activities_count,string $option): bool {
	return is_numeric($option) && $option > 0 && $option <= $activities_count;
}

function selectStudent(array $students){
	$indexStudent=count($students);
	$selectedStudent=rand(0,$indexStudent-1);
	return $students[$selectedStudent];

}

if ($_SERVER["REQUEST_METHOD"]== "POST"){
	if(isset($_POST['taskType'])){
		
		
		$students = LoadStudents();
		$selectedActivity=$_POST['taskType'];
		$selectedStudent= selectStudent($students);
		$serializedStudent = serialize($selectedStudent);
		$encodedStudent = urlencode($serializedStudent);
		//var_dump($encodedStudent);
		//exit(0);
		header("Location:home.php?selectedStudent=$encodedStudent&selectedActivity=$selectedActivity");
		
		exit();
	}

}
else{
	header("Location:home.php?error=taskType_not_provided");

}
?>
