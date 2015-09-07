/*!
// Infinite Scroll jQuery plugin
// copyright Paul Irish, licensed GPL & MIT
// version 1.5.101203

// home and docs: http://www.infinite-scroll.com
*/
;(function($){$.fn.infinitescroll=function(options,callback){function debug(){if(opts.debug){window.console&&console.log.call(console,arguments)}}function areSelectorsValid(opts){for(var key in opts){if(key.indexOf&&key.indexOf('Selector')>-1&&$(opts[key]).length===0){debug('Your '+key+' found no elements.');return false}return true}}function determinePath(path){if(path.match(/^(.*?)\b2\b(.*?$)/)){path=path.match(/^(.*?)\b2\b(.*?$)/).slice(1)}else if(path.match(/^(.*?)2(.*?$)/)){if(path.match(/^(.*?page=)2(\/.*|$)/)){path=path.match(/^(.*?page=)2(\/.*|$)/).slice(1);return path}debug('Trying backup next selector parse technique. Treacherous waters here, matey.');path=path.match(/^(.*?)2(.*?$)/).slice(1)}else{if(path.match(/^(.*?page=)1(\/.*|$)/)){path=path.match(/^(.*?page=)1(\/.*|$)/).slice(1);return path}if($.isFunction(opts.pathParse)){return[path]}else{debug('Sorry, we couldn\'t parse your Next (Previous Posts) URL. Verify your the css selector points to the correct A tag. If you still get this error: yell, scream, and kindly ask for help at infinite-scroll.com.');props.isInvalidPage=true}}return path}function filterNav(){opts.isFiltered=true;return $.event.trigger("ajaxError",[{status:302}])}function isNearBottom(){var pixelsFromWindowBottomToBottom=0+$(document).height()-($(props.container).scrollTop()||$(props.container.ownerDocument.body).scrollTop())-$(window).height();debug('math:',pixelsFromWindowBottomToBottom,props.pixelsFromNavToBottom);return(pixelsFromWindowBottomToBottom-opts.bufferPx<props.pixelsFromNavToBottom)}function showDoneMsg(){props.loadingMsg.find('img').hide().parent().find('div').html(opts.donetext).animate({opacity:1},2000,function(){$(this).parent().fadeOut('normal')});opts.errorCallback()}function infscrSetup(){if(opts.isDuringAjax||opts.isInvalidPage||opts.isDone||opts.isPaused)return;if(!isNearBottom(opts,props))return;$(document).trigger('retrieve.infscr.'+opts.infid)}function kickOffAjax(){opts.isDuringAjax=true;props.loadingMsg.appendTo(opts.loadMsgSelector).show(opts.loadingMsgRevealSpeed,function(){$(opts.navSelector).hide();opts.currPage++;debug('heading into ajax',path);box=$(opts.contentSelector).is('table')?$('<tbody/>'):$('<div/>');frag=document.createDocumentFragment();if($.isFunction(opts.pathParse)){desturl=opts.pathParse(path.join('2'),opts.currPage)}else{desturl=path.join(opts.currPage)}box.load(desturl+' '+opts.itemSelector,null,loadCallback)})}function loadCallback(){if(opts.isDone){showDoneMsg();return false}else{var children=box.children();if(children.length==0||children.hasClass('error404')){return $.event.trigger("ajaxError",[{status:404}])}while(box[0].firstChild){frag.appendChild(box[0].firstChild)}$(opts.contentSelector)[0].appendChild(frag);props.loadingMsg.fadeOut('normal');if(opts.animate){var scrollTo=$(window).scrollTop()+$('#infscr-loading').height()+opts.extraScrollPx+'px';$('html,body').animate({scrollTop:scrollTo},800,function(){opts.isDuringAjax=false})}callback.call($(opts.contentSelector)[0],children.get());if(!opts.animate)opts.isDuringAjax=false}}function initPause(pauseValue){if(pauseValue=="pause"){opts.isPaused=true}else if(pauseValue=="resume"){opts.isPaused=false}else{opts.isPaused=!opts.isPaused}debug('Paused: '+opts.isPaused);return false}$.browser.ie6=$.browser.msie&&$.browser.version<7;var opts=$.extend({},$.infinitescroll.defaults,options),props=$.infinitescroll,box,frag,desturl;callback=callback||function(){};if(!areSelectorsValid(opts)){return false}props.container=document.documentElement;opts.contentSelector=opts.contentSelector||this;opts.loadMsgSelector=opts.loadMsgSelector||opts.contentSelector;var relurl=/(.*?\/\/).*?(\/.*)/,path=$(opts.nextSelector).attr('href');if(!path){debug('Navigation selector not found');return}path=determinePath(path);props.pixelsFromNavToBottom=$(document).height()+(props.container==document.documentElement?0:$(props.container).offset().top)-$(opts.navSelector).offset().top;props.loadingMsg=$('<div id="infscr-loading" style="text-align: center;"><img alt="Loading..." src="'+opts.loadingImg+'" /><div>'+opts.loadingText+'</div></div>');(new Image()).src=opts.loadingImg;$(document).ajaxError(function(e,xhr,opt){if(!opts.isDone&&xhr.status==404){debug('Page not found. Self-destructing...');showDoneMsg();opts.isDone=true;opts.currPage=1;$(window).unbind('scroll.infscr',infscrSetup);$(document).unbind('retrieve.infscr.'+opts.infid,kickOffAjax)}if(opts.isFiltered&&xhr.status==302){debug('Filtered. Going to next instance...');opts.currPage=1;opts.isPaused=false;$(window).unbind('scroll.infscr',infscrSetup).unbind('pause.infscr.'+opts.infid);$(document).unbind('retrieve.infscr.'+opts.infid,kickOffAjax)}});var pauseValue='hilarious';$(window).bind('scroll.infscr',infscrSetup).bind('filter.infscr',filterNav).bind('pause.infscr.'+opts.infid,function(event,thisPause){initPause(thisPause)}).trigger('scroll.infscr');$(document).bind('retrieve.infscr.'+opts.infid,kickOffAjax);return this}$.infinitescroll={defaults:{debug:false,preload:false,nextSelector:"div.navigation a:first",loadingImg:"http://www.infinite-scroll.com/loading.gif",loadingText:"<em>Loading the next set of posts...</em>",donetext:"<em>Congratulations, you've reached the end of the internet.</em>",navSelector:"div.navigation",contentSelector:null,loadMsgSelector:null,loadingMsgRevealSpeed:'fast',extraScrollPx:150,itemSelector:"div.post",animate:false,pathParse:undefined,bufferPx:40,errorCallback:function(){},infid:1,currPage:1,isDuringAjax:false,isInvalidPage:false,isFiltered:false,isDone:false,isPaused:false},loadingImg:undefined,loadingMsg:undefined,container:undefined,currDOMChunk:null}})(jQuery);