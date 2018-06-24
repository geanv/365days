<?php
/**
 * archives
 *
 * @package custom
 */
$this->need('header.php'); ?>
<div class="col-mb-12 col-8" id="main" role="main">
	<article class="post shadow" itemscope itemtype="http://schema.org/BlogPosting">
		<h1 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
		<div class="post-content" itemprop="articleBody">
        <?php  
            $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);   
            $year=0; $mon=0; $i=0; $j=0;   
            $output = '';   
            while($archives->next()):   
                $year_tmp = date('Y',$archives->created);   
                $mon_tmp = date('m',$archives->created);   
                $y=$year; $m=$mon;   
                if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';   
                if ($year != $year_tmp) {   
                    $year = $year_tmp;   
                    $output .= '<h2>'. $year .' 年</h2>'; //输出年份   
                }   
                if ($mon != $mon_tmp) {   
                    $mon = $mon_tmp;   
                    $output .= '<p>'. $mon .' 月</p><ul class="achieve-item">'; //输出月份   
                }   
                $output .= '<li>'.date('d 日：',$archives->created).'<a href="'.$archives->permalink .'">'. $archives->title .'</a> </li>'; //输出文章日期和标题
            endwhile;   
            $output .= '</ul></li></ul>';
            echo $output;
        ?>
	</div>
	</article>
</div><!-- end #main-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>