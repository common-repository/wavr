tinyMCEPopup.requireLangPack();
var defaultFonts = "" +
	"Arial, Helvetica, sans-serif=Arial, Helvetica, sans-serif;" +
	"Times New Roman, Times, serif=Times New Roman, Times, serif;" +
	"Courier New, Courier, mono=Courier New, Courier, mono;" +
	"Times New Roman, Times, serif=Times New Roman, Times, serif;" +
	"Georgia, Times New Roman, Times, serif=Georgia, Times New Roman, Times, serif;" +
	"Verdana, Arial, Helvetica, sans-serif=Verdana, Arial, Helvetica, sans-serif;" +
	"Geneva, Arial, Helvetica, sans-serif=Geneva, Arial, Helvetica, sans-serif";

var defaultSizes = "9;10;12;14;16;18;24;xx-small;x-small;small;medium;large;x-large;xx-large;smaller;larger";

var EasywaveDialog = {
	preInit : function() {
		
	},

	init : function() {
	    document.getElementById('easywave_text_color_pickcontainer').innerHTML = getColorPickerHTML('easywave_text_color','easywave_text_color');
	    document.getElementById('easywave_bg_color_pickcontainer').innerHTML = getColorPickerHTML('easywave_bg_color','easywave_bg_color');

	    fillSelect(0, 'easywave_font', 'style_font', defaultFonts, ';', true);
	    fillSelect(0, 'easywave_font_size', 'style_font_size', defaultSizes, ';', true);
	},
	updatePreview : function (){
	    document.getElementById('easywave_wave_id').value = getParsedWaveId(document.getElementById('easywave_wave_id').value);
	    var waveId = document.getElementById('easywave_wave_id').value;
	    var waveColor = document.getElementById('easywave_text_color').value;
	    var waveBgcolor = document.getElementById('easywave_bg_color').value;
	    var waveFont = document.getElementById('easywave_font').value;
	    var waveFontSize = document.getElementById('easywave_font_size').value;
	    var waveWidth = document.getElementById('easywave_width').value;
	    var waveHeight = document.getElementById('easywave_height').value;
	    var waveServer = document.getElementById('easywave_server').value;

	    var dest = document.getElementById('easywave_preview');
	    var waveStr = '[wave id="'+waveId+'"';

	    if(waveColor)   {	waveStr+=' color="'+waveColor+'"';	    }
	    if(waveBgcolor) {	waveStr+=' bgcolor="'+waveBgcolor+'"';	    }
	    if(waveFont)    {	waveStr+=' font="'+waveFont+'"';	    }
	    if(waveFontSize){	waveStr+=' font_size="'+waveFontSize+'"';   }
	    if(waveWidth)   {	waveStr+=' width="'+waveWidth+'"';	    }
	    if(waveHeight)  {	waveStr+=' height="'+waveHeight+'"';	    }
	    if(waveServer)  {	waveStr+=' server="'+waveServer+'"';	    }


	    waveStr += ']';

	    dest.innerHTML = waveStr;
	},
	resize : function() {
		var w, h, e;

		if (!self.innerWidth) {
			w = document.body.clientWidth - 50;
			h = document.body.clientHeight - 160;
		} else {
			w = self.innerWidth - 50;
			h = self.innerHeight - 170;
		}

		e = document.getElementById('templatesrc');

		if (e) {
			e.style.height = Math.abs(h) + 'px';
			e.style.width  = Math.abs(w - 5) + 'px';
		}
	},

	loadCSSFiles : function(d) {
		var ed = tinyMCEPopup.editor;

		tinymce.each(ed.getParam("content_css", '').split(','), function(u) {
			d.write('<link href="' + ed.documentBaseURI.toAbsolute(u) + '" rel="stylesheet" type="text/css" />');
		});
	},

	selectTemplate : function(u, ti) {
		var d = window.frames['templatesrc'].document, x, tsrc = this.tsrc;

		if (!u)
			return;

		d.body.innerHTML = this.templateHTML = this.getFileContents(u);

		for (x=0; x<tsrc.length; x++) {
			if (tsrc[x].title == ti)
				document.getElementById('tmpldesc').innerHTML = tsrc[x].description || '';
		}
	},

 	insert : function() {
	    var code = document.getElementById('easywave_preview').innerHTML;

		tinyMCEPopup.execCommand('mceInsertEasywave', false, {
			content : code
//			selection : tinyMCEPopup.editor.selection.getContent()
		});

		tinyMCEPopup.close();
	},

	getFileContents : function(u) {
		var x, d, t = 'text/plain';

		function g(s) {
			x = 0;

			try {
				x = new ActiveXObject(s);
			} catch (s) {
			}

			return x;
		};

		x = window.ActiveXObject ? g('Msxml2.XMLHTTP') || g('Microsoft.XMLHTTP') : new XMLHttpRequest();

		// Synchronous AJAX load file
		x.overrideMimeType && x.overrideMimeType(t);
		x.open("GET", u, false);
		x.send(null);

		return x.responseText;
	}
};
EasywaveDialog.preInit();
tinyMCEPopup.onInit.add(EasywaveDialog.init, EasywaveDialog);

function getColorPickerHTML(id, target_form_element) {
	var h = "";

	h += '<a id="' + id + '_link" href="javascript:;" onclick="tinyMCEPopup.pickColor(event,\'' + target_form_element +'\');" onmousedown="return false;" class="pickcolor">';
	h += '<span id="' + id + '" title="' + tinyMCEPopup.getLang('browse') + '"></span></a>';

	return h;
}

function updateColor(img_id, form_element_id) {
	document.getElementById(img_id).style.backgroundColor = document.forms[0].elements[form_element_id].value;
}
function fillSelect(f, s, param, dval, sep, em) {
	var i, ar, p, se;

	f = document.forms[f];
	sep = typeof(sep) == "undefined" ? ";" : sep;

	if (em)
		addSelectValue(f, s, "", "");

	ar = tinyMCEPopup.getParam(param, dval).split(sep);
	for (i=0; i<ar.length; i++) {
		se = false;

		if (ar[i].charAt(0) == '+') {
			ar[i] = ar[i].substring(1);
			se = true;
		}

		p = ar[i].split('=');

		if (p.length > 1) {
			addSelectValue(f, s, p[0], p[1]);

			if (se)
				selectByValue(f, s, p[1]);
		} else {
			addSelectValue(f, s, p[0], p[0]);

			if (se)
				selectByValue(f, s, p[0]);
		}
	}
}

/**
 * Parses urls like
 * https://wave.google.com/wave/#restored:search,restored:wave:googlewave.com!w%252BNcOxJo8SW.2
 * into googlewave.com!w+NcOxJo8SW
 */
function getParsedWaveId (url){
    var i = url.indexOf('wave:');
    if(i !== -1){
	console.log(url);
	i+=5;
	url = url.substring(i);
	console.log(url);
	var j = url.indexOf(':');
	
        if(j < 0){
	    j=url.length;
	}
	url = url.substring(0,j);
	console.log(url);
	j = url.lastIndexOf('.');
	k = url.indexOf('.');
	if(j>0 && j != k){
	    url = url.substring(0,j);
	}
	console.log(url);
	url = url.replace('%252B','+');
	console.log(url);
    }

    return url;
}