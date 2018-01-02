            <div class="footer-container">
                <div id="footer">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'footer',
                                        'menu_class' => 'nav-footer'
                                    )
                                );
                            ?>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="social-container">
                                <p>
                                    <a target="_blank" href="https://www.facebook.com/Comando-della-Nobile-Parte-di-Mezzogiorno-104218589668522/" class="social-link"><span class="social-text">Comando di Mezzogiorno</span><img class="img-responsive" src="<?=get_template_directory_uri() ?>/images/ico-facebook.png"></a>
                                </p>
                                <p>
                                    <a target="_blank" href="https://www.instagram.com/comando_di_mezzogiorno/" class="social-link"><span class="social-text">comando_di_mezzogiorno</span><img class="img-responsive" src="<?=get_template_directory_uri() ?>/images/ico-instagram.png"></a>
                                </p>
                                <p>
                                    <a target="_blank" href="https://www.youtube.com/channel/UCgl24co8hMj2LGqBLWfn57g" class="social-link"><span class="social-text">Parte di Mezzogiorno</span><img class="img-responsive" src="<?=get_template_directory_uri() ?>/images/ico-youtube.png"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>