<footer class="container-fluid footer">
    <p class="pull-right">
        Executed in {elapsed_time} seconds, using {memory_usage}.
        <br/>
        Powered by <a href="http://cibonfire.com" target="_blank"><i class="icon-fire">&nbsp;</i>&nbsp;Bonfire</a> <?php echo BONFIRE_VERSION ?>
    </p>
</footer>

<div id="debug"><!-- Stores the Profiler Results --></div>

<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo js_path(); ?>jquery-1.7.2.min.js"><\/script>')</script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<?php echo Assets::js(); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tabsbsbs").tabs();
    });
</script>
</body>
</html>