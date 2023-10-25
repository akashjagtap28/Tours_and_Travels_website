<?php 

session_start();
include "connection.php";

$id=$_GET['id'];

$busid=$_GET['busid'];

$date=$_GET['date'];

$amount=$_GET['amount'];

// ceating session varaible and assign busid , route id and date which is used in next page

$_SESSION['$id'] = $id;
$_SESSION['$bid'] = $busid; 
$_SESSION['$date'] = $date;

// select boarding points and droping points accourdingly to origin and distination 

$query_bord = "select b_points from addroute where route_id='$id'";

$query_drop = "select d_points from addroute where route_id='$id'";


 $stmt_bord = mysqli_query($conn ,$query_bord);

 $bord_result = mysqli_fetch_assoc($stmt_bord);

//split the cooma seprated string to array and count the length for bording points

 $string_bord = implode(" ",$bord_result); 
 $barr = preg_split ("/\,/", $string_bord); 

 $bord_length= count($barr);


 $stmt_drop = mysqli_query($conn ,$query_drop);

 $drop_result = mysqli_fetch_assoc($stmt_drop);

//split the cooma seprated string to array and count the length for bording points

 $string_drop = implode(" ",$drop_result); 

 $darr = preg_split ("/\,/", $string_drop); 

 $drop_length= count($darr);

 // accept the bus id which is pass from the previous (search bus) page 
$busid=$_GET['busid']; 
      
    // fetch record for that particular bus which is selected by user 

          $query = "select bus_id, capacity from addbus where bus_id='$busid'";
          $result = mysqli_query($conn ,$query);
          if(mysqli_num_rows($result)>0)
          {
            while($row=mysqli_fetch_assoc($result))
            {
              $bid=$row["bus_id"];
              $cap=$row["capacity"];
              $_SESSION['$cap'] = $cap;
             
            }
          }

        // here we fetch total allredy booked seat no's for that bus

        $query_book = "select booked_seats from seatbooking where bus_id='$bid' AND date='$date' ";

        $stmt_book = mysqli_query($conn ,$query_book);
        
        $book_result = mysqli_fetch_assoc($stmt_book);

        if($book_result)
        {
          // if record is available then split record and calcluate length if booked seat array

           $uarry= implode(",", array_filter($book_result));

           $book_arr = preg_split ("/\,/", $uarry); 

           $uarry1= implode(",", array_filter($book_arr));

           $book_arr1 = preg_split ("/\,/", $uarry1); 

           $uni=array_unique($book_arr1);
           
           $book_length=count($uni); 
        }else 
           $book_length=0;
        

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Seat</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/seatbooking.css"> 
    <link rel="stylesheet" href="seatbooking1.css"> 


  </head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary navbar bg-dark border-bottom border-bottom-dark" data-bs-theme="dark">
  <div class="container-fluid">
   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto pe-5 mb-2 mb-lg-0 ms fs-5">
        <li class="nav-item pe-3">
          <a class="nav-link active" aria-current="page" href="homepage.php">Home</a>
        </li>
        <li class="nav-item pe-3">
          <a class="nav-link" href="gallary.php">Gallery</a>
        </li>
        
        <li class="nav-item pe-3">
          <a class="nav-link "  href="about.php" >About us</a>
        </li>

        <li class="nav-item pe-3">
          <a class="nav-link" href="booking.php">Manage Ticket</a>
        </li>
        
        <li class="nav-item pe-3">
          <a class="nav-link "  href="contact.php">Contact</a>
        </li>
        <li class="nav-item pe-3">
          <a class="nav-link "  href="admin_login.php">Admin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="addfeedback.php">Feedback</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<!---- <img src="logo.png" height="220" width="220" style="position: absolute;left: 0px; bottom:547px">  -->

<div class="div1">
 
<div class="bus"> 
    
<div id="checkboxes">
  <!-- by using action attribute we pass the data to payment page for prosessing  -->

<form name="main" action="payment1.php" method="post">

<!-- for each seats we use checkbok and if seat is allready booked then make it disabled and checked
     and change the original color to red   -->
       
<input  type="checkbox" class="chekbox" name="seats[]" role="chekbox"  value="1" id="1"  value="1"
             <?php 
                   for($i=0;$i<=$book_length;$i++)
                   {
                 ?>
            <?php
                   if($book_arr[$i]==="1") echo  'checked="checked" disabled="disabled" ' ?>
            <?php     
               } 
            ?> />
     <label class="whatever" for="1">1</label>&nbsp;

    <input type="checkbox"class="chekbox" role="chekbox" name="seats[]" value="2" id="2" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="2")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>
                />
    <label class="whatever" for="2">2</label>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="3" id="3" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="3")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="3">3</label>&nbsp; 
    <input type="checkbox" class="chekbox" name="seats[]" value="4" id="4"
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="4")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="4" >4</label></br>


    <input type="checkbox" class="chekbox" name="seats[]" value="5" id="5"  
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="5")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="5">5</label>&nbsp;
    <input type="checkbox"class="chekbox" name="seats[]" value="6" id="6"
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="6")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="6">6</label>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="7" id="7" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="7")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="7">7 </label>&nbsp; 
    <input type="checkbox"class="chekbox" name="seats[]" value="8" id="8"
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="8")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="8">8</label>


    <input type="checkbox" class="chekbox"name="seats[]" value="9" id="9" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="9") echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="9">9</label>&nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="10" id="10"
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="10")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="10">10</label>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="checkbox"class="chekbox" name="seats[]" value="11" id="11"  <?php 
                   for($i=0;$i<=$book_length;$i++)
                   {
                 ?>
            <?php
                   if($book_arr[$i]==="11") echo  'checked="checked" disabled="disabled" ' ?>
            <?php     
               } 
            ?>/>
    <label class="whatever" for="11">11</label>&nbsp; 
    <input type="checkbox"class="chekbox" name="seats[]" value="12" id="12"
    <?php 
                   for($i=0;$i<=$book_length;$i++)
                   {
                 ?>
            <?php
                   if($book_arr[$i]==="12") echo  'checked="checked" disabled="disabled" ' ?>
            <?php     
               } 
            ?> />
    <label class="whatever" for="12">12</label>


    <input type="checkbox"class="chekbox" name="seats[]" value="13" id="13" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="13")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="13">13</label>&nbsp;
    <input type="checkbox" class="chekbox"name="seats[]" value="14" id="14" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="14")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="14">14</label>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="15" id="15"
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="15")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="15">15</label>&nbsp; 
    <input type="checkbox" class="chekbox" name="seats[]" value="16" id="16"
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="16")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="16">16</label>


    <input type="checkbox" class="chekbox" name="seats[]" value="17" id="17" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="17")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="17">17</label>&nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="18" id="18" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="18")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="18">18</label>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="checkbox" class="chekbox"  name="seats[]" value="19" id="19" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="19")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="19">19</label>&nbsp; 
    <input type="checkbox" class="chekbox"  name="seats[]" value="20" id="20" 
    <?php 
                   for($i=0;$i<=$book_length;$i++)
                   {
                 ?>
            <?php
                   if($book_arr[$i]==="20") echo  'checked="checked" disabled="disabled" ' ?>
            <?php     
               } 
            ?> />
    <label class="whatever" for="20">20</label>


    <input type="checkbox" class="chekbox"  name="seats[]" value="21" id="21"
    <?php 
                   for($i=0;$i<=$book_length;$i++)
                   {
                 ?>
            <?php
                   if($book_arr[$i]==="21") echo  'checked="checked" disabled="disabled" ' ?>
            <?php     
               } 
            ?>  />
    <label class="whatever" for="21">21</label>&nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="22" id="22"
    <?php 
                   for($i=0;$i<=$book_length;$i++)
                   {
                 ?>
            <?php
                   if($book_arr[$i]==="22") echo  'checked="checked" disabled="disabled" ' ?>
            <?php     
               } 
            ?>  />
    <label class="whatever" for="22">22</label>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="23" id="23" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="23")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="23">23</label>&nbsp; 
    <input type="checkbox" class="chekbox" name="seats[]" value="24" id="24" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="24")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="24">24</label>


    <input type="checkbox" class="chekbox" name="seats[]" value="25" id="25" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="25")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="25">25</label>&nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="26" id="26"
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="26")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="26">26</label>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="checkbox" class="chekbox"name="seats[]" value="27" id="27"
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="27") echo 'checked="checked"' ?>
               <?php     
               } ?>
                 />
    <label class="whatever" for="27">27</label>&nbsp; 
    <input type="checkbox" class="chekbox"name="seats[]" value="28" id="28" 
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="28")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="28">28</label>


    <input type="checkbox" class="chekbox" name="seats[]" value="29" id="29"  />
    <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="29")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>
    <label class="whatever" for="29">29</label>&nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="30" id="30"   <?php
                 for($i=0;$i<=$book_length-1;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="30")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="30">30</label>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="31" id="31"  <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="31")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="31">31</label>&nbsp; 
    <input type="checkbox" class="chekbox" name="seats[]" value="32" id="32"  <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="32")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="32">32</label>


    <input type="checkbox" class="chekbox" name="seats[]" value="33" id="33"  <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="33")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="33">33</label>&nbsp;
    <input type="checkbox"class="chekbox" name="seats[]" value="34" id="34"  <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="34")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="34">34</label>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="35" id="35" <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="35")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="35">35</label>&nbsp; 
    <input type="checkbox" class="chekbox" name="seats[]" value="36" id="36"  <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="36")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="36">36</label>

    <input type="checkbox" class="chekbox" name="seats[]" value="37" id="37"   <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="37")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="37">37</label>&nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="38" id="38"  <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="38")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="38">38</label>
    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    <input type="checkbox" class="chekbox" name="seats[]" value="39" id="39"  <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="39")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="39">39</label>&nbsp; 
    <input type="checkbox" class="chekbox" name="seats[]" value="40" id="40"  <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="40")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="40">40</label>

    <input type="checkbox" class="chekbox" name="seats[]" value="41" id="41"   <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="41")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="41">41</label>&nbsp;
    <input type="checkbox"class="chekbox" name="seats[]" value="42" id="42"  <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="42")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="42">42</label>&nbsp; 
    <input type="checkbox"class="chekbox" name="seats[]" value="43" id="43" <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="43")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?> />
    <label class="whatever" for="43">43</label>&nbsp; 
    <input type="checkbox"class="chekbox" name="seats[]" value="44" id="44"  <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="44")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="44">44</label>&nbsp; 
    <input type="checkbox" class="chekbox"name="seats[]" value="45" id="45"  <?php
                 for($i=0;$i<=$book_length;$i++)
                   {
                    ?>
            <?php if($book_arr[$i]==="45")  echo 'checked="checked" disabled="disabled" ' ?>
               <?php     
               } ?>/>
    <label class="whatever" for="45">45</label><br>


   <!-- <input type="submit" name="save" value="BOOK" class="btn btn-primary" id="bording-droping" style="width: 100px;margin-top:50px;width:200px; padding-top:5px;height:40px;margin-top: 15px;color: white;"/> -->
    
</div>
</div>

    <div class="labels"> 
         <label class="btn3" for="1"></label><label class="lbl1">Available</label> <br>
         <label class="btn3" style=" background-color: green;"for="1"></label> <label class="lbl1">Selected</label><br>
         <label class="btn3" style=" background-color: red;" for="1"></label><label class="lbl1">Booked</label> <br>
    </div>


  <div class="bookseat">

    <ul class="seatul">

        <h3 style="margin-left: 50px;">Seat Information</h3>
       
        <li class="seatli">Available Seats : <?php echo $cap-$book_length ;?>     </li>
        <li class="seatli">booked Seats : <?php echo  $book_length; ?>       </li>
        <li class="seatli" >Selected Seats :  <span  id="selected">0</span>  </li>
        <li class="seatli" >Total Amount :<b> <input type="number" name="tamount"  id="tamount" value="" style="border: none; font-weight:bold;" readonly/>  </b>  </li>
        
    </ul>
  
  </div></br>

  <div class="boarding"></br>
        
    <ul>
      <li ><b>Boardong Point</b>
          <div class="dropdown">

                        <!-- gives options for selecting boarding points accordingly origin  -->

             <select id="Origin" name = "bpoints" style="width:200px;color: black;height: 30px;">
                       <?php 
                   for($i=0;$i<=$bord_length-1;$i++)
                     {
                       ?>
                <option name = "bpoints" value="<?php echo ($barr[$i]) ?>"><?php echo ($barr[$i]) ?></option>
                   <?php     
                     }
                     ?>
             </select>
             &nbsp;&nbsp; &nbsp;
         </div>
       </li>
             
       <li><b>Droping Point</b>
            <div class="dropdown">
                 <select id="destination"  name="dpoints"    style="width:200px;color: black;height: 30px;">

                         <!-- gives options for selecting droping points accordingly destination  -->
                         <?php 
                     for($i=0;$i<=$drop_length-1;$i++)
                          {
                       ?>
                    <option name = "dpoints" value="<?php echo ($darr[$i]) ?>"><?php echo ($darr[$i]) ?></option>
                       <?php     
                         } 
                        ?>
                  </select>
                  &nbsp;&nbsp; &nbsp;
            </div>
        </li>
           <li>
              <div class="search">
               <!-- <input type="submit" name="save" value="BOOK" class="btn btn-primary" id="bording-droping" style="width: 100px;margin-top:50px;width:200px; padding-top:5px;height:40px;margin-top: 15px;color: white;"/> -->
               <a href="payment1.php">
                <input type="submit" name="save1" value="BOOK" class="btn btn-primary" style="width: 100px;margin-top:50px;width:200px; padding-top:5px;height:35px;margin-top: 15px;color: white;"/></a>
              </div>

            </li>
     </ul> 
</div> 

</from>
  
</div>

<!-- here we use script for cheking seat is selected by user or not 
     if seat is select then make it is checked and change color origin to geen
    and also increse the count of selected seat    -->
<script>
    var checkboxes = document.querySelectorAll('.chekbox');

    var count=0;

    var amount="<?php echo $amount; ?>" ;

    for(var i=0;i<checkboxes.length;i++){
        
        checkboxes[i].addEventListener('click',function(){

            if(this.checked== true){
                count++;
                
            }else{
                count--;
          
            }
            // pass the count of total selected seat by using id 

            document.getElementById('selected').innerHTML=count;
            var amount1=amount*count;

            // pass the total amount accoundingly how many seats are selected by using id

            document.getElementById('tamount').value= amount*count;
          
        })
    }
    
</script>

    <!-- assign total amount to session variable and pass for payment page   -->

  <?php $_SESSION['$amount1']='<script>document.write(amount)</script>' ;?>

</body>
</html>