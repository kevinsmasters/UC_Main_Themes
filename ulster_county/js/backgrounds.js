// JavaScript Document

function set_background() {
	//Expandable Background	
		var   vegasImg = "opus-40-bg.jpg";
		var	  photoTitle = '&ldquo;Opus 40, Saugerties NY&rdquo;';
		var	  photoCred = 'Ulster Tourism';
		var   headerTitle = 'Ulster County';
		
	// 	whereami = document.location.pathname.split("/").slice(-2, -1).toString();
	//	if (whereami == "") {
	//		whereami = document.location.pathname.split("/")[1];
	//		alert(whereami);
	//	} else {
	//	alert(whereami);
	//	};
	var pathname = document.location.pathname.substring(1);
	var parts = pathname.split(/\//);
	var whereami = parts[0];
	//alert (whereami);
    
	if (whereami = 'economic-development') {
		
		var whereami2 = parts[1];
		
		
		
		switch (whereami2) {
			case 'ulster-county-economic-development-alliance':
			whereami += '/' + whereami2;
			break;
			case 'ulster-county-industrial-development-agency':
			whereami += '/' + whereami2;
			break;
			case 'ulster-county-capital-resource-corporation':
			whereami += '/' + whereami2;
			break;
			default:
			whereami = parts[0];
		}
		
	}
/*
case "da":
  vegasImg = "Gunks-Trapps.jpg";
  photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
  photoCred = 'Jarek Tuszynski';
  headerTitle = 'Ulster County District Attorney';
break;

case "da":
  vegasImg = "autumn-sailing.jpg";
  photoTitle = '&ldquo;Autumn Sailing&rdquo;';
  photoCred = '';
  headerTitle = 'Ulster County District Attorney';
break;


*/
		
		switch (whereami) {
      case "da":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County District Attorney';
      break;
      case "aging":
        vegasImg = "opus-40-bg.jpg";
        photoTitle = '&ldquo;Opus 40, Saugerties NY&rdquo;';
        photoCred = 'Ulster Tourism';
        headerTitle = 'Ulster County Office for the Aging</span>';
      break;
      case "executive":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Michael P. Hein<br /> <span>Ulster County Executive</span>';
      break;
      case "weights-and-measures":
        vegasImg = "opus-40-bg.jpg";
        photoTitle = '&ldquo;Opus 40, Saugerties NY&rdquo;';
        photoCred = 'Ulster Tourism';
        headerTitle = 'Ulster County Weights and Measures';
      break;
      case "county-archives":
        vegasImg = "opus-40-bg.jpg";
        photoTitle = '&ldquo;Opus 40, Saugerties NY&rdquo;';
        photoCred = 'Ulster Tourism';
        headerTitle = 'Ulster County Archives';
      break;
      case "county-clerk":
        vegasImg = "opus-40-bg.jpg";
        photoTitle = '&ldquo;Opus 40, Saugerties NY&rdquo;';
        photoCred = 'Ulster Tourism';
        headerTitle = 'Ulster County Clerk</span>';
      break;
      case "countyclerk":
        vegasImg = "opus-40-bg.jpg";
        photoTitle = '&ldquo;Opus 40, Saugerties NY&rdquo;';
        photoCred = 'Ulster Tourism';
        headerTitle = 'Ulster County Clerk';
      break;
      case "youth-bureau":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Youth Bureau';
      break;
      case "veterans-service-agency" :
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Veteran Services Agency';
      break;
      case "business-services":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Office of Business Services';
      break;
      case "historian":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Historian';
      break;
      case "insurance":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Insurance Department';
      break;
      case "public-defender":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Public Defender';
      break;
      case "real-property":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Real Property Tax Service Agency';
      break;			
      case "environment":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Department of the Environment';
      break;	
      case "health-mental-health" :
        vegasImg = "opus-40-bg.jpg";
        photoTitle = '&ldquo;Opus 40, Saugerties NY&rdquo;';
        photoCred = 'Ulster Tourism';
        headerTitle = 'Ulster County Department of Health &amp; Mental Health';
      break;	
      case "employment-training":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Office of Employment & Training';
      break;	
      case "attorney":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Attorney';
      break;	
      case "consumer-fraud-office":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Consumer Fraud Department';
      break;	
      case "elections":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Board of Elections';
      break;	
      case "emergency-services":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Emergency Services Department</span>';
      break;	
      case "ucis":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Information Services</span>';
      break;	
      case "personnel":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Personnel Department</span>';
      break;	
      case "budget":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Budget Information<br /><span>Michael P. Hein, Ulster County Executive</span>';
      break;	
      case "programs-initiatives":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Programs and Initiatives<br /><span>Michael P. Hein, Ulster County Executive</span>';
      break;	
      case "courts":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Courts';
      break;	
      case "finance":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Department of Finance';
      break;	
      case "legislature":
        vegasImg = "Peekamoose.jpg";
        photoTitle = '&ldquo;Peekamoose&rdquo;';
        photoCred = 'Estelle Nadler';
        headerTitle = 'Ulster County Legislature';
      break;
      case "committee":
        vegasImg = "Town-of-Wawarsing.jpg";
        photoTitle = '&ldquo;Town of Wawarsing Valley, Autumn 2010&rdquo;';
        photoCred = 'Steve Aaron';
        headerTitle = 'Ulster County Legislature';
      break;		
      case "member":
        vegasImg = "Town-of-Wawarsing.jpg";
        photoTitle = '&ldquo;Town of Wawarsing Valley, Autumn 2010&rdquo;';
        photoCred = 'Steve Aaron';
        headerTitle = 'Ulster County Legislature';
      break;	
      case "planning":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Planning Department';
      break;	
      case "probation":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Probation Department';
      break;
      case "purchasing":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Purchasing Department';
      break;	    
      case "public-works":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Department of Public Works';
      break;	
      case "safety-office":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Safety Office';
      break;	
      case "social-services":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Department of Social Services';
      break;	
      case "traffic-safety-board":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Traffic Safety Board';
      break;	
      case "traffic-safety-board":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Traffic Safety Board';
      break;	
      case "ucat":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Department of Public Transportation';
      break;	
      case "human-rights-comission":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Human Rights Commission';
      break;	
      
	  
	  case "economic-development":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Office of Economic Development';
      break;
	  case "economic-development/ulster-county-industrial-development-agency":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Industrial Development Agency';
      break;
	  case "economic-development/ulster-county-capital-resource-corporation":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Capital Resource Corporation';
      break;
	  case "economic-development/ulster-county-economic-development-alliance":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Economic Development Alliance';
      break;
	  case "roll-of-honor":
        vegasImg = "heroes-web-flags.jpg";
        photoTitle = '';
        photoCred = '';
        headerTitle = 'Ulster County<br>Memorial Roll of Honor';
      break;
	  case "environmental-management-council":
        vegasImg = "Gunks-Trapps.jpg";
        photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
        photoCred = 'Jarek Tuszynski';
        headerTitle = 'Ulster County Environmental Management Council';
      break;
			default:
			  vegasImg = "Gunks-Trapps.jpg";
			  photoTitle = '&ldquo;The Trapps Cliff of Shawangunk Ridge&rdquo;';
			  photoCred = 'Jarek Tuszynski';
			  headerTitle = 'Ulster County';
		}
		
		//console.log(whereami);
		//alert (pagePath);
		/*jQuery.vegas({
    		src:'/sites/all/themes/ulster_county/images/'+ vegasImg + ''			
  		});*/	
		jQuery.backstretch(['/sites/all/themes/ulster_county/images/'+ vegasImg + '']);
		jQuery('#photoTitle').html(photoTitle);
		jQuery('#nameCredit').html(photoCred);
		jQuery('#section-title').html(headerTitle);
}