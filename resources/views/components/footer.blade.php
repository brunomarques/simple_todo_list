
                </div>
            </div>

            <footer class="main-footer" style="margin-left: 0px !important;">
                <div class="float-right d-none d-sm-block">
                    <b>V</b> 1.0.5
                </div>
                <strong>{{ env("app_name") }}</strong> All rights reserved.
            </footer>
        </div>
    </body>

    <script src="{{ asset("plugins/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset("plugins/jquery-ui/jquery-ui.min.js") }}"></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

    <script src="{{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script src="{{ asset("plugins/nestable2/dist/jquery.nestable.min.js") }}"></script>
    <script src="{{ asset("plugins/sweetalert2/sweetalert2.all.min.js") }}"></script>

    <script src="{{ asset("js/adminlte.min.js") }}"></script>

    @yield('js')
</html>
