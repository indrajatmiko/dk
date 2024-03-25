<!--**********************************
    Scripts
***********************************-->
<script src="{!! theme_asset('js/jquery.js') !!}"></script>
<script src="{!! theme_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<script src="{!! theme_asset('vendor/swiper/swiper-bundle.min.js') !!}"></script>
<script src="{!! theme_asset('js/dz.carousel.js') !!}"></script>
<script src="{!! theme_asset('js/settings.js') !!}"></script>
<script src="{!! theme_asset('js/custom.js') !!}"></script>
<script src="{!! theme_asset('index.js') !!}"></script>

@if(request()->segment(1) === 'produk' OR request()->segment(1) === 'cart')
    <script src="{!! theme_asset('vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') !!}"></script>
@endif
