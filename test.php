<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mentor Finder - Admin</title>
    <link rel="stylesheet" href="./vendor/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./vendor/font-awesome/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body class="sidebar-fixed header-fixed">
 <input type="text" name="valueToSearch" id="valueToSearch" onKeyUp="aa();">
 <div style=" border-style:solid; border-width:1px; margin:auto; visibility:hidden " id="d1">test</div>
 <script type="text/javascript">	
									function aa()
									{
										xmlhttp=new XMLHttpRequest();
										xmlhttp.open("GET","search-mentor.php?nm="+document.getElementById("valueToSearch".value,false));
										xmlhttp.send(null);
										document.getElementById("d1").innetHTML=xmlhttp.responseText;
										document.getElementById("d1").style.visibility='visible';
									}
 </script>
</body>
</html>