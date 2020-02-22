<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
 
<div id="listShows"></div>
 
<script>
var x = <?php echo date("Y-m-d", strtotime($_POST["isdate"])); ?>;

$(document).ready(function() {
function dadosJson() {
    $.getJSON("http://api.tvmaze.com/schedule?country=US&date=2020-01-01", function(json) {
        $.each(json, function() {
            let info = '<p>' + "(" + this['airstamp'] + ") " + this['name'] + ": " + this['name'] + '</p>';
            $('#listShows').append(info);
        });
    });
}
    dadosJson();
});
</script>
 
</body>
</html>