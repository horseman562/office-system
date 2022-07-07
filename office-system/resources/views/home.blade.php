<?php $i = 1 ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>



    <title>Hello, world!</title>
</head>

<body>
    
    <div class="container d-flex flex-column justify-content-center" style="height: 100vh; width: 100%;">

        
        
            <h2 class="align-self-center">Data Of Employees</h2><br>
            <h3>Search</h3>
            <div class="form mb-3"> <i class="fa fa-search"></i> <input type="text" class="form-control form-input" placeholder="Search anything..." id="search-g"></div>
            <h3>Filter</h3>
            <div class="form"> <i class="fa fa-search"></i> <input type="text" class="form-control form-input" placeholder="Filter by Name" id="filter-g"></div>
            <div  class="container d-flex flex-row justify-content-center my-4">
                <button class="mx-4 btn btn-primary" id="sn">Sort By Name</button>
                <button class="mx-4 btn btn-info"  id="son">Sort By Office Name</button>
                <button class="mx-4 btn-danger" id="se">Sort By Email</button>
                 
            </div>
            <table  class="table  table-bordered table-sm"  >
                <thead>
                  <tr>
                    <th  scope="col">Name</th>
                    <th  scope="col">Office Name</th>
                    <th   scope="col">Email Address</th>
                  </tr>
                </thead>  
                <tbody id="sort" style="display: none;">
                     
                </tbody>   
                <tbody id="sorton" style="display: none;">
                     
                </tbody> 
                <tbody id="sorte" style="display: none;">
                     
                </tbody> 
                <tbody id="search-body" style="display: none;">
                     
                </tbody>   
                <tbody id="filter-body" style="display: none;">
                     
                </tbody> 
                <tbody id="tbody" >
                    <?php   ?>
                    <?php  foreach ($employees as $emp) { ?>
                        <tr>     
                            <td><?php echo $emp['emp_name'] ?></td>
                            <td class="point-click" data-id-office="<?php echo $emp['emp_ofc_id'] ?>" data-toggle="modal" data-target="#exampleModal"><?php echo $emp['emp_office_name'] ?></td>
                            <td><?php echo $emp['emp_email'] ?></td>
                          </tr>
                    <?php } ?>
                  {{-- <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr> --}}
                </tbody>
              </table>

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <label for="">Address</label></br>
                        <input type="text" id="address" disabled></br>
                        <label for="">Office Name</label></br>
                        <input type="text" id="on" disabled ></br>
                        <label for="">State</label></br>
                        <input type="text" id="state" disabled></br>
                        <label for="">Country</label></br>
                        <input type="text" id="country" disabled ></br>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              
         
    </div>
    

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
   
    
    <script>
    
        

        $(document).on("click", ".point-click", function(e) {
        e.preventDefault();

        var ofc_id = $(this).attr("data-id-office")

        $.ajax({
        url: `/`,
        type: 'post',
        dataType: 'json',
        /* beforeSend: function(req) {
            return req.setRequestHeader('X-CSRF-TOKEN', $("meta[name='csrf-token']").attr('content'))
        }, */
        data: {
            "_token": "{{ csrf_token() }}",
            "ofc_id":ofc_id
        },
        success: function(response){
            var resda = response.data

            $('#address').val(resda.ofc_address);
            $('#on').val(resda.ofc_name);
            $('#state').val(resda.ofc_state);
            $('#country').val(resda.ofc_country);
             
        /* console.log(response);
        console.log(resda); */
            },
            error: function(response){
        console.log("fail");
        console.log(response);
            }
        });

        
    });

    $(document).on("click", "#sn", function(e) {
        e.preventDefault();
         
        $("#sorte").hide();
        $("#sorton").hide();
        $("#filter-body").hide();
        
        var tbody = "";
        var i = 1

      

                $.ajax({
                url: '/sort',
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    
                        }
        ,success: function(data){
                   
                    var loop = data.data
                    
                    if($('#sort').is(":hidden")){
                      for(let x = 0; x < loop.length; x++){
 
                    tbody += "<tr>";
                                            
                                            tbody += `<td >${loop[x].emp_name}</td>`;
                                            tbody += `<td class="point-click" data-id-office="${loop[x].emp_ofc_id}" data-toggle="modal" data-target="#exampleModal">${loop[x].emp_office_name}</td>`;  
                                            tbody += `<td>${loop[x].emp_email}</td>`;  
                                            tbody += "<tr>";
                    }
                    $("#sort").html(tbody);
                    $("#tbody").hide();
                    $("#sort").show();

                   
                    } else if($('#tbody').is(":hidden")) {
                       
                    $("#tbody").show();
                    $("#sort").hide();
                    console.log("asdasd")
                  
                    }
                     
                    
                },
                error: function(err) {
                    console.log("fail")
                }
                })
                
                
    });

    $(document).on("click", "#son", function(e) {
        e.preventDefault();

        $("#sorte").hide();
        $("#sort").hide();
        $("#filter-body").hide();
        
        var tbody = "";
        var i = 1

      

                $.ajax({
                url: '/sorton',
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    
                        }
        ,success: function(data){
                   
                    var loop = data.data
                    
                    if($('#sorton').is(":hidden")){
                      for(let x = 0; x < loop.length; x++){
 
                    tbody += "<tr>";
                                            
                                            tbody += `<td >${loop[x].emp_name}</td>`;
                                            tbody += `<td class="point-click" data-id-office="${loop[x].emp_ofc_id}" data-toggle="modal" data-target="#exampleModal">${loop[x].emp_office_name}</td>`;  
                                            tbody += `<td>${loop[x].emp_email}</td>`;  
                                            tbody += "<tr>";
                    }
                    $("#sorton").html(tbody);
                    $("#tbody").hide();
                    $("#sorton").show();

                   
                    } else if($('#tbody').is(":hidden")) {
                       
                    $("#tbody").show();
                    $("#sorton").hide();
                    console.log("asdasd")
                  
                    }
                     
                    
                },
                error: function(err) {
                    console.log("fail")
                }
                })
                
                
    });

    $(document).on("click", "#se", function(e) {
        e.preventDefault();

        $("#sort").hide();
        $("#sorton").hide();
        $("#filter-body").hide();
        
        var tbody = "";
        var i = 1

      

                $.ajax({
                url: '/se',
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    
                        }
        ,success: function(data){
                   
                    var loop = data.data
                    
                    if($('#sorte').is(":hidden")){
                      for(let x = 0; x < loop.length; x++){
 
                    tbody += "<tr>";
                                            
                                            tbody += `<td >${loop[x].emp_name}</td>`;
                                            tbody += `<td class="point-click" data-id-office="${loop[x].emp_ofc_id}" data-toggle="modal" data-target="#exampleModal">${loop[x].emp_office_name}</td>`;  
                                            tbody += `<td>${loop[x].emp_email}</td>`;  
                                            tbody += "<tr>";
                    }
                    $("#sorte").html(tbody);
                    $("#tbody").hide();
                    $("#sorte").show();

                   
                    } else if($('#tbody').is(":hidden")) {
                       
                    $("#tbody").show();
                    $("#sorte").hide();
                    console.log("asdasd")
                  
                    }
                     
                    
                },
                error: function(err) {
                    console.log("fail")
                }
                })
                
                
    });

    $(document).on("keypress", "#search-g", function(e) {

        console.log("asdsa")

        var input = $("#search-g").val()

        var tbody = "";
        var i = 1

        
        if(e.which == 13) {
            if(!(input === "")){
                e.preventDefault();
                $.ajax({
                url: '/search',
                type: "post",
                dataType: 'json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "value": input,
                        }
        ,success: function(data){
                    console.log(data.data)
                    var loop = data.data
                    for(let x = 0; x < loop.length; x++){

                        console.log(loop[x]);
                        /* <td><?php echo $emp['emp_name'] ?></td>
                            <td class="point-click" data-id-office="<?php echo $emp['emp_ofc_id'] ?>" data-toggle="modal" data-target="#exampleModal"><?php echo $emp['emp_office_name'] ?></td>
                            <td><?php echo $emp['emp_email'] ?></td> */
            
                        
                    
                        tbody += "<tr>";
                                                 
                                                tbody += `<td>${loop[x].emp_name}</td>`;
                                                tbody += `<td class="point-click" data-id-office="${loop[x].emp_ofc_id}" data-toggle="modal" data-target="#exampleModal">${loop[x].emp_office_name}</td>`;  
                                                tbody += `<td>${loop[x].emp_email}</td>`;  
                                                tbody += "<tr>";
                                        
            
                    }
                    $("#search-body").html(tbody);
                },
                error: function(err) {
                    console.log("fail")
                }
                })
                $("#tbody").hide();
                $("#search-body").show();
                
            } else {
                e.preventDefault();
                $("#tbody").show();
            }
            


        }


});

$(document).on("keypress", "#filter-g", function(e) {

  $("#sort").hide();
  $("#sore").hide();
  $("#sorton").hide();
  $("#search-body").hide();

var input = $("#filter-g").val()

var tbody = "";
var i = 1


if(e.which == 13) {
    if(!(input === "")){
        e.preventDefault();
        $.ajax({
        url: '/filter',
        type: "post",
        dataType: 'json',
        data: {
            "_token": "{{ csrf_token() }}",
            "value": input,
                }
,success: function(data){
            console.log(data.data)
            var loop = data.data
            for(let x = 0; x < loop.length; x++){

                console.log(loop[x].emp_name);
                /* <td><?php echo $emp['emp_name'] ?></td>
                    <td class="point-click" data-id-office="<?php echo $emp['emp_ofc_id'] ?>" data-toggle="modal" data-target="#exampleModal"><?php echo $emp['emp_office_name'] ?></td>
                    <td><?php echo $emp['emp_email'] ?></td> */
    
                
            
                tbody += "<tr>";
                                         
                                        tbody += `<td>${loop[x].emp_name}</td>`;
                                        tbody += `<td class="point-click" data-id-office="${loop[x].emp_ofc_id}" data-toggle="modal" data-target="#exampleModal">${loop[x].emp_office_name}</td>`;  
                                        tbody += `<td>${loop[x].emp_email}</td>`;  
                                        tbody += "<tr>";
                                
    
            }
            $("#filter-body").html(tbody);
        },
        error: function(err) {
            console.log("fail")
        }
        })
        $("#tbody").hide();
        $("#filter-body").show();
        
    } else {
        e.preventDefault();
        $("#filter-body").hide();
        $("#tbody").show();
    }
    


}


});

    </script>
</body>

</html>