<?php

if (!defined('ABSPATH')) exit;

function quizbook_aggregate_metaboxes(){
    add_meta_box('quizbook_meta_box', 'Answers', 'quizbook_metaboxes', 'quizes', 'normal', 'high', null);
}

add_action( 'add_meta_boxes', 'quizbook_aggregate_metaboxes');

function quizbook_metaboxes($post){ 
    wp_nonce_field( __FILE__, 'quizbook_nonce')
    
    ?>

    <table class="form-table">
        <tr>
            <th class="row-title">
                <h2> Add answers here </h2>
            </th>
        </tr>
        <tr>
            <th class="row-title">
                <label for="answer_a">a)</label>
            </th>
            <td>
                <input value="<?php echo esc_attr(get_post_meta( $post->ID, 'qb_answer_a', true )); ?>" type="text" id="answer_a" name="qb_answer_a" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="answer_b">b)</label>
            </th>
            <td>
                <input value="<?php echo esc_attr(get_post_meta( $post->ID, 'qb_answer_b', true )); ?>" type="text" id="answer_b" name="qb_answer_b" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="answer_c">c)</label>
            </th>
            <td>
                <input value="<?php echo esc_attr(get_post_meta( $post->ID, 'qb_answer_c', true )); ?>" type="text" id="answer_c" name="qb_answer_c" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="answer_a">d)</label>
            </th>
            <td>
                <input value="<?php echo esc_attr(get_post_meta( $post->ID, 'qb_answer_d', true )); ?>" type="text" id="answer_d" name="qb_answer_d" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="answer_d">e)</label>
            </th>
            <td>
                <input  value="<?php echo esc_attr(get_post_meta( $post->ID, 'qb_answer_e', true )); ?>" type="text" id="answer_e" name="qb_answer_e" class="regular-text">
            </td>
        </tr>
        <tr>
            <th class="row-title">
                <label for="correct_answer"> Correct Answer </label>
            </th>
            <td>
                <?php $answer = esc_html(get_post_meta( $post->ID, 'correct_quizbook', true )); ?>
                <select name="correct_quizbook" id="correct_answer" class="postbox">
                    <option value=""> Choose the right option </option>
                    <option <?php selected( $answer, 'qb_correct:a'); ?> value="qb_correct:a"> a </option>
                    <option <?php selected( $answer, 'qb_correct:b'); ?> value="qb_correct:b"> b </option>
                    <option <?php selected( $answer, 'qb_correct:c'); ?> value="qb_correct:c"> c </option>
                    <option <?php selected( $answer, 'qb_correct:d'); ?> value="qb_correct:d"> d </option>
                    <option <?php selected( $answer, 'qb_correct:e'); ?> value="qb_correct:e"> e </option>
                </select>
            </td>
        </tr>
    </table>


    <?php
}

function quizbook_save_metaboxes($post_id, $post, $update){

    if (!isset($_POST['quizbook_nonce']) || !wp_verify_nonce( $_POST['quizbook_nonce'], basename(__FILE__) )) {
        return $post_id;
    }

    if (!current_user_can( 'edit_post', $post_id )) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    $answer_1 = $answer_2 = $answer_3 = $answer_4 = $answer_5 = $correct_answer = '';

    if (isset( $_POST['qb_answer_a'])) {
        $answer_1 = sanitize_text_field($_POST['qb_answer_a']);
    }
    update_post_meta( $post_id, 'qb_answer_b', $answer_1);

    if (isset( $_POST['qb_answer_b'])) {
        $answer_2 = sanitize_text_field($_POST['qb_answer_b']);
    }
    update_post_meta( $post_id, 'qb_answer_b', $answer_2);

    if (isset( $_POST['qb_answer_c'])) {
        $answer_3 = sanitize_text_field($_POST['qb_answer_c']);
    }
    update_post_meta( $post_id, 'qb_answer_c', $answer_3);

    if (isset( $_POST['qb_answer_d'])) {
        $answer_4 = sanitize_text_field($_POST['qb_answer_d']);
    }
    update_post_meta( $post_id, 'qb_answer_d', $answer_4);

    if (isset( $_POST['qb_answer_e'])) {
        $answer_5 = sanitize_text_field($_POST['qb_answer_e']);
    }
    update_post_meta( $post_id, 'qb_answer_e', $answer_5);

    if (isset( $_POST['correct_quizbook'])) {
        $correct_answer = sanitize_text_field($_POST['correct_quizbook']);
    }
    update_post_meta( $post_id, 'correct_quizbook', $correct_answer);
    

    
}

add_action( 'save_post', 'quizbook_save_metaboxes', 10, 3);