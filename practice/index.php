<?php

require_once 'vendor/autoload.php';

use App\Group;
use App\Student;

function printStudentInfo(Student $student): void
{
    $average = round($student->getAverage(), 2);
    echo "Студент: " . $student->lastName . " " . $student->firstName . " " . $student->patronymic
        . ", средний балл: " . $average . PHP_EOL;
}

function printGroupInfo(Group $group): void
{
    $count = count($group->students);
    $average = round($group->getGroupAverage(), 2);
    echo "Группа: " . $group->groupName
        . ", количество студентов: " . $count
        . ", общий средний балл: " . $average . PHP_EOL;
}

$student1 = new Student("Иванов", "Иван", "Иванович");
$student1->addGrade(5);
$student1->addGrade(4);
$student1->addGrade(5);

$student2 = new Student("Петров", "Петр", "Петрович");
$student2->addGrade(3);
$student2->addGrade(4);
$student2->addGrade(4);

$student3 = new Student("Сидорова", "Анна", "Сергеевна");
$student3->addGrade(5);
$student3->addGrade(5);
$student3->addGrade(5);

$group = new Group("П-31");
$group->addStudent($student1);
$group->addStudent($student2);
$group->addStudent($student3);

echo "Информация о студентах:" . PHP_EOL;
foreach ($group->students as $student) {
    printStudentInfo($student);
}

echo PHP_EOL . "Информация о группе:" . PHP_EOL;
printGroupInfo($group);

$bestStudent = $group->getBestStudent();
if ($bestStudent !== null) {
    echo PHP_EOL . "Лучший студент:" . PHP_EOL;
    printStudentInfo($bestStudent);
}
