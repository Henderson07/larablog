<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0
* @link https://tabler.io
* Copyright 2018-2025 The Tabler Authors
* Copyright 2018-2025 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>@yield('pageTitle')</title>
	<script defer data-api="/stats/api/event" data-domain="preview.tabler.io" src="/stats/js/script.js"></script>
	<!-- CSS files -->
    <base href="/">
	<link href="./back/dist/css/tabler.min.css?1738448788" rel="stylesheet" />
	<link href="./back/dist/css/tabler-flags.min.css?1738448788" rel="stylesheet" />
	<link href="./back/dist/css/tabler-socials.min.css?1738448788" rel="stylesheet" />
	<link href="./back/dist/css/tabler-payments.min.css?1738448788" rel="stylesheet" />
	<link href="./back/dist/css/tabler-vendors.min.css?1738448788" rel="stylesheet" />
	@stack('stylesheets')

	<link href="./back/dist/css/tabler-marketing.min.css?1738448788" rel="stylesheet" />
	<link href="./back/dist/css/demo.min.css?1738448788" rel="stylesheet" />
	<style>
		@import url('https://rsms.me/inter/inter.css');
	</style>
</head>

<body class=" d-flex flex-column">
	<script src="./back/dist/js/demo-theme.min.js?1738448788"></script>
	@yield('content')
	<!-- Libs JS -->
	<!-- Tabler Core -->
	<script src="./back/dist/js/tabler.min.js?1738448788" defer></script>
    @stack('scripts')
	<script src="./back/dist/js/demo.min.js?1738448788" defer></script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
		integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
		data-cf-beacon='{"rayId":"914a90af490002e7","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.1.0","token":"84cae67e72b342399609db8f32d1c3ff"}'
		crossorigin="anonymous"></script>
</body>

</html>
