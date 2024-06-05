   <footer>
    <div class="py-5 bg-dark">
        <div class="container bg-dark">
            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-white fw-bold">Foodcourt</h4>
                    <div class="underline mb-2"></div>
                    <a href="" class="text-white"><i class="fa fa-angle-right"></i> Home</a><br>
                    <a href="" class="text-white"><i class="fa fa-angle-right"></i> About us</a><br>
                    <a href="" class="text-white"><i class="fa fa-angle-right"></i> Collections</a><br>
                    <a href="" class="text-white"><i class="fa fa-angle-right"></i> MyCart</a><br>
                    <a href="" class="text-white"><i class="fa fa-angle-right"></i> Contact us</a>
                </div>
                <div class="col-md-3">
                <h4 class="text-white fw-bold">Address</h4>
                    <div class="text-white">
                        <p class="text-white">Vadigam Food Court</p>
                        <p class="text-white">A27, Ajanta Commercial Center, New, RBI Road, Income Tax, Usmanpura, Ahmedabad, Gujarat 380014</p>
                        <a href="tel: +919624888809" class="text-white"><i class="fa fa-phone"> +91 9624888809</i></a><br>
                        <a href="vdfoodcourt@yahoo.com" class="text-white"><i class="fa fa-envelope"> vdfoodcourt@yahoo.com</i></a>
                    </div>
                </div>
                <div class="col-md-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.5150075805836!2d72.56785457514121!3d23.041573179160522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e8460581ff5ff%3A0xc34c71d0d5f11f9c!2sVadigam%20Food%20Court!5e0!3m2!1sen!2sin!4v1707240564527!5m2!1sen!2sin"
                            class="w-100" height="230" style="border-radius:15px;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
            </div>
            </div>
        </div>
    </div>
    <div class="py-2 bg-success">
    <div class="text-center">
        <p class="mb-0 text-white">All rights reserved. Copyright @ <?=date('Y')?> Foodcourt</p>
    </div>
</div>
   </footer>
   <!-- Bootstrap JS CDN LINK-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="partials/js/script.js"></script>

     <!-- Alertify JS CDN LINK-->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>         
<?php
          if(isset($_SESSION['message'])){
            ?>
                alertify.set('notifier', 'position', 'top-right');
                alertify.success("<?=$_SESSION['message'];?>");
        <?php
            }
              unset($_SESSION['message']);
        ?>
    </script>
    </body>

    </html>