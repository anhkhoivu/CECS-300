jQuery(document).ready(function(){
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