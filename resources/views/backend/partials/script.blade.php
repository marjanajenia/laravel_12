<!-- JAVASCRIPT -->
<script src="{{ asset('backend') }}/assets/libs/jquery/jquery.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/node-waves/waves.min.js"></script>

<!-- Required datatable js -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/jszip/jszip.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>

    <!-- Datatable init js -->
    <script src="{{ asset('backend') }}/assets/js/pages/datatables.init.js"></script>

<!-- toast plugin -->
<script src="{{ asset('backend') }}/assets/libs/toastr/build/toastr.min.js"></script>

<script>
    toastr.options = {
        "closeButton": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000"
    };
    
    @if (session()->has('success'))
        toastr.success("{{ session('success') }}");
        {{ session()->forget('success') }}
    @endif
    @if (session()->has('error'))
        toastr.error("{{ session('error') }}");
        {{ session()->forget('error') }}
    @endif
</script>


<!-- Sweet Alerts js -->
<script src="{{ asset('backend') }}/assets/libs/sweetalert2/sweetalert2.min.js"></script>
<!-- Sweet Alerts Script -->
<script>
    $(document).on("click", "#delete", function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            confirmButtonClass: "btn btn-success mt-2",
            cancelButtonClass: "btn btn-danger ms-2 mt-2",
            buttonsStyling: !1
        }).then(function(t) {
            t.value ? window.location.href = link : t.dismiss === Swal.DismissReason.cancel &&
                Swal.fire({
                    title: "Cancelled",
                    text: "Your imaginary file is safe :)",
                    icon: "error"
                })
        })
    });
</script>
<!-- SummerNote Script -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('#summernote').summernote({
            height: 200,
            tabsize: 2
        });
    });
</script>
<script src="{{ asset('backend') }}/assets/js/app.js"></script>
<!-- Custom Script -->
<script src="{{ asset('backend') }}/assets/js/backend_custom.js"></script>

@stack('custom-script')
<script>
    $(document).on('click', '.notification-item', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let url = $(this).attr('href');

        $.ajax({
            url: "{{ route('notifications.markAsRead') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            success: function() {
                window.location.href = url;
            }
        });
    });
</script>


</body>

</html>
