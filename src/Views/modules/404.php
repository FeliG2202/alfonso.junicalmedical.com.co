  <section class="page_404">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-10 col-sm-offset-1 text-center">
                    <div class="four_zero_four_bg">
                        <h1 class="text-center">404</h1>
                    </div>
                    <div class="contant_box_404">
                        <h3 class="h2">Parece que estás perdido</h3>
                        <p>la pagina que buscas no esta disponible!</p>
                        <?php if (isset($_SESSION['session'])) { ?>
                          <a class="link_404" href="index.php?view=inicio2">Ir a casa</a>
                      <?php } else { ?>
                        <a class="link_404" href="/inicio">Ir a casa</a>
                      <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


