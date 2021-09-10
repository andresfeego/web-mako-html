/**
* TinyLimiter - scriptiny.com/tinylimiter
* License: GNU GPL v3.0 - scriptiny.com/license
*/

(function($) {
	$.fn.extend( {
		limiter: function(limit, elem) {
			$(this).on("keyup focus", function() {
				setCount(this, elem);
			});
			function setCount(src, elem) {
				var chars = src.value.length;
				if (chars > limit) {
					src.value = src.value.substr(0, limit);
					chars = limit;
					elem.html( " <div class='informativos'><span style='color: rgb(63,196,191)'>- Si deseas ingresar más palabras claves contáctanos al 3197913842 por WhatsApp o por llamada telefónica y pregúntanos como pertenecer a los comerciantes categoría bronce. </></>");
				}else{
					elem.html( limit - chars );
				}
				
			}
			setCount($(this)[0], elem);
		}
	});
})(jQuery);