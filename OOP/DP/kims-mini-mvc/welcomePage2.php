<html>
<body>

<p>Welcome dudes and dudettes!</p>
<p>This is page 2</p>

<?php
$students = $this->student->students;
echo "We welcome: ";
foreach ($students as $student){
    echo $student ." ";
}
echo "to this course";
?>
</body>


</html>