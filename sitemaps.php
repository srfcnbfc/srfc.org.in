<?php
header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 
?>

<?php 
include('app/config/data-connect.php');
include('app/config/include/data-collect.php');
if($conn->connect_error){
 die("Connection failed:" . $conn->connect_error);
}
$web_url ="https://srfc.org.in/";

$blog_sql = "SELECT blog_id,blog_title,blog_slug, blog_img FROM blog ORDER BY blog_id DESC";
$blog_row = getData($blog_sql);

?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">


<url>
<loc>https://srfc.org.in/</loc>
<lastmod>2023-04-26T08:19:25+01:00</lastmod>
<priority>0.6</priority>
</url>
<url>
<loc>https://srfc.org.in/about</loc>
<lastmod>2023-04-26T08:19:25+01:00</lastmod>
<priority>1.0</priority>
</url>
<url>
<loc>https://srfc.org.in/board-of-director</loc>
<lastmod>2023-04-26T08:19:25+01:00</lastmod>
<priority>1.0</priority>
</url>
<url>
<loc>https://srfc.org.in/services/two-wheeler-finance</loc>
<lastmod>2023-04-26T08:19:25+01:00</lastmod>
<priority>0.8</priority>
</url>
<url>
<loc>https://srfc.org.in/services/business-loan</loc>
<lastmod>2023-04-26T08:19:25+01:00</lastmod>
<priority>0.8</priority>
</url>
<url>
<loc>https://srfc.org.in/services/personal-loan-government-employee</loc>
<lastmod>2023-04-26T08:19:25+01:00</lastmod>
<priority>0.8</priority>
</url>
<url>
<loc>https://srfc.org.in/services/two-wheeler-re-financeloan</loc>
<lastmod>2023-04-26T08:19:25+01:00</lastmod>
<priority>0.8</priority>
</url>
<url>
<loc>https://srfc.org.in/csr</loc>
<lastmod>2023-04-26T08:19:25+01:00</lastmod>
<priority>1.0</priority>
</url>
<url>
<loc>https://srfc.org.in/blog</loc>
<lastmod>2023-04-26T08:19:25+01:00</lastmod>
<priority>1.0</priority>
</url>
<url>
<loc>https://srfc.org.in/career</loc>
<lastmod>2023-04-26T08:19:25+01:00</lastmod>
<priority>1.0</priority>
</url>
<url>
<loc>https://srfc.org.in/contact</loc>
<lastmod>2023-04-26T08:19:25+01:00</lastmod>
<priority>1.0</priority>
</url>
<url>
<loc>https://srfc.org.in/privacy-policy</loc>
<lastmod>2023-04-26T08:19:25+01:00</lastmod>
<priority>1.0</priority>
</url>

<?php
foreach($blog_row as $key => $blog){
	$blog_time1 = date_create($blog['blog_time']);
	$blog_time= date_format($blog_time1,'Y-m-d');
	$blog_slug = $blog['blog_slug'];

	echo '<url>' . PHP_EOL;
	echo '<loc>https://srfc.org.in/blogs/'.$blog_slug.'</loc>' . PHP_EOL;
	echo '<lastmod>'.$blog_time.'T08:19:25+01:00</lastmod>' . PHP_EOL;
	echo '<priority>1.0</priority>' . PHP_EOL;
	echo '</url>'. PHP_EOL;
}

?>


<?php
echo '</urlset>' . PHP_EOL;
?>