$(document).ready(function(){(function($) {

										    var current = null;
										
										    $.fn.rssfeed = function(url, options) {
										
										        // Set pluign defaults
										        var defaults = {
										            limit: 10,
										            header: false,
										            titletag: 'h6',
										            date: false,
										            content: true,
										            snippet: false,
										            showerror: false,
										            errormsg: '',
										            key: null
										        };
										        var options = $.extend(defaults, options);
										
										        // Functions
										        return this.each(function(i, e) {
										            var $e = $(e);
										
										            // Add feed class to user div
										            if (!$e.hasClass('rssFeed')) $e.addClass('rssFeed');
										
										            // Check for valid url
										            if (url == null) return false;
										
										            // Create Google Feed API address
										            var api = "http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&callback=?&q=" + url;
										            if (options.limit != null) api += "&num=" + options.limit;
										            if (options.key != null) api += "&key=" + options.key;
										
										            // Send request
										            $.getJSON(api, function(data) {
										
										                // Check for error
										                if (data.responseStatus == 200) {
										
										                    // Process the feeds
										                    _callback(e, data.responseData.feed, options);
										                } else {
										
										                    // Handle error if required
										                    if (options.showerror) if (options.errormsg != '') {
										                        var msg = options.errormsg;
										                    } else {
										                        var msg = data.responseDetails;
										                    };
										                    $(e).html('<div class="rssError"><p>' + msg + '</p></div>');
										                };
										            });
										        });
										    };
										
										    // Callback function to create HTML result
										    var _callback = function(e, feeds, options) {
										        if (!feeds) {
										            return false;
										        }
										        var html = '';
										        var row = 'odd';
										
										        // Add header if required
										        if (options.header) html += '<div class="rssHeader">' + '<a href="' + feeds.link + '" title="' + feeds.description + '">' + feeds.title + '</a>' + '</div>';
										
										
										        // Add feeds
										        // take out the loop
										        //for (var i=0; i<feeds.entries.length; i++) {
										        // Get individual feed
										        var i = Math.floor(Math.random() * feeds.entries.length);
										        var entry = feeds.entries[i];
										
										        // Format published date
										        var entryDate = new Date(entry.publishedDate);
										        var pubDate = entryDate.toLocaleDateString() + ' ' + entryDate.toLocaleTimeString();
										
										        if (options.date) html += '<div>' + pubDate + '</div>'
										        if (options.content) {
										
										            // Use feed snippet if available and optioned
										            if (options.snippet && entry.contentSnippet != '') {
										                var content = entry.contentSnippet;
										            } else {
										                var content = entry.content;
										            }
										
										            html += content;
										        }
										
										        // Alternate row classes
										        if (row == 'odd') {
										            row = 'even';
										        } else {
										            row = 'odd';
										        }
										
										        //}
										
										        $(e).html(html);
										        $('.inner-inner-wrap').equalHeights();
										    };
										})(jQuery);
										
										$("#container").rssfeed("http://www.tunedevelopment.com/random-testimonial/"); 
										});