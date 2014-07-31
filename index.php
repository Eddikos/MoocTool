<?php
  require("htmlPage.php");
  $page = new htmlPage();
  $page->streamTop();
  
  $consumerKey = "W1yDuapyhEkL00YDGuKMyesBr";
  $consumerSecret = "nMnpgjDhgo99FAD66ZF3H7P0PKleUjJB4ztC6ZJX2fDyBIjnIR";
  $oAuthToken = "1170310531-SkC69xX6YBHXyyfUB4KYen3aVqcOZmAbv9fXXMh";
  $oAuthTokenSecret = "UivRG4Uq3xm7NBq7WfuPsBwbjrXZzkPHGyEyUYE5kn7o3";

  include("library/twitteroauth.php");

  $tweet = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthTokenSecret);
  
?>

    <div class="row">
        <div class="col-md-10">
            <h1>#FLDigital</h1>
<!--World Map --------------------------------------------------------------->
			<script src="http://d3js.org/d3.v3.min.js"></script>
			<script src="http://d3js.org/topojson.v1.min.js"></script>
			<script src="js/datamaps.world.js"></script>
			<script src="js/svg-pan-zoom.js"></script>
            <div id="map-container" class="">
			
			</div>
			<?php 
					$tweets = $tweet->get('https://api.twitter.com/1.1/search/tweets.json?q=funnycat&lang=en&result_type=recent&count=100');
					
					$twoToThree = ['AF' => 'AFG'
									,'AL' => 'ALB'
									,'DZ' => 'DZA'
									,'AS' => 'ASM'
									,'AD' => 'AND'
									,'AO' => 'AGO'
									,'AI' => 'AIA'
									,'AQ' => 'ATA'
									,'AG' => 'ATG'
									,'AR' => 'ARG'
									,'AM' => 'ARM'
									,'AW' => 'ABW'
									,'AU' => 'AUS'
									,'AT' => 'AUT'
									,'AZ' => 'AZE'
									,'BS' => 'BHS'
									,'BH' => 'BHR'
									,'BD' => 'BGD'
									,'BB' => 'BRB'
									,'BY' => 'BLR'
									,'BE' => 'BEL'
									,'BZ' => 'BLZ'
									,'BJ' => 'BEN'
									,'BM' => 'BMU'
									,'BT' => 'BTN'
									,'BO' => 'BOL'
									,'BA' => 'BIH'
									,'BW' => 'BWA'
									,'BV' => 'BVT'
									,'BR' => 'BRA'
									,'IO' => 'IOT'
									,'VG' => 'VGB'
									,'BN' => 'BRN'
									,'BG' => 'BGR'
									,'BF' => 'BFA'
									,'BI' => 'BDI'
									,'KH' => 'KHM'
									,'CM' => 'CMR'
									,'CA' => 'CAN'
									,'CV' => 'CPV'
									,'KY' => 'CYM'
									,'CF' => 'CAF'
									,'TD' => 'TCD'
									,'CL' => 'CHL'
									,'CN' => 'CHN'
									,'CX' => 'CXR'
									,'CC' => 'CCK'
									,'CO' => 'COL'
									,'KM' => 'COM'
									,'CD' => 'COD'
									,'CG' => 'COG'
									,'CK' => 'COK'
									,'CR' => 'CRI'
									,'CI' => 'CIV'
									,'CU' => 'CUB'
									,'CY' => 'CYP'
									,'CZ' => 'CZE'
									,'DK' => 'DNK'
									,'DJ' => 'DJI'
									,'DM' => 'DMA'
									,'DO' => 'DOM'
									,'EC' => 'ECU'
									,'EG' => 'EGY'
									,'SV' => 'SLV'
									,'GQ' => 'GNQ'
									,'ER' => 'ERI'
									,'EE' => 'EST'
									,'ET' => 'ETH'
									,'FO' => 'FRO'
									,'FK' => 'FLK'
									,'FJ' => 'FJI'
									,'FI' => 'FIN'
									,'FR' => 'FRA'
									,'GF' => 'GUF'
									,'PF' => 'PYF'
									,'TF' => 'ATF'
									,'GA' => 'GAB'
									,'GM' => 'GMB'
									,'GE' => 'GEO'
									,'DE' => 'DEU'
									,'GH' => 'GHA'
									,'GI' => 'GIB'
									,'GR' => 'GRC'
									,'GL' => 'GRL'
									,'GD' => 'GRD'
									,'GP' => 'GLP'
									,'GU' => 'GUM'
									,'GT' => 'GTM'
									,'GN' => 'GIN'
									,'GW' => 'GNB'
									,'GY' => 'GUY'
									,'HT' => 'HTI'
									,'HM' => 'HMD'
									,'VA' => 'VAT'
									,'HN' => 'HND'
									,'HK' => 'HKG'
									,'HR' => 'HRV'
									,'HU' => 'HUN'
									,'IS' => 'ISL'
									,'IN' => 'IND'
									,'ID' => 'IDN'
									,'IR' => 'IRN'
									,'IQ' => 'IRQ'
									,'IE' => 'IRL'
									,'IL' => 'ISR'
									,'IT' => 'ITA'
									,'JM' => 'JAM'
									,'JP' => 'JPN'
									,'JO' => 'JOR'
									,'KZ' => 'KAZ'
									,'KE' => 'KEN'
									,'KI' => 'KIR'
									,'KP' => 'PRK'
									,'KR' => 'KOR'
									,'KW' => 'KWT'
									,'KG' => 'KGZ'
									,'LA' => 'LAO'
									,'LV' => 'LVA'
									,'LB' => 'LBN'
									,'LS' => 'LSO'
									,'LR' => 'LBR'
									,'LY' => 'LBY'
									,'LI' => 'LIE'
									,'LT' => 'LTU'
									,'LU' => 'LUX'
									,'MO' => 'MAC'
									,'MK' => 'MKD'
									,'MG' => 'MDG'
									,'MW' => 'MWI'
									,'MY' => 'MYS'
									,'MV' => 'MDV'
									,'ML' => 'MLI'
									,'MT' => 'MLT'
									,'MH' => 'MHL'
									,'MQ' => 'MTQ'
									,'MR' => 'MRT'
									,'MU' => 'MUS'
									,'YT' => 'MYT'
									,'MX' => 'MEX'
									,'FM' => 'FSM'
									,'MD' => 'MDA'
									,'MC' => 'MCO'
									,'MN' => 'MNG'
									,'MS' => 'MSR'
									,'MA' => 'MAR'
									,'MZ' => 'MOZ'
									,'MM' => 'MMR'
									,'NA' => 'NAM'
									,'NR' => 'NRU'
									,'NP' => 'NPL'
									,'AN' => 'ANT'
									,'NL' => 'NLD'
									,'NC' => 'NCL'
									,'NZ' => 'NZL'
									,'NI' => 'NIC'
									,'NE' => 'NER'
									,'NG' => 'NGA'
									,'NU' => 'NIU'
									,'NF' => 'NFK'
									,'MP' => 'MNP'
									,'NO' => 'NOR'
									,'OM' => 'OMN'
									,'PK' => 'PAK'
									,'PW' => 'PLW'
									,'PS' => 'PSE'
									,'PA' => 'PAN'
									,'PG' => 'PNG'
									,'PY' => 'PRY'
									,'PE' => 'PER'
									,'PH' => 'PHL'
									,'PN' => 'PCN'
									,'PL' => 'POL'
									,'PT' => 'PRT'
									,'PR' => 'PRI'
									,'QA' => 'QAT'
									,'RE' => 'REU'
									,'RO' => 'ROU'
									,'RU' => 'RUS'
									,'RW' => 'RWA'
									,'SH' => 'SHN'
									,'KN' => 'KNA'
									,'LC' => 'LCA'
									,'PM' => 'SPM'
									,'VC' => 'VCT'
									,'WS' => 'WSM'
									,'SM' => 'SMR'
									,'ST' => 'STP'
									,'SA' => 'SAU'
									,'SN' => 'SEN'
									,'CS' => 'SCG'
									,'SC' => 'SYC'
									,'SL' => 'SLE'
									,'SG' => 'SGP'
									,'SK' => 'SVK'
									,'SI' => 'SVN'
									,'SB' => 'SLB'
									,'SO' => 'SOM'
									,'ZA' => 'ZAF'
									,'GS' => 'SGS'
									,'ES' => 'ESP'
									,'LK' => 'LKA'
									,'SD' => 'SDN'
									,'SR' => 'SUR'
									,'SJ' => 'SJM'
									,'SZ' => 'SWZ'
									,'SE' => 'SWE'
									,'CH' => 'CHE'
									,'SY' => 'SYR'
									,'TW' => 'TWN'
									,'TJ' => 'TJK'
									,'TZ' => 'TZA'
									,'TH' => 'THA'
									,'TL' => 'TLS'
									,'TG' => 'TGO'
									,'TK' => 'TKL'
									,'TO' => 'TON'
									,'TT' => 'TTO'
									,'TN' => 'TUN'
									,'TR' => 'TUR'
									,'TM' => 'TKM'
									,'TC' => 'TCA'
									,'TV' => 'TUV'
									,'VI' => 'VIR'
									,'UG' => 'UGA'
									,'UA' => 'UKR'
									,'AE' => 'ARE'
									,'GB' => 'GBR'
									,'UM' => 'UMI'
									,'US' => 'USA'
									,'UY' => 'URY'
									,'UZ' => 'UZB'
									,'VU' => 'VUT'
									,'VE' => 'VEN'
									,'VN' => 'VNM'
									,'WF' => 'WLF'
									,'EH' => 'ESH'
									,'YE' => 'YEM'];
					
					$count = 0;
					$data = [];
					
					foreach($tweets as $tweetTemp){
						$count += 1;
						foreach($tweetTemp as $t){
							if(isset($t->user) and isset($t->user->location))
							{
								$location = $t->user->location;
								$long = null;
								$lat = null;
								
								if(isset($t->coordinates))
								{
									if(is_array($t->coordinates))
									{
										$long = $t->coordinates[0];
										$lat = $t->coordinates[1];
									}
									else if(isset($t->coordinates->coordinates) && is_array($t->coordinates->coordinates))
									{
										$long = $t->coordinates->coordinates[0];
										$lat = $t->coordinates->coordinates[1];
									}
								}
								
								$uri = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($location);
								
								$curl = curl_init($uri);
								curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);  
								curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
								curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
								$geoLocation = curl_exec($curl);
								
								$geoLocation = json_decode($geoLocation);
								if(isset($geoLocation) and isset($geoLocation->results) and isset($geoLocation->results[0]) and isset($geoLocation->results[0]->address_components))
								{	
									foreach($geoLocation->results[0]->address_components as $result)
									{
										if(isset($result->types) and in_array('country', $result->types) and isset($result->short_name) && isset($twoToThree[$result->short_name]))
										{
											if(isset($data[$twoToThree[$result->short_name]]))
											{
												$data[$twoToThree[$result->short_name]]['numberOfTweets'] += 1;
												if(sizeof($data[$twoToThree[$result->short_name]]['tweets']) < 5)
													$data[$twoToThree[$result->short_name]]['tweets'][] = [ 'user' => $t->user->name, 'text' => $t->text, 'imageUrl' => $t->user->profile_image_url ];
											}
											else
												$data[$twoToThree[$result->short_name]] = ['numberOfTweets' => 1, 'tweets' => [[ 'user' => $t->user->name, 'text' => $t->text, 'imageUrl' => $t->user->profile_image_url ]]];
										}
									}
								}
							}
						}
					}
					
					echo '<pre>';
					echo print_r($data);
					echo '</pre>';
					
				?>;
			<script>
				
				var data = <?php
				
					$min = 99999999999999;
					$max = 0;
					echo '[';
					foreach($data as $key => $entry)
					{
						if($entry['numberOfTweets'] > $max)
							$max = $entry['numberOfTweets'];
						if($entry['numberOfTweets'] < $min)
							$min = $entry['numberOfTweets'];
							
						$tweetsString = '';
						foreach($entry['tweets'] as $key1 => $tweetObject)
							$tweetsString .= '{"user": "'.$tweetObject['user'].'", "text": "'.urlencode($tweetObject['text']).'", "imageUrl": "'.$tweetObject['imageUrl'].'"},';
						echo '{"country": "'.$key.'", "numberOfTweets": '.$entry['numberOfTweets'].', "tweets": ['.$tweetsString.']},';
					}
					echo ']';
				?>;
				
				var max = <?php echo $max;?>;
				var min = 0;
				
				var maxColor = [33, 63, 100];
				var minColor = [200, 220, 242];
				
				var map = new Datamap({
					element: document.getElementById('map-container'),
					projection: 'mercator',
					fills: {
						defaultFill: 'rgb(' + minColor[0] + ', ' + minColor[1] + ', ' + minColor[2] + ')'
					}
				});
				
				for(i = 0;i < data.length; i++)
				{
					var num = data[i].numberOfTweets;
					
					var ratio = (num - min) * 1.0 / (max - min);
					
					var R = Math.round(maxColor[0] * ratio + minColor[0] * (1 - ratio));
					var G = Math.round(maxColor[1] * ratio + minColor[1] * (1 - ratio));
					var B = Math.round(maxColor[2] * ratio + minColor[2] * (1 - ratio));
					console.log(R);
					var color = 'rgb(' + R + ', ' + G + ', ' + B + ')';
					
					$('.' + data[i].country).css('fill', color);
				}
				
				var svgElement = document.querySelector('#map-container > svg')
				var panZoomMap = svgPanZoom(svgElement, {
					minZoom: 0.6,
					maxZoom: 2
				});
			</script>
            
			<nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                          <li><a href="#">Report a Problem</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                          <li><a href="#">Data Retrieved: 
<!--Time Data Retrieved Function---------------------------------------------->
                          <?php 
                          echo date(" H:i:s",time());
                          echo ("on");
                          echo date(" m/d/y",time());
                          ?>
<!--Time Data Retrieved Function---------------------------------------------->
                          </a></li>
                          <li><a href="">           
                            <span class='st_facebook_large' displayText='Facebook'></span>
                            <span class='st_twitter_large' displayText='Tweet'></span>
                            <span class='st_sina_large' displayText='Sina'></span>
                            <span class='st_googleplus_large' displayText='Google +'></span>
                            <span class='st_linkedin_large' displayText='LinkedIn'></span>
                          </li>
                        </ul>
                        </ul>
                      </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
<!-- MAIN ENDSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
<!-- SIDEBAR STARTSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
        <h2>Other Stuff</h2>
        <div class="col-md-2">
            <div class="row">
              <div class="col-md-12">
                      <div class="box">vis 1</div>
                      <div class="box">vis 2</div>
                      <div class="box">vis 3</div>
                      <div class="box">vis 4</div>
              </div>
            </div>
            
            <div class="row">
<!-- Begin Comments JavaScript Code -->
                <script type="text/javascript" async>function ajaxpath_53c66b71167d1(url){return window.location.href == '' ? url : url.replace('&s=','&s=' + escape(window.location.href));}(function(){document.write('<div id="fcs_div"><a title="free comment script" href="http://www.freecommentscript.com">&nbsp;&nbsp;<b>Free HTML User Comments</b>...</a></div>');fcs_53c66b71167d1=document.createElement('script');fcs_53c66b71167d1.type="text/javascript";fcs_53c66b71167d1.src=ajaxpath_53c66b71167d1("http://www.freecommentscript.com/GetComments.php?p=53c66b71167d1&s=&Width=510&FontColor=111111&BackgroundColor=FFFFFF&FontSize=11&Size=10#!53c66b71167d1");setTimeout("document.getElementById('fcs_div').appendChild(fcs_53c66b71167d1)",1);})();</script><noscript><div><a href="http://www.freecommentscript.com" title="free html user comment box"></a></div></noscript><!-- End Comments JavaScript Code --></script>
<!-- End Comments JavaScript Code -->          
            </div>
          
            <div class="row">
                <a class="twitter-timeline" href="https://twitter.com/hashtag/FLDigital" data-widget-id="489362539017289728">#FLDigital Tweets</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
        </div>
      </div>
<!-- SIDEBAR ENDSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS-->
<?php
  $page->streamBottom();
?>