<footer class="mt-5">
    <div class="container d-flex">
        <div class="footer-section">
            <div class="footer_brand">
                <div class="brand">
                    <h1>Finura</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <div class="footer_nav">
                <h1 class="text-c-5">Menu</h1>
                <div class="footer_nav_group d-flex justify-content-between gap-2">

                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                        </li>
                        <li><a href="<?php echo esc_url(home_url('/shop')); ?>">Store</a>
                        </li>
                        <li><a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a>
                    </ul>

                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Blog</a>
                        </li>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Payment and delivery</a>
                        </li>
                        <li><a href="<?php echo esc_url(home_url('/')); ?>">Privacy policy</a>
                    </ul>

                </div>
            </div>
            <div class="footer_subscribe ">
                <h1>Subscribe to notifications about new products</h1>
                <div class="footer_subscribe_container">
                    <form action="" method="get">
                        <input class="mb-2" placeholder="e-mail" type="email" name="" id="" />
                        <button>Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</footer>
<?php wp_footer(); ?>
</body>

</html>