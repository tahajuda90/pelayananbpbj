<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Kunjungan</h3>
    </div>
    <div class="card-body table-responsive ">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-hover" id="mytable">
            <thead>
                <tr>
                    <th width="40px">No</th>
		    <th>Email / No Telp</th>                    
		    <th width="300px">Identitas</th>
		    <th>Jenis Tamu</th>
                    <th>Asal Instansi</th>
		    <th>Keperluan</th>
		    <th>Keterangan</th>
		    <th >Action</th>
                </tr>
            </thead>
	    
        </table>
    </div>
</div>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "<?= base_url('C_Visitor/json')?>", "type": "POST"},
                    columns: [
                        {
                            "data": "id_visit",
                    orderable: false
                        },{"data": "email",
                            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol){
                                var html = oData.email;
                                html += "<br/>No Telp: "+oData.telepon;
                                $(nTd).html(html);
                            },
                    orderable: false
                        },{"data": "no_identitas",
                            "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                                var kel = "none";
                                switch(oData.kelamin){
                                case "P":
                                    kel = "Perempuan";
                                    break;
                                case "L":
                                    kel = "Laki-Laki";
                                    break;
                                default:
                                    kel = "None";
                               }
                                var html = oData.nama;
                                html += '<br>'+oData.unik+" : "+oData.no_identitas;
                                html += '<br>Kelamin: '+kel;
                                $(nTd).html(html);},
                    orderable: false
                        },
                        {"data": "jenis_tamu"},{"data": "instansi"},
                        {"data": "service"},{"data": "keterangan",
                    orderable: false},
                        {
                            "data" : "id_visit",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
