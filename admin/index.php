<?php
  include "../inc/include.php";

  $sql = "SELECT can_id, can_num, can_nom, can_url FROM canais";
  //$result = mysqli_query($my_con, $sql);

  $result = pg_query($pg_con, $sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Magno Canais</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" >
    

  </head>
  <body>
    

<div class="container-fluid">
    <br>
    <div class='row'>
        <div class="col-sm-10"></div>
        <div class="col-sm-2 text-right">
            <button class="btn btn-primary" onclick="abre(0);">Novo</button>
        </div>
    </div>
    <br>

   

    <table class="table table-dark">
    <thead>
        <tr>
        <th scope="col">Número</th>
        <th scope="col">Nome</th>
        <th scope="col">Endereço</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($row = pg_fetch_row($result)){  
                echo '<tr onclick="abre('.$row[0].');">';
                    echo '<td>'.$row[1].'</td>';
                    echo '<td>'.$row[2].'</td>';
                    echo '<td>'.$row[3].'</td>';
                echo '</tr>';
            }
        ?>
    </tbody>
    </table>

    <div id="modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Canal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <input type="hidden" id="i">
                <div class="form-group">
                    <div class='row'>
                        <div class="col-sm-3">
                            <label for="can_num" class="col-form-label">Número</label>
                            <input type="text" class="form-control" id="can_num">
                        </div>

                        <div class="col-sm-9">
                            <label for="can_nom" class="col-form-label">Nome</label>
                            <input type="text" class="form-control" id="can_nom">
                        </div>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="can_url" class="col-form-label">Endereço</label>
                    <input type="text" class="form-control" id="can_url">
                </div>
                </form>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-primary" onclick="Salvar();">Gravar</button>
            </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/jquery-3.4.1.min.js"></script>
      <script>window.jQuery || document.write('<script src="../js/jquery.slim.min.js"><\/script>')</script>
      <script src="../js/bootstrap.bundle.min.js"></script>
      </body>   
</html>

<script>
  function abre(id) {
    //window.location.href = url;
    $('#modal').modal({
        backdrop: 'static'
    })

    if(id>0){
        $.get( "canal_edi.php", { i: id } )
        .done(function( data ) {
            //console.log(data);
            $("#i").val(data.can_id);
            $("#can_num").val(data.can_num);
            $("#can_nom").val(data.can_nom);
            $("#can_url").val(data.can_url);
        }, "json");
    }
  }

  

  function Salvar(){
    var i = $("#i").val();
    var num = $("#can_num").val();
    var nom = $("#can_nom").val();
    var url = $("#can_url").val();

      $.post( "canal_alt.php", { i: i, can_num: num, can_nom: nom, can_url: url })
        .done(function( data ) {
            if(data.status=='ok')
            {
                alert( "Canal: " + nom + " Salvo" );
            }else{
                alert( "Ocorreu algum erro" );
            }

        },'json');
  }
</script>