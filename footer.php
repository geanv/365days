<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
        </div><!-- end .row -->
    </div>
</div><!-- end #body -->
<div class="return-top">
	<a href="javascript:;" class="triangle" title="回顶部">
		<i class="triangle-up"></i>
	</a>
</div>
<footer id="footer" role="contentinfo">
	&copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?>. </a> By <a href="http://www.typecho.org">Typecho</a> & <a href="https://github.com/geanv/365days">365Days</a>
</footer><!-- end #footer -->

<?php $this->footer(); ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/instantclick/3.0.1/instantclick.min.js" data-no-instant></script>
<script src="<?php $this->options->themeUrl('js/main.js'); ?>"></script>
<script data-no-instant>InstantClick.init('mousedown');</script>
</body>
</html>
