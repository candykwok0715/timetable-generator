<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>dataGrid</title>
<?php require_once('Member.php'); ?>

<script>
 $(document).ready(function () {
            // prepare the data
			var data = {};
            var theme = 'classic';
			
            var source =
            {
                datatype: "json",
                datafields: [
					 	{ name: 'roomNO' },
						{ name: 'type' },
						{ name: 'capacity' },
						{ name: 'remark' }
                ],
				id: 'roomNO',
                url: 'sort_filter_page.php',
				root: 'Rows',
				beforeprocessing: function (data) {
                    source.totalrecords = data[0].TotalRows;
                },
				
				updaterow: function (rowid, rowdata) {
                    // synchronize with the server - send update command
                    var data = "update=true&type=" + rowdata.type +"&capacity=" + rowdata.capacity + "&remark=" + rowdata.remark;
                    data = data + "&roomNO=" + rowdata.roomNO;
                    $.ajax({
                        dataType: 'json',
                        url: 'room_edit_data.php',
                        data: data,
                        success: function (data, status, xhr) {
                            // update command is executed.
                        }
                    });
                },
			
				deleterow: function (rowid) {
                    // synchronize with the server - send delete command
                    var data = "delete=true&roomNO=" + rowid;
                    $.ajax({
                        dataType: 'json',
                        url: 'edit_data.php',
                        data: data,
                        success: function (data, status, xhr) {
                            // delete command is executed.
                        }
                    });
                },
                filter: function () {
                    // update the grid and send a request to the server.
                    $("#jqxgrid").jqxGrid('updatebounddata');
                },
				
				sort: function () {
                    // update the grid and send a request to the server.
                    $("#jqxgrid").jqxGrid('updatebounddata');
                }
				
            };
			
			
            var dataadapter = new $.jqx.dataAdapter(source, {
                loadError: function (xhr, status, error) {
                    alert(error);
                }
            }
			
			);
			
            // initialize jqxGrid
            $("#jqxgrid").jqxGrid(
            {
				width:400,
                source: dataadapter,
                theme: theme,
                filterable: true,
                autoheight: true,
                pageable: true,
                virtualmode: true,
				sortable: true,
				editable: true,		
                rendergridrows: function () {
                    return dataadapter.records;
                },
                columns: [
                      { text: 'roomNO', datafield: 'roomNO',  width: 100 },
					{ text: 'type', datafield: 'type', width: 100 },
					{ text: 'capacity', datafield: 'capacity', width: 100 },
					{ text: 'remark', datafield: 'remark', width: 100 }
                  ]
            });
            $("#deleterowbutton").jqxButton({ theme: theme });
			
			
            // delete row.
           $("#deleterowbutton").bind('click', function () {
                var selectedrowindex = $("#jqxgrid").jqxGrid('getselectedrowindex');
                var rowscount = $("#jqxgrid").jqxGrid('getdatainformation').rowscount;
                if (selectedrowindex >= 0 && selectedrowindex < rowscount) {
                    var id = $("#jqxgrid").jqxGrid('getrowid', selectedrowindex);
                    $("#jqxgrid").jqxGrid('deleterow', id);
                }
            });
		
        });// JavaScript Document
</script>

</head>

<body>
<center>
<div id="jqxgrid"></div>
 <div id="cellbegineditevent"></div>
 <div style="margin-top: 10px;" id="cellendeditevent"></div>
	 <input id="deleterowbutton" type="button" value="Delete Selected Row" />
<div>

       
</center>

</body>
</html>
