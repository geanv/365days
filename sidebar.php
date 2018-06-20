<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="col-mb-12 col-4 kit-hidden-tb" id="secondary" role="complementary">
    <?php if (!empty($this->options->sidebarBlock)): ?>
    <?php /* $bing = bing(); */ ?> <!-- 获取今日必应壁纸 -->
    <section class="widget" id="info">
        <div class="info-header">
            <span class="info-header-img">
                <a href="<?php $this->options->adminUrl(); ?>" target="_blank">
                    <img src="https://secure.gravatar.com/avatar/308c4f91d46c79b4510b3cbb49b2b3b4?s=220&r=X&d=mm">
                </a>
            </span>
        </div>
        <div class="info-name">
            <span><?php $this->options->title() ?> - <?php $this->options->description() ?></span>
        </div>
        <div class="follow-me">
            <a href="https://github.com/geanv" target="_blank"><span class="fa fa-github fa-2x"></span></a>
            <a href="https://cn.linkedin.com/in/geanv" target="_blank"><span class="fa fa-linkedin fa-2x"></span></a>
            <a href="https://weibo.com/geanv" target="_blank"><span class="fa fa-weibo fa-2x"></span></a>
        </div>
    </section>
    <?php if(isset($this->options->plugins['activated']['Views'])): ?>
        <section class="widget">
            <h3 class="widget-title"><?php _e('热门文章'); ?></h3>
            <ul class="widget-list">
                <?php Views_Plugin::theMostViewed(); ?>
            </ul>
        </section>
    <?php endif; ?>
    <?php endif; ?>

    <?php if ((!$this->is('post')) || (!in_array('ShowTableContent', $this->options->tableContent))) : ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?>: <?php $comments->excerpt(35, '...'); ?></a></li>
        <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('分类'); ?></h3>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('归档'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年m月')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<section class="widget">
		<h3 class="widget-title"><?php _e('其它'); ?></h3>
        <ul class="widget-list">
            <?php if($this->user->hasLogin()): ?>
				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
        </ul>
	</section>
    <?php endif; ?>

    <?php elseif(isset($this->options->plugins['activated']['ContentIndex'])): ?>
    <section class="widget" id="toc">
		<h3 class="widget-title"><?php _e('目录'); ?></h3>
        <?php ContentIndex_Plugin::tableContent(); ?>
	</section>

    <?php endif; ?>

</div><!-- end #sidebar -->
