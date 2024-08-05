<?php

if(!defined('ABSPATH')) exit;

function quizbook_shortcode($atts){
    $args = array(
        'post_type' => 'quizes',
        'posts_per_page' => $atts['questions'],
        'orderby' => $atts['order'],
    );

    $quizbook = new WP_Query($args);
    ?>

    <form action="" name="quizbook_send" id="quizbook_send">

        <div id="quizbook" class="quizbook">
            <ul>
                <?php while($quizbook->have_posts()) : $quizbook->the_post(); ?>
                    
                <li>
                    <?php the_title('<h2>', '</h2>');  ?>
                    <?php the_content();  ?>

                    <?php
                        $opciones = get_post_meta( get_the_ID());
                        foreach($opciones as $key => $opcion){
                            $result = quizbook_question_filter($key);
                            if ($result === 0) {
                                $numero = explode('_', $key);
                                ?>
                                <div id="<?php echo get_the_ID() . ":" . $numero[2]; ?>" class="answer">
                                    <?php echo $opcion[0];  ?>
                                </div>

                            <?php    
                            }
                        }
                    ?>
                </li>

                <?php endwhile; wp_reset_postdata();  ?>
            </ul>
        </div>
        <input type="submit" value="Send" id="quizbook-btn-submit">

        <div id="quizbook_result"></div>

    </form>

<?php
}

add_shortcode( 'quizbook', 'quizbook_shortcode' );