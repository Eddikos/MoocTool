var mapping = {'AF' : 'AFG','AL' : 'ALB','DZ' : 'DZA','AS' : 'ASM','AD' : 'AND','AO' : 'AGO','AI' : 'AIA','AQ' : 'ATA','AG' : 'ATG','AR' : 'ARG','AM' : 'ARM','AW' : 'ABW','AU' : 'AUS','AT' : 'AUT','AZ' : 'AZE','BS' : 'BHS','BH' : 'BHR','BD' : 'BGD','BB' : 'BRB','BY' : 'BLR','BE' : 'BEL','BZ' : 'BLZ','BJ' : 'BEN','BM' : 'BMU','BT' : 'BTN','BO' : 'BOL','BA' : 'BIH','BW' : 'BWA','BV' : 'BVT','BR' : 'BRA','IO' : 'IOT','VG' : 'VGB','BN' : 'BRN','BG' : 'BGR','BF' : 'BFA','BI' : 'BDI','KH' : 'KHM','CM' : 'CMR','CA' : 'CAN','CV' : 'CPV','KY' : 'CYM','CF' : 'CAF','TD' : 'TCD','CL' : 'CHL','CN' : 'CHN','CX' : 'CXR','CC' : 'CCK','CO' : 'COL','KM' : 'COM','CD' : 'COD','CG' : 'COG','CK' : 'COK','CR' : 'CRI','CI' : 'CIV','CU' : 'CUB','CY' : 'CYP','CZ' : 'CZE','DK' : 'DNK','DJ' : 'DJI','DM' : 'DMA','DO' : 'DOM','EC' : 'ECU','EG' : 'EGY','SV' : 'SLV','GQ' : 'GNQ','ER' : 'ERI','EE' : 'EST','ET' : 'ETH','FO' : 'FRO','FK' : 'FLK','FJ' : 'FJI','FI' : 'FIN','FR' : 'FRA','GF' : 'GUF','PF' : 'PYF','TF' : 'ATF','GA' : 'GAB','GM' : 'GMB','GE' : 'GEO','DE' : 'DEU','GH' : 'GHA','GI' : 'GIB','GR' : 'GRC','GL' : 'GRL','GD' : 'GRD','GP' : 'GLP','GU' : 'GUM','GT' : 'GTM','GN' : 'GIN','GW' : 'GNB','GY' : 'GUY','HT' : 'HTI','HM' : 'HMD','VA' : 'VAT','HN' : 'HND','HK' : 'HKG','HR' : 'HRV','HU' : 'HUN','IS' : 'ISL','IN' : 'IND','ID' : 'IDN','IR' : 'IRN','IQ' : 'IRQ','IE' : 'IRL','IL' : 'ISR','IT' : 'ITA','JM' : 'JAM','JP' : 'JPN','JO' : 'JOR','KZ' : 'KAZ','KE' : 'KEN','KI' : 'KIR','KP' : 'PRK','KR' : 'KOR','KW' : 'KWT','KG' : 'KGZ','LA' : 'LAO','LV' : 'LVA','LB' : 'LBN','LS' : 'LSO','LR' : 'LBR','LY' : 'LBY','LI' : 'LIE','LT' : 'LTU','LU' : 'LUX','MO' : 'MAC','MK' : 'MKD','MG' : 'MDG','MW' : 'MWI','MY' : 'MYS','MV' : 'MDV','ML' : 'MLI','MT' : 'MLT','MH' : 'MHL','MQ' : 'MTQ','MR' : 'MRT','MU' : 'MUS','YT' : 'MYT','MX' : 'MEX','FM' : 'FSM','MD' : 'MDA','MC' : 'MCO','MN' : 'MNG','MS' : 'MSR','MA' : 'MAR','MZ' : 'MOZ','MM' : 'MMR','NA' : 'NAM','NR' : 'NRU','NP' : 'NPL','AN' : 'ANT','NL' : 'NLD','NC' : 'NCL','NZ' : 'NZL','NI' : 'NIC','NE' : 'NER','NG' : 'NGA','NU' : 'NIU','NF' : 'NFK','MP' : 'MNP','NO' : 'NOR','OM' : 'OMN','PK' : 'PAK','PW' : 'PLW','PS' : 'PSE','PA' : 'PAN','PG' : 'PNG','PY' : 'PRY','PE' : 'PER','PH' : 'PHL','PN' : 'PCN','PL' : 'POL','PT' : 'PRT','PR' : 'PRI','QA' : 'QAT','RE' : 'REU','RO' : 'ROU','RU' : 'RUS','RW' : 'RWA','SH' : 'SHN','KN' : 'KNA','LC' : 'LCA','PM' : 'SPM','VC' : 'VCT','WS' : 'WSM','SM' : 'SMR','ST' : 'STP','SA' : 'SAU','SN' : 'SEN','CS' : 'SCG','SC' : 'SYC','SL' : 'SLE','SG' : 'SGP','SK' : 'SVK','SI' : 'SVN','SB' : 'SLB','SO' : 'SOM','ZA' : 'ZAF','GS' : 'SGS','ES' : 'ESP','LK' : 'LKA','SD' : 'SDN','SR' : 'SUR','SJ' : 'SJM','SZ' : 'SWZ','SE' : 'SWE','CH' : 'CHE','SY' : 'SYR','TW' : 'TWN','TJ' : 'TJK','TZ' : 'TZA','TH' : 'THA','TL' : 'TLS','TG' : 'TGO','TK' : 'TKL','TO' : 'TON','TT' : 'TTO','TN' : 'TUN','TR' : 'TUR','TM' : 'TKM','TC' : 'TCA','TV' : 'TUV','VI' : 'VIR','UG' : 'UGA','UA' : 'UKR','AE' : 'ARE','GB' : 'GBR','UM' : 'UMI','US' : 'USA','UY' : 'URY','UZ' : 'UZB','VU' : 'VUT','VE' : 'VEN','VN' : 'VNM','WF' : 'WLF','EH' : 'ESH','YE' : 'YEM'};
data = null;

var max = 0;
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

$.getJSON("map.json", function(json) {
    data = json; // this will show the info it in firebug console
    for(i = 0;i < data.length; i++)
    {
        if (max < data[i].count) {
            max = data[i].count;
        }
    }
    
    for(i = 0;i < data.length; i++)
    {
      ( function (index){
        var num = data[i].count;
        
        var ratio = (num - min) * 1.0 / (max - min);
        
        var R = Math.round(maxColor[0] * ratio + minColor[0] * (1 - ratio));
        var G = Math.round(maxColor[1] * ratio + minColor[1] * (1 - ratio));
        var B = Math.round(maxColor[2] * ratio + minColor[2] * (1 - ratio));
        var color = 'rgb(' + R + ', ' + G + ', ' + B + ')';
        
        $('.' + mapping[data[i].country]).css('fill', color);
        $('.' + mapping[data[i].country]).hover(  
                              function(){  
                                 $('#popupContainer').append( $( "<span>Country: <b>" + data[index].country + "</b><br/> Number of Tweets:  " + data[index].count +"<br/> <hr/><img <img class = 'imgProf' src='" + data[index].tweets[0].image_url + "'/> <b>" + data[index].tweets[0].username +":</b><br/> "+data[index].tweets[0].text + " <br/><hr/> <img class = 'imgProf' src='" + data[index].tweets[1].image_url + "'/><b> " + data[index].tweets[1].username +":</b><br/> "+data[index].tweets[1].text +"</span>" ) ).show();
                              },
                              function(){  
                                 $('#popupContainer').hide().find( "span:last" ).remove();  
                              });
      })(i);
    }
    
    var svgElement = document.querySelector('#map-container > svg')
});