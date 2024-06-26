@if(request()->segment(1) === 'profile')
	<!-- Modal -->
	<div class="modal fade dz-pwa-modal" id="pwaModal" tabindex="-1" aria-labelledby="pwaModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<a href="javascript:void(0);" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="feather icon-x"></i></a>
				<img class="logo dark" src="{!! theme_asset('img/app-logo/logo-dk.webp') !!}" alt="">
				<img class="logo light" src="{!! theme_asset('img/app-logo/logo-dk.webp') !!}" alt="">
				<h5 class="title">DK - Distributor Kauniyah Oil & Kauniyah Natural</h5>
				<p class="pwa-text">Pasang "DK - Distributor Kauniyah Oil & Kauniyah Natural" di layar handphone kamu untuk akses yang lebih cepat</p>
				<button type="button" class="btn pwa-btn">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 16.0001V13.0001M12 13.0001V10.0001M12 13.0001H9M12 13.0001H15M4 16.8002V11.4522C4 10.9179 4 10.6506 4.06497 10.4019C4.12255 10.1816 4.2173 9.97307 4.34521 9.78464C4.48955 9.57201 4.69064 9.39569 5.09277 9.04383L9.89436 4.84244C10.6398 4.19014 11.0126 3.86397 11.4324 3.73982C11.8026 3.63035 12.1972 3.63035 12.5674 3.73982C12.9875 3.86406 13.3608 4.19054 14.1074 4.84383L18.9074 9.04383C19.3096 9.39569 19.5102 9.57201 19.6546 9.78464C19.7825 9.97307 19.8775 10.1816 19.9351 10.4019C20 10.6505 20 10.9184 20 11.4522V16.8037C20 17.9216 20 18.4811 19.7822 18.9086C19.5905 19.2849 19.2842 19.5906 18.9079 19.7823C18.4805 20.0001 17.9215 20.0001 16.8036 20.0001H7.19691C6.07899 20.0001 5.5192 20.0001 5.0918 19.7823C4.71547 19.5906 4.40973 19.2849 4.21799 18.9086C4 18.4807 4 17.9203 4 16.8002Z" stroke="#03764D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					<span>Pasang di handphone</span>
				</button>
			</div>
		</div>
	</div>
	<!-- PWA End -->
@endif
