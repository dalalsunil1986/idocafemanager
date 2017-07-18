@if(notify()->ready())
<script>
    swal({
       title: '{{ notify()->message() }}',
        type: '{{ notify()->type() }}',
        @if((notify()->type())=='warning')
            text: "Do you want to Delete the User?",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false,
            closeOnCancel: true
        @endif
    }@if((notify()->type())=='warning'),
    function (isConfirm) {
        if(isConfirm){
            window.location = "{{ route('user.delete.confirmed',['id'=>$id]) }}";
        }else{
            window.location = "{{ route('user.manage') }}";
        }
    }@endif);
</script>
@endif
<script>
    $('#editMenu').modal();
</script>


