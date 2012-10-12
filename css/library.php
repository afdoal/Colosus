<!-- masukan semua css disini -->
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
	width:90%;
	margin:0 auto;
	position:relative;
}
#browse {
	position:absolute;
	right:77px;
	top:20px;
	cursor:pointer;
        
}
.container {
	width:100%;
	background-image:url('../image/main_bg.png');
	background-repeat:repeat-y;
        background-repeat: repeat-x;
	height:700px;
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
}
li a:hover {
	background-color:#000;
	color:#fff;
}
.categories {
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
    margin-right:40px;
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
</style>