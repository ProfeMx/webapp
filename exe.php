<?php

$models = ['Activity',
'Answer',
'Attempt',
'Career',
'Certificate',
'Course',
'Enrollment',
'EnrollmentLog',
'File',
'Forum',
'ForumSubscription',
'Homework',
'Lesson',
'Note',
'Path',
'Question',
'Quiz',
'Resource',
'Section',
'Submission',
'Thread',
'ThreadReply',
'User',
'Video',];

foreach ($models as $model) {
    $command = "php builder make:full-model " . $model;
    shell_exec($command);
    echo "Ejecutado: " . $command . "\n";
}

?>
