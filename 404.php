<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

        <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/002.css'); ?>">

<div class="wrapper">
        <div class="default_title">
            <img src="<?php $this->options->themeUrl(); ?>assets/img/mycomputer.png">
            
                <h1><?php $this->options->title() ?></h1>
            
        </div>
        <ul class="topbar">
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
    <a href="<?php $pages->permalink(); ?>"><li><?php $pages->title(); ?></li></a>
    <?php endwhile; ?>

</ul>
        <div class="tag_list">
            <ul id="tag-list">
                <li><a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->themeUrl(); ?>assets/img/disk.png">(C:)</a>
            <ul>
                
                <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
    <?php while ($category->next()): ?>
        <li><a href="<?php $category->permalink(); ?>"><img src="<?php $this->options->themeUrl(); ?>assets/img/folder.ico"><?php $category->name(); ?></a></li>
    <?php endwhile; ?>

                
            </ul>
                </li>
            </ul>
        </div>
        <div class="post_list">
            
                
                    <ul>
    <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10')->to($contents); ?>
<?php while($contents->next()): ?>
    <li><a href="<?php $contents->permalink() ?>" title="<?php $contents->title() ?>"><img src="<?php $this->options->themeUrl(); ?>assets/img/file.ico" title="<?php $contents->title() ?>"><?php $contents->title() ?></a></li>
    <?php endwhile; ?>

    
</ul>
                
            
        </div>
        <div class="post_total">
            
                <div class="left"><?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?><?php $stat->publishedPostsNum() ?> object(s)</div>
            
            <div class="right">&nbsp;</div>
        </div>
    </div>


<div class="content">
    <div class="post_title">
        <img src="<?php $this->options->themeUrl(); ?>assets/img/file.png">
        <h1>404 error</h1>
        <a href="<?php $this->options->siteUrl(); ?>">
        <div class="btn">
            <span class="fa fa-times"></span>
        </div>
        </a>
        <div class="btn btn_max">
            <span class="fa fa-window-maximize"></span>
        </div>
        <div class="btn">
            <span class="fa fa-window-minimize"></span>
        </div>
    </div>
    <ul class="topbar">
        <li></li>
    </ul>
    <div class="post_content">
        <p>Sorry this page does not exist... :(</p> </div>
</div>

<?php $this->need('footer.php'); ?>
