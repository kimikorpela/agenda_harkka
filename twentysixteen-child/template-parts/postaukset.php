<?php

// Vastaanotetaan shortcoden attribuutit ja asetetaan ne muuttujaan
    $attributes = get_query_var('attributes');


// Luodaan argumentteja ja asetetaan eri attribuutteja niihin.
    $args = [
        'post_type'         => 'post',
        'meta_key'          => 'otsikko',
        'meta_value'        => $attributes['otsikko'],
        'category_name'     => $attributes['kategoria'],
        'posts_per_page'    => $attributes['kappalemaara'],
        'p'                 => $attributes['post_id']
    ];


// Luodaan uusi WP_Query ja asetetaan se muuttujaan.
    $query = new WP_Query($args);
?>


<?php 
// Katsotaan löytyykö annetuilla argumenteillä postauksia,
// ja näytetään tietyt custom fieldit postauksista while loopin avulla
if($query->have_posts() ):?>

    <div class="grid-container">

        <?php while( $query->have_posts() )  : $query->the_post();?>

            <div class="grid-item">

                <img src="<?php the_field('kuva')?>">

                <h3><?php the_field('otsikko');?></h3>

                <?php the_field('paivamaara');?><br><br>

                <?php
                    $ingressi = get_field('ingressi');
                    echo substr($ingressi, 0, 200);
                    echo "...";
                ?>

                <br><br>

                <a href="<?php echo get_post_permalink();?>">Lue lisää</a>

            </div>

        <?php endwhile;?>
        
    </div>

<?php endif;?>