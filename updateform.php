<?php
session_start();
include "dbconnect.php";
?>
<?php 

if(isset($_GET['item_id']))
{
	$item_id= $_GET['item_id'];
	$select_query= mysql_query("SELECT * FROM donated_items WHERE item_id=".$item_id."");
	$tree_array= mysql_fetch_array($select_query);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>ADMIN PORTAL</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-font-smoothing: antialiased;
  -moz-font-smoothing: antialiased;
  -o-font-smoothing: antialiased;
  font-smoothing: antialiased;
  text-rendering: optimizeLegibility;
}

body {
  font-family: "Oswald";
  color: #777;
  background: rgba(76, 175, 80, 0.7);
  background-image: -webkit-linear-gradient(bottom, rgba(120, 196, 7,.64) 0%, rgba(120, 196, 7,0) 100%);
    background-image: -moz-linear-gradient(bottom, rgba(120, 196, 7,.64) 0%, rgba(120, 196, 7,0) 100%);
}

.green{
      color:green;
      font-size: 14px;
    }
    .red{
      color:red;
      font-size: 14px;
    }

.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin-bottom: 30px;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
  margin: 0px;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: darkgreen;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}
.container img {
	width: 100px;
	height: 100px;
	border-radius: 50%;
	background-color: white;
	margin:20px;
}
.align-center{
	text-align: center;
	margin: 0 auto;
}

.nav li:hover{
	cursor: pointer;
}

.humburger{
  display: none;
}

@media only screen and (max-width: 767px) {
  .navbar-right {
    display: none;
  }
  .navbar-header .humburger {
    float: right;
    display: block;
  }
   .navbar-header .humburger a:visited, a:focus, a:active{
    text-decoration: none;
  }
}

	</style>
</head>

<body>

<script>
function menubar() {

  var x= document.getElementById('navbar-right');

    if(x.style.display=== 'block')
      {
        x.style.display= 'none';
      }
       else
      {
        x.style.display= 'block';
      }
}
</script>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header" id="navbar-header">
      <a class="navbar-brand" href="#" style="text-transform: uppercase;">WELCOME <?php echo $_SESSION['name'];?></a>
      <a href="javascript:void(0);" style="font-size: 20px;padding-right: 20px;
    padding-top: 15px;color: #3e86f1;" class="humburger" onclick="menubar();">&#9776;</a>
    </div>
    <ul class="nav navbar-nav navbar-right" id="navbar-right">
    <li class="active"><a href="profile.php"><i class="fa fa-home" aria-hidden="true"></i> HOME</a></li>
    <li class="active"><a href="showtree.php"><i class="fa fa-home" aria-hidden="true"></i> SHOW TREES</a></li>
      <li class="active"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> LOGOUT</a></li>
      </ul>
       
  </div>
</nav>




<div class="container"> 
<div class="align-center">
<img src="img/eco_logo_1.png"></div>
  <form id="contact" enctype= "multipart/form-data" action="update.php" method="post">
    <h3 class="align-center">UPDATE FORM</h3>
    <fieldset>
      NAME: <input type="text" tabindex="1" name="name" value="<?php echo $tree_array['name']; ?>" required autofocus>
    </fieldset>
    <fieldset>
      DESCRIPTION: <textarea tabindex="2" name="description" required><?php echo $tree_array['description']; ?></textarea>
    </fieldset>
    <fieldset>
      IMAGE: 
      <img src="<?php echo $tree_array['image'];?>" width="50" height="50">
      <input type="hidden" name="MAX_FILE_SIZE" id="maxSize" value="2097152" />
      <input type="file" name="image_path" id="image_path" accept="image/*">
      <p style="margin-top: 5px; color: grey;">[N.B: RECOMMENDED 360 X 360px]</p>
      <output id="list"></output>
    </fieldset>
    <input type="hidden" value="<?php echo $_GET['item_id'];?>" name="hidden_tree">
    <fieldset>
      <button name="submit" type="submit" id="update-submit" onclick="return confirm('ARE YOU SURE YOU WANT TO UPDATE?')">SAVE CHANGES</button>
    </fieldset>
   
  </form>
</div>


<script>
    allowedExtension = new Array("jpg","jpeg","gif","png");
    function validateFile(extension,size)
    {
      flag=0;error="";
      for(i=0;i<allowedExtension.length;i++){
        if(extension==allowedExtension[i]){
          maxSize = document.getElementById("maxSize").value
          if(size<=maxSize)
            flag=0;
          else{
            flag=1;
            error = "File Size is Bigger";
          }
            
          break;
        }
        else{
          flag=1;
          error = "File is not Supported";
        }
      }

      if(flag!=0)
      {
        var btn_disabled = document.getElementById('update-submit');
        btn_disabled.disabled = true;
      } 
      else{
        var btn_disabled = document.getElementById('update-submit');
        btn_disabled.disabled = false;
      }
      if(flag!=0){
        return 'red';
      }
      else{
        return 'green';
      }
    }
    // Check for the various File API support.
    function handleFileSelect(evt) {
        var files = evt.target.files; // FileList object

        // files is a FileList of File objects. List some properties.
        f = files[0];
        ext = f.name.substring(f.name.lastIndexOf('.')+1);
        size = f.size;
        classColor = validateFile(ext,size)
        st = '<li class='+classColor+'><strong>'+f.name+'</strong> ('+f.type +') - '+
                  f.size+' bytes, last modified: '+
                  (f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a')+
                  '</li>';
        if(error.length>0)
          st += "<li class="+classColor+">"+error+"</li>";
          //f.lastModifiedDate.toLocaleDateString()*/
      document.getElementById('list').innerHTML = '<ul>' + st + '</ul>';
    }
    document.getElementById('image_path').addEventListener('change', handleFileSelect, false);
  </script>
</body>
</html>