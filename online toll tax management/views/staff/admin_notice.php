
<?php
if(!isset($_SESSION)){
    session_start();
}
include_once ("../../vendor/autoload.php");
use App\DataManipulation\DataManipulation;
$datamanipulation = new DataManipulation();
use App\Utility\Utility;

$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];
$name = $_SESSION['name'];
$data=$datamanipulation->showStaffProfile($user_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>

    <link rel="stylesheet" href="../../contents/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../contents/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../contents/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../contents/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../contents/css/daterangepicker.css">
    <link rel="stylesheet" href="../../contents/css/chartist.min.css">
    <link rel="stylesheet" href="../../contents/css/style.css"
    <link rel="shortcut icon" href="../../contents/images/favicon.png" />
</head>
<body>
<div class="container-scroller">

    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" style="background-color: #0c525d">

        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
            <h3 class="mb-0 font-weight-medium d-none d-lg-flex"> <strong style="color: #2ecc71;margin-left: 0.5em;margin-left: 500px"> <?php echo " "?> Online Toll Tax Management</strong></h3>
            <ul class="navbar-nav navbar-nav-right ml-auto">


                <h3 class="mb-0 font-weight-medium d-none d-lg-flex" style="color: white"><?php echo $data->email?></h3>


            </ul>

        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background-color: #0c525d" >
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <a href="#" class="nav-link">
                        <div class="profile-image">
                            <?php
                            if($data->image){
                                ?>
                                <img class="img-xs rounded-circle" src="<?php echo $data->image?>" alt="profile image">
                                <?php
                            }else{
                                ?>
                                <img class="img-xs rounded-circle" src="../../contents/images/faces/face4.jpg" alt="profile image">
                                <?php
                            }
                            ?>


                        </div>
                        <div class="text-wrapper">
                            <p class="profile-name"><?php echo $data->name?></p>
                        </div>
                        <div class="icon-container">

                        </div>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="profile.php">
                        <span class="menu-title">Profile </span>
                        <i class="fas fa-male menu-icon fa-2x"></i>

                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="toll_pass.php">
                        <span class="menu-title">Toll pass</span>
                        <i class="fas fa-car-side menu-icon"></i>


                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="admin_notice.php">
                        <span class="menu-title">Admin Notice</span>
                        <i class="fas fa-exclamation-circle menu-icon"></i>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_vehicle.php">
                        <span class="menu-title">Add Vehicle</span>
                        <i class="fas fa-truck menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="transaction.php">
                        <?php
                        $count=$datamanipulation->countUnseenTransaction();
                        $total=$count->total
                        ?>
                        <span class="menu-title">Transaction (<?php echo $total?>)</span>
                        <i class="fas fa-money-bill-wave menu-icon"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact_us.php">
                        <span class="menu-title">Contact Us</span>
                        <i class="fas fa-address-card menu-icon"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../process/staff_process.php?logout">
                        <span class="menu-title">Logout</span>
                        <i class="fas fa-sign-out-alt menu-icon"></i>
                    </a>
                </li>


            </ul>
        </nav>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info" >



                            <h3>Notice Section:</h3>

                            <!--<div class="mb-5 mr-5 d-flex justify-content-end">9/5/2020</div>-->
                            <?php
                            $notices =$datamanipulation->showAllNotice();
                            foreach ($notices as $notice ){
                                $note=$notice->notice;

                                $date=$notice->date;
                                $dateArray = explode("-",$date);

                                $dateRevers= array_reverse($dateArray);
                                $dateString = implode("-", $dateRevers);
                                ?>
                                <div class="row">
                                    <!-- <div class="col-8"><b><?php /*$date = $lists->date; echo  date(' m/d/Y', strtotime($date)); $time = $lists->time; echo"   ". date('h:i:s a' , strtotime($time));*/?></b></div>
-->
                                    <div class=""> </div>
                                    <div class="col-6"> <?php echo $dateString?> (<span style="color: #7c151f; font-size: 18px"><?php echo "   ". date('h:i:s a' , strtotime($notice->time))?></span>)</div>


                                </div>
                                <!--<div class="mb-5 mr-5 d-flex justify-content-end">9/5/2020</div>-->
                                <p style="text-align: justify;margin-bottom: 50px; border-bottom: 2px solid #0b2e13">
                                    <?php echo $note?>
                                </p>
                                <?php
                            }

                            //var_dump($notice);
                            ?>


                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>


</div>

<script src="../../contents/plugins/jquery/jquery.min.js"></script>

<script src="../../contents/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../contents/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../../contents/plugins/datatables/jquery.dataTables.js"></script>
<script src="../../contents/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../../contents/js/adminlte.min.js"></script>

<script src="../../contents/js/demo.js"></script>
<script>
    $(function () {
        $("#sohag1").DataTable({
            "lengthMenu":[ 3,4 ],
        });
        $("#sohag2").DataTable({
            "lengthMenu":[ 3,4 ],
        });
        $("#sohag3").DataTable({
            "lengthMenu":[ 3,4 ],
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthMenu":[ 3 ],
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });

        $('#sohag').DataTable({
            "paging": true,
            "lengthMenu":[ 3 ],
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
    });
</script>
<script type="text/javascript">
  $(document).ready(function () {
      $(function () {
          $('[data-toggle="tooltip"]').tooltip()
      })
      $('.checkedNo').click(function(){
          var user_id = $(".user-id").val();
          console.log(user_id);
          var checkedNo = "";
          $.ajax({
              type: "POST",
              data: {checkedNo: checkedNo,user_id:user_id},
              url: "../process/building_owner_process.php",
              success: function (data) {
                  location.reload(true)
              }
          });
      });
      $('.checkedYes').click(function(){
          var user_id = $(".user-id").val();
          console.log(user_id);
          var checkedYes = "";
          $.ajax({
              type: "POST",
              data: {checkedYes: checkedYes,user_id:user_id},
              url: "../process/building_owner_process.php",
              success: function () {
                  location.reload(true)
              }
          });
      });

    bsCustomFileInput.init();
      setInterval(function () {
          var ary = [];
          $(function () {
              $('.attrTable tr').each(function (a, b) {
                  /*var name = $('.attrName', b).text();*/
                  var value = $('.attrValue', b).attr('data-id');
                  ary.push(value)

              });
              console.log(JSON.stringify(ary));


              var user_id = $(".user-id").val();
              $.ajax({
                  url: "../process/user_process.php",
                  type:'GET',
                  data:{user_type:ary,user_id:user_id},
                  success:function (result) {
                      console.log(result)
                      var datas = JSON.parse(result),
                          htmlstring = "";
                      var j = 0;
                      for (var f = 0; f<ary.length; f++) {
                          for (var i = 0; i < datas.length; i++) {

                              if ((datas[i].user_id == ary[f]) && (datas[i].message_read == 'unseen')  ) {
                                  $('.attrTable tr').each(function (a, b) {
                                      var name = $('.attrName', b).text();
                                      if($(".attrValue",b).attr('data-id')== datas[i].user_id){
                                          j=j+1;
                                          htmlstring = $(".attrValue",b).attr('data-id');

                                          $('.attrName .message-show-on-alert',b).text(j);
                                      }
                                  });

                              }
                              else if ((datas[i].opponent_id == ary[f]) && (datas[i].message == 'unseen') ) {
                                  $('.attrTable tr').each(function (a, b) {
                                      var name = $('.attrName', b).text();
                                      /!*var value = $('.attrValue', b).attr('data-id');*!/
                                      if($(".attrValue",b).attr('data-id')== datas[i].opponent_id){
                                          j=j+1;
                                          htmlstring = $(".attrValue",b).attr('data-id');

                                          $('.attrName .message-show-on-alert',b).text(j);
                                      }
                                  });

                              }
                          }
                          j=0;
                      }
                  }
              });
          });
      },1000);

      $('#chatmessages').scrollTop($('#chatmessages')[0].scrollHeight);

          $(".change-button-show").click(function () {
              var opponent_id = $(this).attr("data-id");
              var user_id = $(".user-id").val();
              setInterval(function () {
                  showMessageData(user_id,opponent_id)

                  $('.close-btn').click(function () {
                      opponent_id = null;
                  });
              },1000)


              /*setInterval(function () {
                  $.ajax(
                      {
                          url: "../process/student_data_process.php",
                          type: "POST",
                          data: {id: messageseid,mail:messagesmail},
                          success: function (response) {
                              var data = JSON.parse(response),
                                  htmlstring = "";
                              for(var i=0; i<data.length; i++){

                                  if((data[i].message_from)!=null){
                                      htmlstring +='<div class="chat student"> ' +
                                          '<div class="user-photo"> ' +
                                          '<img src="../../contents/img/profile_image/tuTorImoji.png" alt="User Image"> ' +
                                          '</div> ' +
                                          "<p class='chat-message teacher-msg'>"+data[i].message_from+"</p> " +
                                          '</div>';
                                  }
                                  if((data[i].message_to)!=null){
                                      htmlstring += '<div class="chat self">' +
                                          '<div class="user-photo"> ' +
                                          '<img src="../../contents/img/profile_image/stImoji.jpg" alt="User Image"> ' +
                                          '</div> ' +
                                          '<p class="chat-message student-msg">'+data[i].message_to+'</p> ' +
                                          '</div>';
                                  }
                                  $('.chatlogs').html(htmlstring);
                              }
                          }
                      });
                  $('.close-btn').click(function () {
                      messagesmail=null;
                  });
              },1000);*/

              $(".text-value-get").text(opponent_id);
              $(".chatbox").show();
//            $(".user-email-from-teacher-details").val(messagesid);

          });

          $('.close-btn').click(function () {
              var self = $(this);
              console.log('close');
              self.next().html('');
             location.reload(true)
          });

          $(".change-hidden").click(function () {
              $(".chatbox").css("display","none");
              $(".change-button-show").prop('disabled',false);
          });
          $("#send").click(function (event) {
              event.preventDefault();
              var messages = $("#message-value").val().trim();
              if(messages.length){
                  var user_id = $(".user-id").val()
                  var opponent_id = $(".text-value-get").text();

                  $.ajax({
                      type: "POST",
                      data: {messages: messages,user_id:user_id,opponent_id:opponent_id},
                      url: "../process/user_process.php",
                      success: function () {
                          messages="";
                          $("#message-value").val(messages)

                          showMessageData(user_id,opponent_id);

                      }
                  });
              }


          });


          function showMessageData(user_id,opponent_id) {
              $.ajax(
                  {

                      url: "../process/user_process.php",
                      type: "POST",
                      data: {user_id: user_id,opponent_id:opponent_id},
                      success: function (response) {

                          var data = JSON.parse(response),
                              htmlstring = "";
                          for(var i=0; i<data.length; i++){

                              if((data[i].message_from)!=null){
                                  htmlstring +='<div class="chat student"> ' +
                                      '<div class="user-photo"> ' +
                                      '<img src="../../contents/img/smart-city.jpg" alt="User Image"> ' +
                                      '</div> ' +
                                      "<p class='chat-message teacher-msg'>"+data[i].message_from+"</p> " +
                                      '</div>';
                              }
                              if((data[i].message_to)!=null){
                                  htmlstring += '<div class="chat self">' +
                                      '<div class="user-photo"> ' +
                                      '<img src="../../contents/img/smart-city.jpg" alt="User Image"> ' +
                                      '</div> ' +
                                      '<p class="chat-message student-msg">'+data[i].message_to+'</p> ' +
                                      '</div>';
                              }

                              $('.chatlogs').html(htmlstring);
                          }
                      }
                  });
          }





  });


</script>
</body>
</html>



