<!DOCTYPE html>
<html>
<head>
<style>
/*Blink*/
.blink_me {
    animation-name: blinker;
    animation-duration: 1s;
    animation-timing-function: linear;
    animation-iteration-count: infinite;
    color:red;
    font-weight:bold;
}
@keyframes blinker { 
 
    0% { opacity: 1.0; }
    50% { opacity: 0.0; }
    100% { opacity: 1.0; }
}
.datax #show {
    width: 31%;
    float: left;
    text-align: center;
}
.positif, .sembuh, .meninggal {
    margin: 1%;
    border-radius: 5px;
    box-shadow: 0 1px 2px 2px rgba(0,0,0,.5);
    text-overflow: ellipsis;
    overflow: hidden;
    color: white;
    font-size: 13px;
    font-family: "Montserrat";
}
.datax .positif {
    background: #ffcc5c;
}
.datax .sembuh {
    background: #88d8b0;
}
.datax .meninggal {
    background: #ff6f69;
}
#show .angka {
    font-size: 30px;
    font-weight: 700;
}
#show .detail {
    background: white;
    width: 100%;
    display: block;
    color: black;
    box-shadow: 0px -2px 4px 1px #66c7ff;
}
.datax .title {
    text-align: center;
    text-transform: uppercase;
    font-family: "Montserrat;
    font-size:18px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
var d = new Date();
var month = new Array();
  month[0] = "Januari";
  month[1] = "Februari";
  month[2] = "Maret";
  month[3] = "April";
  month[4] = "Mei";
  month[5] = "Juni";
  month[6] = "Juli";
  month[7] = "Agustus";
  month[8] = "September";
  month[9] = "Oktober";
  month[10] = "November";
  month[11] = "Desember";
  
$("#date").html(d.getDate() + " " + month[d.getMonth()] + " " + d.getFullYear());
    $.ajax({url: "https://api.kawalcorona.com/indonesia/", success: function(result){
     $("#positif").html(result[0].positif);
     $("#sembuh").html(result[0].sembuh);
     $("#meninggal").html(result[0].meninggal);
    }});
});
</script>
</head>
<body>
<div class="datax">
<div class="title">
<h3><span class="blink_me">Live Update</span><br>covid-19 indonesia<br><span id="date"></span></h3>
</div>
<div id="show" class="positif">
<div id="positif" class="angka">

</div>
<span class="detail">Positif<br><img src="https://sourcecode.web.id/sad.png" width="25px"></span>
</div>
<div id="show" class="sembuh">
<div id="sembuh" class="angka"></div>
<span class="detail">Sembuh<br><img src="https://sourcecode.web.id/smile.png" width="25px"></span>
</div>
<div id="show" class="meninggal">
<div id="meninggal" class="angka"></div>
<span class="detail">Meninggal<br><img src="https://sourcecode.web.id/fidgety.png" width="25px"></span>
</div>
</div>

</body>
</html>
