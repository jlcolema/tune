/*
* FeedEk jQuery RSS/ATOM Feed Plugin 
* http://jquery-plugins.net/FeedEk/FeedEk.html
* Author : Engin KIZIL 
* http://www.enginkizil.com
*/

(function($){$.fn.FeedEk=function(opt){var def={FeedUrl:'',MaxCount:5,ShowDesc:true,ShowPubDate:true};if(opt){$.extend(def,opt)}var idd=$(this).attr('id');if(def.FeedUrl==null||def.FeedUrl==''){$('#'+idd).empty();return}var pubdt;$('#'+idd).empty().append('<div style="text-align:left; padding:3px;"><img src="/media/loader.gif" /></div>');$.ajax({url:'http://ajax.googleapis.com/ajax/services/feed/load?v=1.0&num='+def.MaxCount+'&output=json&q='+encodeURIComponent(def.FeedUrl)+'&callback=?',dataType:'json',success:function(data){$('#'+idd).empty();$.each(data.responseData.feed.entries,function(i,entry){$('#'+idd).append('');if(def.ShowPubDate){pubdt=new Date(entry.publishedDate);$('#'+idd).append('')}if(def.ShowDesc)$('#'+idd).append(entry.content)})}})}})(jQuery);