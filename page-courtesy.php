<?php get_header(); ?>

    <script>
    // Set the date we're counting down to
    var countDownDate = new Date("Dec 22, 2017 08:00:00").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("counter").innerHTML = days + " giorni " + hours + " ore "
            + minutes + " minuti " + seconds + " secondi ";

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("counter").innerHTML = "ONLINE";
        }
    }, 1000);
</script>

    <div class="main-container generic">
        <div style="display: table-row">
            <div class="logo-container">
                <div class="logo">
                    <img class="img-responsive" src="<?=get_template_directory_uri() ?>/images/logo-mezzogiorno.png">
                </div>
                <div id="intestazione">PARTE DI MEZZOGIORNO</div>
                <div id="sotto-intestazione">Presto online</div>
                <!--<div id="counter"></div>-->
            </div>
        </div>
        <div style="display: table-row">
            <div id="credits">
                <div><span class="credits-name">Giovanni Battista Garzella</span>&nbsp;<span class="credits-job">Sviluppo</span></div>
                <div><span class="credits-name">Francesca Deri</span>&nbsp;<span class="credits-job">Grafica</span></div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>