<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
  <loc>http://www.lestack.fr/fr/index.html</loc>
	<lastmod>2013-03-18T12:00:00+01:00</lastmod>
	<changefreq>weekly</changefreq>
	<priority>1</priority>
</url>
<url>
  <loc>http://www.lestack.fr/en/index.html</loc>
	<lastmod>2013-03-18T12:00:00+01:00</lastmod>
	<changefreq>weekly</changefreq>
	<priority>0.6</priority>
</url>
<url>
  <loc>http://www.lestack.fr/read/about/fr/about.html</loc>
	<lastmod>2013-03-18T12:00:00+01:00</lastmod>
	<changefreq>weekly</changefreq>
	<priority>0.6</priority>
</url>
<url>
  <loc>http://www.lestack.fr/read/about/en/about.html</loc>
	<lastmod>2013-03-18T12:00:00+01:00</lastmod>
	<changefreq>weekly</changefreq>
	<priority>0.6</priority>
</url>
<?php foreach($cards as $card){ ?>
	<url>
		<loc><?php echo "http://www.lestack.fr/Card/view/fr/".$card['Card']['name'].".html"; ?></loc>
		<lastmod>2013-03-18T12:00:00+01:00</lastmod>
		<changefreq>daily</changefreq>
		<priority>0.5</priority>
	</url>
	<url>
		<loc><?php echo "http://www.lestack.fr/Card/view/en/".$card['Card']['name'].".html"; ?></loc>
		<lastmod>2013-03-18T12:00:00+01:00</lastmod>
		<changefreq>daily</changefreq>
		<priority>0.5</priority>
	</url>
<?php } ?>
</urlset>