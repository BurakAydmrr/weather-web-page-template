  <?php

  include 'sehirler.php';
  include 'fonksiyonlar.php';

  ?>
  <!DOCTYPE html>
  <html lang="tr_TR"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hava Durumu</title>

    <script src="https://kit.fontawesome.com/0f4c9b9802.js" crossorigin="anonymous"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="./lib/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./lib/album.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">Hakkımda</h4>
              <p class="text-muted">Açık Kaynak Kodlu Bir Hava Durumu Sitesi.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">İletişim</h4>
              <ul class="list-unstyled">
                <li><a href=" https://github.com/Worlex0" class="text-white"> https://github.com/Worlex0</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-info shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="" class="navbar-brand d-flex align-items-center">

            <strong> <i class="fas fa-temperature-high"></i> Hava Durumu</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1>Hava Durumu</h1>

          <select name="sehir" id="sehir" class="form-control">
            <option value="0">Şehir Seçiniz</option>

            <?php

            foreach ($sehirler as $key => $sehir) {
              ?>
              <option value="<?=$key ?>" <?php if($key=='745042'){ echo 'selected'; } ?>><?=$sehir ?></option>
              <?php
            }

            ?>
          </select>
        </div>
        <p><h1 class="font-weight-bold" id="sehirbaslik">İstanbul</h1></p>
      </section>

      <div class="album py-2 bg-light">
        <div class="col-md-12">
          <div class="row" id="havadonen">

            <?php

            foreach (havaDurumu('742902') as $key => $value) {

             ?>
             <div class="col-md-2">
              <div class="card mb-4 shadow-sm">
                <div class="card-header">
                  <?=$key ?>
                </div>
                <div class="card-body">
                  <p class="card-text">

                    <table class="table">
                      <tr>
                        <th>Saat</th>
                        <th>#</th>
                        <th>Sıcaklık</th>
                        <th>Hız</th>
                      </tr>
                      <?php
                      foreach ($value as $key => $val) {
                        ?>
                        <tr>
                          <td><?=$key ?></td>
                          <td class="p-0"><img src="iconlar/<?=$val['icon']; ?>.png" alt=""></td>
                          <td><?=$val['sicaklik']; ?></td>
                          <td><?=$val['hiz']; ?></td>
                        </tr>
                        <?php
                      }
                      ?>
                    </table>

                  </p>
                </div>
              </div>
            </div>

          <?php } ?>

        </div>
      </div>

    </main>




    <script src="./lib/jquery-3.2.1.slim.min.js.indir" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./lib/popper.min.js.indir"></script>
    <script src="./lib/bootstrap.min.js.indir"></script>
    <script src="./lib/holder.min.js.indir"></script>
    <script src="./lib/jquery-1.11.3.js"></script>


    <script>

      $('#sehir').change(function(){

       $("#sehirbaslik").html($( "#sehir option:selected" ).text());

       $.ajax({
        type: "POST",
        url: 'sehirsec.php',
        data: 'id='+$( "#sehir option:selected" ).val(),
        success: function (donen){
          $('#havadonen').html(donen)
        }
      });

     })

   </script>

   <svg xmlns="http://www.w3.org/2000/svg" width="348" height="225" viewBox="0 0 348 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="17" style="font-weight:bold;font-size:17pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg>
 </body>
 </html>
