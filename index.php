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
/*
function showOptions(array $activities): void {
	foreach($activities as $key=>$activity) {
		$activities[]= ($key+1)." - ".$activity.PHP_EOL;
		return header("Location:home.html?activites=$activities");
	}
}*/

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

//showOptions($activities);//no es necesario pra un view 
//$activity_index = readline("Hei! Quina activitat vols assignar?(Introdueix la opció numèrica)");
/*
if(checkOptionInput(count($activities),$activity_index)) {
	$student_index = array_rand($students);
	$student_name = $students[$student_index]['nom'];
	$student_surname = $students[$student_index]['cognom'];
	echo "Li toca a ".$student_name." ".$student_surname." fer ".$activities[($activity_index)-1]." felicitats!!"; 
}*/

?>
