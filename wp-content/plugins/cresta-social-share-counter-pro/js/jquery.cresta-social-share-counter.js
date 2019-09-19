(function($) {
	"use strict";
	$(document).ready(function() {
		/*-----------------------------------------------------------------------------------*/
		/*  Social Counter JS
		/*-----------------------------------------------------------------------------------*/ 		
		var $URL = crestaPermalink.thePermalink;
		var $ismorezero = crestaPermalink.themorezero;
		var $totalismorezero = crestaPermalink.totalmorezero;
		var $ismorenumber = crestaPermalink.themorenumber;
		totalShares($URL);
			function ReplaceNumberWithCommas(shareNumber) {
				 if (shareNumber >= 1000000000) {
					return (shareNumber / 1000000000).toFixed(1).replace(/\.0$/, '') + 'G';
				 }
				 if (shareNumber >= 1000000) {
					return (shareNumber / 1000000).toFixed(1).replace(/\.0$/, '') + 'M';
				 }
				 if (shareNumber >= 1000) {
					return (shareNumber / 1000).toFixed(1).replace(/\.0$/, '') + 'K';
				 }
				 return shareNumber;
			}
			if ( $('#stumbleupon-cresta').hasClass('stumbleupon-cresta-share') || $('#stumbleupon-cresta-c').hasClass('stumbleupon-cresta-share') ) {
				// Stumbleupon Shares Count via PHP
				var stumbleuponShares = crestaShareS.StumbleCount;
				var stumbleuponvar = $('<span class="cresta-the-count-content" id="stumbleupon-count-content"></span>').text(ReplaceNumberWithCommas(stumbleuponShares));
				if ($ismorezero == 'yesmore') {
					if (stumbleuponShares > $ismorenumber) {
						$('.stumbleupon-cresta-share a').after(stumbleuponvar)
					}
				} else {
					$('.stumbleupon-cresta-share a').after(stumbleuponvar)
				}
				$('#total-shares, #total-shares-content').attr('data-stumbleuponShares', stumbleuponShares)
			} else {
				$('#total-shares, #total-shares-content').attr('data-stumbleuponShares', 0)
			}
			// Linkedin Shares Count
			function linkedInShares($URL) {
				if ( $('#linkedin-cresta').hasClass('linkedin-cresta-share') || $('#linkedin-cresta-c').hasClass('linkedin-cresta-share') ) {
					var LinkedinShares = crestaShareSS.LinkedinCount;
					if ( LinkedinShares != 'nope' ) {
						var linkedinvar = $('<span class="cresta-the-count-content" id="linkedin-count-content"></span>').text(ReplaceNumberWithCommas(LinkedinShares));
						if ($ismorezero == 'yesmore') {
							if (LinkedinShares > $ismorenumber) {
								$('.linkedin-cresta-share a').after(linkedinvar)
							}
						} else {
							$('.linkedin-cresta-share a').after(linkedinvar)
						}
						$('#total-shares, #total-shares-content').attr('data-linkedInShares', LinkedinShares)
					} else {
						$.ajax({
							url: "https://www.linkedin.com/countserv/count/share?url=" + $URL + "&callback=?",
							type: "GET",
							dataType: "json",
							timeout: 2500,
							error: function(jqXHR, status, errorThrown){  
								if ($ismorezero == 'nomore') {
									$('.linkedin-cresta-share a').after('<span class="cresta-the-count-content" id="linkedin-count-content">0</span>')
								}
								$('#total-shares, #total-shares-content').attr('data-linkedInShares', 0)
							},
							success: function (linkedindata) {
								var linkedinvar = $('<span class="cresta-the-count-content" id="linkedin-count-content"></span>').text(ReplaceNumberWithCommas(linkedindata.count));
								if ($ismorezero == 'yesmore') {
									if (linkedindata.count > $ismorenumber) {
										$('.linkedin-cresta-share a').after(linkedinvar)
									}
								} else {
									$('.linkedin-cresta-share a').after(linkedinvar)
								}
								$('#total-shares, #total-shares-content').attr('data-linkedInShares', linkedindata.count)
							}
						});	
					}
				} else {
					$('#total-shares, #total-shares-content').attr('data-linkedInShares', 0)
				}
			}
			// Facebook Shares Count
			function facebookShares($URL) {
				if ( $('#facebook-cresta').hasClass('facebook-cresta-share') || $('#facebook-cresta-c').hasClass('facebook-cresta-share') ) {
					var token = crestaShareSSS.FacebookCount;
					if ( token != 'nope' ) {
						// Facebook Shares Count via PHP
						var facebookvar = $('<span class="cresta-the-count-content" id="facebook-count-content"></span>').text(ReplaceNumberWithCommas(token));
						if ($ismorezero == 'yesmore') {
							if (token > $ismorenumber) {
								$('.facebook-cresta-share a').after(facebookvar)
							}
						} else {
							$('.facebook-cresta-share a').after(facebookvar)
						}
						$('#total-shares, #total-shares-content').attr('data-facebookShares', token)
					} else {
						$.getJSON('//graph.facebook.com/?id=' + $URL, function (fbdata) {
							if(fbdata.share != undefined && fbdata.share.share_count != undefined){
								var facebookvar = $('<span class="cresta-the-count-content" id="facebook-count-content"></span>').text(ReplaceNumberWithCommas(fbdata.share.share_count || 0));
								if ($ismorezero == 'yesmore') {
									if (fbdata.share.share_count > $ismorenumber) {
										$('.facebook-cresta-share a').after(facebookvar)
									}
								} else {
									$('.facebook-cresta-share a').after(facebookvar)
								}
								$('#total-shares, #total-shares-content').attr('data-facebookShares', fbdata.share.share_count || 0)
							} else {
								if ($ismorezero == 'nomore') {
									$('.facebook-cresta-share a').after('<span class="cresta-the-count-content" id="facebook-count-content">0</span>')
								}
								$('#total-shares, #total-shares-content').attr('data-facebookShares', 0)
							}
						});
					}
				} else {
					$('#total-shares, #total-shares-content').attr('data-facebookShares', 0)
				}
			}
			// Twitter Shares Count
			function twitterShares($URL) {
				if ( $('#twitter-cresta').hasClass('twitter-cresta-share') && $('#twitter-cresta').hasClass('withCount') || $('#twitter-cresta-c').hasClass('twitter-cresta-share') && $('#twitter-cresta-c').hasClass('withCount') ) {
					$.ajax({
						url: "//public.newsharecounts.com/count.json?url=" + $URL + "&callback=?",
						type: "GET",
						dataType: "json",
						timeout: 2500,
						error: function(jqXHR, status, errorThrown){  
							if ($ismorezero == 'nomore') {
								$('.twitter-cresta-share a').after('<span class="cresta-the-count-content" id="twitter-count-content">0</span>')
							}
							$('#total-shares, #total-shares-content').attr('data-twitterShares', 0)
						},
						success: function (twitterdata) {
							var twittervar = $('<span class="cresta-the-count-content" id="twitter-count-content"></span>').text(ReplaceNumberWithCommas(twitterdata.count));
							if ($ismorezero == 'yesmore') {
								if (twitterdata.count > $ismorenumber) {
									$('.twitter-cresta-share a').after(twittervar)
								}
							} else {
								$('.twitter-cresta-share a').after(twittervar)
							}
							$('#total-shares, #total-shares-content').attr('data-twitterShares', twitterdata.count)
						}
					});	
				} else {
					$('#total-shares, #total-shares-content').attr('data-twitterShares', 0)
				}
			}
			// Pinterest Shares Count
			function pinterestShares($URL) {
				if ( $('#pinterest-cresta').hasClass('pinterest-cresta-share') || $('#pinterest-cresta-c').hasClass('pinterest-cresta-share') ) {
					$.getJSON('https://api.pinterest.com/v1/urls/count.json?url=' + $URL + '&callback=?', function (pindata) {
						var pinterestvar = $('<span class="cresta-the-count-content" id="pinterest-count-content"></span>').text(ReplaceNumberWithCommas(pindata.count));
						if ($ismorezero == 'yesmore') {
							if (pindata.count > $ismorenumber) {
								$('.pinterest-cresta-share a').after(pinterestvar)
							}
						} else {
							$('.pinterest-cresta-share a').after(pinterestvar)
						}
						$('#total-shares, #total-shares-content').attr('data-pinterestShares', pindata.count)
					});
				} else {
					$('#total-shares, #total-shares-content').attr('data-pinterestShares', 0)
				}
			}
			// Vkontakte Shares Count
			function vkShares($URL) {
				if ( $('#vk-cresta').hasClass('vk-cresta-share') || $('#vk-cresta-c').hasClass('vk-cresta-share') ) {
					if (!window.VK) window.VK = {};
                        if (!VK.Share) {
                            VK.Share = {
                                count: function (index, count) {
									var vkvar = $('<span class="cresta-the-count-content" id="vk-count-content"></span>').text(ReplaceNumberWithCommas(count));
									if ($ismorezero == 'yesmore') {
										if (count > $ismorenumber) {
											$('.vk-cresta-share a').after(vkvar)
										}
									} else {
										$('.vk-cresta-share a').after(vkvar)
									}
									$('#total-shares, #total-shares-content').attr('data-vkShares', count)
                                }
                            };
                        }
					$.getJSON('//vk.com/share.php?act=count&index=1&url=' + $URL + '&format=json&callback=?',null);
				} else {
					$('#total-shares, #total-shares-content').attr('data-vkShares', 0)
				}
			}
			// Buffer Shares Count
			function bufferShares($URL) {
				if ( $('#buffer-cresta').hasClass('buffer-cresta-share') || $('#buffer-cresta-c').hasClass('buffer-cresta-share') ) {
					$.getJSON('https://api.bufferapp.com/1/links/shares.json?url=' + $URL + '&callback=?', function (bufferdata) {
						var buffervar = $('<span class="cresta-the-count-content" id="buffer-count-content"></span>').text(ReplaceNumberWithCommas(bufferdata.shares));
						if ($ismorezero == 'yesmore') {
							if (bufferdata.shares > $ismorenumber) {
								$('.buffer-cresta-share a').after(buffervar)
							}
						} else {
							$('.buffer-cresta-share a').after(buffervar)
						}
						$('#total-shares, #total-shares-content').attr('data-bufferShares', bufferdata.shares)
					});
				} else {
					$('#total-shares, #total-shares-content').attr('data-bufferShares', 0)
				}
			}
			// Reddit Shares Count
			function redditShares($URL) {
				if ( $('#reddit-cresta').hasClass('reddit-cresta-share') || $('#reddit-cresta-c').hasClass('reddit-cresta-share') ) {
					$.getJSON('https://www.reddit.com/api/info.json?url=' + $URL, function (redditdata) {
						if ($(redditdata.data.children[0]).length) {
							var reddfirst_child = redditdata.data.children[0].data.score;
						} else {
							var reddfirst_child = 0;
						}
						var redditvar = $('<span class="cresta-the-count-content" id="reddit-count-content"></span>').text(ReplaceNumberWithCommas(reddfirst_child));
						if ($ismorezero == 'yesmore') {
							if (reddfirst_child > $ismorenumber) {
								$('.reddit-cresta-share a').after(redditvar)
							}
						} else {
							$('.reddit-cresta-share a').after(redditvar)
						}
						$('#total-shares, #total-shares-content').attr('data-redditShares', reddfirst_child)
					});
				} else {
					$('#total-shares, #total-shares-content').attr('data-redditShares', 0)
				}
			}
			// OK.ru Shares Count
			function okShares($URL) {
				if ( $('#ok-cresta').hasClass('ok-cresta-share') || $('#ok-cresta-c').hasClass('ok-cresta-share') ) {
						if (!window.ODKL) window.ODKL = {};
                            window.ODKL.updateCount = function(idx, number) {
								var okvar = $('<span class="cresta-the-count-content" id="ok-count-content"></span>').text(ReplaceNumberWithCommas(number));
								if ($ismorezero == 'yesmore') {
									if (number > $ismorenumber) {
										$('.ok-cresta-share a').after(okvar)
									}
								} else {
									$('.ok-cresta-share a').after(okvar)
								}
								$('#total-shares, #total-shares-content').attr('data-okShares', number)
                            };
						$.getJSON('https://connect.ok.ru/dk?st.cmd=extLike&uid=odklcnt0&ref=' + $URL + '&callback=?',null);
				} else {
					$('#total-shares, #total-shares-content').attr('data-okShares', 0)
				}
			}
			// Xing Shares Count
			/*
			function xingShares($URL) {
				if ( $('#xing-cresta').hasClass('xing-cresta-share') || $('#xing-cresta-c').hasClass('xing-cresta-share') ) {
						$.getJSON('https://query.yahooapis.com/v1/public/yql?q='+ encodeURIComponent('select * from html where url="https://www.xing-share.com/app/share?op=get_share_button;counter=top;url=' + $URL + '" and xpath="*"') + '&format=json&callback=?', function(xingdata) {
							var xingvar = $('<span class="cresta-the-count-content" id="xing-count-content"></span>').text(ReplaceNumberWithCommas(xingdata.query.results.html.body.div[0].div[0].span.content));
							if (xingdata.query.results.html.body.div[0].div[0].span.content > 0 || $ismorezero == 'nomore') {
								$('.xing-cresta-share a').after(xingvar)
							}
							$('#total-shares, #total-shares-content').attr('data-xingShares', xingdata.query.results.html.body.div[0].div[0].span.content)
						});
				} else {
					$('#total-shares, #total-shares-content').attr('data-xingShares', 0)
				}
			}
			*/
			function xingShares($URL) {
				if ( $('#xing-cresta').hasClass('xing-cresta-share') || $('#xing-cresta-c').hasClass('xing-cresta-share') ) {
					$('#total-shares, #total-shares-content').attr('data-xingShares', 0)
				} else {
					$('#total-shares, #total-shares-content').attr('data-xingShares', 0)
				}
			}
			// Check if all JSON calls are finished or not
			function checkJSON_getSum() {
				if ($('#total-shares, #total-shares-content').attr('data-facebookShares') != undefined && $('#total-shares, #total-shares-content').attr('data-twitterShares') != undefined &&
				$('#total-shares, #total-shares-content').attr('data-linkedinShares') != undefined && $('#total-shares, #total-shares-content').attr('data-pinterestShares') != undefined &&
				$('#total-shares, #total-shares-content').attr('data-stumbleuponShares') != undefined && $('#total-shares, #total-shares-content').attr('data-vkShares') != undefined &&
				$('#total-shares, #total-shares-content').attr('data-bufferShares') != undefined &&
				$('#total-shares, #total-shares-content').attr('data-redditShares') != undefined && $('#total-shares, #total-shares-content').attr('data-okShares') != undefined &&
				$('#total-shares, #total-shares-content').attr('data-xingShares') != undefined) {
					if ( $('#facebook-cresta').hasClass('facebook-cresta-share') || $('#facebook-cresta-c').hasClass('facebook-cresta-share')) {
						var fbShares = parseInt($('#total-shares, #total-shares-content').attr('data-facebookShares'));
					} else {
						var fbShares = 0;
					}
					if ( $('#twitter-cresta').hasClass('twitter-cresta-share') && $('#twitter-cresta').hasClass('withCount') || $('#twitter-cresta-c').hasClass('twitter-cresta-share') && $('#twitter-cresta-c').hasClass('withCount') ) {
						var twitShares = parseInt($('#total-shares, #total-shares-content').attr('data-twitterShares'));
					} else {
						var twitShares = 0;
					}
					if ( $('#linkedin-cresta').hasClass('linkedin-cresta-share') || $('#linkedin-cresta-c').hasClass('linkedin-cresta-share')) {
						var linkedInShares = parseInt($('#total-shares, #total-shares-content').attr('data-linkedinShares'));
					} else {
						var linkedInShares = 0;
					}
					if ( $('#pinterest-cresta').hasClass('pinterest-cresta-share') || $('#pinterest-cresta-c').hasClass('pinterest-cresta-share')) {
						var pinterestShares = parseInt($('#total-shares, #total-shares-content').attr('data-pinterestShares'));
					} else {
						var pinterestShares = 0;
					}
					if ( $('#stumbleupon-cresta').hasClass('stumbleupon-cresta-share') || $('#stumbleupon-cresta-c').hasClass('stumbleupon-cresta-share')) {
						var stumbleuponShares = parseInt($('#total-shares, #total-shares-content').attr('data-stumbleuponShares'));
					} else {
						var stumbleuponShares = 0;
					}
					if ( $('#vk-cresta').hasClass('vk-cresta-share') || $('#vk-cresta-c').hasClass('vk-cresta-share')) {
						var vkShares = parseInt($('#total-shares, #total-shares-content').attr('data-vkShares'));
					} else {
						var vkShares = 0;
					}
					if ( $('#buffer-cresta').hasClass('buffer-cresta-share') || $('#buffer-cresta-c').hasClass('buffer-cresta-share')) {
						var bufferShares = parseInt($('#total-shares, #total-shares-content').attr('data-bufferShares'));
					} else {
						var bufferShares = 0;
					}
					if ( $('#reddit-cresta').hasClass('reddit-cresta-share') || $('#reddit-cresta-c').hasClass('reddit-cresta-share')) {
						var redditShares = parseInt($('#total-shares, #total-shares-content').attr('data-redditShares'));
					} else {
						var redditShares = 0;
					}
					if ( $('#ok-cresta').hasClass('ok-cresta-share') || $('#ok-cresta-c').hasClass('ok-cresta-share')) {
						var okShares = parseInt($('#total-shares, #total-shares-content').attr('data-okShares'));
					} else {
						var okShares = 0;
					}
					if ( $('#xing-cresta').hasClass('xing-cresta-share') || $('#xing-cresta-c').hasClass('xing-cresta-share')) {
						var xingShares = parseInt($('#total-shares, #total-shares-content').attr('data-xingShares'));
					} else {
						var xingShares = 0;
					}
				} else {
					setTimeout(function () {
						checkJSON_getSum();
					}, 200);
				}
				var totalShares = fbShares + linkedInShares + pinterestShares + stumbleuponShares + vkShares + bufferShares + redditShares + okShares + xingShares + twitShares;
				if (totalShares <= 0 && $totalismorezero == 'totalyesmore') {
					$('#crestashareiconincontent .sbutton-total, #crestashareicon .sbutton.total-float').addClass('crestaHideTotalShares');
				} else {
					$('#total-count, #total-count-content').text( ReplaceNumberWithCommas(totalShares) || 0 )
				}
			}
			function totalShares($URL) {
				linkedInShares($URL);
				twitterShares($URL);
				facebookShares($URL);
				//googleplusShares($URL);
				pinterestShares($URL);
				vkShares($URL);
				bufferShares($URL);
				redditShares($URL);
				okShares($URL);
				xingShares($URL);
				checkJSON_getSum();
			}
	});
})(jQuery);