/**
 * 
 *
 * @author Lucas Caro
 * 
 */

(function() {
	var each = tinymce.each;
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('easywave');
	

	tinymce.create('tinymce.plugins.EasywavePlugin', {
		init : function(ed, url) {
			var t = this;

			t.editor = ed;

			// Register commands
			ed.addCommand('mceEasywave', function(ui) {
				ed.windowManager.open({
					file : url + '/easywave.htm',
					width : ed.getParam('easywave_popup_width', 450),
					height : ed.getParam('easywave_popup_height', 350),
					inline : 1
				}, {
					plugin_url : url
				});
			});

			ed.addCommand('mceInsertEasywave', t._insertEasywave, t);

			// Register buttons
			ed.addButton('easywave', {
				title : 'easywave.desc',
				cmd : 'mceEasywave',
				image: url+'/img/wave.png'
			});

//			ed.onPreProcess.add(function(ed, o) {
//				var dom = ed.dom;
//
//				each(dom.select('div', o.node), function(e) {
//					if (dom.hasClass(e, 'mceTmpl')) {
//						each(dom.select('*', e), function(e) {
//							if (dom.hasClass(e, ed.getParam('template_mdate_classes', 'mdate').replace(/\s+/g, '|')))
//								e.innerHTML = t._getDateTime(new Date(), ed.getParam("template_mdate_format", ed.getLang("template.mdate_format")));
//						});
//
//						t._replaceVals(e);
//					}
//				});
//			});
		},

		getInfo : function() {
			return {
				longname : 'Easywave plugin',
				author : 'Lucas Caro',
				authorurl : 'http://www.triplesmart.com',
				infourl : 'http://open-source.triplesmart.com/wavr-google-wave-for-wordpress.html',
				version : '0.1.0'
			};
		},

		_insertEasywave : function(ui, v) {
			this.editor.execCommand('mceInsertContent', false, v.content);
			this.editor.addVisual();
		}
	});

	// Register plugin
	tinymce.PluginManager.add('easywave', tinymce.plugins.EasywavePlugin);
})();