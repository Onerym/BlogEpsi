<?php
   header('content-type: text/css');
   ob_start('ob_gzhandler');
   header('Cache-Control: max-age=31536000, must-revalidate');
   
   
   include '../config.php';
    session_start();
    $info = mysqli_query($link, 'SELECT * FROM configblog WHERE id = 1');
    $titreaffichage = mysqli_fetch_assoc($info);
?>


footer{
	margin: 0;
	font-family: Trebuchet MS;
	color: white;
	text-align:center;
    background-color: <?php echo $titreaffichage['footer'] ?>;
    position: relative;
    bottom:0;
    top: 50px;
    width:100%;
    display:inline-block;
    vertical-align:top;
    font-size:13px;
	
}

.social{
	width: 50px;
	height: 50px;
	top: 10px;
	left: 10px;
}

#socialbar {
	padding: 0 15em; 
	text-align: center;
}

header{
margin-left: auto;
margin-right: auto;
background-color: <?php echo $titreaffichage['header'] ?>;
margin-top: 0px;
padding: 2px;
height:220px;
font-family : Trebuchet MS;
   
}
#titre{
    font-size: 35px;
    color: white;
    font-family: Impact;
    font-weight: bold;
    position:absolute;
    top:30px;
    left:450px;
    bottom: 25px;
}
#logo{
    width: 150px;
    height: 150px;
    margin:auto;
    padding-top: 15px;
    margin-left:100px;

}
#connexion{
    font-family : Trebuchet MS;
    color : white;
    position:absolute;
    top:0px;
    right:40px;
    text-decoration : none;
}

#info{
    position:absolute;
top:50px;
right:40px;
}

body {
margin: auto;
padding:auto;
margin-top:0px;
background-image : url("../images/background");
background-repeat : no-repeat;
background-position : center;
background-size : cover;
font-family : Trebuchet MS;
background-color: <?php echo $titreaffichage['body'] ?>;
}



#slideshow {
  overflow: hidden;
  height: 522px;
  width: 928px;
  margin: 0 auto;
  border-radius : 20px;
}

.slide-wrapper {
  width: 2912px;
  -webkit-animation: slide 18s ease infinite;
}

.slide {
  float: left;
  height: 522px;
  width: 928px;
}

.slide-number {
  color: #000;
  text-align: center;
  font-size: 10em;
}

@-webkit-keyframes slide {
  20% {margin-left: 0px;}
  30% {margin-left: -928px;}
  50% {margin-left: -928px;}
  60% {margin-left: -1856px;}
  80% {margin-left: -1856px;}

}

.slider{
	height: 100%;
  width: 100%;
  overflow: hidden;
}

.formchange{
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    width: 30%;
}

.article{
-moz-box-shadow: 0px 0px 20px 0px #656565;
-webkit-box-shadow: 0px 0px 20px 0px #656565;
-o-box-shadow: 0px 0px 20px 0px #656565;
box-shadow: 0px 0px 20px 0px #656565;
filter:progid:DXImageTransform.Microsoft.Shadow(color=#656565, Direction=NaN, Strength=20);
background-color: <?php echo $titreaffichage['article'] ?>;
    position: relative;
    margin-left: auto;
    margin-right:auto;
    width: 55%;
    height: 20%;
    padding: 20px;
    margin-top: 100px;
    margin-bottom: 100px;
    white-space:pre-wrap;
    word-wrap: break-word;
}

  .btn  {
   background-color: #4D3103;
   background-image: -webkit-linear-gradient(top, #4D3103, #4D3103);
   background-image: -moz-linear-gradient(top, #4D3103, #4D3103);
   background-image: -ms-linear-gradient(top, #4D3103, #4D3103);
   background-image: -o-linear-gradient(top, #4D3103, #4D3103);
   background-image: linear-gradient(to bottom, #4D3103, #4D3103);
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   color: #4D3103;
   font-family: Trebuchet MS;
   font-size: 12px;
   font-weight: 600;
   padding: 8px;
   text-shadow: 1px 1px 20px #000000;
   border: double #FFFFFF 4px;
   text-decoration: none;
   color : white;
   display: inline-block;
   cursor: pointer;
   background: #4D3103;
   text-decoration: none;
}

textarea{
 resize:none;
}

.page-header{
font-family: Trebuchet MS;
}