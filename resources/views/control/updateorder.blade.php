{{! $orderID=urldecode(Request::route('orderid'))}}
{{! $status=urldecode(Request::route('status'))}}

{{! $item = App\order::where('orderID',$orderID)->update(['orderStatus'=>$status])}}
{{! $log=rand(50,5000)*time() }}
{{! $logID="LID".sprintf("%0.4s",str_shuffle($log)) }}
{{! $query2 = new App\history_log }}
{{! $query2->logID = $logID }}
{{! $query2->userid = session()->get('username') }}
{{! $query2->action = "Update Order Status For Order ".$orderID }}
{{! $query2->date = time() }}
{{! $query2->save()}}
<script>
window.location="{{Config::get('constant.options.sitelink')}}pendingorders";
</script>
