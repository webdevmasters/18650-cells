<!-- Libs JS -->
<script src="{{ URL::asset('build/libs/dropzone/dist/dropzone-min.js') }}" defer></script>
<script src="{{ URL::asset('build/libs/list.js/dist/list.min.js') }}" defer></script>
<script src="{{ URL::asset('build/fonts/js/font-awesome_all.js') }}" defer></script>
<script src="{{ URL::asset('build/libs/jquery/jquery-3.7.1.js') }}"></script>
<script src="{{ URL::asset('build/libs/jquery/jquery-ui.js') }}"></script>
<script src="{{ URL::asset('build/libs/toastr/toastr.min.js') }}" ></script>
<script src="{{ URL::asset('build/libs/datatables/datatables.js') }}" defer></script>
<script src="{{ URL::asset('build/libs/filepond/filepond.js') }}" ></script>
<script src="{{ URL::asset('build/libs/filepond/filepond.jquery.js') }}" ></script>
<script src="{{ URL::asset('build/libs/filepond/filepond-plugin-image-preview.js') }}" ></script>
<script src="{{ URL::asset('build/libs/sweet-alert/sweetalert.js') }}" ></script>

@vite(['resources/js/admin/tabler.js'])

@yield('scripts-bottom')
