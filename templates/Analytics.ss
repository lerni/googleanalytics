<% if $AccountId || $GTMAccountId %><script async <% if $SiteConfig.CookieIsActive %>type="text/plain" data-type="application/javascript" data-name="google-analytics" data-<% end_if %>src="https://www.googletagmanager.com/gtag/js?id={$AccountId}"></script>
<script <% if $SiteConfig.CookieIsActive %>type="text/plain" data-type="application/javascript" data-name="google-analytics"<% end_if %>>
	<% if $AccountId %>window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());
	gtag('config', '{$AccountId}', { 'anonymize_ip': true });<% end_if %>
	<% if $GTMAccountId %>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','{$GTMAccountId}');<% end_if %>
</script><% end_if %>
<% if $AccountV4IDs.Count() %><script async <% if $SiteConfig.CookieIsActive %>type="text/plain" data-type="application/javascript" data-name="google-analytics" data-<% end_if %>src="https://www.googletagmanager.com/gtag/js?id={$AccountV4IDs.First().Item}"></script>
<script <% if $SiteConfig.CookieIsActive %>type="text/plain" data-type="application/javascript" data-name="google-analytics"<% end_if %>>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments)};
	gtag('js', new Date());
	<% loop $AccountV4IDs %>gtag('config', '{$Item}');<% end_loop %>
</script><% end_if %>
<% if $Clarity %><script <% if $SiteConfig.CookieIsActive %>type="text/plain" data-type="application/javascript" data-name="clarity"<% end_if %>>
	(function(c,l,a,r,i,t,y){
		c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
		t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
		y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
		})(window, document, "clarity", "script", "{$Clarity}");
</script><% end_if %>
