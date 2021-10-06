<div class="mt-12">
	<div class="flex justify-center">
		<img class="w-2/3" src="{{ $asset['0']->thumbnail }}" alt="">
	</div>
	<div class="flex justify-center">
		<hr class="mt-12 w-3/4">
	</div>
	<div class="flex justify-center mt-5">
		<div class="w-full md:w-2/3">
			<div class="flex">
				<span>{{ $asset['0']->name }}</span>
				<div class="flex justify-around w-1/2 md:w-1/3 text-2xl text-gray-900">
					<button>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
							<path d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
						</svg>
					</button>
					<button>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
							<path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z" />
							<path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z" />
						</svg>
					</button>
					<button>
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
							<path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z" />
						</svg>
					</button>
				</div>
			</div>
			<div class="flex flex-col items-end">
				<img class="w-12" src="{{ $asset['0']->logo }}" alt="">
				<span class="text-sm">{{ $asset['0']->partner }}</span>
				<span class="text-gray-600 text-sm">{{ $asset['0']->city }}, {{ $asset['0']->country }}</span>
			</div>
			<div class="flex">
				<span class="w-full md:w-1/2">{!! nl2br(e($asset['0']->details)) !!}</span>
			</div>
		</div>
	</div>
	<div class="flex justify-center mt-5">
		<div class="w-full md:w-2/3 px-2 md:px-0">
			<div class="flex flex-wrap bg-blue-500 rounded-lg p-3">
				<div class="flex w-full md:w-1/5 items-center">
					<svg class="w-14 mt-6" viewBox="0 0 48 53"><g transform="translate(.636 6.093)"><linearGradient id="SVGID_21_i1" gradientUnits="userSpaceOnUse" x1="-1929.614" y1="2591.047" x2="-1929.351" y2="2590.169" gradientTransform="matrix(3.1909 0 0 -10.6364 6165.93 27565.979)"><stop offset="0" stop-color="#2e3278" stop-opacity=".2"></stop><stop offset="1" stop-color="#2e3278" stop-opacity="0"></stop></linearGradient><path fill="url(#SVGID_21_i1)" d="M7.45 5.05h3.19v10.64H7.45z"></path><linearGradient id="SVGID_22_i2" gradientUnits="userSpaceOnUse" x1="-1929.614" y1="2591.047" x2="-1929.351" y2="2590.169" gradientTransform="matrix(3.1909 0 0 -10.6364 6173.376 27565.979)"><stop offset="0" stop-color="#2e3278" stop-opacity=".2"></stop><stop offset="1" stop-color="#2e3278" stop-opacity="0"></stop></linearGradient><path fill="url(#SVGID_22_i2)" d="M14.89 5.05h3.19v10.64h-3.19z"></path><linearGradient id="SVGID_23_i3" gradientUnits="userSpaceOnUse" x1="-2752.981" y1="2796.019" x2="-2752.564" y2="2795.555" gradientTransform="matrix(49 0 0 -47.6726 134911.188 133306.86)"><stop offset="0" stop-color="#2e3278" stop-opacity=".1"></stop><stop offset="1" stop-color="#2e3278" stop-opacity="0"></stop></linearGradient><path fill="url(#SVGID_23_i3)" d="M25.26 0l-.06.01c.17.17.3.4.32.65l.01 2.26h-1.06v1.33c0 .53-.27.8-.8.8h-1.33v10.64h1.06c.53 0 .8.27.8.8v1.33h.53c.53 0 .8.27.8.8v2.39H0l24.56 26.64c.37.02.75.03 1.13.03 12.38 0 22.51-9.65 23.31-21.86L25.26 0z"></path></g><g transform="translate(.636 -.023)"><g transform="translate(3.19 11.168)"><linearGradient id="SVGID_24_i4" gradientUnits="userSpaceOnUse" x1="-2152.857" y1="2586.882" x2="-2152.857" y2="2586.188" gradientTransform="matrix(4.2545 0 0 -10.6683 9161.556 27598.135)"><stop offset="0" stop-color="#e5e5e5"></stop><stop offset="0" stop-color="#e6e6e6"></stop><stop offset="1" stop-color="#f2f2f2"></stop></linearGradient><path fill="url(#SVGID_24_i4)" d="M0 0h4.25v10.67H0V0"></path><linearGradient id="SVGID_25_i5" gradientUnits="userSpaceOnUse" x1="-2152.857" y1="2190.146" x2="-2152.857" y2="2189.148" gradientTransform="matrix(4.2545 0 0 -4.2545 9161.556 9318.074)"><stop offset="0" stop-color="#e5e5e5"></stop><stop offset="0" stop-color="#ccc"></stop><stop offset="1" stop-color="#e6e6e6"></stop></linearGradient><path fill="url(#SVGID_25_i5)" d="M4.25 4.25V0H0z"></path></g><g transform="translate(10.636 11.168)"><linearGradient id="SVGID_26_i6" gradientUnits="userSpaceOnUse" x1="-2160.302" y1="2586.882" x2="-2160.302" y2="2586.188" gradientTransform="matrix(4.2545 0 0 -10.6683 9193.232 27598.135)"><stop offset="0" stop-color="#e5e5e5"></stop><stop offset="0" stop-color="#e6e6e6"></stop><stop offset="1" stop-color="#f2f2f2"></stop></linearGradient><path fill="url(#SVGID_26_i6)" d="M0 0h4.25v10.67H0V0"></path><linearGradient id="SVGID_27_i7" gradientUnits="userSpaceOnUse" x1="-2160.302" y1="2190.146" x2="-2160.302" y2="2189.148" gradientTransform="matrix(4.2545 0 0 -4.2545 9193.232 9318.074)"><stop offset="0" stop-color="#e5e5e5"></stop><stop offset="0" stop-color="#ccc"></stop><stop offset="1" stop-color="#e6e6e6"></stop></linearGradient><path fill="url(#SVGID_27_i7)" d="M4.25 4.25V0H0z"></path></g><g transform="translate(18.082 11.168)"><linearGradient id="SVGID_28_i8" gradientUnits="userSpaceOnUse" x1="-2167.748" y1="2586.882" x2="-2167.748" y2="2586.188" gradientTransform="matrix(4.2545 0 0 -10.6683 9224.91 27598.135)"><stop offset="0" stop-color="#e5e5e5"></stop><stop offset="0" stop-color="#e6e6e6"></stop><stop offset="1" stop-color="#f2f2f2"></stop></linearGradient><path fill="url(#SVGID_28_i8)" d="M0 0h4.25v10.67H0V0"></path><linearGradient id="SVGID_29_i9" gradientUnits="userSpaceOnUse" x1="-2167.748" y1="2190.146" x2="-2167.748" y2="2189.148" gradientTransform="matrix(4.2545 0 0 -4.2545 9224.91 9318.074)"><stop offset="0" stop-color="#e5e5e5"></stop><stop offset="0" stop-color="#ccc"></stop><stop offset="1" stop-color="#e6e6e6"></stop></linearGradient><path fill="url(#SVGID_29_i9)" d="M4.25 4.25V0H0z"></path></g><linearGradient id="SVGID_30_i10" gradientUnits="userSpaceOnUse" x1="-2690.051" y1="1541.29" x2="-2690.051" y2="1540.579" gradientTransform="matrix(23.4 0 0 -2.1273 62959.953 3287.836)"><stop offset="0" stop-color="#e5e5e5"></stop><stop offset="1" stop-color="#f2f2f2"></stop></linearGradient><path fill="url(#SVGID_30_i10)" d="M24.46 9.04H1.06v1.33c0 .53.27.8.8.8h21.8c.53 0 .8-.27.8-.8V9.04z"></path><linearGradient id="SVGID_31_i11" gradientUnits="userSpaceOnUse" x1="-2569.707" y1="1540.861" x2="-2569.917" y2="1540.823" gradientTransform="matrix(11.7 0 0 -2.1273 30075.512 3287.836)"><stop offset="0" stop-color="#262626" stop-opacity=".1"></stop><stop offset="1" stop-color="#262626" stop-opacity="0"></stop></linearGradient><path fill="url(#SVGID_31_i11)" d="M1.06 9.04v1.33c0 .53.27.8.8.8h10.9V9.04H1.06z"></path><path fill="#F7F7F7" d="M13.11.06C13 .03 12.89 0 12.76 0c-.16 0-.3.03-.44.1l-.36.17L.48 5.99c-.26.18-.45.48-.47.82V9.05h25.52l-.01-2.26a1.07 1.07 0 00-.48-.79s-.16-.09-.2-.1L13.29.14l-.18-.08z"></path><linearGradient id="SVGID_32_i12" gradientUnits="userSpaceOnUse" x1="-2589.488" y1="2549.851" x2="-2589.876" y2="2550.126" gradientTransform="matrix(12.7583 0 0 -9.0382 33048.996 23053.273)"><stop offset="0" stop-color="#262626" stop-opacity=".1"></stop><stop offset="1" stop-color="#262626" stop-opacity="0"></stop></linearGradient><path fill="url(#SVGID_32_i12)" d="M12.76 0c-.16 0-.3.03-.44.1l-.36.17L.48 5.99c-.26.18-.45.48-.47.82V9.05h12.76V0z"></path><path fill="#FFF" d="M.48 6.26L11.97.54l.36-.17a1.03 1.03 0 01.79-.04l.18.08 11.55 5.74.2.1c.26.17.45.46.48.79l.01 1.99-.01-2.26a1.07 1.07 0 00-.48-.79s-.16-.09-.2-.1L13.29.14l-.18-.08C13 .03 12.89 0 12.76 0c-.16 0-.3.03-.44.1l-.36.17L.48 5.99c-.26.18-.45.48-.47.82v.27c.02-.34.21-.65.47-.82z"></path><path fill="#F7F7F7" d="M23.4 21.8H2.13c-.53.01-.8.27-.8.8v1.33H24.2V22.6c0-.53-.27-.8-.8-.8zM25.53 24.73c0-.53-.27-.8-.8-.8H.8c-.53 0-.8.27-.8.8v2.39h25.53v-2.39z"></path><linearGradient id="SVGID_33_i13" gradientUnits="userSpaceOnUse" x1="-2589.64" y1="1980.729" x2="-2589.877" y2="1980.788" gradientTransform="matrix(12.7636 0 0 -3.1909 33063.941 6346.123)"><stop offset="0" stop-color="#e5e5e5"></stop><stop offset="0" stop-color="#e6e6e6"></stop><stop offset="1" stop-color="#f2f2f2"></stop></linearGradient><path fill="url(#SVGID_33_i13)" d="M12.76 23.93H.8c-.53 0-.8.27-.8.8v2.39h12.76v-3.19z"></path><linearGradient id="SVGID_34_i14" gradientUnits="userSpaceOnUse" x1="-2564.01" y1="1540.745" x2="-2564.206" y2="1540.781" gradientTransform="matrix(11.4341 0 0 -2.1273 29328.402 3300.597)"><stop offset="0" stop-color="#e5e5e5"></stop><stop offset="0" stop-color="#e6e6e6"></stop><stop offset="1" stop-color="#f2f2f2"></stop></linearGradient><path fill="url(#SVGID_34_i14)" d="M12.76 21.8H2.13c-.53 0-.8.27-.8.8v1.33h11.43V21.8z"></path><path fill="#FFF" d="M23.4 21.8H2.13c-.53.01-.8.27-.8.8v.27c0-.53.27-.79.8-.8H23.4c.53 0 .8.38.8.8v-.27c0-.53-.27-.8-.8-.8zM24.73 23.93H.8c-.53.01-.8.27-.8.8V25c0-.53.27-.79.8-.8h23.93c.53 0 .8.38.8.8v-.27c0-.53-.27-.8-.8-.8z"></path><path opacity=".1" d="M25.53 27.39H.27L0 27.12h25.53z"></path></g></svg>
					<div class="flex items-center">
						<span class="text-white font-bold text-lg">Get the app</span>
					</div>
				</div>
				<div class="flex items-center w-full md:w-2/5 text-white">Explore museums and play with Art Transfer, Pocket Galleries, Art Selfie and more</div>
				<div class="flex items-center w-1/2 md:w-1/5 items-center">
					<img class="w-full" src="https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png">
				</div>
				<div class="flex items-center w-1/2 md:w-1/5 items-center">
					<img class="w-full" src="//www.gstatic.com/culturalinstitute/stella/apple-app-store-badge-en.svg">
				</div>
			</div>
		</div>
	</div>
	<div class="flex flex-wrap md:px-10">
		{{-- <pre>{{ print_r($asset['0']->id) }}</pre>
		<pre>{{ print_r($asset['0']->name) }}</pre>
		<pre>{{ print_r($asset['0']->thumbnail) }}</pre>
		<pre>{{ print_r($asset['0']->details) }}</pre>
		<pre>{{ print_r($asset['0']->country) }}</pre>
		<pre>{{ print_r($asset['0']->city) }}</pre>
		<pre>{{ print_r($asset['0']->partner) }}</pre>
		<pre>{{ print_r($asset['0']->logo) }}</pre> --}}
	</div>
</div>