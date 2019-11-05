<!-- <?php
// include auth.php file on all secure pages
// include("auth.php");
?> -->
<html>
<head>
  <title>List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="css/login.css" rel="stylesheet">
</head>
<style type="text/css">
  th {
    cursor: pointer;
  }
</style>
<body>
  <div class="h4 text-center border border-light p-2">Users</div>
  <div style="padding-left: 5%;padding-right: 5%; padding-top: 4px">
  <div style="text-align: right;"><a href="logout.php">Logout</a></div>
  <?php 
    $db = mysqli_connect('localhost', 'root', '', 'test');
    $query = "SELECT * FROM user";
    $q = mysqli_query($db, $query);
    while($row = mysqli_fetch_assoc($q)){
        $images[] = $row;   // read data from DB 
    }
  ?>
  <input class="form-control" type="text" name="search" placeholder="Search" />  
   <link href="css/search.css" rel="stylesheet">
  <br>

  <table border="0" cellspacing="2" cellpadding="2" class="table table-hover"> 
    <thead>
      <tr> 
        <th id="firstname"><font face="Arial">First name</font></th> 
        <th id="lastname"><font face="Arial">Last name</font></th> 
        <th id="email"><font face="Arial">Email</font></th> 
        <th id="phonenumber"><font face="Arial">Phone</font></th> 
        <th id="date"><font face="Arial">Date</font></th> 
        <th id="program"><font face="Arial">Study program</font></th> 
        <th id="sex"><font face="Arial">Sex</font></th> 
        <th id="Delete"><font face="Arial">Delete</font></th>
        <th id="Edit"><font face="Arial">Edit</font></th>
    </tr>
    </thead>
    <tbody></tbody>
  </table>
  </div>
  <script type="text/javascript">
    var data = <?php echo json_encode($images); ?>;
    function myFunction(id) {
      var r = confirm("Delete?");
      if (r == true) {
        window.location = 'delete.php?id='+id;
      } else {
        txt = "You pressed Cancel!";
      }
    }
    function showData(d) {
        let html = '';
      for(let i in d) {
        html += '<tr> \n' +
    '                 <td>'+d[i].firstname+'</td> \n' +
    '                 <td>'+d[i].lastname+'</td> \n' +
    '                 <td>'+d[i].email+'</td> \n' +
    '                 <td>'+d[i].phonenumber+'</td> \n' +
    '                 <td>'+d[i].date+'</td> \n' +
    '                 <td>'+d[i].program+'</td> \n' +
    '                 <td>'+d[i].sex+'</td> \n' +
    '                 <td><a type="button" style="background-color:#FF0066" class="btn btn-danger" onclick="myFunction('+d[i].id+')" >Delete</a></td> \n' +
    '                 <td><a type="button" style="background-color:blue" class="btn btn-success" href="edit.php?id='+d[i].id+'">Edit</a></td> \n' +
    '             </tr>'
      }
      $('tbody').html();
      $('tbody').html(html);
    }
    $(document).ready(function(){
      showData(data);
      $("input").keyup(function(){
        let k = $('input').val().trim().toLowerCase();
        if (k == null  && k == '') {
          showData(data)
        } else {
          let d = data.filter(function (a) {
              return a.firstname.toLowerCase().includes(k) // sort by first name 
              || a.lastname.toLowerCase().includes(k)
              || a.email.toLowerCase().includes(k)
              || a.phonenumber.toLowerCase().includes(k)
              || a.date.toLowerCase().includes(k)
              || a.program.toLowerCase().includes(k)
              || a.sex.toLowerCase().includes(k)
            });
          showData(d);
        }
      });
      $('th').on('click', function(){ // sort function 
        console.log($(this).hasClass('asc'));
        let id = this.id;
        console.log(id);
        if (!$(this).hasClass('asc') && !$(this).hasClass('desc')) {
          $(this).addClass('asc');
          let d = data.sort((a, b) => a[id] > b[id] ? 1 : -1);
          showData(d);
        } else if ($(this).hasClass('asc')){
          $(this).removeClass('asc');
          $(this).addClass('desc');
          let d = data.sort((a, b) => a[id] > b[id] ? -1 : 1);
          showData(d);
        } else if($(this).hasClass('desc')) {
          $(this).removeClass('desc');
          $(this).addClass('asc');
          let d = data.sort((a,b) => a[id] < b[id] ? -1:1);
          showData(d);
        }

      })
    })
  </script>
</body>
</html>