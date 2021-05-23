
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>

    <div class="section-body">
        <div class="hero text-white hero-bg-image hero-bg-parallax mb-4" data-background="assets/img/unsplash/andre-benz-1214056-unsplash.jpg" style="background-image: url(&quot;assets/img/unsplash/andre-benz-1214056-unsplash.jpg&quot;);">
            <div class="hero-inner">
                <h2><?= Custom::greeting() . ', ' . $_SESSION['user']['full_name']?>!</h2>
                <p class="lead">How is your day going?</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
            </div>
        </div>
    </div>
</section>

