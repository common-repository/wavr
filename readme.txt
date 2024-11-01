=== Wavr ===
Contributors: lucascaro
Tags: google wave, embed, filter, shortcode
Requires at least: 2.8
Tested up to: 2.8.6
Stable tag: 0.2.6

Wavr is an easy way to embed google wave into wordpress featuring shortcode
and a tinymce button.

== Description ==

Use this plugin to embed a wave into a wordpress post, as easy as
`[wave id="wave-id"]`. 

The goal of this plugin is to implement the full Google Wave Embed API
for wordpress.

This plugin is in **beta** release, as wave and the embed api get
stable, this plugin will be updated.

Other options are `bgcolor`, `color`, `font_size`, `font`, `width`, `height`

**Note: You can now embed google wave preview's waves! anyone with a wave
account can see your embedded wave.**

The plugin features a TinyMCE button for embedding the wave. Just
click on the button and it will show you a prompt where you can set
the wave id and other parameters.

= Update =
Added option for setting the default server as well as specifying the server
in the shortcode. Allows to use this plugin for any wave server. (including the
sandbox and preview servers).

This plugin implements the full wave embed api.
It is planned to include widgets for the sidebar in the near future.

Feature requests and any kind of feedback is very welcome!

== Installation ==

This section describes how to install the plugin and get it working.


1. Upload the files to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `[wave id="your-wave-id"]` in your templates or use the wave button


== Frequently Asked Questions ==

= How to find out the ID of a Wave? =

**On the Sandbox:**
Simply use the Debug-menu on the top-right.
Open the wave on Google Wave and click on Debug -> Get Current Wave ID.
Make sure you use the full wave id (something like wavesandbox.com!w+MNJWKLNa%A)
(Thanks to [Michael Kamleitner](http://nonsmokingarea.com/blog) )

**On the wave preview (Or when you don't have the Debug menu):**
Open the wave and look at the location bar. You will see something like this:
`https://wave.google.com/wave/?pli=1#restored:wave:googlewave.com!w%252Big2e7T0UC.13`

The wave id is the part after `wave:`, in this case, `googlewave.com!w%252Big2e7T0UC.13`
You will have to take the part after the '.' out, and replace %252B with + so
in our case the final wave id would be: `googlewave.com!w+ig2e7T0UC`.

**Update: The plugin will try to guess the wave id if you paste the full url
into the wave id field.**


== Screenshots ==

1. Adding the code to the editor.
2. This is how the wave looks like.
3. This is what you'll probably see... unless you have a sandbox account.
4. The new button added to TinyMCE.
5. The dialog for embedding waves.

== Changelog ==
= 0.2.6 =
* Changed permissions so only site administrators see the options page.
* Added spanish translation

= 0.2.5 =
* Changed the way wavr loads the javascript (now using wp_enqueue_script on action wp_print_scripts).

= 0.2.4 =
* Integrated patch from Gaël Hanquez ( https://sourceforge.net/users/caribo/ ) that will replace %252B with +

= 0.2.3 =
* Corrected bug on  wave ID's that will parse wrongly the wave id.
* Added a text box for changing the server on the easywave button.
* Added note about the importance of the last /

= 0.2.2 =
* Added auto parsing of wave urls, just paste the url and the plugin will try to
guess the wave id (Thanks to Tom Medley).

= 0.2.1 = 
* Added the "server" option, so you can use waves from the non-developers 
preview and any other google wave server.

= 0.2 =
* Added Height to the options page.
* Added TinyMCE button for embedding waves

= 0.1.4 =
* Loading scripts on the header just once, allows more than one wave.
* Using a function and a javascript object for passing options to the script.
* Added 1 FAQ.

= 0.1.3-2 =
* Added new options: height and width

= 0.1 =
* Created Plugin with basic embedding capabilities and an options page with defaults.
* Added some screenshots.


