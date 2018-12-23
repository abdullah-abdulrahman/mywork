// Opening the tree view if the current page is in the menu
var pathName = window.location.pathname;
var pathSegments = pathName.split('/');
var lastSegment = pathSegments.slice(-1)[0];

var homeMenu = ['slider', 'about', 'team', 'facts', 'partners', 'contact'];
if(homeMenu.includes(lastSegment)){
    document.querySelector('#home-treeview').className += " menu-open";
    document.querySelector('#home-treeview-menu').style.display = "block";
}