<!DOCTYPE html>

<html lang="en">

<?php function get_address($url) 
{
		#DOMDocument przechowuje cala strone html
    $html = new DOMDocument();
		$returnedHtml = '';
    @$html -> loadHTMLFile($url);
		#Tworzenie tablicy ze znalezionych adresow url
    $address = array();
		#Petla przeszukujaca kazdy tag "a" z abtrybutu "href" ze strony internetowej
		foreach($html -> getElementsByTagName('a') as $link) 
		{
    	$href = $link -> getAttribute('href');
		#Funkcja parse_url przetwarza adres url i zwraca jego skladowe
		if  ( $return = parse_url($href) ) 
			{
			if ( !isset($return["scheme"]) ) 
				{
				$href = "http://{$url}";
				}
			}
			
		#strtok dzieli stringa na mniejsze czesci	
		$href = strtok($href, "#");
			$address[] = $href;
		}
		
		$address = array_unique($address);
		foreach($address as $link) 
		{
			$returnedHtml .= '<a href="'. $link .'" class="links">' . $link . '</a>';
		}
		return $returnedHtml;
} 


	if (isset($_GET['crawler'])) 
	{
		$url = $_GET['crawler'];
		print($_GET['crawler']); 

		if (filter_var($url, FILTER_VALIDATE_URL)) 
		{
		    echo("$url IS A VALID URL ADDRESS</br>");
				echo get_address($url);
		} else {
		    echo("<br>$url IS NOT A VALID URL ADDRESS </br>");
			}
	} ?>
	
	<head>
    <meta charset="utf-8">
		<!-- Opis -->
		<meta name="description" content="Crawler">
			<title>Crawler</title>
				<!-- Plik CSS -->
				<link rel="stylesheet" href="crawler_AK.css">
				<!-- Dodanie ikony wyswietlanej na karcie przed tytulem strony -->
				<!-- <link rel="icon" href="img/dom.png" type="image/x-icon"> -->
  </head>
	
	<body> 
	  		<div class="main">
					<div class="textcrawler">Crawler</div>
						<form>
							<input type="text" name="crawler" value="... input url address">
							<!-- Submit  uruchamia dzialanie crawlera --> 
							<input type="submit" value="Crawl!"> 
					</form>
				</div>
  	</body>
		
</html>
