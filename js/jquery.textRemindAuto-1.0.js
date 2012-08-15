// by zhangxinxu 2010-06-07 v1.0 welcome to visit my personal website htp://www.zhangxinxu.com/
// 2010-06-13 v1.1 添加加载后是否自动调用失去焦点颜色判断
// 文本框文本域提示文字的自动显示与隐藏
(function($){
	$.fn.textRemindAuto = function(options){
		options = options || {};
		var defaults = {
			blurColor: "#999",
			focusColor: "#333",
			auto: true,
			chgClass: ""
		};
		var settings = $.extend(defaults,options);
		$(this).each(function(){
			if(defaults.auto){
				$(this).css("color",settings.blurColor);
			}
			var v = $.trim($(this).val());
			if(v){
				$(this).focus(function(){
					if($.trim($(this).val()) === v){
						$(this).val("");
					}
					$(this).css("color",settings.focusColor);
					if(settings.chgClass){
						$(this).toggleClass(settings.chgClass);
					}
				}).blur(function(){
					if($.trim($(this).val()) === ""){
						$(this).val(v);
					}
					$(this).css("color",settings.blurColor);
					if(settings.chgClass){
						$(this).toggleClass(settings.chgClass);
					}
				});	
			}
		});
	};
})(jQuery);

