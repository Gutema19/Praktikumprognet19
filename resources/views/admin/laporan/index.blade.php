@extends("template.admin")
@section('title', 'Laporan')
@section('judul', 'Laporan')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title, text-center">Filter Laporan</h5>
                        <div class="center">
                            <div class="row input-daterange">
                                <div class="col-md-4">
                                    <input type="date" name="from_date" id="from_date" class="form-control" placeholder="From Date"  />
                                </div>
                                <div class="col-md-4">
                                    <input type="date" name="to_date" id="to_date" class="form-control" placeholder="To Date"  />
                                </div>
                                <div class="col-md-4">
                                    <button type="button" name="filter" id="filter" class="btn btn-primary">Filter</button>
                                    <button type="button" name="refresh" id="refresh" class="btn btn-default">Refresh</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="order_table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Addrses</th>
                                <th>Total</th>
                                <th>Sub Total</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 
@section('js')
 
<script type="text/javascript">
   $(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format:'yyyy-mm-dd',
  autoclose:true
 });

 load_data();

 function load_data(from_date = '', to_date = '')
 {
  $('#order_table').DataTable({
   processing: true,
   serverSide: true,
   ajax: {
    url:'{{ route("admin.laporan.index") }}',
    data:{from_date:from_date, to_date:to_date}
   },
   columns: [
    {
     data:'id',
     name:'id'
    },
    {
     data:'address',
     name:'address'
    },
    {
     data:'total',
     name:'total'
    },
    {
     data:'sub_total',
     name:'sub_total'
    },
    {
     data:'status',
     name:'status'
    }
   ]
  });
 }

 $('#filter').click(function(){
  var from_date = $('#from_date').val();
  var to_date = $('#to_date').val();
  if(from_date != '' &&  to_date != '')
  {
   $('#order_table').DataTable().destroy();
   load_data(from_date, to_date);
  }
  else
  {
   alert('Both Date is required');
  }
 });

 $('#refresh').click(function(){
  $('#from_date').val('');
  $('#to_date').val('');
  $('#order_table').DataTable().destroy();
  load_data();
 });
 });

</script>
 
@endsection