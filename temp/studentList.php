<head>
    <style>
        table, td, th {
            border: 0.1rem solid black;
            padding: 0.1rem;
        }
    </style>
</head>

<!--creates a table-->
<table>
    <tr>
        <th>student Id</th>
        <th>current belt grade</th>
        <th>next belt grade syllabus</th>
        <th>current status</th>
        <th>required status</th>
        <th>next grading</th>
    </tr>

<!--loops through the database and outputs the results into a table row as data -->
<?php
//---------------------------------------------------
foreach($students as $student)
{
//--------------------------------------------------
?>

    <tr>
        <!--calls from the Student.php class the following methods-->
        <td><?= $student->getStudentId() ?></td>
        <td><?= $student->getCurrentBeltGrade() ?></td>
        <td><?= $student->getNextBeltGradingSyllabus() ?></td>
        <td><?= $student->getCurrentStatus() ?></td>
        <td><?= $student->getRequiredStatus() ?></td>
        <td><?= $student->getNextGrading() ?></td>
    </tr>

<?php
//---------------------------------------------------
}
//---------------------------------------------------
?>

</table>