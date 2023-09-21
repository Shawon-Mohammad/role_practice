<script>
    // auto fadeout success message, when redirect with success message
    $('.success').fadeIn('slow').delay(10000).fadeOut('slow');




    // alert message display
    function showAlertMessage(message, time = 1000, type = 'error') {
        swal.fire({
            title: type.toUpperCase(),
            html: "<b>" + message + "</b>",
            icon: type,
            timer: time
        })
    }



    // success alert message like popup window
    @if (session()->get('message'))
        swal.fire({
            title: "Success",
            html: "<b>{{ session()->get('message') }}</b>",
            icon: "success",
            timer: 3000
        });


        // success alert message like popup window
    @elseif (session()->get('success'))
        swal.fire({
            title: "Success",
            html: "<b>{{ session()->get('success') }}</b>",
            icon: "success",
            timer: 3000
        });


        // warning alert message like popup window
    @elseif (session()->get('warning'))
        swal.fire({
            title: "Alert",
            html: "<b>{{ session()->get('warning') }}</b>",
            icon: "warning",
            timer: 4000
        });

        // warning alert message like popup window
    @elseif (session()->get('info'))
        swal.fire({
            title: "Alert",
            html: "<b>{{ session()->get('info') }}</b>",
            icon: "info",
            timer: 6000
        });


        // error alert message like popup window
    @elseif (session()->get('error'))
        swal.fire({
            title: "Error",
            html: "<b>{{ session()->get('error') }}</b>",
            icon: "error",
            timer: 5000
        });
    @endif
</script>