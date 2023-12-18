<?php
$x=15;  
$y=30;  
$z=$x+$y;  
echo "Sum: ",$z;?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>grosery store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style type="text/css">
    .col-4.entered.shopoffer p {
        border: 1px solid #eee;
        padding: 15px;
        box-shadow: 0px 0px 10px 0px #e3d1d1;
        margin: 10px;
      }
    .col-4.entered.shopoffer {
        padding: 0;
        margin: 0;
    }
    </style>
  </head>
  <body>
    <section>
      <div class="container pt-4">
        <center><h1>Welcome To Our Grocery Store</h1></center>
        <div class="row pt-4">
         <?php foreach ($result as $key => $value) { 
            if  ( $ret = parse_url($value['website']) ) {
              if ( !isset($ret["scheme"]) )
               {
               $url = "http://{$value['website']}";
               }else{
                $url = $value['website'];
               }
            }
          ?>
          
            <div class="col-4 entered shopoffer" ids="<?php echo $value['id'];?>">
              <a  target="_blank" style="text-decoration: none; color: inherit;" href="<?php echo $url;?>"> 
                <p>
                  <b>Shop:</b> <?php echo $value['company_name'];?><br>
                  <b>Address:</b> <?php echo $value['address'];?><br>
                  <b>Mobile No:</b> <?php echo $value['phone'];?>
                </p>
              </a>
            </div>
        
            <?php echo json_encode(['type'=>'warning','msg'=>'Invalid Username or Password.']); ?>

      <?php } ?>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      $(document).ready(function(){
       //  $('.shopoffer').on('click', function(){
       //    var getuserid = $(this).attr('ids');
       //    alert(getuserid);
       //    window.location.href='/showoffers?'+ getuserid;
       // });
       
      });
      $(document).on('click','.editdealpge', function(){
        $('.hide').removeClass('hide');
        var businessid = $(this).attr('busid');
         $.ajax({
            type:"post",
            url:"/Zonedashboard/business_set",
            data:{'businessid':businessid},
            dataType:"JSON",
            success:function(data){
                 console.log(data);
                var aboutus = data.data[0].aboutus;
                var aboutus = data.data[0].aboutus;
                var contactemail = data.data[0].contactemail;
                var motto = data.data[0].motto;
                var website = data.data[0].website;
                var b_name = data.data[0].name;
                 
                
            }         
        });
    });

    </script>
  </body>
</html>
