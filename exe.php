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

foreach ($modelos as $modelo) {
    $comando = "php builder make:full-model " . $modelo;
    shell_exec($comando);
    echo "Ejecutado: " . $comando . "\n";
}

?>
