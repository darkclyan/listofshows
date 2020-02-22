<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
 
<div id="listShows" class="text-black"></div>
 
<script>

var dt = "<?php echo $_POST['isdate']; ?>";

var myObject = {country: "US", date: dt};

$(document).ready(function() {
function dadosJson() {
    $.getJSON("http://api.tvmaze.com/schedule", myObject, function(json) {

/*agrupar*/
var items = {},
base, key;
$.each(json, function(index, val) {
  key = val.show.network.name;
  if (!items[key]) {
    items[key] = [];
  }
  items[key].push("(" + val.airdate + " - " + val.airtime + ")" + " " + val.show.name + ": " + val.name );
});

/*montar*/
var $select = $('#listShows');
$.each(items, function(index, val) {

var optgroup = $('<optgroup>');
optgroup.attr('label', index);
  
$.each(val, function(index, val) {
    optgroup.append($('<option>', {
        text: val
    }));
});
  
$select.append(optgroup);
});
    });
}
    dadosJson();
});
</script>
 
</body>
</html>