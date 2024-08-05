<?php

if(!defined('ABSPATH')) exit;

function quizbook_results(){

    if (isset($_POST['data'])) {
        $results = $_POST['data'];
    }

    $grade = 0;

    foreach ($results as $result) {
        $question = explode(':', $result);

        $correct = get_post_meta( $question[0], 'correct_quizbook', true );

        $correct_letter = explode(':', $correct);

        if ($correct_letter[1] === $question[1]) {
            $grade += 10;
        }
    }

    $total_grade = array(
        'total' => $grade
    );

    $response = array(
        'response' => $_POST
    );

    header('Content-Type: application/json');
    echo json_encode($grade);
    die();

}

add_action( 'wp_ajax_nopriv_quizbook_results', 'quizbook_results');
add_action( 'wp_ajax_quizbook_results', 'quizbook_results');