jQuery(document).ready(function(){
	jQuery(".nav-menu li:has('ul')").on("focusout", function(){
		//console.log(jQuery(this));
		var sel = jQuery(this);
		setTimeout(function(){
			focusOutFunction(sel);
		}, 50);
		var focusOutFunction = function(sel){
			//console.log(document.activeElement);
			//console.log(sel);
			//console.log(sel.has(document.activeElement).length);
			if(sel.has(document.activeElement).length === 0){
				jQuery(".nav-menu li ul").css("display", "none");
				jQuery(".nav-menu li a button").attr("class", "expand");
				jQuery(".nav-menu li a button span").html("&#8681;");
				jQuery(".nav-menu li a button span:last-child").html("Show Submenu");
			}
		}
	})
	var selectedElements = jQuery(".nav-menu > li:has('ul') > a");
	//console.log(selectedElements)
	jQuery(".nav-menu > li:has('ul') > a").attr("aria-haspopup", "true");
	jQuery(".nav-menu > li:has('ul') > a").each(function(i){
		var curInnerHtml = jQuery(this).html();
		var buttonHtml = "<button id='expand-collapse' class='expand' style='margin-left: 1em; height: 2em; display: inline; vertical-align: middle;'><span aria-hidden='true' style='display: block; margin-top: -28px;'>&#8681;</span><span class='visually-hidden'>Show Submenu</span></button>"
		jQuery(this).html(curInnerHtml + buttonHtml);
	})
	//console.log(jQuery("a > #expand-collapse"))
	jQuery("a > #expand-collapse").click(function(event){
		//console.log(event);
		//console.log(event.isDefaultPrevented());
		event.preventDefault();
		//console.log(event.isDefaultPrevented());
		if(jQuery(this).attr("class") === "expand"){
			jQuery(this).attr("class", "collapse");
			jQuery(this).find("span").html("&#8679;");
			jQuery(this).find("span[class='visually-hidden']").html("Hide Submenu");
			var parentSelector = jQuery("#expand-collapse[class='collapse']").parent();
			jQuery(parentSelector).next().css("display", "block");
			event.stopImmediatePropagation();
		}
		else if(jQuery(this).attr("class") === "collapse"){
			var parentSelector = jQuery("#expand-collapse[class='collapse']").parent();
			jQuery(parentSelector).next().css("display", "none");
			jQuery(this).find("span").html("&#8681;");
			jQuery(this).find("span[class='visually-hidden']").html("Show Submenu");
			jQuery(this).attr("class", "expand");
			event.stopImmediatePropagation();
		}
	})

	
	console.log("test2");
	// jQuery('#site-navigation ul li div').attr('tabindex',0);
	var toggle_subarrows = document.getElementsByClassName('nav-toggle-subarrow');
	console.log(toggle_subarrows.length);
	for (var i = 0; i < toggle_subarrows.length; i++) {
		console.log("navtest");
	  toggle_subarrows[i].setAttribute("tabindex", "0");
	  
	}
	jQuery('#get-involved').attr('tabindex',0);
	jQuery("#menu-item-211 > a").on('click', function(e) {
	    jQuery("#get-involved").focus();
	 });
	jQuery('.nav-toggle-subarrow, .nav-toggle-subarrow .nav-toggle-subarrow').on("keypress", 
		function () {
			jQuery(this).parent().toggleClass("nav-toggle-dropdown");
			console.log("collapsing menu")
		}
	);
	jQuery('#nav-toggle').on('click', function(event){
		if(jQuery("#nav-toggle").attr("class") === "nav-is-visible"){
			jQuery(".expand").css("display", "inline");
		}
		else{
			jQuery(".expand").css("display", "none");
		}
	});
	jQuery( window ).resize(function() {
		if(jQuery(window).width() > 1141) {
			console.log("resize");
			jQuery( "#site-navigation > ul" ).removeClass("nav-menu-mobile");
			jQuery( "#nav-toggle" ).removeClass("nav-is-visible");
		}
	  
	});
});