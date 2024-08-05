<?php

function quizbook_question_filter($key){
    return strpos($key, 'qb_');
}
