<style>
  .table {
   text-align: center;   
   }
</style>
<div class="row">
    <div class="col-md-6">
        <h3><?= fdateindo(date("Y-m-d"))?></h3>
    </div>
    <div class="col-md-6">        
        <h3 class="digital-clock pull-right">00:00:00</h3>
    </div>    
</div>
<table class="table table-striped">
    <tbody>        
            <?php
            if(isset($guest)){
                foreach($guest as $gst){
                    ?>
            <tr>
                <td><a type="button" href="<?= base_url('welcome/catat/').$gst->id_role?>" class="btn btn-lg btn-block btn-primary"><?=$gst->jenis_tamu?></a></td>
            <td><h1><?=$gst->jumlah?> Orang</h1></td>
            </tr>
                    
                    <?php
                }
            }
            ?>        
    </tbody>
</table>
<script>
    $(document).ready(function() {
  clockUpdate();
  setInterval(clockUpdate, 1000);
});

function clockUpdate() {
  var date = new Date();
  function addZero(x) {
    if (x < 10) {
      return x = '0' + x;
    } else {
      return x;
    }
  }

  var h = addZero(date.getHours());
  var m = addZero(date.getMinutes());
  var s = addZero(date.getSeconds());

  $('.digital-clock').text(h + ':' + m + ':' + s)
}
</script>
