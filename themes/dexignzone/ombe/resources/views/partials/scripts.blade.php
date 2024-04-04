<!--**********************************
    Scripts
***********************************-->
<script src="{!! theme_asset('js/jquery.js') !!}"></script>
<script src="{!! theme_asset('vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
<script src="{!! theme_asset('vendor/swiper/swiper-bundle.min.js') !!}"></script>
<script src="{!! theme_asset('js/dz.carousel.js') !!}"></script>
<script src="{!! theme_asset('js/settings.js') !!}"></script>
<script src="{!! theme_asset('js/custom.js') !!}"></script>

@if(request()->segment(1) === 'home')
    <script src="{!! theme_asset('index.js') !!}"></script>
@endif

@if(request()->segment(1) === 'produk' OR request()->segment(1) === 'cart')
    <script src="{!! theme_asset('vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') !!}"></script>
@endif

@if(request()->segment(1) === 'addAddress' OR request()->segment(1) === 'cart')
<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="idProvince"]').on('change', function() {
            var provinceId = $(this).val();
            if (provinceId) {
                $.ajax({
                    url: 'https://distributorkauniyah.com/my/public/getCities/' + provinceId,
                    type: 'GET' ,
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="idCity"]').empty();
                        $('select[name="idCity"]').append('<option value="">Pilih Kota / Kab.</option>');
                        $.each(data,function(key, value){
                            if(value['type'] == 'Kabupaten'){
                                tipe = 'Kab.';
                            }
                            else {
                                tipe = 'Kota';
                            }
                            $('select[name="idCity"]').append('<option value="'+value['city_id']+'">'+ tipe + ' ' + value['city_name'] +'</option>');
                        });
                    }
                })
            } else {
                $('select[name="idCity"]').empty();
            }
        });

        $('select[name="idCity"]').on('change', function() {
            var citiesId = $(this).val();
            if (citiesId) {
                $.ajax({
                    url: 'https://distributorkauniyah.com/my/public/getSubdistricts/' + citiesId,
                    type: 'GET' ,
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="idSubdistrict"]').empty();
                        $('select[name="idSubdistrict"]').append('<option value="">Pilih Kecamatan</option>');
                        $.each(data,function(key, value){
                            $('select[name="idSubdistrict"]').append('<option value="'+value['subdistrict_id']+'">' + value['subdistrict_name'] +'</option>');
                        });
                    }
                })
            } else {
                $('select[name="idSubdistrict"]').empty();
            }
        });
    });
</script>
@endif

@if(request()->segment(1) === 'payment')
<script type="text/javascript">
    $(document).ready(function () {
        $('#bankBCA').click(function(){
            $('#bank').val('Transfer Bank BCA');
        });

        $('#bankMandiri').click(function(){
            $('#bank').val('Transfer Bank MANDIRI');
        });
    });
</script>
@endif


@if(request()->segment(1) === 'ongkir' AND !empty(($getOngkir)))
<script type="text/javascript">
    $(document).ready(function () {
        @foreach($getOngkir as $ongkir)
            $('#{{ $ongkir->service }}').click(function(){
                $('#jenisOngkir').val(document.getElementById('jenisOngkir{{ $ongkir->service }}').value);
                $('#hargaOngkir').val(document.getElementById('hargaOngkir{{ $ongkir->service }}').value);
            });
        @endforeach

        $('#Instan').click(function(){
                $('#jenisOngkir').val(document.getElementById('jenisOngkirInstan').value);
                $('#hargaOngkir').val(document.getElementById('hargaOngkirInstan').value);
        });
        $('#Sameday').click(function(){
                $('#jenisOngkir').val(document.getElementById('jenisOngkirSameday').value);
                $('#hargaOngkir').val(document.getElementById('hargaOngkirSameday').value);
        });
    });
</script>
@endif

<!--Start of Tawk.to Script-->

<script type="text/javascript">
    var Tawk_API=Tawk_API||{};
    @if(!empty(auth('web')->user()->name))
        Tawk_API.visitor = {
            name : '{{ auth('web')->user()->name }}',
            email : '{{ auth('web')->user()->email }}',
            hash : '<?php echo hash_hmac("sha256", "{{ auth('web')->user()->email }}","ee8cfbb72d25a71192afa42ac51390053623d147"); ?>'
        };
        Tawk_API.setAttributes = {
            'id'    : 'A1234',
            'store' : 'Midvalley'
        };
    @endif

    Tawk_LoadStart=new Date();
    Tawk_API.customStyle = {
		visibility : {
			desktop : {
				position : 'br',
				xOffset : '60px',
				yOffset : 20
			},
			mobile : {
				position : 'br',
				xOffset : 0,
				yOffset : 70
			},
			bubble : {
				rotate : '0deg',
			 	xOffset : -20,
			 	yOffset : 0
			}
		}
	};
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/660242e81ec1082f04db1dfd/1hpsdana0';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
