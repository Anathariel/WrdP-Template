<?php get_header(); ?>
<main id="error-page">
        <section class="left-side">
            <p>Erreur 404</p>
            <h1>Page non trouvé</h1>
            <p>Désolé, nous n'avons pas pu trouver la page que vous recherchez.</p>

            <div class="button-error">
                <button id="return">
                    Retour
                </button>

                <button id="home"> <a href="<?php echo esc_url(home_url('/')); ?>">Accueil</a></button>
            </div>
        </section>

        <figure>
            <img src="<?php echo get_template_directory_uri(); ?>/asset/media/pictures/v535batch2-mynt-30.jpg" alt="placeholder image">
        </figure>
    </main>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#return').click(function(){
            window.history.back();
        });
    });
</script>
    <?php get_footer(); ?>