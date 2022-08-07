<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>E-Food</title>
  <meta name="description" content="">
  <link rel="stylesheet" href="https://neo.loket.com/themes_1.0/css/print.css" media="print">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://neo.loket.com/themes_1.0/js/vendor/jquery-2.1.1.min.js"></script>
  <style>
    @media screen and (max-width: 746px){
      .evoucher-wrapper:not(.fix-width) .evoucher table:first-child tr:first-child td:first-child{
        padding: 0px !important;
      }
      .evoucher-wrapper:not(.fix-width) .evoucher table:first-child tr:first-child td:first-child div{
        padding: 0px 5px !important;
      }
      .evoucher-wrapper:not(.fix-width) .evoucher table:nth-child(1) p{
        font-size: .8rem;
      }
      .evoucher-wrapper:not(.fix-width) .evoucher table td{
        display: block;
        width: 100% !important;
        padding: 10px !important;
      }
      .evoucher-wrapper:not(.fix-width) .evoucher table tr:first-child td div{
        height: auto !important;
      }
      .evoucher-wrapper:not(.fix-width) .evoucher table:nth-child(2) tr:first-child td:first-child{
        padding: 0px !important;
      }
      .evoucher-wrapper:not(.fix-width) .evoucher table tr:first-child td:first-child img{
        height: auto !important;
        width: auto !important;
        max-width: 100% !important;
        padding: 0px !important;
      }
      .evoucher-wrapper:not(.fix-width) .evoucher table td img{
        max-width: 100%;
        height: auto !important;
      }
      .evoucher-wrapper:not(.fix-width) .evoucher table:nth-child(2) tbody tr:first-child td:first-child img{
        width: 100%;
      }
      .evoucher-wrapper:not(.fix-width) .evoucher table td img.image_logo{
        max-width: 150px !important;
      }
    }
    .evoucher-wrapper.fix-width{
      min-width: 746px;
    }
    .evoucher-wrapper.fix-width .evoucher{
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="site-header">
    <div class="site-header__logo">
      <a class="nav-link me-5" href="{{ route('pilih-menu') }}"><img class="logo-otten-1" src="https://cdn.kibrispdr.org/data/757/logo-makan-png-5.png" style="max-height: 30px;"></a>  
    </div>
    <div class="site-header__action">
      <button onCLick="window.print();set_voucher_print();" id="button-print" class="btn">Print Pesanan</button>
    </div>
  </div>
  <div class="evoucher-header">
    <div class="title">Collective E-Food</div>
    <div class="category cke_editable cke_editable_inline cke_contents_ltr cke_show_borders" tabindex="0" spellcheck="false" role="textbox" aria-label="Rich Text Editor, editor1" title="Rich Text Editor, editor1" aria-describedby="cke_91" style="position: relative;"><p><br></p></div>
          
  </div>
  <div class="evoucher-wrapper evoucher-wrapper-new">
    <div class="evoucher-body">
      <div class="event-detail">
        <h1 class="event-title">Pesanan (<?php echo $data['nama_collective']; ?>)</h1>
        <div class="row">
          <div class="col-sm-8">
            <table>
              <thead>
                <th>Nama</th>
                <th>Pesanan</th>
                <th>Subtotal</th>
              </thead>
              <tbody>
                <?php 
                  for ($i=0; $i < count($data['nama']); $i++) { 
                ?>
                  <tr>
                    <td><?php echo $data['nama'][$i]; ?></td>
                    <td style="font-size: 12px;">
                      <?php 
                        for ($j=0; $j < count($data['pesanan'][$i]['nama']); $j++) { 
                          echo $data['pesanan'][$i]['nama'][$j].' ('.$data['pesanan'][$i]['jumlah'][$j].') '.$data['pesanan'][$i]['harga'][$j]; 
                      ?> 
                      <br> 
                      <?php 
                        }
                      ?>
                    </td>
                    <td><?php echo $data['subtotal'][$i]; ?></td>
                  </tr>

                <?php 
                  }
                ?>
                <tr>
                  <th></th>
                  <th></th>
                  <th><?php echo $data['total']; ?></th>
                </tr>
              </tbody>
            </table>
            <hr>
            <table>
              <body>
                <tr>
                  <th>Diskon: <?php echo $data['diskon']; ?></th>
                  <th>Ongkir: <?php echo $data['ongkir']; ?></th>
                  <th>Total: <?php echo $data['total']-$data['diskon']+$data['ongkir']; ?></th>
                </tr>
              </body>
            </table>
          </div>
          <div class="col-sm-4">
            <div class="card text-center" style="padding: 0px 10px 0px 10px; background-color: #83a5ed;">
              <table>
                <thead>
                  <th>Nama</th>
                  <th>Bayar</th>
                </thead>
                <tbody> 
                  <?php 
                    for ($i=0; $i < count($data['nama']); $i++) { 
                  ?>                   
                  <tr>
                    <td><?php echo $data['nama'][$i]; ?></td>
                    <td><?php echo $data['bayar'][$i]; ?></td>
                  </tr>
                  <?php 
                    }
                  ?>
                </tbody>
              </table>
            </div>
            
          </div>
        </div>
      </div>      
    <style>
      @font-face {
        font-family: 'BasierCircle';
        src: url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-regular-webfont.eot);
        src: url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-regular-webfont.eot) format("embedded-opentype"), url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-regular-webfont.woff2) format("woff2"), url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-regular-webfont.woff) format("woff"), url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-regular-webfont.ttf) format("truetype");
        font-weight: 400;
        font-style: normal;
      }

      @font-face {
        font-family: 'BasierCircle';
        src: url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-medium-webfont.eot);
        src: url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-medium-webfont.eot) format("embedded-opentype"), url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-medium-webfont.woff2) format("woff2"), url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-medium-webfont.woff) format("woff"), url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-medium-webfont.ttf) format("truetype");
        font-weight: 500;
        font-style: normal;
      }

      @font-face {
        font-family: 'BasierCircle';
        src: url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-semibold-webfont.eot);
        src: url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-semibold-webfont.eot) format("embedded-opentype"), url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-semibold-webfont.woff2) format("woff2"), url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-semibold-webfont.woff) format("woff"), url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-semibold-webfont.ttf) format("truetype");
        font-weight: 600;
        font-style: normal;
      }

      @font-face {
        font-family: 'BasierCircle';
        src: url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-bold-webfont.eot);
        src: url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-bold-webfont.eot) format("embedded-opentype"), url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-bold-webfont.woff2) format("woff2"), url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-bold-webfont.woff) format("woff"), url(https://loket-asset-production.s3.amazonaws.com/evoucher/fonts/basiercircle-bold-webfont.ttf) format("truetype");
        font-weight: 700;
        font-style: normal;
      }
      html,
      body {
        margin: 0;
        font-family: 'BasierCircle', sans-serif;
      }
      body {
        padding-top: 48px;
        padding-bottom: 48px;
        background: #EEEEEE;
      }
      table {
        width: 100%;
      }
      .site-header {
        height: 48px;
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        background: rgba(255, 255, 255, 0.88);
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1), 0 1px 1px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 0 16px;
        z-index: 99;
      }

      .site-header__logo {
        float: left;
      }

      .site-header__logo em {
        display: block;
        font-size: 20px;
        font-weight: 400;
        text-transform: uppercase;
        font-style: normal;
        line-height: 48px;
        color: #d9531e;
      }

      .site-header__action {
        float: right;
        padding: 8px 0;
      }

      .site-header__action .btn {
        display: block;
        vertical-align: middle;
        line-height: 22px;
        padding: 4px 12px;
        border: solid 1px rgba(0, 0, 0, 0.1);
        background: #fff;
        border-radius: 3px;
        font: inherit;
        font-size: 14px;
        outline: 0 !important;
        float: left;
        margin: 0 0 0 8px;
        background-color: #01A4EF;
        color: #fff !important;
        background-image: linear-gradient(#2fbdfe, #01A4EF);
        text-shadow: -0.1px -0.1px rgba(0, 0, 0, 0.12);
        box-shadow: 0 0.1px 0.1px rgba(255, 255, 255, 0.4) inset;
      }

      .site-header__action .btn svg {
        display: block;
        width: 22px;
        height: 22px;
        fill: #fff;
        float: left;
        margin: 0 6px 0 -4px;
      }

      .site-header__action .btn:focus {
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
      }
      .evoucher-wrapper {
        max-width: 746px;
        margin: 0 auto;
        background: #fff;
        border: solid 0px #e5e5e5;
        box-shadow: 0 1px 1px rgb(0 0 0 / 4%);
      }
      .evoucher-header {
        max-width: 746px;
        height: 62.34px;
        padding: 0 24px;
        margin: 0 auto;
        background-image: url('https://loket-asset-production.s3.amazonaws.com/evoucher/header.png');
        background-size: cover;        
        margin-top: 100px;
      }
      .evoucher-header .logo {
        width: 120px;
        line-height: 62.34px;
      }
      .evoucher-header .title,
      .evoucher-header .category {
        font-size: 12px;
        line-height: 18px;
        color: #FFFFFF;
      }
      .evoucher-header img {
        width: 100%;
      }
      .evoucher-body {
        padding: 20px 24px;
      }
      .evoucher-body .event-detail {
        padding: 10px;
        border: 1px solid #DBDFE7;
        border-radius: 4px;
        position: relative;
      }
      .evoucher-body .event-detail .event-title {
        margin: 0 0 5px 0;
        font-size: 16px;
        font-weight: 600;
        line-height: 24px;
      }      
      .evoucher-body .tnc {
        margin-top: 20px;
        font-size: 14px;
        line-height: 20px;
        color: #151416;
      }
      .evoucher-body .tnc .title {
        margin: 0 0 5px 0;
        font-size: 16px;
        line-height: 24px;
        color: #151416;
      }
      .evoucher-body .tnc .title .muted {
        color: #8E919B;
      }
      [] {
        border: 1px dashed #8E919B;
        border-radius: 4px;
      }
      .evoucher-footer-list {
        display: flex;
        justify-content: left;
        flex: 1;
        align-items: center;
      }
      .ml-2 {
        margin-left: 4px;
      }
      .file-btn {
        position: absolute;
        top: 0px;
        right: 10px;
        overflow: hidden;
        height: 24px;
        line-height: 24px;
        padding: 0 6px;
        border-radius: 3px;
        border: solid 1px #ccc;
        font-size: 9px;
        cursor: pointer;
        font-family: Arial, sans-serif;
        text-transform: uppercase;
        font-weight: 700;
        background: rgba(255, 255, 255, .4);
      }
      @media print {
        * {
          -webkit-print-color-adjust: exact;
          color-adjust: exact;
        }
        body {
          margin: 0;
          padding: 0;
        }
        .site-header {
          display: none;
        }
        .evoucher-header {
          max-width: 100%;
          width: calc(100% - 24px - 24px);
        }
        .evoucher-footer {
          max-width: 100%;
          width: 100%;
          margin: 0 auto;
        }
        [] {
          border: none;
          border-radius: 0;
        }
        .evoucher-wrapper-new {
          height: 94vh;
          overflow: hidden;
        }

        .break {
          page-break-before: always;
        }
      }
      @page {
        size: A4 portrait;
        margin-top: 40px;
        margin-bottom: 40px;
        margin-left: 0;
        margin-right: 0;
        -webkit-print-color-adjust: exact;
      }
      @page:first {
        margin-top: 0;
        margin-bottom: 40px;
        margin-left: 0;
        margin-right: 0;
      }
    </style><div class="break"></div> <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"bam.nr-data.net","licenseKey":"2c15469c42","applicationID":"369202913","transactionName":"YlRRYEUEXEAFAhYIX1secldDDF1dSyQUBF5BHlZCWBBRWwET","queueTime":0,"applicationTime":40,"atts":"ThNSFg0eT04=","errorBeacon":"bam.nr-data.net","agent":""}</script></body>
    </html>