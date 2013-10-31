jQuery(document).ready(function($) {
	WPGFunctions = {
		setup: function() {		
			// setup the show details for selected movie
			if($('#kanji_me_update').length > 0) {
				WPGFunctions.setupUpdater();
			}else if($('#kanji_me_create').length > 0) {
				$('#kanji_me_breakdown').click(WPGFunctions.breakDownKanji);
			} else if($('#kanjime_viewer').length > 0) {
				WPGFunctions.viewKanjiList();
			}
			$('#SubmitFormKanji').click(WPGFunctions.validateForm);
		},
		validateForm: function(){
			var kanjime_title = $('#CollectionTitle').val();
			var kanjime_subtitle = $('#CollectionSubtitle').val();
			var kanjime_description = $('#CollectionDescription').val();
			if(WPGFunctions.testEmptyString(kanjime_title) || WPGFunctions.testEmptyString(kanjime_subtitle) || WPGFunctions.testEmptyString(kanjime_description)){
				WPGFunctions.setErrorMessage('Please make sure to fill the name, kanji and katakana');
				return (false);
			}
			return true;
		},
		setupUpdater: function() {
			var result = JSON.parse($('#kanjime_body').val());
			if(result.kanjiList!=undefined){
				var ko = result.kanjiList;
				var count = ko.length;
				WPGFunctions.prepareWorkingSpace();
				for(var i=0; i<count;i++){
					WPGFunctions.getKanjiAdminTableForm((i+1).toString(),ko[i].kanji,ko[i].kunyomi,ko[i].onyomi,ko[i].meaning);
				}
				$('#kanjime_placeholder').append(WPGFunctions.getPreviewPanel);			
				$("#kanjime_send_to_editor").click(WPGFunctions.previewKanjiList);
				$('#kanji_me_breakdown').click(WPGFunctions.breakDownKanji);
				WPGFunctions.previewKanjiList();
			}			
		},
		breakDownKanji: function() {
			WPGFunctions.clearWorkingSpace();
			$('#kanji_me_breakdown').attr('disabled','disabled');
			var kanjime_title = $('#CollectionTitle').val();
			var kanjime_subtitle = $('#CollectionSubtitle').val();
			var kanjime_description = $('#CollectionDescription').val();
			if(WPGFunctions.testEmptyString(kanjime_title) || WPGFunctions.testEmptyString(kanjime_subtitle) || WPGFunctions.testEmptyString(kanjime_description)){
				WPGFunctions.setErrorMessage('Please make sure to fill the name, kanji and katakana before the breakdown');
				$('#kanji_me_breakdown').removeAttr('disabled');
				return (false);
			}
			WPGFunctions.enableSpinnerInEditor();
			var data = {
				title: kanjime_title,
				subtitle: kanjime_subtitle,
				description: kanjime_description
			};
			$.post('/collections/findkanji/', data, function(response) {
				$('#kanji_me_breakdown').removeAttr('disabled');
				WPGFunctions.disableSpinnerInEditor();
				if(response!=undefined){
					var result = JSON.parse(response);
					if(!WPGFunctions.testEmptyString(result.error)){
						WPGFunctions.setErrorMessage(result.error);
						return false;
					}
					if(result.kanjiList!=undefined){
						var ko = result.kanjiList;
						var count = ko.length;
						WPGFunctions.prepareWorkingSpace();
						for(var i=0; i<count;i++){
							if(ko[i].kunyomi.indexOf('«')==-1 || ko[i].kunyomi.indexOf('»')==-1){
								ko[i].kunyomi = WPGFunctions.getRomajiConversion(ko[i].kunyomi);
							}
							if(ko[i].onyomi.indexOf('«')==-1 || ko[i].onyomi.indexOf('»')==-1){
								ko[i].onyomi = WPGFunctions.getRomajiConversion(ko[i].onyomi);
							}						
							WPGFunctions.getKanjiAdminTableForm((i+1).toString(),ko[i].kanji,ko[i].kunyomi,ko[i].onyomi,ko[i].meaning);
						}
						result.kanjiList = ko;						
						$('#kanjime_body').val(JSON.stringify(result));
						$('#kanjime_placeholder').append(WPGFunctions.getPreviewPanel);			
						$("#kanjime_send_to_editor").click(WPGFunctions.previewKanjiList);
						WPGFunctions.previewKanjiList();
					}
				} else {
					WPGFunctions.setErrorMessage('No response from the server');
				}
			});
			
			return(false);
		},
		updateDataFromEditor: function() {
			var kanjiObject = new Object();
			
			kanjiObject.Name = $('#CollectionTitle').val();
			kanjiObject.Kanji = $('#CollectionSubtitle').val();
			kanjiObject.Katakana = $('#CollectionDescription').val();			
			
			var kanjiList = [];
			$(".kanji-form").each( function(index, element){
				var no = new Object();
				no.kanji = $(this).find('#km_picvalue').val();
				no.kunyomi = $(this).find('#km_kyvalue').val();
				no.onyomi = $(this).find('#km_oyvalue').val();
				no.meaning = $(this).find('#km_meaningvalue').val();
				kanjiList[index] = no;
			});
			
			kanjiObject.kanjiList = kanjiList;
			$('#kanjime_body').val(JSON.stringify(kanjiObject));
		},		
		prepareWorkingSpace: function() {
			$('#kanjime_placeholder').addClass('well');
		},
		clearWorkingSpace: function() {
			$('#pad-wrapper .alert').remove();
			$('#kanjime_preview').hide();
			$('#kanjime_preview .kanjime_preview_body').empty();
			$('#kanjime_placeholder').empty().removeClass();
			$('#message_placeholder').empty();
		},
		previewKanjiList: function() {
			$('#kanjime_preview .kanjime_preview_body').empty();
			WPGFunctions.updateDataFromEditor();
			
			var result = JSON.parse($('#kanjime_body').val());
			if(result.kanjiList!=undefined){
				var ko = result.kanjiList;
				var count = ko.length;
				$('#kanjime_preview .kanjime_preview_body').append('<h1 style=\"text-align: center;\">'+result.Kanji+'</h1>');
				
				for(var i=0; i<count;i++){
					var singleKanji = WPGFunctions.previewSingleKanji(ko[i].kanji,ko[i].kunyomi,ko[i].onyomi,ko[i].meaning);
					$('#kanjime_preview .kanjime_preview_body').append(singleKanji);
				}
			}
			$('#kanjime_preview').show();
			return(false);
		},
		viewKanjiList: function() {
			$('#kanjime_viewer').empty();
			if(!$('#kanjime_viewer').hasClass('well')){
				$('#kanjime_viewer').addClass('well');
			}			
			var result = JSON.parse($('#kanjime_body').val());
			if(result.kanjiList!=undefined){
				var ko = result.kanjiList;
				var count = ko.length;
				$('#kanjime_viewer').append('<h1 style=\"text-align: center;\">'+result.Kanji+'</h1><br/>');				
				for(var i=0; i<count;i++){
					var singleKanji = WPGFunctions.previewSingleKanji(ko[i].kanji,ko[i].kunyomi,ko[i].onyomi,ko[i].meaning);
					$('#kanjime_viewer').append(singleKanji);
				}
			}
			return(false);
		},		
		previewSingleKanji: function(kanji,kun,on,meaning) {
			var singleKanji = '';
			singleKanji += '<div class="panel panel-info">';
			singleKanji += '  <div class="panel-heading">'+WPGFunctions.formatLine(kanji)+'</div>';
			singleKanji += '		<table class=\"table table-condensed\">\n';
			singleKanji += '		   <tr>\n';
			singleKanji += '		       <td style=\"width:30%%;\"><strong>Kun</strong></td>\n';
			singleKanji += '		       <td>'+WPGFunctions.formatLine(kun)+'</td>\n';
			singleKanji += '		   </tr>\n';
			singleKanji += '		   <tr>\n';
			singleKanji += '		       <td><strong>On</strong></td>\n';
			singleKanji += '		       <td>'+WPGFunctions.formatLine(on)+'</td>\n';
			singleKanji += '		   </tr>\n';
			singleKanji += '		   <tr>\n';
			singleKanji += '		       <td><strong>Meaning</strong></td>\n';
			singleKanji += '		       <td>'+WPGFunctions.formatLine(meaning)+'</td>\n';
			singleKanji += '		   </tr>\n';
			singleKanji += '		</table>\n';
			singleKanji += '</div>';

			return singleKanji;			
		},		
		getKanjiAdminTableForm: function(index,kanji,kun,on,meaning) {
			var singleTable = '';
			singleTable += '<div class="panel panel-info">';
			singleTable += '	<div class="panel-heading">';
			singleTable += '		<h6 class="panel-title">Kanji #'+index+'</h6>';
			singleTable += '	</div>';
			singleTable += '	<div class="panel-body">';
			singleTable += '		<form class="form-horizontal kanji-form">\n';
			singleTable += '			<div class="form-group">\n';
			singleTable += '				<label for="km_picvalue" class="col-lg-3 control-label">Kanji</label>\n';
			singleTable += '				<div class="col-lg-9">\n';
			singleTable += '					<input id="km_picvalue" name="km_picvalue" type="text" class="form-control" value="'+kanji+'" >\n';
			singleTable += '				</div>\n';
			singleTable += '			</div>\n';
			singleTable += '			<div class="form-group">\n';
			singleTable += '				<label for="km_kyvalue" class="col-lg-3 control-label">Kun-Yomi</label>\n';
			singleTable += '				<div class="col-lg-9">\n';
			singleTable += '					<input id="km_kyvalue" name="km_kyvalue" type="text" class="form-control" value="'+kun+'" >\n';
			singleTable += '				</div>\n';
			singleTable += '			</div>\n';
			singleTable += '			<div class="form-group">\n';
			singleTable += '				<label for="km_oyvalue" class="col-lg-3 control-label">On-Yomi</label>\n';
			singleTable += '				<div class="col-lg-9">\n';
			singleTable += '					<input id="km_oyvalue" name="km_oyvalue" type="text" class="form-control" value="'+on+'" >\n';
			singleTable += '				</div>\n';
			singleTable += '			</div>\n';
			singleTable += '			<div class="form-group">\n';
			singleTable += '				<label for="km_meaningvalue" class="col-lg-3 control-label">Meaning</label>\n';
			singleTable += '				<div class="col-lg-9">\n';
			singleTable += '					<input id="km_meaningvalue" name="km_meaningvalue" type="text" class="form-control" value="'+meaning+'" >\n';
			singleTable += '				</div>\n';
			singleTable += '			</div>\n';
			singleTable += '		</form>\n';	
			singleTable += '	</div>';
			singleTable += '</div>';

			$('#kanjime_placeholder').append(singleTable);
		},
		getPreviewPanel: function(){
			var singlePanel = '';
			singlePanel += '<div class="btn-toolbar">\n';
			singlePanel += '	<a href="javascript:void(0)" id="kanjime_send_to_editor" class="btn btn-large btn-primary pull-right">Preview</a>\n';
			singlePanel += '</div>\n';
			singlePanel += '<div class="clearfix"></div>\n';
			return(singlePanel);
		},
		enableSpinnerInEditor: function(){
			$('#panel-spinner').empty();
			$('#panel-spinner').append('<div style="padding: 10px 0px 10px 0px;"><img src="/img/loader.gif" border="0" style="margin:0px auto;display: block;" alt="Loading"></div>');
		},
		disableSpinnerInEditor: function(){
			$('#panel-spinner').empty();
		},
		setErrorMessage: function(message){
			$('#pad-wrapper .alert').remove();
			$('#pad-wrapper').prepend('<div class="alert alert-danger"><i class="icon-remove-sign"></i>'+message+'</div>');
		},
		testEmptyString: function(str) {
			return (!str || /^\s*$/.test(str));
		},
		getHiraganaArray: function() {
			var hir =  {
						1:{"a":"&#12354;","i":"&#12356;","u":"&#12358;","e":"&#12360;","o":"&#12362;","n":"&#12435;","m":"&#12435;"},
						2:{
						"ka":"&#12363;","ki":"&#12365;","ku":"&#12367;","ke":"&#12369;","ko":"&#12371;",
						"sa":"&#12373;","si":"&#12375;","su":"&#12377;","se":"&#12379;","so":"&#12381;",
						"ta":"&#12383;","ti":"&#12385;","tu":"&#12388;","te":"&#12390;","to":"&#12392;",
						"na":"&#12394;","ni":"&#12395;","nu":"&#12396;","ne":"&#12397;","no":"&#12398;",
						"ha":"&#12399;","hi":"&#12402;","fu":"&#12405;","he":"&#12408;","ho":"&#12411;",
						"ma":"&#12414;","mi":"&#12415;","mu":"&#12416;","me":"&#12417;","mo":"&#12418;",
						"ya":"&#12420;","yu":"&#12422;","yo":"&#12424;",
						"ra":"&#12425;","ri":"&#12426;","ru":"&#12427;","re":"&#12428;","ro":"&#12429;",
						"wa":"&#12431;","wo":"&#12434;",
						"ga":"&#12364;","gi":"&#12366;","gu":"&#12368;","ge":"&#12370;","go":"&#12372;",
						"za":"&#12374;","zi":"&#12376;","zu":"&#12378;","ze":"&#12380;","zo":"&#12382;",
						"da":"&#12384;","di":"&#12386;","du":"&#12389;","de":"&#12391;","do":"&#12393;",
						"ba":"&#12400;","bi":"&#12403;","bu":"&#12406;","be":"&#12409;","bo":"&#12412;",
						"pa":"&#12401;","pi":"&#12404;","pu":"&#12407;","pe":"&#12410;","po":"&#12413;",
						"ja":"&#12376;&#12419;","ju":"&#12376;&#12421;","jo":"&#12376;&#12423;","ji":"&#12376;"
						},
						3:{
						"kya":"&#12365;&#12419;","kyu":"&#12365;&#12421;","kyo":"&#12365;&#12423;",
						"sha":"&#12375;&#12419;","shu":"&#12375;&#12421;","sho":"&#12375;&#12423;","shi":"&#12375;","tsu":"&#12388;",
						"cha":"&#12385;&#12419;","chu":"&#12385;&#12421;","cho":"&#12385;&#12423;","chi":"&#12385;",
						"nya":"&#12395;&#12419;","nyu":"&#12395;&#12421;","nyo":"&#12395;&#12423;",
						"hya":"&#12402;&#12419;","hyu":"&#12402;&#12421;","hyo":"&#12402;&#12423;",
						"mya":"&#12415;&#12419;","myu":"&#12415;&#12421;","myo":"&#12415;&#12423;",
						"rya":"&#12426;&#12419;","ryu":"&#12426;&#12421;","ryo":"&#12426;&#12423;",
						"gya":"&#12366;&#12419;","gyu":"&#12366;&#12421;","gyo":"&#12366;&#12423;",
						"bya":"&#12403;&#12419;","byu":"&#12403;&#12421;","byo":"&#12403;&#12423;",
						"pya":"&#12404;&#12419;","pyu":"&#12404;&#12421;","pyo":"&#12404;&#12423;"
						},
						4:{"tsu":"&#12387;"}
					};
			return(hir);
		},
		getKatakanaArray: function() {
			var kat =  {
						1:{"a":"&#12450;","i":"&#12452;","u":"&#12454;","e":"&#12456;","o":"&#12458;","n":"&#12531;","m":"&#12531;"},
						2:{
						"ka":"&#12459;","ki":"&#12461;","ku":"&#12463;","ke":"&#12465;","ko":"&#12467;",
						"sa":"&#12469;","si":"&#12471;","su":"&#12473;","se":"&#12475;","so":"&#12477;",
						"ta":"&#12479;","ti":"&#12481;","tu":"&#12484;","te":"&#12486;","to":"&#12488;",
						"na":"&#12490;","ni":"&#12491;","nu":"&#12492;","ne":"&#12493;","no":"&#12494;",
						"ha":"&#12495;","hi":"&#12498;","fu":"&#12501;","he":"&#12504;","ho":"&#12507;",
						"ma":"&#12510;","mi":"&#12511;","mu":"&#12512;","me":"&#12513;","mo":"&#12514;",
						"ya":"&#12516;","yu":"&#12518;","yo":"&#12520;",
						"ra":"&#12521;","ri":"&#12522;","ru":"&#12523;","re":"&#12524;","ro":"&#12525;",
						"wa":"&#12527;","wo":"&#12530;",
						"ga":"&#12460;","gi":"&#12462;","gu":"&#12464;","ge":"&#12466;","go":"&#12468;",
						"za":"&#12470;","zi":"&#12472;","zu":"&#12474;","ze":"&#12476;","zo":"&#12478;",
						"da":"&#12480;","di":"&#12482;","du":"&#12485;","de":"&#12487;","do":"&#12489;",
						"ba":"&#12496;","bi":"&#12499;","bu":"&#12502;","be":"&#12505;","bo":"&#12508;",
						"pa":"&#12497;","pi":"&#12500;","pu":"&#12503;","pe":"&#12506;","po":"&#12509;",
						"ja":"&#12472;&#12515;","ju":"&#12472;&#12517;","jo":"&#12472;&#12519;","ji":"&#12472;",
						"vi":"&#12532;&#12451;"
						},
						3:{
						"kya":"&#12461;&#12515;","kyu":"&#12461;&#12517;","kyo":"&#12461;&#12519;",
						"sha":"&#12471;&#12515;","shu":"&#12471;&#12517;","sho":"&#12471;&#12519;","shi":"&#12471;","tsu":"&#12484;",
						"cha":"&#12481;&#12515;","chu":"&#12481;&#12517;","cho":"&#12481;&#12519;","chi":"&#12481;",
						"nya":"&#12491;&#12515;","nyu":"&#12491;&#12517;","nyo":"&#12491;&#12519;",
						"hya":"&#12498;&#12515;","hyu":"&#12498;&#12517;","hyo":"&#12498;&#12519;",
						"mya":"&#12511;&#12515;","myu":"&#12511;&#12517;","myo":"&#12511;&#12519;",
						"rya":"&#12522;&#12515;","ryu":"&#12522;&#12517;","ryo":"&#12522;&#12519;",
						"gya":"&#12462;&#12515;","gyu":"&#12462;&#12517;","gyo":"&#12462;&#12519;",
						"bya":"&#12499;&#12515;","byu":"&#12499;&#12517;","byo":"&#12499;&#12519;",
						"pya":"&#12500;&#12515;","pyu":"&#12500;&#12517;","pyo":"&#12500;&#12519;"
						},
						4:{"tsu":"&#12483;"}
					};
			return(kat);
		},
		getRomajiArray: function() {
			var rom = {
						12354:"a",12356:"i",12358:"u",12360:"e",12362:"o",12435:"n",
						12450:"a",12452:"i",12454:"u",12456:"e",12458:"o",12531:"n",
						12363:"ka",12365:"ki",12367:"ku",12369:"ke",12371:"ko",
						12459:"ka",12461:"ki",12463:"ku",12465:"ke",12467:"ko",
						12373:"sa",12375:"shi",12377:"su",12379:"se",12381:"so",
						12469:"sa",12471:"shi",12473:"su",12475:"se",12477:"so",
						12383:"ta",12385:"chi",12388:"tsu",12390:"te",12392:"to",
						12479:"ta",12481:"chi",12484:"tsu",12486:"te",12488:"to",
						12394:"na",12395:"ni",12396:"nu",12397:"ne",12398:"no",
						12490:"na",12491:"ni",12492:"nu",12493:"ne",12494:"no",
						12399:"ha",12402:"hi",12405:"fu",12408:"he",12411:"ho",
						12495:"ha",12498:"hi",12501:"fu",12504:"he",12507:"ho",
						12414:"ma",12415:"mi",12416:"mu",12417:"me",12418:"mo",
						12510:"ma",12511:"mi",12512:"mu",12513:"me",12514:"mo",
						12420:"ya",12422:"yu",12424:"yo",
						12516:"ya",12518:"yu",12520:"yo",
						12425:"ra",12426:"ri",12427:"ru",12428:"re",12429:"ro",
						12521:"ra",12522:"ri",12523:"ru",12524:"re",12525:"ro",
						12431:"wa",12434:"o",
						12527:"wa",12530:"o",
						12364:"ga",12366:"gi",12368:"gu",12370:"ge",12372:"go",
						12460:"ga",12462:"gi",12464:"gu",12466:"ge",12468:"go",
						12374:"za",12376:"ji",12378:"zu",12380:"ze",12382:"zo",
						12470:"za",12472:"ji",12474:"zu",12476:"ze",12478:"zo",
						12384:"da",12386:"ji",12389:"zu",12391:"de",12393:"do",
						12480:"da",12482:"ji",12485:"zu",12487:"de",12489:"do",
						12400:"ba",12403:"bi",12406:"bu",12409:"be",12412:"bo",
						12496:"ba",12499:"bi",12502:"bu",12505:"be",12508:"bo",
						12401:"pa",12404:"pi",12407:"pu",12410:"pe",12413:"po",
						12497:"pa",12500:"pi",12503:"pu",12506:"pe",12509:"po"
					  };
				return(rom);
		},
		getRomajiConversion: function(val) {
			if(WPGFunctions.testEmptyString(val)) return val;
			var str1 = new Array();			
			var rom = WPGFunctions.getRomajiArray();
			str1 = val.split(", ");
			for(var k=0;k<str1.length;k++) {
				var res = "";
				var tmpword = str1[k];
				for(var j=0;j<tmpword.length;j++) {
					var ch = tmpword.charCodeAt(j);
					if((ch==12399 || ch==12495) && tmpword.length==1) {
						ch = 12431;
					}
					if((ch==12387 || ch==12483)) {
						var nextch = WPGFunctions.getr(tmpword.charCodeAt(j+1),rom);
						if(nextch) {
							res+=nextch.substring(0,1);
							j++;
							ch = tmpword.charCodeAt(j);
						}
					}
					var tmpch = WPGFunctions.getr(ch,rom);
					var nch = tmpword.charCodeAt(j+1);
					if(tmpch && nch && (nch==12419 || nch==12515 || nch==12421 || nch==12517 || nch==12423 || nch==12519)) {
						var beg = tmpch.substring(0,tmpch.length-1);
						var en = WPGFunctions.getr(Number(nch+1),rom);
						if(beg=='sh' || beg=='ch' || beg=='j') {
							tmpch = beg+en.substring(1);
						} else {
							tmpch = beg+en;
						}
						j++;
					}
					if(tmpch) {
						res+=tmpch;
					} else {
						res+=String.fromCharCode(ch);
					}
				}
				str1[k] += ' &#171;'+res+'&#187;';
			}
			res = str1.join(', ');
			return res;
		},
		getc: function(ind,val,arr) {
			var obj = arr[ind];
			return obj[val];
		},
		getr: function(val,arr) {
			return arr[val];
		},
		formatLine: function(val){
			return val.replace(/\*(.*?)\*/,'<span class="label label-primary">$1</span>');
		}
	}
	$(WPGFunctions.setup);
});


