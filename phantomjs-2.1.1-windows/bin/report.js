var page = require('webpage').create();
page.open('http://phantomjs.org/download.html', function(status) {
    console.log("Status: " + status);
    if (status === "success") {
        page.render('example.pdf');
    }
    phantom.exit();
});