<script async <% if $SiteConfig.CookieIsActive %>type="text/plain" data-type="application/javascript" data-name="google-analytics" data-<% end_if %>src="https://www.googletagmanager.com/gtag/js?id={$accountId}"></script>
<script <% if $SiteConfig.CookieIsActive %>type="text/plain" data-type="application/javascript" data-name="google-analytics"<% end_if %>>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', '{$accountId}', { 'anonymize_ip': true });
	<% if $GTMAccountId %>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','{$GTMAccountId}');<% end_if %>
</script>