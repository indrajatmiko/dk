	<!-- Preloader -->
	<div id="preloader">
		<div class="loader">
			<div class="spinner-border text-primary" role="status">
				<span class="visually-hidden">Loading...</span>
			</div>
		</div>
	</div>
    <!-- Preloader end-->

	<!-- Header -->
	<header class="header header-fixed">
		<div class="header-content">
			<div class="left-content">
				<a href="javascript:void(0);" class="back-btn">
					<i class="feather icon-arrow-left"></i>
				</a>
			</div>
			<div class="mid-content">
				<h4 class="title">{{ $pageTitle }}</h4>
			</div>
            <!-- right button -->
            @if(request()->segment(1) === 'profile')
                <div class="right-content d-flex align-items-center gap-4">
                    <a href="edit-profile.html">
                        <svg enable-background="new 0 0 461.75 461.75" height="24" viewBox="0 0 461.75 461.75" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m23.099 461.612c2.479-.004 4.941-.401 7.296-1.177l113.358-37.771c3.391-1.146 6.472-3.058 9.004-5.587l226.67-226.693 75.564-75.541c9.013-9.016 9.013-23.63 0-32.645l-75.565-75.565c-9.159-8.661-23.487-8.661-32.645 0l-75.541 75.565-226.693 226.67c-2.527 2.53-4.432 5.612-5.564 9.004l-37.794 113.358c-4.029 12.097 2.511 25.171 14.609 29.2 2.354.784 4.82 1.183 7.301 1.182zm340.005-406.011 42.919 42.919-42.919 42.896-42.896-42.896zm-282.056 282.056 206.515-206.492 42.896 42.896-206.492 206.515-64.367 21.448z" fill="#4A3749"></path>
                        </svg>
                    </a>
                </div>
            @endif
		</div>
	</header>
	<!-- Header -->
