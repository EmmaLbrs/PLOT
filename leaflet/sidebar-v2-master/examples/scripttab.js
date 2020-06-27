function tabAnchor() {

    var $tabContent = $(".sidebar-pane"),
    $tabs = $("ul.tabs li"),
    tabId;

// Grab the ID of the .tab-content that the hash is referring to
tabId = $(window.location.hash).closest('.sidebar-pane').attr('id');

// Find the anchor element to "click", and click it
$tabs.find('a[href^=\\#' + tabId + ']').click();
// console.log($tabs.find('a[href^=\\#' + tabId + ']'));

$('a').not('.tabs li a').on('click', function(evt) {
evt.preventDefault();
var whereTo = $(this).attr('goto');
$tabs = $("ul.tabs li");
//$tabs.find('a[href^=\\#' + whereTo + ']').trigger('click');
sidebar.open(whereTo);

//alert(attr('name'));
//alert( $('#'+whereTo+' a').offset().top );
// $('html, body').animate({
//     scrollTop: $('#'+whereTo+' a').offset().top
// });

});

$(function() {
// $('a.refresh').live("click", function() {
//     location.reload();
// });
$('.refresh').on('click', 'a', function() {
    location.reload();
});
});

};

