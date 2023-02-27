<style type="text/css">
.dataTable{
        font-size: 11px;
}

.dataTables_length label {
    width: 40%;
    float: left;
    text-align: left;
    border: 0px solid #ccc;
}

.dataTables_filter label {
    width: 50%;
    float: right;
    text-align: right;
    border: 0px solid #ccc;
}
.dataTables_filter input {
    width: 400px;
    margin-left: 10px;
}

.dataTables_info {
    width: 40%;
    float: right;
    text-align: right;
    border: 0px solid #ccc;
}

.dataTables_paginate {
    width: 40%;
    float: right;
    text-align: right;
    border: 0px solid #ccc;
}
.dataTables_paginate ul{
	margin:5px 0;
}

.DTTT{
	float: left;
}
</style>

	<a class="btn btn-xs btn-primary" href="<?php echo base_url().'adminbaak/jadwal/add'; ?>"><i class="fa fa-fw fa-plus"></i> Input Jadwal Perkuliahan</a>
	<br><br>
	<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>KODE JADWAL</th>
				<th>JAM</th>
				<th>KELAS</th>
				<th>RUANG</th>
				
				<th>NAMA MTK</th>
				<th>SKS</th>
				
				<th>NAMA DOSEN</th>
				
				<th>NAMA FAKULTAS</th>
				<th>ACTION</th>
			</tr>
		</thead>
	</table>


<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function()
	{
		$("#example").DataTable({
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],

			dom 		: '<"top"lf>rt<"bottom"Tip><"clear">',       
	        "tableTools": {
	            "sSwfPath": "../../vendor/DataTables-1.10.10/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
	            "aButtons": [
	                "copy",
	                "csv",
	                "xls",
	                {
	                    "sExtends": "pdf",
	                    "sPdfOrientation": "landscape",
	                    "sPdfMessage": "Jadwal Perkuliahan"
	                },
	                "print"
	            ]            
	        },

			processing 	: true,
		    serverSide 	: true,
		    responsive 	: true,

		    ajax : {
		    	"url" : "<?php echo base_url() ?>adminbaak/jadwal/lookup",
		    	"type" : "GET"
		    },

			"columns": [
				{ "visible": false, "searchable": true,  "sortable": true },
				{ "visible": true, "searchable": true,  "sortable": true  },
				{ "visible": true, "searchable": true,  "sortable": true  },
				{ "visible": true, "searchable": true,  "sortable": true  },

				{ "visible": true, "searchable": true,  "sortable": true  },
				{ "visible": true, "searchable": true,  "sortable": true  },				
				{ "visible": true, "searchable": true,  "sortable": true  },

				{ "visible": true, "searchable": false,  "sortable": false  }
			],

	        "columnDefs": [ {
	            "targets": 8,
	            "render" : function(data, type, row){
					return 	'<a class="btn btn-primary btn-xs" href="<?=base_url()?>adminbaak/jadwal/edit/'+row[0]+'">Edit</a> ' + '<a class="btn btn-danger btn-xs" href="<?=base_url()?>adminbaak/jadwal/delete/'+row[0]+'">Delete</a>';
	            }
	        }]			


		});


	});
</script>	