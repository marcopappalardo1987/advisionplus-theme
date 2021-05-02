jQuery(document).ready(function() {
    jQuery("#themeplus-tp-social-links .redux-slides-header").text(function () {
        return jQuery(this).text().replace("New Slide", "New Social Network"); 
    });
});