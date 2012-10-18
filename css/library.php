<!-- masukan semua css disini -->
<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="http://www.jeasyui.com/easyui/demo/demo.css">
	<style type="text/css">
		#fm{
			margin:0;
			padding:10px 30px;
		}
		.ftitle{
			font-size:14px;
			font-weight:bold;
			color:#666;
			padding:5px 0;
			margin-bottom:10px;
			border-bottom:1px solid #ccc;
		}
		.fitem{
			margin-bottom:5px;
		}
		.fitem label{
			display:inline-block;
			width:190px;
		}
	</style>
<style>
body {
	margin:0;
	background-color:#e8eef5;
	font-family:Geneva, sans-serif;
	font-size:14px;
}
.head {
	width:100%;
	background-image:url('..images/header_bg.png');
	background-repeat:repeat-x;
	height:80px;
}
.head .main {
	width:99%;
	margin:-19px auto;
	position:relative;
}
#browse {
	position:absolute;
	right:77px;
	top:20px;
	cursor:pointer;
        z-index:99;
        
}
.container {
	width:100%;
	background-image:url('../image/main_bg.png');
	background-repeat:repeat-y;
        background-repeat: repeat-x;
	height:50px;
        
        
}
.wrapper{
    width:100%;
    margin:0 auto;
    
}

.footer{
     background-image:url('../image/footer.png');
	background-repeat:repeat-y;
        background-repeat: repeat-x;
      text-align: center;
      color:white;
     font-size:10px;
     position: fixed;
     bottom: 0px;
     margin-bottom: -10px;
     left: 0px;
     border-radius:15px;
     width: 100%;
     height: 42px
}
.content {
	width:99%;
	margin:0 auto;
}
ul {
	padding:0;
}
li {
	display:inline;
	width:200px;
	float:left;
	border-bottom:1px dotted #dedede;
	margin:0px 5px;
}
li a {
	display:block;
	color:#333;
	padding:8px;
        text-decoration: none;
}
li a:hover {
	background-color:#000;
	color:#fff;
}
.categories {
        z-index:98;
        position: fixed;
	display:none;
	padding:10px;
	float:left;
	/* width:960px; */
	background-color:#fff;
	margin-top:20px;
	-moz-border-radius: 8px; 
	-webkit-border-radius: 8px;
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.2);
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.2);
}
#logo{
    float:left;
    margin-right:20px;
}
#keterangan{
    
    padding: 6px 6px 6px 6px;
    float:left;
    margin-top:3px;
    margin-right: 20px;
    height: 60px;
    
    font-size: 15px;
    
    color: #333333;
    font-family: Tahoma, Geneva, sans-serif;
    font-weight:600;
    
}
#menu{
        
        float:left;
        width:70px;
        height:70px;
        margin-top:3px;
	opacity: 0.8;
	/* border: 10px solid black;
        border-radius: 10px; */
        margin-right:10px;
 
	/*Transition*/
	-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
 
	/*Reflection*/
	-webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(.7, transparent), to(rgba(0,0,0,0.1)));

}
#menu:hover{
        
        width:90px;
        height:90px;
        opacity: 1;
 
         /*Reflection*/
        -webkit-box-reflect: below 0px -webkit-gradient(linear, left top, left bottom, from(transparent), color-stop(.7, transparent), to(rgba(0,0,0,0.4)));
 
         /*Glow*/
        -webkit-box-shadow: 0px 0px 20px rgba(255,255,255,0.8);
        -moz-box-shadow: 0px 0px 20px rgba(255,255,255,0.8);
        box-shadow: 0px 0px 20px rgba(255,255,255,0.8);
}
.top_container{
	width:980px;
	float:left;
	background-color:#fff;
	margin-top:20px;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.2);
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.2);
}


.bottom_container{
	width:980px;
	float:left;
	background-color:#fff;
	margin-top:20px;
	margin-bottom:30px;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
	-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.2);
	-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.2);
}

.clear {
	clear:both;
}

.clock {width:167px;border:6px solid black;border-radius: 10px; float:left;margin-top:4px;margin-right:3px; color:#fff;padding: 4px 4px 4px 4px; ; background: -webkit-linear-gradient(black, gray);}

#Date { font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; text-shadow:0 0 5px #00c6ff; }

#uljam { margin:0 auto; padding:0px; list-style:none; text-align:center; }
#uljam li { width:20px;display:inline;margin:0 auto; font-size:30px; text-align:center; font-family:'BebasNeueRegular', Arial, Helvetica, sans-serif; text-shadow:0 0 5px #00c6ff; }

#point { position:relative; -moz-animation:mymove 1s ease infinite; -webkit-animation:mymove 1s ease infinite; padding-left:10px; padding-right:10px; }

/* Simple Animation */
@-webkit-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }	
}

@-moz-keyframes mymove 
{
0% {opacity:1.0; text-shadow:0 0 20px #00c6ff;}
50% {opacity:0; text-shadow:none; }
100% {opacity:1.0; text-shadow:0 0 20px #00c6ff; }	
}
</style>