@extends('layouts.frontend.app')



@section('footer-js')
    

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
   
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qr-scanner/1.4.2/qr-scanner.umd.min.js"
    integrity="sha512-a/IwksuXdv0Q60tVkQpwMk5qY+6cJ0FJgi33lrrIddoFItTRiRfSdU1qogP3uYjgHfrGY7+AC+4LU4J+b9HcgQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    var doneAudio = '{{ url('public/assets/done.mp3') }}';
    var wrongAudio = '{{ url('public/assets/false.mp3') }}';


    $(function(){
    
        function showErrorModal(message) {
            $('#myModal .modal-body h4').html("خطأ");
            $('#myModal .modal-body i').removeClass("fi-rr-check-circle").addClass("fi fi-rr-circle-xmark");

            $('.modal-confirm .modal-header').removeClass("success");
            $('#myModal .modal-body p').html(message);
            $('#myModal').modal('show');
        }
    
        function showSuccessModal(message , title) {
            $('#myModal .modal-body h4').html(title != null ? title : "تم بنجاح" );
            $('#myModal .modal-body i').addClass("fi-rr-check-circle").removeClass("fi fi-rr-circle-xmark");
            $('.modal-confirm .modal-header').addClass("success");

            $('#myModal .modal-body p').html(message);
            $('#myModal').modal('show');
        }


    $("form").submit(function(e) {
      
        e.preventDefault();
        send($(this).attr("action"));
    });



    function send(decodedText) {


loading = true;

$(".loading_dialog").addClass("shown");
$.ajax({


    url: decodedText,
    dataType: "JSON",
    type: "POST",
    // async: false,
    //         processData: false,
    // contentType: false,

    // cache: false,
    data: {
        '_token': "{{ csrf_token() }}",

    },

    complete: function(data) {

        $(".loading_dialog").removeClass("shown");
        loading = false;
    },
    success: function(data) {
        console.log(data);



        if (data.status) {
            showSuccessModal(data.message , "العرض صالح للإستخدام");

        } else {
            showErrorModal(data.message);

        }
    },

    error: function(error) {

        // alert("error");
    }
});
}
    });
    // function unlockAudio() {
    //     const sound = new Audio(doneAudio);
    //     const sound1 = new Audio(wrongAudio);

    //     sound.play();
    //     sound.pause();
    //     sound.currentTime = 0;
    //     sound1.play();
    //     sound1.pause();
    //     sound1.currentTime = 0;

    //     document.body.removeEventListener('click', unlockAudio)
    //     document.body.removeEventListener('touchstart', unlockAudio)
    // }

    // document.body.addEventListener('click', unlockAudio);
    // document.body.addEventListener('touchstart', unlockAudio);

    loading = false;
        var lastScan = "";
// 

    // $(function() {

    //     var lastScan = "";

    //     // To enforce the use of the new api with detailed scan results, call the constructor with an options object, see below.
    //     const qrScanner = new QrScanner(
    //         document.getElementById('qr-reader'),

    //         result => {

    //             console.log('decoded qr code:', result);
    //             if (result.data != lastScan && !loading) {

    //                 send(result.data);
    //                 lastScan = result.data;

    //             }


    //         }, {
    //             /* your options or returnDetailedScanResult: true if you're not specifying any other options */

    //         },
    //     );


    //     qrScanner.start();
    // });


    function onScanSuccess(decodedText, decodedResult) {


        console.log(`Scan result: ${decodedText}`, decodedResult);

        if (decodedText != lastScan && !loading) {
            lastScan = decodedText;

            send(decodedText);
            // document.getElementById("barcode").value = decodedResult;
            // alert(decodedText);

        }
    }

    setTimeout(() => {
        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250,
                supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA]
            }, false);
        html5QrcodeScanner.render(onScanSuccess);
    }, 1000);

  


  
</script>
@endsection
    

@section('content')



<div class="page-container">
    <div class="py-12 app-layout">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
    
                    <h2 class="main-title">اهلا بك {{ $business->name }}</h2>
                    <p class="p-description">قم بإعطاء صلاحية الكاميرا للموقع  و مسح  كود العميل</p>
                    <audio id="audio" src="{{ url('public/assets/done.mp3') }}" type="audio/mpeg" autostart="false"></audio>
                    <audio id="audio-false" src="{{ url('public/assets/false.mp3') }}" type="audio/mpeg"
                        autostart="false"></audio>
    
                    {{-- <div id="reader" style="display: block" width="600px"></div> --}}
    
    
                    

                    <form action="{{ route("orders.redeem", "6f0ac1ff4f869d1d2449da77d6d08715") }}">
                   
                        <button type="submit">إرسال</button>
                    </form>
                  
                    
                    <!-- Modal HTML -->
                    <div id="myModal" class="modal fade">
                        <div class="modal-dialog modal-confirm">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <div class="icon-box">
                                        <i class="fi fi-rr-circle-xmark"></i>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                </div>
                                <div class="modal-body text-center">
                                    <h4>Ooops!</h4>	
                                    <p>Something went wrong. File was not uploaded.</p>
                                    <button class="btn btn-success" data-dismiss="modal">إغلاق</button>
                                </div>
                            </div>
                        </div>
                    </div> 
    
    
    
                        </div>
    
    
                    </div>
    
    
    
                </div>
            </div>
</div>



        <div class="loading_dialog ">
            <div class="inner">
    
            <img src="{{ asset('assets/images/loading.gif') }}" alt="Loading..." />
                <h3>يرجى الإنتظار</h3>
            </div>



         
    
         </div>

      
@endsection